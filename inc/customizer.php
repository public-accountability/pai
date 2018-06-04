<?php
/**
 * PAI Theme Customizer
 *
 * @package understrap
 * @subpackage pai
 */

add_action( 'customize_register', 'pai_customize_register' );
function pai_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'default_featured_image',
		array(
			'default'		=> '',
			'transport'	=> 'refresh'
		)
	);

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'default_featured_image',
		array(
			'label'			=> __( 'Default Featured Image', 'pai' ),
			'section'		=> 'title_tagline',
			'setting'		=> 'default_featured_image',
			'context'		=> ''
		)
	) );

}
