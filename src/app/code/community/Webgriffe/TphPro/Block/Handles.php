<?php

/**
 * TphPro Handles block
 *
 * @author Alessandro Ronchi <aronchi at webgriffe.com>
 */
class Webgriffe_TphPro_Block_Handles extends Mage_Core_Block_Abstract {
    protected function _toHtml()
    {
        $handles = '&lt;' . implode("&gt; &lt;", $this->getLayout()->getUpdate()->getHandles()) . '&gt;';
        $html = '<div class="global-site-notice demo-notice" style="background:#1b83e6;">';
        $html .= '<div class="notice-inner"><p>Handles: ' . $handles . '</p></div>';
        $html .= '</div>';
        return $html;
    }
}