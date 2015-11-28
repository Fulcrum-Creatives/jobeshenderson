<?php get_header(); ?>
<div class="body__content">
	<div class="no-image-header"></div>
	<div class="infobox">
		<div class="col__left">
			<div class="infobox__header">
				<h2 class="infobox-heading">
					<?php printf( __( '%s', FCWPF_TAXDOMAIN ),  single_term_title( '', false ) ); ?>
				</h2>
			</div>
			<div class="infobox__body">
				<?php 
				$term_id = $wp_query->get_queried_object_id();
				 echo term_description( '', get_query_var( 'taxonomy' ) );
				?>
			</div>
		</div>
		<div class="col__right">
		</div>
	</div>
	<main id="main" itemprop="mainContentOfPage" role="main">

		<div class="col__left">
			
			<header class="section__header">
				<h2 class="section__heading">
					<?php printf( __( 'Category: %s', FCWPF_TAXDOMAIN ),  single_term_title( '', false ) ); ?>
				</h2>
			</header>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="project-listing">
				<h3 class="ft-project__title">
				    <a href="<?php the_permalink(); ?>" rel="bookmark">
				        <?php the_title(); ?>
				        <?php if ( has_post_thumbnail() ) : ?>
					<div class="ft-project__thumb">
					    <a href="<?php the_permalink(); ?>" rel="bookmark">
					    	<?php the_post_thumbnail();?>
					    </a>
					</div>
					<?php endif ?>

				    </a>
				</h3>
				<?php the_excerpt(); ?>
				<a class="ft-project__more" href="<?php the_permalink(); ?>">
					More on <?php the_title(); ?>
				</a>
			</div>
				
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="col__right">
			<?php get_sidebar('service'); ?>
		</div>
	</main>
<?php get_footer(); ?>