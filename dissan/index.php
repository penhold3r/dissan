<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dissan
 */

get_header();
?>

   <main id="main" class="site-main">

      <?php
			$args = array(
				'post_type'   => 'page',
				'orderby'     => 'menu_order title',
				'order'       => 'ASC',
			);
			$query = new WP_Query( $args );
			
			if( $query->have_posts() )
			{
				while( $query->have_posts() )
				{
               $query->the_post();

               switch ( get_the_title() ) {
                  case 'Inicio':
                     get_template_part( 'template-parts/content', 'hero');
                     break;
                  
                  case 'Nosotros':
                     get_template_part( 'template-parts/content', 'about');
                     break;
                  
                  default:
                     get_template_part( 'template-parts/content', get_post_type() );
                     break;
               }
					
				}
			}
			
			wp_reset_postdata();
		?>

   </main><!-- #main -->

<?php
get_footer();
