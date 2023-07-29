<?php
// 自定义密码查看短代码
function cntent_password_viewing($atts, $content = null)
{
    // 获取传递的参数
    $atts = shortcode_atts(array(
        'key' => '',
        'illustrate' => '',
    ), $atts);

    // 检查是否提供了key参数
    if (empty($atts['key'])) {
        return '请提供密码';
    }

    // 获取当前用户输入的密码
    $entered_password = sanitize_text_field($_POST['password']);

    // 获取正确的密码（你可以根据自己的需求设置密码）
    $correct_password = $atts['key'];
    $illustrate = $atts['illustrate'];

    // 检查密码是否匹配
    if ($entered_password === $correct_password) {
        // 返回隐藏的内容
        return '<div class="leaf_password_viewing_block">' . do_shortcode($content) . '</div>';
    } else {
        // 返回密码输入框
        ob_start();
?>
        <form class="leaf_password_viewing_all" method="post">
            <div class="leaf_password_viewing_all_block">
                <label class="leaf_password_viewing_text" for="password">请输入密码：</label>
                <div class="leaf_password_viewing_password_submit_block">
                    <input class="leaf_password_viewing_password" type="password" name="password" id="password" required>
                    <input class="leaf_password_viewing_submit" type="submit" value="提交">
                </div>
                <div class="leaf_password_viewing_text_block">
                    <p class="leaf_password_viewing_text leaf_password_viewing_text_content"><?php echo esc_html($illustrate) ?></p>
                </div>
            </div>
        </form>
<?php
        return ob_get_clean();
    }
}
add_shortcode('password_viewing', 'cntent_password_viewing');
