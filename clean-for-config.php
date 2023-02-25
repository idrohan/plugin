<?php
//Plugin name:clean-for-config
function clean_for_config(){
    //delete posts
    $post_id_1 = get_post(1);
    if ($post_id_1){
        wp_delete_post($post_id_1->ID, true);
    }
    $post_id_2 = get_post(2);
    if ($post_id_2){
        wp_delete_post($post_id_2->ID, true);
    }
    //delete plugins
    delete_plugins(array('hello.php'));
    delete_plugins(array('akismet/akismet.php'));
    //set permalink to post name
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'clean_for_config');