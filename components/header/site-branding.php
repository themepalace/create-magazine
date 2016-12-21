<div class="container">
	<div class="site-branding alignleft"><!-- use alignright class to change logo position -->    	
		<div class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo get_custom_logo();?></a></div><!-- #site-logo -->
			<div id="site-header">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html(get_bloginfo( 'name' ));?></a></h1>
				<h2 class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) );?></h2>
			</div><!-- #site-header -->
	</div><!-- #site-branding-->
	<?php if( is_active_sidebar( 'header-right' ) ): ?>
		<div class="google-advertisement">
			<?php dynamic_sidebar( 'header-right' ) ; ?>
		</div>
	<?php endif;?>
</div><!-- end .site-branding-wrapper -->