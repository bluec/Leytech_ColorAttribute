<?php
/**
 * ColorAttribute observer model
 *
 * @category Leytech
 * @package  Leytech_ColorAttribute
 * @author   Chris Nolan <chris@leytech.co.uk>
 */
class Leytech_ColorAttribute_Model_Observer
{
    /**
     * Add color input type to attribute creation dropdown
     *
     * @param Varien_Event_Observer $observer
     * @return Leytech_ColorAttribute_Model_Observer
     */
    public function addColorAttributeType(Varien_Event_Observer $observer)
    {
        $response = $observer->getEvent()->getResponse();

        $types = $response->getTypes();
        $types[] = array(
            'value' => 'leytech_color',
            'label' => Mage::helper('leytech_colorattribute')->__('Color Picker'),
            'hide_fields' => array(
                'is_unique',
                'is_required',
                'frontend_class',
                'is_configurable',
                '_default_value',

                'is_searchable',
                'is_visible_in_advanced_search',
                'is_filterable',
                'is_filterable_in_search',
                'is_comparable',
                'is_used_for_promo_rules',
                'position',
                'used_in_product_listing',
                'used_for_sort_by',
            )
        );

        $response->setTypes($types);

        return $this;
    }

    /**
     * Assign backend model to color input type
     *
     * @param  Varien_Event_Observer $observer
     * @return Leytech_ColorAttribute_Model_Observer
     */
    public function assignBackendModelToAttribute(Varien_Event_Observer $observer)
    {
        $backendModel = 'leytech_colorattribute/attribute_backend_color';

        /** @var $object Mage_Eav_Model_Entity_Attribute_Abstract */
        $object = $observer->getEvent()->getAttribute();

        if ($object->getFrontendInput() == 'leytech_color') {
            $object->setBackendModel($backendModel);
            $object->setBackendType('varchar');
        }

        return $this;
    }

    /**
     * Assign frontend model to color input type
     *
     * @param  Varien_Event_Observer $observer
     * @return Leytech_ColorAttribute_Model_Observer
     */
    public function updateElementTypes(Varien_Event_Observer $observer)
    {
        $response = $observer->getEvent()->getResponse();

        $types = $response->getTypes();
        $types['leytech_color'] = Mage::getConfig()->getBlockClassName('leytech_colorattribute/element_color');

        $response->setTypes($types);

        return $this;
    }

}