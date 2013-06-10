
<?php $slider = new WP_Query( array( 'cat' => pinboard_get_option( 'portfolio_cat' ), 'ignore_sticky_posts' => 1, 'posts_per_page' => 99 ) ); ?>
<?php if( $slider->have_posts() ) : ?>
	<section id="slider">
		<ul class="slides">
			<?php while( $slider->have_posts() ) : $slider->the_post(); ?>
				<li>
					<article class="post hentry">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						<?php if( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'slider-thumb' ); ?>
							</a>
						<?php endif; ?>
						<div class="clear"></div>
					</article><!-- .post -->
				</li>
			<?php endwhile; ?>
		</ul>
		<div class="clear"></div>
	</section><!-- #slider -->
	<?php wp_reset_postdata(); ?>
<?php endif; ?>