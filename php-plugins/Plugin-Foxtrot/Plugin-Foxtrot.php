



<?php
/**



Plugin Name: Plugin Foxtrot

 */
function wporg_generate_delete_link($content)
{
    // run only for single post page
    if (is_single() && in_the_loop() && is_main_query()) {
        // add query arguments: action, post, nonce
        $url = add_query_arg(
            [
                'action' => 'wporg_frontend_delete',
                'post'   => get_the_ID(),
                'nonce'  => wp_create_nonce('wporg_frontend_delete'),
            ],
            home_url()
        );
        return $content . ' <a href="' . esc_url($url) . '">' . esc_html__('Delete Post', 'wporg') . '</a>';
    }
    return null;
}
 
/**
 * request handler
 */
function wporg_delete_post()
{
    if (
        isset($_GET['action']) &&
        isset($_GET['nonce']) &&
        $_GET['action'] === 'wporg_frontend_delete' &&
        wp_verify_nonce($_GET['nonce'], 'wporg_frontend_delete')
    ) {
 
        // verify we have a post id
        $post_id = (isset($_GET['post'])) ? ($_GET['post']) : (null);
 
        // verify there is a post with such a number
        $post = get_post((int)$post_id);
        if (empty($post)) {
            return;
        }
 
        // delete the post
        wp_trash_post($post_id);
 
        // redirect to admin page
        $redirect = admin_url('edit.php');
        wp_safe_redirect($redirect);
 
        // we are done
        die;
    }
}




add_action('init','asdf');

 
function asdf(){

if (current_user_can('edit_others_posts')) {
    /**
     * add the delete link to the end of the post content
     */
    add_filter('the_content', 'wporg_generate_delete_link');
 
    /**
     * register our request handler with the init hook
     */
    add_action('init', 'wporg_delete_post');
}

}
