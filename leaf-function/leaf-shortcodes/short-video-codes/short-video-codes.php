<?php
//哔哩哔哩视频
function content_video_bilibili($atts, $content = null)
{
    // 构建输出内容
    $atts = shortcode_atts(array(
        'url' => '', // 设置默认标题为空
    ), $atts);

    $url = $atts['url'];

    $output = '<iframe height="80%" width="100%" src="//player.bilibili.com/player.html?bvid=' . esc_html($url) . '&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true" sandbox="allow-top-navigation allow-same-origin allow-forms allow-scripts"></iframe>';
    return $output;
}
add_shortcode('bilibili', 'content_video_bilibili');
//腾讯视频
function content_video_tencent($atts, $content = null)
{
    // 构建输出内容
    $atts = shortcode_atts(array(
        'url' => '', // 设置默认标题为空
    ), $atts);

    $url = $atts['url'];

    $output = '<iframe height="80%" width="100%" frameborder="0" src="https://v.qq.com/txp/iframe/player.html?vid=' . esc_html($url) . '&amp;width=500&amp;height=375&amp;auto=0" allowfullscreen="" frameborder="0" height="40%" width="100%"></iframe>';
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
                </video>
    <script>
        let vs = document.getElementById("videoAr");
        const player = new Plyr(vs, {
            i18n: {
                speed: "速度",
                normal: "正常",
            },
            loop: {
                active: true
            },
            speed: {
                selected: 1,
                options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 3, 4],
            },
            disableContextMenu: true
        });
    </script>';
    return $output;
}
add_shortcode('leafvideo', 'content_video_leaf');
