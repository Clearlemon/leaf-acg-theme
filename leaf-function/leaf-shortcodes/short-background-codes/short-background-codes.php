<?php
// 短代码的设置
//红色背景
function content_rad_background($atts, $content = null)
{
    // 构建输出内容
    $output = '<div class="leaf_posting_rad_background">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode('radback', 'content_rad_background');
//绿色背景
function content_green_background($atts, $content = null)
{
    // 构建输出内容
    $output = '<div class="leaf_posting_green_background">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode('greenback', 'content_green_background');
//蓝色背景
function content_blue_background($atts, $content = null)
{
    // 构建输出内容
    $output = '<div class="leaf_posting_blue_background">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode('blueback', 'content_blue_background');
//黄色背景
function content_yellow_background($atts, $content = null)
{
    // 构建输出内容
    $output = '<div class="leaf_posting_yellow_background">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode('yellowback', 'content_yellow_background');
