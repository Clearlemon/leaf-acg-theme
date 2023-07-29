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
