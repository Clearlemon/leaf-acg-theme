<?php
//搜索页的面包屑导航
function leaf_search_title()
{
    $leaf_home_url = get_bloginfo('url');
    $leaf_search_query = get_search_query();
?>
    <p class="search_title"><a class="leaf_link_all" href="<?php echo $leaf_home_url; ?>">首页/</a>搜索结果为：<?php echo $leaf_search_query; ?></p>
<?php
}
function leaf_search_query_post()
{
    // 获取搜索关键词
    $search_query = get_search_query();

    // 查询搜索结果
    $args = array(
        's' => $search_query,
    );
    $search_results = new WP_Query($args);

    // 输出搜索结果
    if ($search_results->have_posts()) {
        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
        while ($search_results->have_posts()) {
            $search_results->the_post();
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
    } else {
        echo '<p>没有找到匹配的结果。</p>';
    }

    // 重置查询
    wp_reset_postdata();
}
