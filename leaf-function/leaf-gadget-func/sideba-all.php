<?php
    register_sidebar(
        array (
            'name' => '首页侧边栏',//侧边栏名称
            'id' => 'leaf-home-sideba',//侧边栏ID
            'description' => '用于放在首页侧边栏的小工具区块【前提你开启了侧边栏功能】',//侧边栏描述
            'before_widget' => '<div class="leaf-home-widget-content">',//侧边栏前面的代码
            'after_widget' => "</div>",//侧边栏后面的代码
            'before_title' => '<h3 class="leaf-home-widget-title">',//侧边栏标题的前面的代码
            'after_title' => '</h3>',//侧边栏标题的后面的代码
        )
    );
    register_sidebar(
        array (
            'name' => '文章页侧边栏',//侧边栏名称
            'id' => 'leaf-article-sideba',//侧边栏ID
            'description' => '用于放在首页侧边栏的小工具区块【前提你开启了侧边栏功能】',//侧边栏描述
            'before_widget' => '<div class="leaf-home-widget-content">',//侧边栏前面的代码
            'after_widget' => "</div>",//侧边栏后面的代码
            'before_title' => '<h3 class="leaf-home-widget-title">',//侧边栏标题的前面的代码
            'after_title' => '</h3>',//侧边栏标题的后面的代码
        )
    );
    register_sidebar(
        array (
            'name' => '搜索页侧边栏',//侧边栏名称
            'id' => 'leaf-search-sideba',//侧边栏ID
            'description' => '用于放在首页侧边栏的小工具区块【前提你开启了侧边栏功能】',//侧边栏描述
            'before_widget' => '<div class="leaf-home-widget-content">',//侧边栏前面的代码
            'after_widget' => "</div>",//侧边栏后面的代码
            'before_title' => '<h3 class="leaf-home-widget-title">',//侧边栏标题的前面的代码
            'after_title' => '</h3>',//侧边栏标题的后面的代码
        )
    );
    register_sidebar(
        array (
            'name' => '分类页侧边栏',//侧边栏名称
            'id' => 'leaf-classify-sideba',//侧边栏ID
            'description' => '用于放在首页侧边栏的小工具区块【前提你开启了侧边栏功能】',//侧边栏描述
            'before_widget' => '<div class="leaf-home-widget-content">',//侧边栏前面的代码
            'after_widget' => "</div>",//侧边栏后面的代码
            'before_title' => '<h3 class="leaf-home-widget-title">',//侧边栏标题的前面的代码
            'after_title' => '</h3>',//侧边栏标题的后面的代码
        )
    );
    register_sidebar(
        array (
            'name' => '自创页面侧边栏',//侧边栏名称
            'id' => 'leaf-diyPage-sideba',//侧边栏ID
            'description' => '用于放在首页侧边栏的小工具区块【前提你开启了侧边栏功能】',//侧边栏描述
            'before_widget' => '<div class="leaf-home-widget-content">',//侧边栏前面的代码
            'after_widget' => "</div>",//侧边栏后面的代码
            'before_title' => '<h3 class="leaf-home-widget-title">',//侧边栏标题的前面的代码
            'after_title' => '</h3>',//侧边栏标题的后面的代码
        )
    );
    
$files = array(
    //加载所有侧边栏文件
    'leaf-function/leaf-gadget-func/article-sideba-nav.php',
    'leaf-function/leaf-gadget-func/article-sideba-user.php',
    'leaf-function/leaf-gadget-func/sideba-article-hot.php',
    'leaf-function/leaf-gadget-func/sideba-colored-labels.php',
    'leaf-function/leaf-gadget-func/sideba-comments.php',
    'leaf-function/leaf-gadget-func/sideba-netease-music.php',
    'leaf-function/leaf-gadget-func/sideba-one-word.php',
    'leaf-function/leaf-gadget-func/sideba-time.php',
    'leaf-function/leaf-gadget-func/sideba-video.php',
    'leaf-function/leaf-gadget-func/sideba-weather.php',
    'leaf-function/leaf-gadget-func/sidebar-ip-address.php',
    'leaf-function/leaf-gadget-func/sidebar-users.php',
    //加载设置文件
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}