<?php get_header(); ?>

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
			<p class="header__text--bottom"><?php _e( 'constanly evolving', FCWPF_TAXDOMAIN ); ?></p>
		</figcaption>
	</figure>
	<main id="main" itemprop="mainContentOfPage" role="main">
		<div class="col__left">
			<header class="section__header">
				<h2 class="section__heading">
					<?php _e('Recent Updates From Jobes Henderson', FCWPF_TAXDOMAIN ); ?>
				</h2>
				<div class="section__more">
					<!-- <a href="">
						<?php _e('See More', FCWPF_TAXDOMAIN ); ?>
					</a> -->
				</div>
			</header>
			<?php
			 $query = new WP_Query(array(
			    'post_type'         =>'post',
			    'no_found_rows'     => true
			));
			if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
				<h3 class="entry__heading">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="post-meta"><?php the_date(); ?> | Categorized: <?php the_category(', '); ?> </div>
				<?php the_excerpt(); ?>
				<div class="entry__more">
					<a href="<?php the_permalink(); ?>">
						<?php _e( 'Read More', FCWPF_TAXDOMAIN ); ?>
					</a>
				</div>
			</article>
			
			<?php endwhile; endif; wp_reset_postdata(); ?>
			
		</div>
		
		

		<div class="col__right">
			<?php get_sidebar('news'); ?>
		</div>
	</main>
</div>

<?php get_footer(); ?>