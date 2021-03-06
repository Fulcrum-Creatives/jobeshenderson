<?php
/*
Template Name: Jobs
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
				<h2 class="section__heading related-projects__title"><?php _e( 'Current Job Openings', FCWPF_TAXDOMAIN ) ?></h2>
			</header>
			<?php
			$query = new WP_Query(array(
			    'post_type'         =>'post',
			    'no_found_rows'     => true,
			    'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => 'jobs',
					),
				),
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
			<?php
			endwhile; endif; wp_reset_postdata();
			?>
		</div>
	</main>
</div>
<?php get_footer(); ?>