<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ModernTech
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'moderntech_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-5">
					<h2 class="site-name"><?php bloginfo( 'name' ); ?></h2>
					<p class="copyright">&copy; <?php echo date('Y'); ?> All rights reserved.</p>
					<p class="powered-by"><a href="https://wordpress.org" rel="nofollow noreferrer" target="_blank">Proudly powered by WordPress</a></p>
					<p class="theme-by">Theme: ModernTech by <a href="https://techcetblog.com/">techcetblog.com</a></p>
					<div class="footer-social-wrap">
						<ul class="social-menu">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-free-code-camp"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<h2 class="category-title">Categories</h2>
					<div class="category-menu-wrap">
						<ul class="category-menu">
							<?php
							$categories = get_categories(
								array(
									'orderby' => 'name',
									'order' => 'ASC'
								)
							);
							foreach ($categories as $category): ?>
								<li>
									<a href="<?php echo esc_url(get_category_link($category->term_id)) ?>" alt="View all posts in <?php echo esc_attr($category->name); ?>"><?php echo esc_html( $category->name ); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<h2 class="subscribe-title">Subscribe</h2>
					<div class="subscribe-form-wrap">
						<form action="/subscribe">
							<div class="input-wrap">
								<input type="email" name="email" id="email">
								<label for="email">
									<i class="fa fa-envelope"></i>
								</label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
