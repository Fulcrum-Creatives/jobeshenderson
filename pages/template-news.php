<?php
/*
Template Name: News
*/
get_header();
?>
<div class="body__content">
	<figure class="header__image header__image--homepage">
		<picture>
	        <!--[if IE 9]><video style="display: none;"><![endif]-->
	        <source srcset="<?php echo FCWPF_URI; ?>/images/header/temp-page-image.png@2" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)">
	        <img src="<?php echo FCWPF_URI; ?>/images/header/temp-page-image.png" alt="<?php bloginfo( 'name' ); ?>" />
	        <!--[if IE 9]></video><![endif]-->
	    </picture>
		<figcaption class="header__text">
			<p class="header__text--top"><?php _e( 'The civil engineering landscape is', FCWPF_TAXDOMAIN ); ?></p>
			<p class="header__text--bottom"><?php _e( 'constantly evolving', FCWPF_TAXDOMAIN ); ?></p>
		</figcaption>
	</figure>
	<main id="main" itemprop="mainContentOfPage" role="main">
		<div class="col__left">
			<header class="section__header">
				<h2 class="section__heading">
					<?php _e('Recent Updates From Jobes Henderson', FCWPF_TAXDOMAIN ); ?>
				</h2>
				
			</header>
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$wp_query = new WP_Query(array(
			    'post_type'         =>'post',
			   	'paged'           => $paged
			));
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
				<h3 class="entry__heading">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					
				</h3>
				
				<?php the_excerpt(); ?>
				<div class="entry__more">
					<a href="<?php the_permalink(); ?>">
						<?php _e( 'Read More', FCWPF_TAXDOMAIN ); ?>
					</a>
				</div>
			</article>
			<?php endwhile; ?>
			<nav class="post__pagination">
			    <?php
			    global $wp_query;
			    if ( $wp_query->max_num_pages > 1 ) :
			    ?>
			        <?php // Single Line
			        $sep = ' - ';
			        $prelabel =  __( '&laquo; Previous', FCWPF_TAXDOMAIN );
			        $nextlabel =  __( 'Next &raquo;', FCWPF_TAXDOMAIN ); 
			        ?>
			        <?php if( get_previous_posts_link() ) : ?>
			        <div class="post-listing-nav-prev button small">
			            <?php previous_posts_link( $prelabel, $wp_query->max_num_pages ); ?>
			        </div>
			    	<?php endif; ?>
			      	<?php if( get_next_posts_link() ) : ?>
			        <div class="post-listing-nav-next button small">
			            <?php next_posts_link( $nextlabel, $wp_query->max_num_pages ); ?>
			        </div>
			        <?php endif; ?>
				<?php endif; ?>
			</nav>
		<?php endif; wp_reset_postdata(); ?>
		</div>
		<div class="col__right">
			<?php get_sidebar('main-sidebar'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>