<?php
leaf_seo();
require_once get_theme_file_path('/leaf-theme/theme-header.php');
?>
<main class="leaf_search_page leaf_postings_main">
    <div class="leaf_float_style">
        <div class="leaf_search_page_all leaf_article_display">
            <div class="search_page_title">
                <?php
                //输出您所搜索的文字
                leaf_search_title();
                ?>
            </div>
            <div class="leaf_search_page_post_all">
                <?php
                $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
                if ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
                ?>
                    <div class="leaf_home_article_small_card_style">
                        <div class="leaf_home_article_small_card_style_all">
                            <?php
                            leaf_search_query_post(); ?>
                        </div>
                    </div>
                <?php    } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
                ?>
                    <div class="leaf_home_article_card_style">
                        <div class="leaf_home_article_style_card">
                            <?php
                            leaf_search_query_post(); ?>
                        </div>
                    </div>
                <?php } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
                ?>
                    <div class="leaf_home_article_photo_album_style">
                        <div class="leaf_article_photo_album_all">
                            <?php
                            leaf_search_query_post(); ?>
                        </div>
                    </div>
                    <?php
                } elseif ($leaf_close_home_post_assets == 'leaf_article_style' || $leaf_close_home_post_assets == 'leaf_article_biglong_style' || $leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                    leaf_search_query_post();
                } else {
                    ?>貌似没有设置文章展示块欸？要不去后台设置一下吗？
                <?php
                }

                ?>
            </div>
            <div class="leaf-post-button">
                <button id="leaf-load-more-button" class="leaf-ck leaf_show show-more m-feed-loader">加载更多</button>
            </div>
        </div>
        <?php
        leaf_all_separate_sideba_open();
        ?>
    </div>
</main>
<?php require_once get_theme_file_path('/leaf-theme/theme-footer.php'); ?>