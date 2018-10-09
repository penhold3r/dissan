<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dissan
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
	</header><!-- .entry-header -->

	<?php dissan_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->
</section><!-- #post-<?php the_ID(); ?> -->
