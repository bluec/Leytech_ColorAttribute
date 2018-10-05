<?php
/**
 * @package    Leytech_ColorAttribute
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
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
        // Do nothing if extension is not enabled
        if (!Mage::helper('leytech_colorattribute')->isEnabled()) {
            return $this;
        }

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
        // Do nothing if extension is not enabled
        if (!Mage::helper('leytech_colorattribute')->isEnabled()) {
            return $this;
        }

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
     * Exclude 'leytech_color' attributes from standard form generation
     *
     * @param   Varien_Event_Observer $observer
     * @return  Leytech_ColorAttribute_Model_Observer
     */
    public function updateExcludedFieldList(Varien_Event_Observer $observer)
    {
        $block = $observer->getEvent()->getObject();
        $list = $block->getFormExcludedFieldList();

        $attributes = Mage::getModel('eav/entity_attribute')->getAttributeCodesByFrontendType('leytech_color');
        $list = array_merge($list, array_values($attributes));

        $block->setFormExcludedFieldList($list);

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
        // Do nothing if extension is not enabled
        if (!Mage::helper('leytech_colorattribute')->isEnabled()) {
            return $this;
        }

        $response = $observer->getEvent()->getResponse();

        $types = $response->getTypes();
        $types['leytech_color'] = Mage::getConfig()->getBlockClassName('leytech_colorattribute/element_color');

        $response->setTypes($types);

        return $this;
    }

    public function assignLayoutConfigs(Varien_Event_Observer $observer)
    {
        $postData = Mage::app()->getRequest()->getPost();
        $colorPicker = $postData['groups']['settings']['fields']['color_picker']['value'];
        $enabled = $postData['groups']['settings']['fields']['enabled']['value'];
        $includeJquery = $postData['groups']['settings']['fields']['include_jquery']['value'];

        $config = Mage::getModel('core/config');
        $scope = $this->_findScope($observer->getEvent()->getData());

        // Set all the values to 0
        $config->saveConfig('leytech_colorattribute/layouts/is_using_jscolor', '0', $scope);
        $config->saveConfig('leytech_colorattribute/layouts/is_using_spectrum', '0', $scope);
        $config->saveConfig('leytech_colorattribute/layouts/is_using_html5', '0', $scope);
        $config->saveConfig('leytech_colorattribute/layouts/is_using_jquery', '0', $scope);

        // Leave all values as zero if extension is disabled
        if(!$enabled) {
            return;
        }

        // Color picker
        if ($colorPicker == 'jscolor') {
            $config->saveConfig('leytech_colorattribute/layouts/is_using_jscolor', '1', $scope);
        } elseif ($colorPicker == 'spectrum') {
            $config->saveConfig('leytech_colorattribute/layouts/is_using_spectrum', '1', $scope);
            if ($includeJquery) {
                $config->saveConfig('leytech_colorattribute/layouts/is_using_jquery', '1', $scope);
            }
        } elseif ($colorPicker == 'html5') {
            $config->saveConfig('leytech_colorattribute/layouts/is_using_html5', '1', $scope);
        }
    }

    protected function _findScope($data)
    {
        if (is_null($data['store']) && $data['website']) {
            return $data['website'];
        } elseif ($data['store']) {
            return $data['store'];
        }

        return 'default';
    }

}