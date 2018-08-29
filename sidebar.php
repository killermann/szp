				<div id="sidebar_container" class="last fourcol clearfix">
                    <div role="complementary">
                        <?php szp_hook_before_sidebar() ?>
                    </div>
                    
                    <div id="sidebar1" class="sidebar" role="complementary">
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
            	</div>