<?php
//首页文章分类加载
//ajax加载文章列表
add_action('wp_ajax_nopriv_ajax_index_post', 'ajax_index_post_square');
add_action('wp_ajax_ajax_index_post', 'ajax_index_post_square');
function ajax_index_post_square()
{
    $paged = $_POST["paged"];
    $total = $_POST["total"];
    $category_id = $_POST["category_id"];
    $tag_id = $_POST["tag_id"];
    $search_keyword = $_POST["search_keyword"];

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $paged,
        'orderby' => 'date',
        'cat' => $category_id,
        's' => $search_keyword,
        'tag_id' => $tag_id,
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
            } elseif ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
                leaf_small_card_articles_alling();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
                leaf_article_container();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
                leaf_article_photo_album();
            }
        }
    }
    wp_reset_postdata();
    if ($total > $paged) echo '';
    die();
}
