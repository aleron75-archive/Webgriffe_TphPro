<?php
class Webgriffe_TphPro_Helper_Data extends Mage_Core_Helper_Data
{
    public function getDisplayHandlesType() {
        return Mage::getStoreConfig('webgriffe_tphpro/webgriffe_tphpro_general/webgriffe_tphpro_handle');
    }

    public function getDisplayHintsType() {
        return Mage::getStoreConfig('webgriffe_tphpro/webgriffe_tphpro_general/webgriffe_tphpro_hints');
    }

    public function getIsLogHttpParams() {
        return Mage::getStoreConfig('webgriffe_tphpro/webgriffe_tphpro_general/webgriffe_tphpro_logparams');
    }

}