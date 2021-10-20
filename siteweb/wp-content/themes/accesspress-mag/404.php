<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package AccessPress Mag
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="apmag-container">
					<div class="page-content">
						<div class="page-404-wrap clearfix">
							<span class="oops"><?php esc_html_e( 'Oops!!', 'accesspress-mag' );?></span>
							<div class="error-num"> 
							<span class="num"><?php esc_html_e( '404', 'accesspress-mag' );?></span>
							<span class="not_found"><?php esc_html_e( 'Page Not Found', 'accesspress-mag' );?></span>
							</div>
						</div>
					</div><!-- .page-content -->
				</div><!-- .apmag-container -->
            </section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
