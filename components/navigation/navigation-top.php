
    
    <nav id="site-navigation" class="main-navigation">
        <div class="container">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array( 'theme_location' => 'primary' ) );
                }
                ?>
        </div><!--end .main-menu-container-->
    </nav><!--end .main-navigation-->
    


