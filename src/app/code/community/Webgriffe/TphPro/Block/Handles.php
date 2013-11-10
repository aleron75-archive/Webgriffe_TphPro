<?php

/**
 * TphPro Handles block
 *
 * @author Alessandro Ronchi <aronchi at webgriffe.com>
 */
class Webgriffe_TphPro_Block_Handles extends Mage_Core_Block_Abstract {
    protected function _toHtml()
    {
        $html = '';

        switch(Mage::helper('webgriffe_tphpro')->getDisplayHandlesType()) {

            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_HTML_ELEMENT:
                $handles = '&lt;' . implode("&gt; &lt;", $this->getLayout()->getUpdate()->getHandles()) . '&gt;';
                $html = '<div class="global-site-notice demo-notice" style="background:#1b83e6;">';
                $html .= '<div class="notice-inner"><p>Handles: ' . $handles . '</p></div>';
                $html .= '</div>';
                break;

            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_HTML_COMMENT:
                $handles = '<' . implode("> <", $this->getLayout()->getUpdate()->getHandles()) . '>';
                $html = "\r\n<!-- Handles: " . $handles . "-->\r\n";
                break;

            case Webgriffe_TphPro_Model_System_Config_Source_Display::DISPLAY_NONE:
                #break intentionally omitted

            default:
                #nothing to do
        }

        return $html;
    }
}