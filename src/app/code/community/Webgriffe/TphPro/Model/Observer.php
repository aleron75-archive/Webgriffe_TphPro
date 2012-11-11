<?php

/**
 * TODO Description of Observer
 *
 * @author Alessandro Ronchi <aronchi at webgriffe.com>
 */
class Webgriffe_TphPro_Model_Observer {

    public function addTemplateHints($observer) {
        $event = $observer->getEvent();
        $block = $event->getBlock();
        $transport = $event->getTransport();
        $html = '<magento '
                . ($block->getNameInLayout() == 'root' ? 'handles="' . implode(",", $block->getLayout()->getUpdate()->getHandles()) . '"' : '')
                . '" block="' . get_class($block)
                . '" template="' . $block->getTemplate()
                . '" name="' . $block->getNameInLayout()
                . '" alias="' . $block->getBlockAlias()
                . '">' . $transport->getHtml() . '</magento>';
        $transport->setHtml($html);
    }

}