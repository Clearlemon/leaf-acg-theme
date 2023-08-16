<?php
$files = array(
    'leaf-function/leaf-gadget-func/article-sideba-nav/article-sideba-nav.php',
    'leaf-function/leaf-gadget-func/article-sideba-user/article-sideba-user.php',
    'leaf-function/leaf-gadget-func/sideba-article-hot/sideba-article-hot.php',
    'leaf-function/leaf-gadget-func/sideba-colored-labels/sideba-colored-labels.php',
    'leaf-function/leaf-gadget-func/sideba-comments/sideba-comments.php',
    'leaf-function/leaf-gadget-func/sideba-netease-music/sideba-netease-music.php',
    'leaf-function/leaf-gadget-func/sideba-one-word/sideba-one-word.php',
    'leaf-function/leaf-gadget-func/sideba-time/sideba-time.php',
    'leaf-function/leaf-gadget-func/sideba-video/sideba-video.php',
    'leaf-function/leaf-gadget-func/sideba-weather/sideba-weather.php',
    'leaf-function/leaf-gadget-func/sidebar-ip-address/sidebar-ip-address.php',
    'leaf-function/leaf-gadget-func/sidebar-users/sidebar-users.php',
);

foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}

function leaf_all_separate_sideba_open()
{
    if (_leaf('leaf_all_sideba_open') == true) {
        require_once get_theme_file_path('sidebar.php');
    } else {
        $leaf_separate_sideba_open = _leaf('leaf_separate_sideba_open');
        $enabled = $leaf_separate_sideba_open['enabled'];

        if (isset($enabled) && array_key_exists('module_home', $enabled)) {
?>
            <?php
            if (is_home()) {
            ?>
                <div class="leaf-sidebar">
                    <div class="leaf_sidebat_all_fixed">
                        <?php dynamic_sidebar('leaf-home-sideba'); ?>
                    </div>
                </div>
            <?php } ?>

        <?php
        }
        if (isset($enabled) && array_key_exists('module_post', $enabled)) { ?>
            <?php
            if (is_single()) {
            ?>
                <div class="leaf-sidebar">
                    <div class="leaf_sidebat_all_fixed">
                        <?php dynamic_sidebar('leaf-article-sideba'); ?>
                    </div>
                </div>
            <?php } ?>

        <?php
        }
        if (isset($enabled) && array_key_exists('module_search', $enabled)) { ?>
            <?php
            if (is_search()) {
            ?>
                <div class="leaf-sidebar">
                    <div class="leaf_sidebat_all_fixed">
                        <?php dynamic_sidebar('leaf-search-sideba'); ?>
                    </div>
                </div>
            <?php } ?>

        <?php
        }
        if (isset($enabled) && array_key_exists('module_classify', $enabled)) { ?>
            <?php
            if (is_archive()) {
            ?>
                <div class="leaf-sidebar">
                    <div class="leaf_sidebat_all_fixed">
                        <?php dynamic_sidebar('leaf-classify-sideba'); ?>
                    </div>
                </div>
            <?php } ?>
<?php
        } else {
        }
    }
}
