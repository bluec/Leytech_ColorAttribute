<?php
/**
 * ColorAttribute color picker system config source
 *
 * @category Leytech
 * @package  Leytech_ColorAttribute
 * @author   Chris Nolan <chris@leytech.co.uk>
 */
class Leytech_ColorAttribute_Model_System_Config_Source_Colorpicker
{
    /**
     * Create options list array of implemented color pickers.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $return = [
            'jscolor' => 'JSColor',
            'spectrum' => 'Spectrum',
            'html5' => 'HTML5',
        ];
        return $return;
    }

}