<?php
$jobesh_info_box = ( get_field( 'jobesh_info_box' ) ? get_field( 'jobesh_info_box') : '' );
$jobesh_left_column_heading = ( get_field( 'jobesh_left_column_heading' ) ? get_field( 'jobesh_left_column_heading') : '' );
$jobesh_right_column_heading = ( get_field( 'jobesh_right_column_heading' ) ? get_field( 'jobesh_right_column_heading') : '' );
$jobesh_left_column_body = ( get_field( 'jobesh_left_column_body' ) ? get_field( 'jobesh_left_column_body') : '' );
$jobesh_right_column_body = ( get_field( 'jobesh_right_column_body' ) ? get_field( 'jobesh_right_column_body') : '' );
$jobesh_info_button_text = ( get_field( 'jobesh_info_button_text' ) ? get_field( 'jobesh_info_button_text') : '' );
$jobeh_info_button_url = ( get_field( 'jobeh_info_button_url' ) ? get_field( 'jobeh_info_button_url') : '' );
if( $jobesh_info_box == true ) :
?>
<div class="infobox">
	<div class="col__left">
		<?php if( $jobesh_left_column_heading ) : ?>
		<div class="infobox__header">
			<h2 class="infobox-heading">
				<?php echo $jobesh_left_column_heading; ?>
			</h2>
		</div>
		<?php
		endif;
		if( $jobesh_left_column_body ) :
		?>
		<div class="infobox__body">
			<?php echo $jobesh_left_column_body; ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="col__right">
		<?php if( $jobesh_left_column_heading ) : ?>
		<div class="infobox__header">
			<h2 class="infobox-heading">
				<?php echo $jobesh_right_column_heading; ?>
			</h2>
		</div>
		<?php
		endif;
		if( $jobesh_right_column_body ) :
		?>
		<div class="infobox__body">
			<?php echo $jobesh_right_column_body; ?>
		</div>
		<?php endif; ?>
		<div style="clear:both"></div>
		<?php if( $jobesh_info_button_text ) :?>
		<div class="infobox__button">
			<a href="<?php echo $jobeh_info_button_url; ?>">
				<?php echo $jobesh_info_button_text; ?>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>