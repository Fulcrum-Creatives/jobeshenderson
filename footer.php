<?php
$jobesh_address = ( get_field( 'jobesh_address', 'options' ) ? get_field( 'jobesh_address', 'options' ) : '' );
$jobesh_phone = ( get_field( 'jobesh_phone', 'option' ) ? get_field( 'jobesh_phone', 'option' ) : '' );
$jobesh_fax = ( get_field( 'jobesh_fax', 'option' ) ? get_field( 'jobesh_fax', 'option' ) : '' );
$jobesh_email = ( get_field( 'jobesh_email', 'option' ) ? get_field( 'jobesh_email', 'option' ) : '' );
?>
<div class="body__content">
	<footer class="body__footer" role="contentinfo">
		<div class="footer__top">
		    <span itemprop="copyrightHolder">
		    	&copy;<?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
		    </span>
		    <span class="delimer"> | </span>
		    <address>
		    	<?php echo $jobesh_address; ?>
		    </address>
		</div>
		<div class="footer__bottom">
		<?php _e( 'Phone: ', FCWPF_TAXDOMAIN ); ?><a href="tel:+<?php echo $jobesh_phone; ?>"><?php echo $jobesh_phone; ?></a>
		<span class="delimer"> | </span>
		<?php _e( 'Fax: ', FCWPF_TAXDOMAIN ); ?><a href="fax:+<?php echo $jobesh_fax; ?>"><?php echo $jobesh_fax; ?></a>
		<br />
		<a href="mailto:<?php echo $jobesh_email; ?>"><?php echo $jobesh_email; ?></a>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>