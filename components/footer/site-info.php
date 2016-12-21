<?php

    
    $options = create_magazine_get_theme_options(); ?>  
        
    <div class="site-info text-center">
        <?php if(! empty( $options['copyright_text'] ) ) { 
       		echo esc_html( $options['copyright_text'] ); ?>
        <?php } ?>
        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'create-magazine' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'create-magazine' ), 'WordPress' ); ?></a>
      	<span class="sep"> | </span>
      	<?php printf( __( 'Theme: %1$s by %2$s.', 'create-magazine' ), 'Create Magazine', '<a href="' . esc_url( "http://themepalace.com/" ) . '" rel="designer">Theme Palace</a>' ); ?>
    </div><!-- end .site-info -->
    
