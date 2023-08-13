<html>
<?php leaf_seo(); ?>
<?php require_once get_theme_file_path('/leaf-theme/theme-header.php');  ?>
<main class="leaf_postings_main">
    <div class="leaf_article_display">
        <div class="leaf_ajax_post_button">
            <?php require_once get_theme_file_path('/leaf-theme/theme-slide/theme-slide-first.php'); ?>
            <!-- 文章主题样式开始 -->
            <?php leaf_home_post_ajax_assets(); ?>
            <!-- 文章主题样式结束 -->
        </div>
        <?php
        $leaf_post_ajax_radio = _leaf('leaf_post_ajax_radio');
        if ($leaf_post_ajax_radio == 'ajax_loading') {
            leaf_ajax_paginated();
        }
        ?>
    </div>
    <!-- 侧边栏样式开始 -->
    <?php
    require_once get_theme_file_path('/leaf-theme/theme-sidebar.php');
    ?>
    <!-- 侧边栏样式结束 -->
</main>
<?php
require_once get_theme_file_path('/leaf-theme/theme-footer.php');
?>

</html>