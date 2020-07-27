<?php

/**
 * Template Name: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package ModernTech
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

if (is_front_page()) {
	get_template_part('global-templates/hero');
}
?>

<section class="home-banner">
	<div class="container">
		<h2 class="banner-title">Explore the world of technology</h2>
		<p>Technology has taken us so far, we are now living daily life in the internet world. Technology has given us a lot, hopefully in the near future we will get better benefits. I hope you can learn new things about information technology from this website.</p>
		<a href="/" class="btn btn-primary btn-lg">Let's Go</a>
	</div>
</section>

<section class="home-cta">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 col-md-4">
				<a href="#" class="action">
					<div class="title">fine art prints</div>
					<div class="img-holder">
						<div class="img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/cta-1.jpg);"></div>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-4 col-md-4">
				<a href="#" class="action">
					<div class="title">Every day photo prints</div>
					<div class="img-holder">
						<div class="img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/cta-2.jpg);"></div>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-4 col-md-4">
				<a href="#" class="action">
					<div class="title">Beyond photography</div>
					<div class="img-holder">
						<div class="img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/cta-3.jpg);"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="info">
					<strong>Want Samples Before Orderting?</strong> Just Pay Shipping
				</div>
			</div>
			<div class="col-sm-6">
				<div class="info">
					<strong>Professional Photographer?</strong> Send Your Adobe RGB Images Direct
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-about">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6">
				<h2>Your story matters, we're here to make sure you celebrate it.</h2>
				<p>
					We're more than a photo printing store. We're a community of creatives. We're passionate about what we do. About papers, priting, sharing your memories as well as our own, about travel, adventure, life, love and the special little moments that join together to tell your story.
				</p>
				<div class="btn btn-primary">About Techcet Blog <i class="fa fa-chevron-right"></i></div>
			</div>
			<div class="large-image"></div>
		</div>
	</div>
</section>

<section class="home-join-our-community">
	<div class="container">
		<h2>Join our community</h2>
		<p>We're more than a photo printing store. We're a community of creatives. We're passionate about what we do.</p>
		<?php echo do_shortcode('[contact-form-7 id="43" title="Newsletter Signup Homepage"]'); ?>
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
				'post_type'      => 'post',
				'posts_per_page' => 5,
			)
		);
		?>
		<?php
		if ($popular_posts_query->have_posts()) :
			// Start the Loop.
			while ($popular_posts_query->have_posts()) :
				$popular_posts_query->the_post();
		?>
				<div class="post row">
					<div class="col-12 col-lg-6">
						<?php
						the_title(
							sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
							'</a></h2>'
						);
						?>
						<?php if ('post' === get_post_type()) : ?>

							<div class="entry-meta">
								<?php moderntech_posted_on(); ?>
							</div><!-- .entry-meta -->

						<?php endif; ?>
						<?php the_excerpt(); ?>
					</div>
					<div class="col-12 col-lg-6">
						<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
					</div>
				</div>
		<?php
			endwhile;
		else :
			get_template_part('loop-templates/content', 'none');
		endif;
		?>
	</div>
</section>

<?php
get_footer();
