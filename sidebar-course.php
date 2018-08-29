				<aside id="sidebar_container" role="complementary" class="last fourcol clearfix">

					<?php szp_hook_before_sidebar() ?>

                    <div id="course-sidebar" class="sidebar">
                    	<?php szp_hook_first_sidebar() ?>

                        <?php if ( is_active_sidebar( 'course' ) ) : ?>

                            <?php dynamic_sidebar( 'course' ); ?>

                        <?php else : ?>

                            <!-- This content shows up if there are no widgets defined in the backend. -->

                            <div class="alert alert-help">
                                <p><?php _e("Please activate some Widgets.", "bonestheme");  ?></p>
                            </div>

                        <?php endif; ?>

                    </div>
            	</aside>
