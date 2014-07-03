<?php
class Webgriffe_TphPro_Helper_Data extends Mage_Core_Helper_Data
{
    public function getDisplayHandlesType() {
        if (Mage::app()->getRequest()->getParam('ha')) {
            return Mage::app()->getRequest()->getParam('ha');
        }
        if (Mage::app()->getRequest()->getParam('handles')) {
            return Mage::app()->getRequest()->getParam('handles');
        }
        return Mage::getStoreConfig('webgriffe_tphpro/webgriffe_tphpro_general/webgriffe_tphpro_handle');
    }

    public function getDisplayHintsType() {
        if (Mage::app()->getRequest()->getParam('hi')) {
            return Mage::app()->getRequest()->getParam('hi');
        }
        if (Mage::app()->getRequest()->getParam('hints')) {
            return Mage::app()->getRequest()->getParam('hints');
        }
        return Mage::getStoreConfig('webgriffe_tphpro/webgriffe_tphpro_general/webgriffe_tphpro_hints');
    }

    public function getIsLogHttpParams() {
        return Mage::getStoreConfig('webgriffe_tphpro/webgriffe_tphpro_general/webgriffe_tphpro_logparams');
    }

}