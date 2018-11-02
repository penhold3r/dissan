<?php
/**
 * Template part for displaying services section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dissan
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class('brands'); ?>>

   <?php //feat_img('full') ?>

	<div class="brands-content">
      <h2><?php the_title() ?></h2>
		<?php the_content(); ?>
   </div><!-- .hero-text -->

</section><!-- #post-<?php the_ID(); ?> -->
