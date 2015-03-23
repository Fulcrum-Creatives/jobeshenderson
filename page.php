<?php get_header(); ?>

<?php /* One column Layout */ ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
            <header class="entry-header">
                <?php get_template_part( 'template-parts/entry/meta/title' ); ?>
            </header>
            <section class="entry-content" itemprop="articleBody">
                <?php the_content(); ?>
            </section>
        </section>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</main>

<?php /* Two column layout
<main id="main" class="sidebar__one" itemprop="mainContentOfPage" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
            <header class="entry-header">
                <?php get_template_part( 'template-parts/entry/meta/title' ); ?>
            </header>
            <section class="entry-content" itemprop="articleBody">
                <?php the_content(); ?>
            </section>
        </section>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</main>
<?php get_sidebar('left'); ?>
*/?>

<?php /* three column layout
<main id="main" class="sidebar__two" itemprop="mainContentOfPage" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
            <header class="entry-header">
                <?php get_template_part( 'template-parts/entry/meta/title' ); ?>
            </header>
            <section class="entry-content" itemprop="articleBody">
                <?php the_content(); ?>
            </section>
        </section>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</main>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
*/ ?>

<?php get_footer(); ?>