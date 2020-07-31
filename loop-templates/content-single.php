<?php
/**
 * Single post partial template
 *
 * @package ModernTech
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$categories          = get_the_category( $post->ID );
$get_author_id       = get_the_author_meta( 'ID' );
$get_author_gravatar = get_avatar_url( $get_author_id, array( 'size' => 450 ) );
?>

<!-- <article <?php //post_class(); ?> id="post-<?php //the_ID(); ?>"> -->
<article <?php post_class(); ?> id="post-article">

	<header class="entry-header">

		<div class="cat">
		<?php
		foreach ( $categories as $category ) :
			?>
			<a href="/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
			<?php
		endforeach;
		?>
		</div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">Last Updated on: <time itemprop="dateModified" datetime="<?php echo get_post_time(); ?>"><?php echo get_the_modified_date( 'd F, Y' ); ?></time>
			<?php // moderntech_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="post-image">
		<?php echo get_the_post_thumbnail( $post->ID ); ?>
	</div>

	<div class="entry-content atype">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'moderntech' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="author">
			<img src="<?php echo $get_author_gravatar; ?>" alt="Author avatar" height="70" width="70">
			<div class="author-meta">
				<span class="name">Article by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'nickname' ); ?></a></span>
				<span class="position"><?php echo get_author_role_name(); ?></span>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<div class="other-meta">
			<?php moderntech_entry_footer(); ?>
		</div>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<div class="blog-related">
	<div class="container">
		<div class="row">
			<?php
			wp_reset_postdata();
			$related = new WP_Query(
				array(
					'category__in'   => wp_get_post_categories( $post->ID ),
					'posts_per_page' => 3,
					'post__not_in'   => array( $post->ID ),
				)
			);

			if ( $related->have_posts() ) {
				while ( $related->have_posts() ) {
					$related->the_post();
					/* Now render three posts */
					?>
					<article class="col-12 col-lg-4">
						<div class="image">
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						</div> <!-- .image -->
						<div class="content">
							<header>
								<div class="date"><?php the_modified_date(); ?></div>
								<h3>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
							</header>
						</div> <!-- .content -->
					</article>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</div> <!-- .blog-related -->
<div class="clearfix"></div>
