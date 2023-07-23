<?php
//哔哩哔哩视频
function content_video_bilibili($atts, $content = null)
{
    // 构建输出内容
    $atts = shortcode_atts(array(
        'url' => '', // 设置默认标题为空
    ), $atts);

    $url = $atts['url'];

    $output = '<iframe height="40%" width="100%" src="//player.bilibili.com/player.html?bvid=' . esc_html($url) . '&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true" sandbox="allow-top-navigation allow-same-origin allow-forms allow-scripts"></iframe>';
    return $output;
}
add_shortcode('bilibili', 'content_video_bilibili');
//优酷视频
function content_video_youku($atts, $content = null)
{
    // 构建输出内容
    $atts = shortcode_atts(array(
        'url' => '', // 设置默认标题为空
    ), $atts);

    $url = $atts['url'];

    $output = '<iframe height="40%" width="100%" src="https://player.youku.com/embed/' . esc_html($url) . '" frameborder="0" allowfullscreen></iframe>';
    return $output;
}
add_shortcode('youku', 'content_video_youku');
//腾讯视频
function content_video_tencent($atts, $content = null)
{
    // 构建输出内容
    $atts = shortcode_atts(array(
        'url' => '', // 设置默认标题为空
    ), $atts);

    $url = $atts['url'];

    $output = '<iframe height="40%" width="100%" frameborder="0" src="https://v.qq.com/txp/iframe/player.html?vid=' . esc_html($url) . '&amp;width=500&amp;height=375&amp;auto=0" allowfullscreen="" frameborder="0" height="40%" width="100%"></iframe>';
    return $output;
}
add_shortcode('tencent', 'content_video_tencent');
//自定义视频
function content_video_leaf($atts, $content = null)
{
    // 构建输出内容
    $atts = shortcode_atts(array(
        'url' => '', // 设置默认标题为空
        'src' => '',
    ), $atts);

    $url = $atts['url'];
    $src = $atts['src'];

    $output = '<video id="videoAr" poster="' . esc_html($src) . '" data-poster="' . esc_html($src) . '">
                    <source src="' . esc_html($url) . '">
                </video>';
    return $output;
}
add_shortcode('leafvideo', 'content_video_leaf');
