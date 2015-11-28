<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" rel="apple-touch-icon" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="skip-nav screen-reader-text"><?php _e('Skip to main Content', FCWPF_TAXDOMAIN); ?></a>

    <header class="body__header" role="banner">
        <div class="body__content">
            <div class="header__logo">
                <a href="<?php echo home_url(); ?>">
                    <h1 class="ir"><?php echo bloginfo('name'); ?></h1>
                    <?php 
                    $jobesh_site_logo = ( get_field( 'jobesh_site_logo', 'option' ) ? get_field( 'jobesh_site_logo', 'option' ) : '' );
                    if( !empty( $jobesh_site_logo ) ) :
                        $url = $jobesh_site_logo['url'];
                        $alt = $jobesh_site_logo['alt'];
                        $logo_base = $jobesh_site_logo['sizes']['logo'];
                        $logo_retina = $jobesh_site_logo['sizes']['logo@2'];
                    ?>
                    <img src="<?php echo $logo_base ?>" alt="<?php echo $alt ?>" />
                    <?php endif; ?>
                </a>
            </div>
            <nav class="body__nav--main" role="navigation">
                <?php 
                wp_nav_menu( array( 
                        'theme_location'    => 'primary', 
                        'container'         => '', 
                        'menu_class'        => 'main-nav-list', 
                        'menu_id'           => 'main-nav-list', 
                        'link_before'       => '<span itemprop="name">', 
                        'link_after'        => '</span>'
                    ) );
                ?>
            </nav>
        </div>
    </header>
    