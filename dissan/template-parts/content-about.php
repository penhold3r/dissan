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

   <?php //feat_img('full') ?>

	<div class="about-content">
      <h2><?php the_title() ?></h2>
		<?php the_content(); ?>
	</div><!-- .hero-text -->

</section><!-- #post-<?php the_ID(); ?> -->
