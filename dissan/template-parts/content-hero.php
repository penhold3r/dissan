<?php
/**
 * Template part for displaying hero section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dissan
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class('hero'); ?>>

	<?php feat_img('full') ?>

	<div class="hero-text">
		<?php the_content(); ?>
	</div><!-- .hero-text -->

</section><!-- #post-<?php the_ID(); ?> -->
