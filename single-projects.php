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
		<?php 
		if (have_posts()) : while (have_posts()) : the_post();
			$jobesh_project_client = ( get_field( 'jobesh_project_client' ) ? get_field( 'jobesh_project_client') : '' );
			$jobesh_project_location = ( get_field( 'jobesh_project_location' ) ? get_field( 'jobesh_project_location') : '' );
			$jobesh_project_completion = ( get_field( 'jobesh_project_completion' ) ? get_field( 'jobesh_project_completion') : '' );
			$jhobes_main_content_title = ( get_field( 'jhobes_main_content_title' ) ? get_field( 'jhobes_main_content_title') : '' );
		?>
			<?php if( $jhobes_main_content_title ) : ?>
				<header class="section__header">
					<h2 class="section__heading">
						<?php echo $jhobes_main_content_title;?>
					</h2>
				</header>
			<?php endif; ?>
			<?php if( $jobesh_project_client ) : ?>
				<h3 class="project__heading">
					<?php _e( 'Case Study', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<div class="project__body">
					<?php the_title(); ?>
				</div>
			<?php endif; ?>
			<?php if( $jobesh_project_client ) : ?>
				<h3 class="project__heading">
					<?php _e( 'Client', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<div class="project__body">
					<?php echo $jobesh_project_client; ?>
				</div>
			<?php endif; ?>
			<?php if( $jobesh_project_location ) : ?>
				<h3 class="project__heading">
					<?php _e( 'Location', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<div class="project__body">
					<?php echo $jobesh_project_location; ?>
				</div>
			<?php endif; ?>
			<?php if( $jobesh_project_completion ) : ?>
				<h3 class="project__heading">
					<?php _e( 'Completetion Date', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<div class="project__body">
					<?php echo $jobesh_project_completion; ?>
				</div>
			<?php endif; ?> 
			<?php if( have_rows( 'jobesh_project_assignment' ) ) : ?>
				<h3 class="project__heading">
					<?php _e( 'Assignment', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<?php 
					while ( have_rows( 'jobesh_project_assignment' ) ) : the_row();
					$jobes_project_assignment_type = ( get_sub_field( 'jobes_project_assignment_type' ) ? get_sub_field( 'jobes_project_assignment_type') : '' ); 
				?>
					<div class="project__body">
						<?php echo $jobes_project_assignment_type; ?>
					</div>
			<?php endwhile; endif; ?>
				<h3 class="project__heading">
					<?php _e( 'Services Performed', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<?php echo get_the_term_list( get_the_ID(), 'services_performed', '', ' | ' ); ?> 
				<h3 class="project__heading">
					<?php _e( 'Details', FCWPF_TAXDOMAIN ) ?>
				</h3>
				<div class="project__body">
					<?php the_content(); ?>
				</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="col__right">
			<?php get_sidebar(); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>