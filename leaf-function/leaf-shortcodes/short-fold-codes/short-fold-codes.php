<?php
//短代码的设置
// 短代码的设置
function content_fold($atts, $content = null)
{
    // 提取短代码的属性
    $atts = shortcode_atts(array(
        'title' => '', // 设置默认标题为空
    ), $atts);

    // 获取标题
    $title = $atts['title'];

    // 构建输出内容
    $output = '<div>';
    if ($title) {
        $output .= '<h2>' . esc_html($title) . '</h2>'; // 将标题添加到输出内容中
    }
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}

add_shortcode('fold', 'content_fold');
