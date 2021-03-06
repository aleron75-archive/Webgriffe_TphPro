<?php

/**
 * TphPro Observer model
 *
 * @author Alessandro Ronchi <aronchi at webgriffe.com>
 */
class Webgriffe_TphPro_Model_Observer {

    public function addHandlesBlock($observer) {
        if (Mage::app()->getRequest()->isAjax()) {
            return;
        }
        
        $event = $observer->getEvent();
        /** @var Mage_Core_Model_Layout $layout */
        if ($layout = $event->getLayout()) {
            /** @var Mage_Core_Block_Abstract $layoutBlock */
            $layoutBlock = $layout->createBlock('Webgriffe_TphPro_Block_Handles', 'webgriffe_tphpro_handles');
            if (!empty($layoutBlock)) {
                $layout->addOutputBlock('webgriffe_tphpro_handles');
            }
        }
    }

    public function addTemplateHints($observer) {
        if (Mage::app()->getRequest()->isAjax()) {
            return;
        }
        
        $event = $observer->getEvent();
        /** @var Mage_Core_Block_Abstract $block */
        $block = $event->getBlock();

        if ($block instanceof Webgriffe_TphPro_Block_Handles)
        {
            return;
        }

        $transport = $event->getTransport();

        $html = '';
        switch(Mage::helper('webgriffe_tphpro')->getDisplayHintsType()) {
            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_H_E:
                // break intentionally omitted
            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_HTML_ELEMENT:
                $html = '<magento_block '
                    #. ($isRootBlock ? 'handles="' . implode(",", $block->getLayout()->getUpdate()->getHandles()) . '"' : '')
                    . ' type="' . get_class($block) . '"'
                    #. ' template="' . $block->getTemplate() . '"'
                    . (!strcmp($block->getTemplate(), '') ? '' : ' template="' . $block->getTemplateFile() . '"' )
                    . ' name="' . $block->getNameInLayout() . '"'
                    . ' as="' . $block->getBlockAlias() . '"'
                    . '>' . $transport->getHtml() . '</magento>';
                break;

            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_H_C:
                // break intentionally omitted
            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_HTML_COMMENT:
                $data = 'type="' . get_class($block) . '"'
                    . (!strcmp($block->getTemplate(), '') ? '' : ' template="' . $block->getTemplateFile() . '"' )
                    . ' name="' . $block->getNameInLayout() . '"'
                    . ' as="' . $block->getBlockAlias() . '"';
                $html = "\r\n<!-- [HINTS BEGIN " . $data . "] -->\r\n"
                    . $transport->getHtml()
                    . "<!-- [HINTS END " . $data . "] -->\r\n";
                break;

            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_NONE:
                #break intentionally omitted

            default:
                $html = $transport->getHtml();
        }
        $transport->setHtml($html);
    }

    public function logRequestParameters($observer) {
        if (Mage::helper('webgriffe_tphpro')->getIsLogHttpParams()) {
            $request = Mage::app()->getRequest();

            $userType = 'User';
            $userName = 'guest';

            if (Mage::app()->getStore()->isAdmin()) {
                $userType = 'Admin';
                if ($user = Mage::getSingleton('admin/session')->getUser()) {
                    $userName = $user->getUsername();
                }
            } else {
                $email = Mage::getSingleton('customer/session')->getCustomer()->getEmail();
                if (!empty($email)) {
                    $userName = $email;
                }
            }

            $txt = sprintf("%s Request by '%s'\r\n",  $userType, $userName);
            $txt .= "Request Parameters:\r\n";
            $txt .= sprintf("Module name: %s\r\n", $request->getModuleName());
            $txt .= sprintf("Controller name: %s\r\n", $request->getControllerName());
            $txt .= sprintf("Action name: %s\r\n", $request->getActionName());
            $txt .= sprintf("Request Parameters: %s\r\n", var_export($request->getParams(), true));

            Mage::log($txt, null, 'Webgriffe_TphPro.log', true);
        }
   }

}
