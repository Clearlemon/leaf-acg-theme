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
