<?php 
if (have_posts()) : while (have_posts()) : the_post(); 
  $jobes_header_text_line_1 = ( get_field( 'jobes_header_text_line_1' ) ? get_field( 'jobes_header_text_line_1' ) : '' );
  $jobes_header_text_line_2 = ( get_field( 'jobes_header_text_line_2' ) ? get_field( 'jobes_header_text_line_2' ) : '' );
  $jobes_page_link = ( get_field( 'jobes_page_link' ) ? get_field( 'jobes_page_link' ) : '' );
  $project_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projectimage' );
  if( $project_image ) :
    $project_image_url = $project_image[0];
    $project_image_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projectimage@2' );
    $project_image_url_retina = $project_image_retina[0];
    $project_image_data = get_post( get_post_thumbnail_id() );
    $project_image_alt = get_post_meta( $project_image_data->ID, '_wp_attachment_image_alt', true );
  else :
    $project_image_url = '';
  endif;
  ?>
  <div class="header__hero-image">
    <?php if( $project_image_url != '' ) : ?>
    <figure class="header__image header__image--homepage">
      <a href="<?php echo $jobes_page_link; ?>" class="header__hero-link">
        <img src="<?php echo $project_image_url; ?>" alt="<?php echo $project_image_alt; ?>" />
      </a>
      <figcaption class="header__text">
        <p class="header__text--top header__text--sub">
          <a href="<?php echo $jobes_page_link; ?>" class="header__hero-link">
            <?php echo $jobes_header_text_line_1; ?>
          </a>
        </p>
        <p class="header__text--bottom header__text--sub">
          <a href="<?php echo $jobes_page_link; ?>" class="header__hero-link">
          <?php echo $jobes_header_text_line_2 ?>
          </a>
        </p>
      </figcaption>
    </figure>
    <a href="<?php echo $jobes_page_link; ?>" class="header__hero-link"></a>
  <?php else : ?>
    <figure class="header__image header__image--homepage">
      <img src="<?php echo FCWPF_URI; ?>/images/header/temp-page-image.png" alt="<?php bloginfo( 'name' ); ?>" />
      <figcaption class="header__text">
        <p class="header__text--top"><?php _e( 'The civil engineering landscape is', FCWPF_TAXDOMAIN ); ?></p>
        <p class="header__text--bottom"><?php _e( 'constantly evolving', FCWPF_TAXDOMAIN ); ?></p>
      </figcaption>
    </figure>
  <?php endif; ?>
</div>
<?php endwhile; endif; wp_reset_postdata(); ?>