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
    const XML_PATH_INCLUDE_JQUERY = 'leytech_colorattribute/settings/include_jquery';
    const XML_PATH_SPECTRUM_OPTIONS = 'leytech_colorattribute/settings/spectrum_options';

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

    /**
     * Get whether to include jQuery
     *
     * @return mixed
     */
    public function getIncludeJquery() {
        return Mage::getStoreConfig(self::XML_PATH_INCLUDE_JQUERY);
    }

    /**
     * Get spectrum JS
     *
     * @return mixed
     */
    public function getSpectrumOptions() {
        return Mage::getStoreConfig(self::XML_PATH_SPECTRUM_OPTIONS);
    }

}