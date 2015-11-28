<?php
/*
Template Name: Services
*/
get_header();
?>
<div class="body__content">
	<?php get_template_part( 'template-parts/hero', 'image' );?>
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
			<?php 
			if (have_posts()) : while (have_posts()) : the_post(); 
				if( have_rows( 'jhobes_services' ) ) : while ( have_rows('jhobes_services') ) : the_row();
				$jhobes_service_type = ( get_sub_field( 'jhobes_service_type' ) ? get_sub_field( 'jhobes_service_type') : '' );
				$jhobes_service_description = ( get_sub_field( 'jhobes_service_description' ) ? get_sub_field( 'jhobes_service_description') : '' );
				$jhobes_service_url = ( get_sub_field( 'jhobes_service_url' ) ? get_sub_field( 'jhobes_service_url') : '' );
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
					<h3 class="entry__heading">
						<a href="<?php echo $jhobes_service_url; ?>">
							<?php echo $jhobes_service_type; ?>
						</a>
					</h3>
					<?php echo $jhobes_service_description; ?>
				</article>
			<?php 
				endwhile; endif;
			endwhile; endif; wp_reset_postdata(); 
			?>
		</div>
		<div class="col__right">
			<?php get_sidebar('service'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>