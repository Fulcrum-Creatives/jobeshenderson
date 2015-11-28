<?php
/*
Template Name: Construction Services
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
			<?php get_sidebar('service'); ?>
		</div>
		<div class="related-projects">
			<header class="section__header">
				<h2 class="section__heading related-projects__title"><?php _e( 'Construction Services Projects', FCWPF_TAXDOMAIN ) ?></h2>
			</header>
			<?php
			$query = new WP_Query(array(
			    'post_type'         =>'projects',
			    'posts_per_page'    => '4',
			    'no_found_rows'     => true,
			    'tax_query' => array(
					array(
						'taxonomy' => 'services_performed',
						'field'    => 'slug',
						'terms'    => 'construction-services',
					),
				),
			));
			if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('ft-project'); ?>role="article">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="ft-project__thumb">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
					    	<?php the_post_thumbnail();?>
					    </a>
					</div>
					<?php endif ?>
					<h3 class="ft-project__title">
					    <a href="<?php the_permalink(); ?>" rel="bookmark">
					        <?php the_title(); ?>
					    </a>
					</h3>
					<?php the_excerpt(); ?>
					<a class="ft-project__more" href="<?php the_permalink(); ?>">
						More on <?php the_title(); ?>
					</a>
				</article>
			<?php
			endwhile; endif; wp_reset_postdata();
			?>
			<a class="view-all" href="/services_performed/construction-services/">View all construction services project case studies.</a>
		</div>
	</main>
</div>
<?php get_footer(); ?>