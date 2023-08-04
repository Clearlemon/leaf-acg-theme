<?php
//为标题添加class
function add_custom_class_to_headings($content)
{
    // 定义标题级别和对应的样式类
    $headings = array(
        'h1' => 'leaf_single_title_h1',
        'h2' => 'leaf_single_title_h2',
        'h3' => 'leaf_single_title_h3',
        'h4' => 'leaf_single_title_h4',
        'h5' => 'leaf_single_title_h5',
        'h6' => 'leaf_single_title_h6',
    );

    // 使用正则表达式匹配文章内容中的标题并添加自定义类
    foreach ($headings as $tag => $class) {
        $pattern = '/<' . $tag . '([^>]*)>/i';
        $replacement = '<' . $tag . ' class="' . $class . '"$1>';
        $content = preg_replace($pattern, $replacement, $content);
    }
    return $content;
}
add_filter('the_content', 'add_custom_class_to_headings');

function custom_image_class($html, $id, $caption, $title, $align, $url)
{
    // 清空原有的class
    $html = preg_replace('/class="[^"]+"/i', '', $html);

    // 添加新的class
    $new_class = 'leaf-post-img-all';
    $html = str_replace('<img ', '<img class="' . esc_attr($new_class) . '" ', $html);

    return $html;
}
add_filter('image_send_to_editor', 'custom_image_class', 10, 6);

function custom_image_style_on_publish($content)
{
    // 查找文章内容中的img标签，并进行替换
    $pattern = '/<img([^>]*)class="([^"]*)"([^>]*)src="([^"]*)"/i';
    $replacement = '<img class="leaf_inhome_article_img leaf_images_are_preloaded" src="'
        . get_template_directory_uri() . '/leaf-assets/leaf-images/article_images_are_preloaded.webp" data-original="$4"';
    $content = preg_replace($pattern, $replacement, $content);

    return $content;
}
add_filter('the_content', 'custom_image_style_on_publish');


//文章特色图片功能
if (function_exists('add_theme_support')) {
    add_theme_support(
        'post-thumbnails'
    );
}
