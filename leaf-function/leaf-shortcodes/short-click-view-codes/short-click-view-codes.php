<?php

function content_click_view($atts, $content = null)
{
    // 构建输出内容
    $output = '<div class="leaf_click_view_block" onclick="toggleTextClass(this)"><p class="leaf_click_view_text" >' . do_shortcode($content) . '</p></div>';
    return $output;
}
add_shortcode('click_view', 'content_click_view');
