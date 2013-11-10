<?php
class Webgriffe_TphPro_Model_System_Config_Source_Display
{
    const DISPLAY_NONE = 'none';
    const DISPLAY_HTML_ELEMENT = 'html_element';
    const DISPLAY_HTML_COMMENT = 'html_comment';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::DISPLAY_NONE, 'label'=>Mage::helper('webgriffe_tphpro')->__('No')),
            array('value' => self::DISPLAY_HTML_ELEMENT, 'label'=>Mage::helper('webgriffe_tphpro')->__('Yes, as HTML element')),
            array('value' => self::DISPLAY_HTML_COMMENT, 'label'=>Mage::helper('webgriffe_tphpro')->__('Yes, as HTML comment')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            self::DISPLAY_NONE => Mage::helper('webgriffe_tphpro')->__('No'),
            self::DISPLAY_HTML_ELEMENT => Mage::helper('webgriffe_tphpro')->__('Yes, as HTML element'),
            self::DISPLAY_HTML_COMMENT => Mage::helper('webgriffe_tphpro')->__('Yes, as HTML comment'),
        );
    }

}
