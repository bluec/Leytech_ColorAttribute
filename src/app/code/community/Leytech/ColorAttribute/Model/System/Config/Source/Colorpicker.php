<?php
/**
 * @package    Leytech_ColorAttribute
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
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