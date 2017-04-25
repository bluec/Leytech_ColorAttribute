## Color Picker Product Attribute for Magento 1

This extension allows you to create color picker product attributes by adding a new input type to the attribute creation form.

### Features

- Create new color picker attribute type from the backend.
- Assign multiple color picker attributes to the same attribute set.
- Choose from three different color pickers:
    - [jscolor](http://jscolor.com/) - requires no jQuery or other framework
    - [spectrum](https://github.com/bgrins/spectrum) - support for alpha channels (requires jQuery, included)
    - native HTML5 color picker - requires no jQuery or other framework

### Compatibility

Tested on Magento CE 1.9.3.2. Should work on lower versions and equivalent EE.

### How to use?

1. Go to Catalog > Attributes > Manage Attributes and Add New Attribute.
2. Create a new attribute using the "Color Picker" input type.
3. Assign the new attribute to an attribute set.
4. You should be able to see the new color picker attribute when you edit a product.

### Screenshots

Adding a new color picker product attribute:

![Adding a new color picker product attribute](https://cloud.githubusercontent.com/assets/1577895/25341206/07f53322-2900-11e7-9143-fd6e3ef6c734.png "Adding a new color picker product attribute")

Using the color picker when editing a product:

![Using the color picker when editing a product](https://cloud.githubusercontent.com/assets/1577895/25341207/07f7df50-2900-11e7-9db0-0973a5579d17.png "Using the color picker when editing a product")

### To do

1. Add composer support.

### Support

This extension is provided free of charge as-is. We don't provide free support.

### Contribute

Pull requests and feedback welcome.