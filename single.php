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
			<img src="<?php echo $project_image_url; ?>" alt="<?php echo $project_image_alt; ?>" />
		</figure>
		<?php else : ?>	
			<div class="no-image-header"></div>
		<?php endif; ?>
	<?php endwhile; endif; wp_reset_postdata(); ?>
	<main id="main" itemprop="mainContentOfPage" role="main">
		<div class="col__left">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<h3 class="entry__heading">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>

			<div class="project__body">
				
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="col__right">
			<?php get_sidebar('service-sidebar'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>