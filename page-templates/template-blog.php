<?php

/**
 * Template Name: Blog
 *
 * Template for displaying a page for blog posts.
 *
 * @package ModernTech
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<main id="site-main" class="blog-page-main">
	<div id="content" class="blog-page-content">
		<div class="mt-banner mt-banner-info" role="banner">
			<div class="container">
				Welcome to <a href="/">Techcet Blog</a>
			</div>
		</div>
		<div class="blog-landing-page">
			<div class="layout container pb-0">
				<header class="page-header">
					<h1 class="page-title">Blog</h1>
					<p class="page-description">Our latest news, updates, and articles for web development, Linux stories and more.</p>
				</header>
			</div>
			<section class="mt-grid">
				<div class="mt-grid-columns mt-grid-columns-three" role="list">
					<?php
					// The Query
					$posts_query = new WP_Query(
						array(
							'post_type'      => 'post',
							'posts_per_page' => '24',
						)
					);

					// The Loop
					if ( $posts_query->have_posts() ) :
						?>
						<?php
						while ( $posts_query->have_posts() ) :
							$posts_query->the_post();
							$get_author_id       = get_the_author_meta( 'ID' );
							$get_author_gravatar = get_avatar_url( $get_author_id, array( 'size' => 450 ) );
							$get_tags            = get_the_tags( $post->ID );
							?>
							<div  id="post-<?php the_ID(); ?>" class="mt-card" role="listitem">
								<article class="mt-card-base">
									<div class="mt-card-base-cover mt-card-base-cover-with-image">
										<a href="<?php echo get_permalink(); ?>" tabindex="-1" class="mt-card-base-link" aria-hidden="true">
											<figure class="mt-card-base-figure">
												<img class="mt-card-base-image" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 500 )[0]; ?>" alt="Alternative text" width="100%" height="240">
											</figure>
										</a>
									</div>
									<div class="mt-card-base-summary">
										<a href="<?php echo get_permalink(); ?>" class="mt-card-base-link">
											<h2 class="mt-card-base-headline-with-image"><?php echo get_the_title(); ?></h2>
										</a>
										<div class="mt-author-card">
											<div class="mt-author-image-row">
												<div class="mt-author-image-row-item">
													<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
														<img class="mt-author-image mt-author-image-small" src="<?php echo $get_author_gravatar; ?>" alt="Avatar image" width="40" height="40">
													</a>
												</div>
											</div>
											<div class="mt-author-card-holder">
												<span class="mt-author-name">
													<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="mt-author-name-link"><?php echo get_the_author_meta( 'nickname' ); ?></a>
												</span>
												<span class="mt-author-published">
													<time><?php echo get_the_date( 'jS F, Y' ); ?></time>
												</span>
											</div>
										</div>
										<div class="mt-card-base-desc">
											<a href="<?php echo get_permalink(); ?>" tabindex="-1" class="mt-card-base-link">
												<p class="mt-card-subhead"><?php echo get_the_excerpt(); ?></p>
											</a>
											<div class="mt-card-keywords mt-keywords">
												<?php foreach ( $get_tags as $tag ) : ?>
													<a href="/tag/<?php echo $tag->slug; ?>" class="mt-keyword"><?php echo $tag->name; ?></a>
												<?php endforeach; ?>
												
											</div>
										</div>
									</div>
								</article>
							</div>
						<?php endwhile; ?>
						<?php
						else :
							get_template_part( 'loop-templates/content', 'none' );
							?>
					<?php endif; ?>
				</div>
			</section>
			<div class="mt-pagination">
				<?php
				echo paginate_links(
					array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $posts_query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
						'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
						'add_args'     => false,
						'add_fragment' => '',
					)
				);
				?>
			</div>
		</div>
	</div>
</main>

<?php

get_footer();
