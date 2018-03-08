# Color Palette control for WordPress

## Installing and Setting up

- [Download and Install O2 on your theme](../../README.md). If you have installed that, then you may proceed for further steps.

## Setting up Color Scheme palette for WordPress

Install the Color Palette toolkit by adding this line of code to functions.php file.
```
require get_template_directory() . '/inc/o2/controls/color-palette/color-palette-control.php';
```
And that’s all you need to do.

You can add it to your customizer by dumping this code into the `inc/customizer.php` or `functions.php` if you don't have customizer.php file:
```
$wp_customize->add_setting( 'o2_color_palette', array(
	'default' => 'green',
	'capability' => 'edit_theme_options'
));

$wp_customize->add_control(new O2_Customizer_Color_Palette_Control($wp_customize, 'o2_color_palette', array(
	'label' => __('Color Scheme', 'textdomain'),
	'description' => __('Choose a color scheme for your website.', 'textdomain'),
	'section' => 'colors',
	'choices' => array (
		'green' => array(
			'label' => 'Green',
			'colors' => array( '#bbdb9b', '#abc4a1', '#9db4ab', '#8d9d90', '#878e76' )
		),
		'purple' => array(
			'label' => 'Purple',
			'colors' => array( '#29274c', '#7e52a0', '#d295bf', '#e6bccd' )
		),
		'slate' => array(
			'label' => 'Slate',
			'colors' => array( '#b9bbbb', '#a2a3bb', '#5e5f87', '#b3b7ee', '#fbf9ff' )
		)
	),
	'priority' => 5,
	'settings' => 'o2_color_palette'
)));
```
