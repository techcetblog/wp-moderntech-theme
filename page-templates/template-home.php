<?php

/**
 * Template Name: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<section class="home-banner">
	<div class="container">
		<h2 class="banner-title">Explore the world of technology</h2>
		<p>Technology has taken us so far, we are now living daily life in the internet world. Technology has given us a lot, hopefully in the near future we will get better benefits. I hope you can learn new things about information technology from this website.</p>
		<a href="/" class="btn btn-primary btn-lg">Let's Go</a>
	</div>
</section>

<section class="calolike">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="icon-holder">
					<i class="fa fa-calendar"></i>
				</div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
			</div>
			<div class="col-12 col-lg-4">
				<div class="icon-holder">
					<i class="fa fa-lock"></i>
				</div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
			</div>
			<div class="col-12 col-lg-4">
				<div class="icon-holder">
					<i class="fa fa-thumbs-up"></i>
				</div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
			</div>
		</div>
	</div>
</section>

<section class="recent-posts">
	<div class="container">
		<h2 class="section-title">Recent Posts</h2>
		<?php
		$popular_posts_query = new WP_Query(
			array(
				'post_type' => 'post',
				'posts_per_page' => 5,
			)
		);
		?>
		<?php
		if ( $popular_posts_query->have_posts() ) :
			// Start the Loop.
			while ( $popular_posts_query->have_posts() ) :
				$popular_posts_query->the_post();
				?>
				<div class="post row">
					<div class="col-12 col-lg-6">
						<?php
						the_title(
							sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
							'</a></h2>'
						);
						?>
						<?php if ( 'post' === get_post_type() ) : ?>

							<div class="entry-meta">
											<?php understrap_posted_on(); ?>
							</div><!-- .entry-meta -->

						<?php endif; ?>
						<?php the_excerpt(); ?>
					</div>
					<div class="col-12 col-lg-6">
						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
					</div>
				</div>
				<?php
			endwhile;
		else :
			get_template_part( 'loop-templates/content', 'none' );
		endif;
		?>
	</div>
</section>

<?php
get_footer();
