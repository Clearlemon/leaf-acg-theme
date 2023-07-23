<?php
//短代码的设置
function content_hidden($atts, $content = null)
{
    // 检查用户是否处于登录状态
    $logged_in = is_user_logged_in();

    // 使用三元运算符根据登录状态输出不同内容
    $output = '<div>' . ($logged_in ? do_shortcode($content) : '你没登录哦') . '</div>';

    return $output;
}

add_shortcode('hidden', 'content_hidden');


