<?php
//ajax加载文章列表
add_action('wp_ajax_nopriv_ajax_index_post', 'ajax_index_post_square');
add_action('wp_ajax_ajax_index_post', 'ajax_index_post_square');
function ajax_index_post_square()
{
    $paged = $_POST["paged"];
    $total = $_POST["total"];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $paged,
        'orderby' => 'date',
    );
    $the_query = new WP_Query($args);
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
        if (!is_sticky() || is_paged()) {
            if ($leaf_close_home_post_assets == 'leaf_article_style' || $leaf_close_home_post_assets == 'leaf_article_biglong_style' || $leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                if (_leaf_post('', 'leaf-post-genre',) == 'leaf-post-genre-1') {
                    leaf_close_home_post_assets();
                } elseif (_leaf_post('', 'leaf-post-genre',) == 'leaf-post-genre-2') {
                    leaf_article_biglong_style();
                } elseif (_leaf_post('', 'leaf-post-genre',) == 'leaf-post-genre-3') {
                    leaf_article_three_img_card_style();
                }
            }
        }
    }
    wp_reset_postdata();
    if ($total > $paged) echo '';
    die();
}
