<?php
// 创建回复查看隐藏内容的短代码
function cntent_reply_view($atts, $content = null)
{
    // 获取当前文章ID
    $current_post_id = get_the_ID();

    // 获取文章的作者ID
    $post_author_id = get_post_field('post_author', $current_post_id);

    // 获取当前用户ID
    $current_user_id = get_current_user_id();

    // 检查当前用户是否为文章的作者或网站管理员
    if ($current_user_id === $post_author_id || current_user_can('administrator')) {
        // 如果用户是文章的作者或网站管理员，直接显示隐藏内容
        return '<div class="leaf-hidden-content-visible">' . $content . '</div>';
    } else {
        // 如果用户不是文章的作者或网站管理员，执行之前的判断逻辑
        $comment_args = array(
            'post_id' => $current_post_id,
            'user_id' => $current_user_id,
            'count' => true,
        );
        $comment_count = get_comments($comment_args);

        if ($comment_count > 0) {
            // 如果用户已在当前文章的评论中回复过，显示隐藏内容
            return '<div class="leaf-hidden-content-visible">' . $content . '</div>';
        } else {
            // 如果用户没有在当前文章的评论中回复过，显示回复查看内容的提示
            return '<div class="leaf-nohidden-content-notice_block">
    <img class="leaf-nohidden-content-notice-img" src="' .  get_template_directory_uri() . '/leaf-assets/leaf-images/notice-bg.webp" alt="">
    <p class="leaf-nohidden-content-notice-text">呕吼，你想看的内容被隐藏了，回复一下来查看内容吧~~</p>
</div>';
        }
    }
}
add_shortcode('reply_view', 'cntent_reply_view');
