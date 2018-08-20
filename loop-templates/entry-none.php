<?php
/**
 * No posts partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php echo __( 'None Were Found', 'pai' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content"></div><!-- .entry-content -->

	<footer class="entry-footer">	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
