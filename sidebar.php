				<aside id="sidebar_container" role="complementary" class="last fourcol clearfix">
                    <?php szp_hook_before_sidebar() ?>
                    <div id="sidebar1" class="sidebar">
                    	<?php szp_hook_first_sidebar() ?>

                        <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

                            <?php dynamic_sidebar( 'sidebar1' ); ?>

                        <?php else : ?>

                            <!-- This content shows up if there are no widgets defined in the backend. -->

                            <div class="alert alert-help">
                                <p><?php _e("Please activate some Widgets.", "bonestheme");  ?></p>
                            </div>

                        <?php endif; ?>

                    </div>
            	</aside>
