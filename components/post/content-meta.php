		<div class="entry-meta">
			<?php
			if ( ! ( ( is_home() || is_archive() ) && ! has_post_thumbnail() ) )  {
				create_magazine_posted_on();
			}
			//create_magazine_entry_footer();
			?>
		</div><!-- .entry-meta -->