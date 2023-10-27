<?php
//文章ajax下拉加载
function leaf_home_ajax_sift_post()
{
    $selected_category = $_POST['category'];
    $posts_per_page = $_POST['posts_per_page']; // 获取文章显示数量
    $paged = $_POST['paged']; // 获取当前页码

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged // 设置当前页码
    );

    if (!empty($selected_category)) {
        $args['cat'] = $selected_category;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // 输出文章内容，可以根据需要进行定制
            $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
            if (!is_sticky() || is_paged()) {
                if ($leaf_close_home_post_assets == 'leaf_article_style') {
                    leaf_article_style();
                } elseif ($leaf_close_home_post_assets == 'leaf_article_biglong_style') {
                    leaf_article_biglong_style();
                } elseif ($leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                    leaf_article_three_img_card_style();
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
    }

    die();
}
add_action('wp_ajax_leaf_home_ajax_sift_post', 'leaf_home_ajax_sift_post');
add_action('wp_ajax_nopriv_leaf_home_ajax_sift_post', 'leaf_home_ajax_sift_post');
