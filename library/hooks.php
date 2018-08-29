<?php

/************* REGISTER CUSTOM HOOKS *****************/

function szp_hook_before_sidebar() {
	do_action('szp_hook_before_sidebar');
}

function szp_hook_first_sidebar() {
	do_action('szp_hook_first_sidebar');
}

function szp_hook_after_page() {
	do_action('szp_hook_after_page');
}

function szp_hook_after_full_width() {
	do_action('szp_hook_after_full_width');
}

function szp_hook_before_post() {
    do_action('szp_hook_before_post');
}

?>
