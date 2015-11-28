<?php get_header(); ?>
<div class="body__content">
	<?php 
	if (have_posts()) : while (have_posts()) : the_post(); 
		$project_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projectimage' );
		if( $project_image ) :
			$project_image_url = $project_image[0];
			$project_image_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projectimage@2' );
			$project_image_url_retina = $project_image_retina[0];
			$project_image_data = get_post( get_post_thumbnail_id() );
			$project_image_alt = get_post_meta( $project_image_data->ID, '_wp_attachment_image_alt', true );
		else :
			$project_image_url = '';
		endif;
		if( $project_image_url != '' ) :
	?>
		<figure class="header__image header__image--homepage">
			<picture>
		        <!--[if IE 9]><video style="display: none;"><![endif]-->
		        <source srcset="<?php echo $project_image_url_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)">
		        <img src="<?php echo $project_image_url; ?>" alt="<?php echo $project_image_alt; ?>" />
		        <!--[if IE 9]></video><![endif]-->
		    </picture>
		</figure>
	<?php else : ?>
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
	<?php endif; ?>
	<?php endwhile; endif; wp_reset_postdata(); ?>
	<?php 
	if (have_posts()) : while (have_posts()) : the_post(); 
		get_template_part( 'template-parts/infobox' );
	endwhile; endif; wp_reset_postdata(); 
	?>
	<main id="main" itemprop="mainContentOfPage" role="main">
		<div class="col__left">
		<?php 
		if (have_posts()) : while (have_posts()) : the_post();
			$jhobes_main_content_title = ( get_field( 'jhobes_main_content_title' ) ? get_field( 'jhobes_main_content_title') : '' );
			if( $jhobes_main_content_title ) :
		?>
		<header class="section__header">
			<h2 class="section__heading">
				<?php echo $jhobes_main_content_title;?>
			</h2>
		</header>
		<?php endif; endwhile; endif; wp_reset_postdata(); ?>
			<?php the_content(); ?>
		</div>
		<div class="col__right">
			<?php get_sidebar('service-sidebar'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>