<?php
/*
Template Name: Contact
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
			<?php the_content(); ?>
		</div>
		<div class="col__right">
			<?php get_sidebar('service-sidebar'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>