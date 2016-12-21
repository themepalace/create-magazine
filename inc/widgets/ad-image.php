<?php
/**
 * Custom Advertisement Image Widget
 *
 * @package Theme Palace
 * @subpackage Create Magazine 
 * @since Create Magazine 1.0
 */

if ( ! class_exists( 'create_magazine_image_widget' ) ) :

	/**
	 * Adds Tp image widget.
	 */
	class create_magazine_image_widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'tp_image_widget', // Base ID
				__( 'TP: Featured Image AD', 'create-magazine' ), // Name
				array( 'description' => __( 'An widget to upload Ad and images in sidebar.', 'create-magazine' ), ) // Args
			);
		}


		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			extract( $args , EXTR_SKIP );

			$tpiw_title                      = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$tpiw_image_url             = ! empty( $instance['tpiw_image_url'] ) ? $instance['tpiw_image_url'] : '';
			$tpiw_link                  = ! empty( $instance['tpiw_link'] ) ? $instance['tpiw_link'] : '';
			$tpiw_alt_text              = ! empty( $instance['tpiw_alt_text'] ) ? $instance['tpiw_alt_text'] : '';
			$tpiw_open_link             = ! empty( $instance['tpiw_open_link'] ) ? $instance['tpiw_open_link'] : false;
			$tpiw_ad_code         		= ! empty( $instance['tpiw_ad_code'] ) ? $instance['tpiw_ad_code'] : '';

	        $instance['link_open'] 		= '';
	        $instance['link_close'] 	= '';

	        if ( ! empty ( $tpiw_link ) ) {

	          $target                 	= ( empty( $tpiw_open_link ) ) ? '' : ' target="_blank" ';
	          $instance['link_open']  	= '<a href="' . esc_url( $tpiw_link ) . '"' . esc_attr( $target ) . '>';
	          $instance['link_close'] 	= '</a>';

	        }
			echo $args['before_widget'];

			if ( $tpiw_title ) {
		        echo $before_title ;
		        echo esc_html( $tpiw_title );
	          	echo $after_title ;
	        }

	        if ( ! empty( $tpiw_ad_code ) ) {
				echo html_entity_decode( $tpiw_ad_code );
			} 
			elseif ( ! empty( $tpiw_image_url ) ) {
				$sizes = array();
				$alt_text = ( ! empty( $tpiw_alt_text ) ) ? $tpiw_alt_text : basename( $tpiw_image_url );
				$imgtag = '<img src="' . esc_url( $tpiw_image_url ) . '" alt="' . esc_attr( $alt_text ) . '"  />';
				echo sprintf( '%s%s%s',
				$instance['link_open'],
				$imgtag,
				$instance['link_close']
				);
	        } // End if : image is there.
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			// Defaults.
	        $instance = wp_parse_args( (array) $instance, array(
				'title'                	=>  '',
				'tpiw_image_url'       	=>  '',
				'tpiw_link'            	=>  '',
				'tpiw_alt_text'        	=>  '',
				'tpiw_open_link'       	=>  0,
				'tpiw_ad_code'         	=>  '',
	      	) );

			$tpiw_title                	= htmlspecialchars( $instance['title'] );
			$tpiw_image_url             = isset( $instance['tpiw_image_url'] ) ? $instance['tpiw_image_url'] : '';
			$tpiw_link                  = isset( $instance['tpiw_link'] ) ? $instance['tpiw_link'] : '';
			$tpiw_alt_text              = isset( $instance['tpiw_alt_text'] ) ? $instance['tpiw_alt_text'] : '';
			$tpiw_open_link             = isset( $instance['tpiw_open_link'] ) ? $instance['tpiw_open_link'] : false;
			$tpiw_ad_code          		= isset( $instance['tpiw_ad_code' ] ) ? $instance['tpiw_ad_code'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title :', 'create-magazine' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $tpiw_title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tpiw_ad_code' ) ); ?>"><?php _e( 'Ad Code', 'create-magazine' ); ?>:</label>
				<textarea class="widefat" rows="2" id="<?php echo esc_attr( $this->get_field_id( 'tpiw_ad_code' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tpiw_ad_code' ) ); ?>"><?php echo esc_textarea( $tpiw_ad_code ); ?></textarea>
		    </p>

		    <p>
		    	<label>OR</label>
		    </p>

			<!-- Place holder for image upload -->
			<div>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tpiw_image_url' ) ); ?>"><?php _e( 'Image URL', 'create-magazine' ); ?></label>:<br />
				<input type="url" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'tpiw_image_url' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'tpiw_image_url' ) ); ?>" value="<?php echo esc_url( $tpiw_image_url ); ?>" /><br />
				<input type="button" class="select-img button button-primary" value="<?php _e( 'Upload', 'create-magazine' ); ?>" data-uploader_title="<?php _e( 'Select Image', 'create-magazine' ); ?>" data-uploader_button_text="<?php _e( 'Choose Image', 'create-magazine' ); ?>" style="margin-top:5px;" />

		      	<?php
		        $full_image_url = '';
		        if (! empty( $tpiw_image_url ) ){
		          $full_image_url = $tpiw_image_url;
		        }
		        $wrap_style = '';
		        if ( empty( $full_image_url ) ) {
		          $wrap_style = ' style="display:none;" ';
		        }
		      	?>
		      	<div class="tpiw-preview-wrap" <?php echo esc_attr( $wrap_style ); ?>>
		        	<img src="<?php echo esc_url( $full_image_url ); ?>" alt="<?php _e('Preview', 'create-magazine'); ?>" style="max-width: 100%;"  />
		      	</div><!-- .tpiw-preview-wrap -->

	    	</div>

		    <p>
		      	<label for="<?php echo esc_attr( $this->get_field_id( 'tpiw_alt_text' ) ); ?>"><?php _e( 'Alt Text', 'create-magazine' ); ?>:</label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tpiw_alt_text' ) ); ?>"
		        name="<?php echo esc_attr( $this->get_field_name( 'tpiw_alt_text' ) ); ?>" type="text" value="<?php echo esc_attr( $tpiw_alt_text ); ?>" />
		    </p>

		    <p>
		      	<label for="<?php echo esc_attr( $this->get_field_id( 'tpiw_link' ) ); ?>"><?php _e( 'Link', 'create-magazine' ); ?>:</label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tpiw_link' ) ); ?>"
		        name="<?php echo esc_attr( $this->get_field_name( 'tpiw_link' ) ); ?>" type="url" value="<?php echo esc_url( $tpiw_link ); ?>" />
		    </p>

		    <p>
		      <label for="<?php echo esc_attr( $this->get_field_id( 's' ) ); ?>"><?php _e( 'Open in New Tab', 'create-magazine' ); ?>:</label>
		      <input id="<?php echo esc_attr( $this->get_field_id( 'tpiw_open_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tpiw_open_link' ) ); ?>" type="checkbox" <?php checked( isset( $instance['tpiw_open_link'] ) ? $instance['tpiw_open_link'] : 0 ); ?> />
		    </p>
		<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                         = $old_instance;

			$instance['title']                = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ): '';
			$instance['tpiw_image_url']       = esc_url( $new_instance['tpiw_image_url'] );
			$instance['tpiw_link']            = esc_url( $new_instance['tpiw_link'] );
			$instance['tpiw_alt_text']        = sanitize_text_field( $new_instance['tpiw_alt_text'] );
			$instance['tpiw_open_link']       = create_magazine_sanitize_checkbox( $new_instance['tpiw_open_link'] );
			$instance['tpiw_ad_code']     	  = esc_textarea( $new_instance['tpiw_ad_code'] );

			return $instance;
		}

	} // class tp_image_widget
endif;

function create_magazine_register_image_widget() {
	register_widget( 'create_magazine_image_widget' );
}
add_action( 'widgets_init', 'create_magazine_register_image_widget' );

/**
 * Enqueue admin scripts for Image Widget
 * @uses  wp_enqueue_script, and  admin_enqueue_scripts hook
 *
 * @since Create Magazine 1.0
 */
function create_magazine_image_widget_upload_enqueue( $hook ) {

  if( 'widgets.php' !== $hook )
      return;

  wp_enqueue_media();
  wp_enqueue_script( 'create-magazine-image-widget-upload-script', get_template_directory_uri().'/assets/js/upload.min.js', array( 'jquery' ), '1.1', true );

}
add_action( 'admin_enqueue_scripts', 'create_magazine_image_widget_upload_enqueue' );