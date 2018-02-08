<?php
/**
 * Left sidebar check.
 *
 * @package understrap
 */

?>

<?php
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>
	<?php get_sidebar( 'left' ); ?>
<?php endif; ?>

<?php if( is_singular( 'report' ) && is_active_sidebar( 'right-sidebar' )  ) : ?>

	<div class="col-md-8 content-area" id="primary">

<?php else : ?>

	<div class="col-md-12 content-area" id="primary">

<?php endif; ?>
