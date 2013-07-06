<?php get_header(); ?>
	<?php if( is_home() && ! is_paged() ) : ?>
		<?php if( pinboard_get_option( 'slider' ) ) : ?>
			<?php get_template_part( 'slider' ); ?>
		<?php endif; ?>
	<?php elseif( ( is_home() && is_paged() ) || ( ! is_home() && pinboard_get_option( 'location' ) ) ) : ?>
		<?php pinboard_current_location(); ?>
	<?php endif; ?>
	
	<div id="container">
		<section id="content" <?php  pinboard_content_class(); ?>>
			<?php if( have_posts() ) : ?>
			
				<div class="entries">
					<?php 
						global $wp_query;
						pinboard_category_filter( pinboard_get_option( 'portfolio_cat' ) ); 
						$categoryId;
						$categoryParam = get_category( get_query_var( 'cat' ) );
						if(!is_null($categoryParam->cat_ID)){
							$categoryId = $categoryParam->cat_ID;
						}
						else{
							// we are on home page if category is null
							$categoryId = pinboard_get_option( 'portfolio_cat' ) ;
						}
						$categoryId;
						$args = array( 'cat' => $categoryId); 
						$wp_query = new WP_Query( $args ); 
					?>
					<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div><!-- .entries -->
				
				<?php pinboard_posts_nav(); ?>
			<?php else : ?>
				<?php pinboard_404(); ?>
			<?php endif; ?>
		</section><!-- #content -->
		<div class="clear"></div>
	</div><!-- #container -->
	
	<script type="text/javascript">
	jQuery(document).load(function($){
		var $container = $('#content .entries');
		// initialize
		$container.masonry({
		  itemSelector: '.post'
		});
	
	});
	</script>
	
<?php get_footer(); ?>