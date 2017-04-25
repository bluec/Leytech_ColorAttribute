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

        $colorPicker = Mage::helper('leytech_colorattribute')->getColorPicker();
        switch ($colorPicker) {
            case 'jscolor':
                $this->setType('text');
                break;
            case 'tovic':
                $this->setType('text');
                break;
            case 'spectrum':
                $this->setType('text');
                break;
            case 'html5':
                $this->setType('color');
                break;
            default:
                $this->setType('text');
                break;
        }
        $this->setExtType('textfield');
    }

    public function getHtml()
    {
        $colorPicker = Mage::helper('leytech_colorattribute')->getColorPicker();
        switch ($colorPicker) {
            case 'jscolor':
                $this->addClass('jscolor {required:false,hash:true}');
                break;
            case 'tovic':
                $this->addClass('tovic');
                break;
            case 'spectrum':
                $this->addClass('spectrum');
                break;
            case 'html5':
                break;
            default:
                break;
        }
        return parent::getHtml();
    }

    public function getHtmlAttributes()
    {
        return array('type', 'title', 'class', 'style', 'onclick', 'onchange', 'onkeyup', 'disabled', 'readonly', 'maxlength', 'tabindex');
    }
}