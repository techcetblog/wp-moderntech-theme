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
				<a href="/category/linux" class="action">
					<div class="title">Linux articles</div>
					<div class="img-holder">
						<div class="img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/cta-1.webp);"></div>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-4 col-md-4">
				<a href="/category/web-development" class="action">
					<div class="title">Web Development</div>
					<div class="img-holder">
						<div class="img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/cta-2.webp);"></div>
					</div>
				</a>
			</div>
			<div class="col-12 col-lg-4 col-md-4">
				<a href="#" class="action">
					<div class="title">How to</div>
					<div class="img-holder">
						<div class="img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/cta-3.webp);"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="info">
					<strong>Dow you want to build Web Application?</strong> We have professional web application developers who can give you exactly what you want.
				</div>
			</div>
			<div class="col-sm-6">
				<div class="info">
					<strong>Need mobile applications?</strong> We have our mobile application developers who can build quality products for you.
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-about">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6">
				<h2>Techcet Blog is a medium to let you know about updated technical articles</h2>
				<p>
					Take a look at all the pages of this website, hopefully you will find various technical articles that will help you to know how to develop a website and find out what other technologies are used to develop a dynamic website.
				</p>
				<a href="/about" class="btn btn-primary">About Techcet Blog <i class="fa fa-chevron-right"></i></a>
			</div>
			<div class="large-image"></div>
		</div>
	</div>
</section>

<section class="home-join-our-community">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-7">
				<h2>Join our community</h2>
				<p>Would you like to participate in the newsletter on our website? Then you can join our community by filling out the form below.</p>
				<?php echo do_shortcode('[contact-form-7 id="43" title="Newsletter Signup Homepage"]'); ?>
			</div>
		</div>
	</div>
</section>

<section class="home-collections">
	<div class="container">
		<h2>Our collections</h2>
		<div class="row categories">
			<?php
			$categories = get_categories(
				array(
					'orderby' => 'name',
					'order'   => 'ASC',
				)
			);
			foreach ($categories as $category) :
			?>
				<div class="col-sm-3">
					<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!--
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
-->

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
