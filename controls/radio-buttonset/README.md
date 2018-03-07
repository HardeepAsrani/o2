# Default Image Align control for WordPress

## Installing and Setting up

- [Download and Install O2 on your theme](../../README.md). If you have installed that, then you may proceed for further steps.

## Default Image alignment for WordPress Customizer

Install the Image Alignment toolkit by adding this line of code to functions.php file.
```
require get_template_directory() . '/inc/o2/controls/radio-buttonset/radio-buttonset-control.php';
```
And that’s all you need to do.

You can add it to your customizer by dumping this code into the `inc/customizer.php` or `functions.php` if you don't have customizer.php file:
```
$wp_customize->add_setting( 'o2_radio_buttons', array(
    'default' => 'left',
    'capability' => 'edit_theme_options'
));

$wp_customize->add_control(new O2_Customizer_Radio_Buttonset_Control($wp_customize, 'o2_radio_buttons', array(
    'label' => __('Image Alignment', 'textdomain'),
    'description' => __('Choose the alignment for your blog images.', 'textdomain'),
    'section' => 'your_section',
    'priority' => 5,
    'settings' => 'o2_radio_buttons',
    'choices' => array(
        'left' => __('Left', 'textdomain'),
        'center' => __('Center', 'textdomain'),
        'right' => __('Right', 'textdomain'),
        'none' => __('None', 'textdomain'),
    )
)));
```
