<?php
function leaf_category_post()
{
    while (have_posts()) {
        the_post();
        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
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
    if (!have_posts()) {
?>
        <p>此分类下没有文章</p>
<?php
    }
}
