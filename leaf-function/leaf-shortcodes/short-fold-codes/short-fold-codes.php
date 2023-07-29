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
    $output = '<div class="leaf_fold_all">';
    if ($title) {
        $output .= '<div class="leaf_fold_title">' . esc_html($title) . '</div>'; // 将标题添加到输出内容中
    }
    $output .= '<div class="leaf_fold_hide_text" style="display: none;">' . do_shortcode($content) . '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('fold', 'content_fold');
