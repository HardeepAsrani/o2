# Icon Picker control for WordPress

## Installing and Setting up

- [Download and Install O2 on your theme](../../README.md). If you have installed that, then you may proceed for further steps.

## Icon Picker For WordPress Customizer

Install the Icon-Picker toolkit by adding this line of code to functions.php file.
```
require get_template_directory() . '/inc/o2/controls/icon-picker/icon-picker-control.php';
```
And that’s all you need to do.

You can add it to your customizer by dumping this code into the `inc/customizer.php` or `functions.php` if you don't have customizer.php file:
```
$wp_customize->add_setting( 'o2_fa_icon_picker', array(
    'default' => 'fa-facebook',
    'capability' => 'edit_theme_options'
));

$wp_customize->add_control(new O2_Customizer_Icon_Picker_Control($wp_customize, 'o2_fa_icon_picker', array(
    'label' => __('Icons', 'textdomain'),
    'description' => __('Choose an icon', 'textdomain'),
    'iconset' => 'fa',
    'section' => 'your_section',
    'priority' => 5,
    'settings' => 'o2_fa_icon_picker'
)));
```
It will a list of all the icons. If only want to list few icons then you can do it like this:
```
$wp_customize->add_control(new O2_Customizer_Icon_Picker_Control($wp_customize, 'o2_fa_icon_picker', array(
    'label' => __('Icons', 'textdomain'),
    'description' => __('Choose an icon', 'textdomain'),
    'iconset' => 'fa',
    'section' => 'your_section',
    'priority' => 5,
    'settings' => 'o2_fa_icon_picker',
    'choices' => array(
        'fa-facebook' => __('Facebook', 'textdomain'),
        'fa-twitter' => __('Twitter', 'textdomain'),
        'fa-dribbble' => __('Dribbble', 'textdomain'),
        'fa-wordpress' => __('WordPress', 'textdomain'),
        'fa-github' => __('Github', 'textdomain'),
    )
)));
```
