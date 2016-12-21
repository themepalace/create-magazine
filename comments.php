<?php
	// You can start editing here -- including this comment! ?>
	<section id="comment-section">
		<?php  if ( have_comments() ) : ?>
			<div class="comment-list">
			  	<h4>
			  	<?php
					printf( // WPCS: XSS OK.
						esc_html( _nx( '%1$s comment', '%1$s comments',  absint( get_comments_number() ), 'comments title', 'create-magazine' ) ),
						number_format_i18n( get_comments_number() )
					);
				?>
				</h4>
				<?php
					wp_list_comments( array(
						'style'      		=> 'ol',
						'short_ping' 		=> true,
					) );
				?>
				<?php the_comments_navigation(); ?>
			</div><!--end comment-list-->
		<?php endif; // Check for have_comments().?>
		<div class="comment-form">
			<?php
			$comments_args = array(
					'title_reply' => __( 'YOUR COMMENT', 'create-magazine' ),
					'comment_field' => '<textarea id="comments" placeholder="'.__( 'YOUR COMMENT', 'create-magazine' ).'" rows="6" name="comment"></textarea>',
					'comment_notes_before' => '',
					'submit_button' => '<input type="submit" value="' . __( 'POST COMMENT', 'create-magazine' ) . '">'
					);
			comment_form( $comments_args );?>
		</div>
	</section>
