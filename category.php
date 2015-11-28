<?php get_header(); ?>
<main id="main" role="main">
    <header>
        <h1 class="page-title"><?php printf( __( 'Category: %s', FCWPF_TAXDOMAIN ),  single_cat_title( '', false ) ); ?></h1>
    </header>
    <?php get_template_part( 'template-parts/content/content' ); ?>
</main>
<?php get_footer(); ?>