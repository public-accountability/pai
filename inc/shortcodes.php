<?php
/**
 * PAI Shortcodes
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.2.0
 */

/**
 * Shortcode to Display Sign-up Form
 *
 * @usage `[signup-form tag="press"]`
 *
 * @param  array $atts
 * @return string $output
 */
function pai_actionnetwork_form( $atts ) {

 	$atts = shortcode_atts(
 		array(
 			'tag' => '',
 		),
 		$atts,
 		'signup-form'
 	);

  $output = sprintf( '<form id="pai-signup-form" action="%s" accept-charset="UTF-8" method="post">
      <input name="very_important_wink_wink" id="very_important_wink_wink" type="text" class="hidden">
      <div class="pai-signup-form-input-group">
        <label for="email">%s</label>
        <input name="email" id="pai-signup-form-email" placeholder="%s" required="required" type="email">
        <input id="pai-signup-submit-button" type="submit" value="%s">
      </div>
    </form>',
    esc_url( 'https://littlesis.org/home/pai_signup' ),
    esc_attr__( 'Email', 'pai' ),
    esc_attr__( 'Email', 'pai' ),
    esc_attr__( 'Sign Up', 'pai' )
  );

 	return $output;

 }
add_shortcode( 'signup-form', 'pai_actionnetwork_form' );
