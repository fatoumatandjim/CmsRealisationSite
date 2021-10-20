<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Mag
 */

get_header(); 
?>

<?php do_action( 'accesspress_mag_before_body_content' ); 
$sidebar_option = of_get_option( 'global_archive_sidebar', 'right-sidebar' );
?>
<div class="apmag-container <?php echo esc_attr($sidebar_option); ?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php accesspress_mag_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
$sidebar_option = of_get_option( 'global_archive_sidebar', 'right-sidebar' );

if( $sidebar_option != 'no-sidebar' ){
    $option_value = explode( '-', $sidebar_option );
    get_sidebar( $option_value[0] );
}
?>
</div>

<?php do_action( 'accesspress_mag_after_body_content' ); ?>

<?php get_footer(); ?>
