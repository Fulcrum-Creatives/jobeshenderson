<?php get_header(); ?>

<?php /* One column Layout */ ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <?php get_template_part( 'template-parts/content/content', 'single-post' ); echo "\n" ?>
    <?php comment_form(); ?>
    <?php comments_template(); ?>
</main>

<?php /* Two column layout
<main id="main" class="sidebar__one" itemprop="mainContentOfPage" role="main">
    <?php get_template_part( 'template-parts/content/content', 'single-post' ); echo "\n" ?>
    <?php comment_form(); ?>
    <?php comments_template(); ?>
</main>
<?php get_sidebar('left'); ?>
*/?>

<?php /* three column layout
<main id="main" class="sidebar__two" itemprop="mainContentOfPage" role="main">
    <?php get_template_part( 'template-parts/content/content', 'single-post' ); echo "\n" ?>
    <?php comment_form(); ?>
    <?php comments_template(); ?>
</main>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
*/ ?>

<?php get_footer(); ?>