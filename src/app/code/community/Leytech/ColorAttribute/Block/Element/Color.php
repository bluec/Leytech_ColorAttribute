<?php
/**
 * Frontend model for color input type
 *
 * @category Leytech
 * @package  Leytech_ColorAttribute
 * @author   Chris Nolan <chris@leytech.co.uk>
 */
class Leytech_ColorAttribute_Block_Element_Color extends Varien_Data_Form_Element_Abstract
{
    public function __construct($attributes=array())
    {
        parent::__construct($attributes);
        if (Mage::helper('leytech_colorattribute')->getColorPicker() == 'html5') {
            $this->setType('color');
        } else {
            $this->setType('text');
        }
        $this->setExtType('textfield');
    }

    public function getHtml()
    {
        if (Mage::helper('leytech_colorattribute')->getColorPicker() == 'jscolor') {
            $this->addClass('jscolor {required:false,hash:true}');
        } elseif (Mage::helper('leytech_colorattribute')->getColorPicker() == 'spectrum') {
            $this->addClass('spectrum');
        }
        return parent::getHtml();
    }

    public function getHtmlAttributes()
    {
        return array('type', 'title', 'class', 'style', 'onclick', 'onchange', 'onkeyup', 'disabled', 'readonly', 'maxlength', 'tabindex');
    }
}