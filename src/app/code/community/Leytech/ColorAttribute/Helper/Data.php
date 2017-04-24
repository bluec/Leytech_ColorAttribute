<?php
/**
 * ColorAttribute data helper
 *
 * @category Leytech
 * @package  Leytech_ColorAttribute
 * @author   Chris Nolan <chris@leytech.co.uk>
 */
class Leytech_ColorAttribute_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ENABLED = 'leytech_colorattribute/settings/enabled';
    const XML_PATH_COLOR_PICKER = 'leytech_colorattribute/settings/color_picker';

    /**
     * Get whether the extension is enabled
     *
     * @return bool
     */
    public function isEnabled() {
        return Mage::getStoreConfigFlag(self::XML_PATH_ENABLED);
    }

    /**
     * Get the color picker to use
     *
     * @return mixed
     */
    public function getColorPicker() {
        return Mage::getStoreConfig(self::XML_PATH_COLOR_PICKER);
    }

}