<?php
/*
Template Name: Home
*/
get_header();
?>
<div class="body__content">
  <?php get_template_part( 'template-parts/hero', 'image' );?>
	<main id="main" itemprop="mainContentOfPage" role="main">
		<div class="col__left">
			<header class="section__header">
				<h2 class="section__heading">
					<?php _e('Recent Updates From Jobes Henderson', FCWPF_TAXDOMAIN ); ?>
				</h2>
				
			</header>
			<?php
			$jobesh_hp_post_amount = ( get_field( 'jobesh_hp_post_amount', 'option' ) ? get_field( 'jobesh_hp_post_amount', 'option' ) : '3' );
			$query = new WP_Query(array(
			    'post_type'         =>'post',
			    'posts_per_page'    => $jobesh_hp_post_amount,
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
				<?php the_excerpt(); ?>
				<div class="entry__more">
					<a href="<?php the_permalink(); ?>">
						<?php _e( 'Read More', FCWPF_TAXDOMAIN ); ?>
					</a>
				</div>
			</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			<div class="section__more">
					<a href="/news/">
						<?php _e('See More', FCWPF_TAXDOMAIN ); ?>
					</a>
				</div>
		</div>
		<div class="col__right">
			<?php get_sidebar('main-sidebar'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>