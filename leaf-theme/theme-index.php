<html>
<?php leaf_seo(); ?>
<?php require_once get_theme_file_path('/leaf-theme/theme-header.php');  ?>
<main class="<?php leaf_home_main_css_change(); ?>">
    <div class="leaf_float_style">
        <div class="leaf_article_display">
            <div class="leaf_ajax_post_button">
                <?php require_once get_theme_file_path('/leaf-theme/theme-slide/theme-slide-first.php'); ?>
                <?php leaf_home_post_ajax_assets(); ?>
            </div>
            <?php
            $leaf_post_ajax_radio = _leaf('leaf_post_ajax_radio');
            if ($leaf_post_ajax_radio == 'ajax_loading') {
                leaf_ajax_paginated();
            }
            ?>
        </div>

        <?php
        leaf_all_separate_sideba_open();
        ?>
    </div>
</main>
<?php
require_once get_theme_file_path('/leaf-theme/theme-footer.php');
?>

</html>