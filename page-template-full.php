<?php
/**
 * Template Name: Full Width Page
 *
 * This is the template that displays full width pages.
 * 
 * @package aThemes
*/

get_header(); ?>

		<div id="content" class="site-content-wide" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				
			<?php endwhile; // end of the loop. ?>

		<!-- #content --></div>
    
<?php get_footer(); ?>