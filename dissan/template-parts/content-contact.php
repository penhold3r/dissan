<?php
/**
 * Template part for displaying contact section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dissan
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class('contact'); ?>>

   <?php //feat_img('full') ?>

	<div class="contact-content">
	
		<div class="contact-text">
			<h2><?php the_title() ?></h2>
			<?php the_content(); ?>
		</div>

		<form action="" class="contact-form">
			<div class="field-block">
				<input class="field" type="text" name="name" id="name" placeholder=".">
				<label class="label" for="name">Nombre</label>
			</div>
			<div class="field-block">
				<input class="field" type="email" name="email" id="email" placeholder=".">
				<label class="label" for="email">Email</label>
			</div>
			<div class="field-block">
				<textarea class="field text-area" name="msg" id="msg" placeholder="."></textarea>
				<label class="label" for="msg">Mensaje</label>
			</div>
			<input class="submit-btn" type="submit" value="Enviar">
		</form>

		<div class="gmap">
			<div id="map"></div>
		</div>

	</div><!-- .hero-text -->

</section><!-- #post-<?php the_ID(); ?> -->
