<?php
if (!defined('ABSPATH')) {
    exit;
}
add_action('wp_ajax_search_action', 'exp_search_ajax_action_callback');
add_action('wp_ajax_nopriv_search_action', 'exp_search_ajax_action_callback');
function exp_search_ajax_action_callback()
{

    if (!wp_verify_nonce($_POST['nonce'], 'search-nonce')) {
        wp_die('error');
    }
    $args = array(
        'post_type' => array('post', 'product'),
        'post_status' => 'publish',
        's' => $_POST['s']
    );
    $query_ajax = new WP_Query($args);
    $json_data['out'] = ob_start( PHP_OUTPUT_HANDLER_CLEANABLE );
    if ($query_ajax->have_posts()) {
        while ($query_ajax->have_posts()) {
            $query_ajax->the_post();
?>
<div class="search-result-text">
    <div>
        <a href="<?php echo get_permalink(); ?>" D>
            <?php echo get_the_title(); ?>
        </a>
    </div>
</div>

<?php
        }
    } else {
            ?>
<div class="search-result-text">
    Ничего не найдено
</div>
<?php
    }
    $json_data['out'] .= ob_get_clean();
    wp_send_json($json_data);
    wp_die();
}