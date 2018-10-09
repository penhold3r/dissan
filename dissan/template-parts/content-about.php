<?php
/**
 * Template part for displaying hero section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dissan
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class('about'); ?>>

   <?php feat_img('full') ?>
   
   <?php the_title() ?>

	<div class="about-content">
		<?php the_content(); ?>
	</div><!-- .hero-text -->

</section><!-- #post-<?php the_ID(); ?> -->
