<?php
//短代码的设置
function content_hidden($atts, $content = null)
{
    // 检查用户是否处于登录状态
    $logged_in = is_user_logged_in();

    // 使用if-else语句根据登录状态输出不同内容
    if ($logged_in) {
        $output = '<div class="leaf_logged_in leaf_div_block">' . do_shortcode($content) . '</div>';
    } else {
        $output = '<div class="leaf_not_logged_in leaf_div_block">
                <img class="leaf_not_logged_in_img" src="' .  get_template_directory_uri() . '/leaf-assets/leaf-images/hide-bg.jpg" alt="">
                <p class="leaf_not_logged_in_text">检测到你是未登录的游客，请点击[登录]来查看被隐藏的文章内容吧~</p>
            </div>';
    }

    return $output;
}

add_shortcode('hidden', 'content_hidden');
