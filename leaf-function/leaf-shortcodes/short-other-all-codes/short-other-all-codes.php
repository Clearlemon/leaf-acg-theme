<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'my_shortcodes';
    $img = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/';

    //
    // Create a shortcoder
    CSF::createShortcoder($prefix, array(
        'button_title' => 'Leaf-[增强短代码]',
        'select_title' => 'Leaf-[增强短代码]',
        'insert_title' => '添加短代码',
        'show_in_editor' => true,

    ));


    //
    // Another basic shortcode
    CSF::createSection($prefix, array(
        'title'     => '网盘下载',
        'view'      => 'normal',
        'shortcode' => 'cloud',
        'fields'    => array(
            array(
                'id'    => 'title',
                'type'  => 'text',
                'title' => '标题',
            ),
            array(
                'id'        => 'category',
                'type'      => 'image_select',
                'title'     => '网盘分类',
                'options'   => array(
                    'cloud_123pan' => $img . 'short-other-all-codes/cloud-demo-img/cloud_123pan.png',
                    'cloud_ali' => $img . 'short-other-all-codes/cloud-demo-img/cloud_ali.png',
                    'cloud_alist' => $img . 'short-other-all-codes/cloud-demo-img/cloud_alist.png',
                    'cloud_baidu' => $img . 'short-other-all-codes/cloud-demo-img/cloud_baidu.png',
                    'cloud_chengtong' => $img . 'short-other-all-codes/cloud-demo-img/cloud_chengtong.png',
                    'cloud_kuake' => $img . 'short-other-all-codes/cloud-demo-img/cloud_kuake.png',
                    'cloud_lanzouyun' => $img . 'short-other-all-codes/cloud-demo-img/cloud_lanzouyun.png',
                    'cloud_onedrive' => $img . 'short-other-all-codes/cloud-demo-img/cloud_onedrive.png',
                    'cloud_tianyiyun' => $img . 'short-other-all-codes/cloud-demo-img/cloud_tianyiyun.png',
                    'cloud_xunlei' => $img . 'short-other-all-codes/cloud-demo-img/cloud_xunlei.png',
                ),
                'default'   => 'value-2'
            ),
            array(
                'id'    => 'url',
                'type'  => 'text',
                'title' => '链接地址',
            ),
            array(
                'id'    => 'jy',
                'type'  => 'text',
                'title' => '解压码',
            ),
            array(
                'id'    => 'tq',
                'type'  => 'text',
                'title' => '提取码',
            ),
            array(
                'id'    => 'content',
                'type'  => 'text',
                'class' => 'leaf-no-options-shortcodes',
                'title' => '内容',
            ),
        )
    ));

    CSF::createSection($prefix, array(
        'title'     => '资源介绍',
        'view'      => 'normal', // View model of the shortcode. `normal` `contents` `group` `repeater`
        'shortcode' => 'my_shortcode', // Set a unique slug-like name of shortcode.
        'fields'    => array(
            array(
                'id'    => 'title',
                'type'  => 'text',
                'title' => 'Titlte',
            ),
            array(
                'id'    => 'switcher',
                'type'  => 'switcher',
                'title' => 'Switcher',
            ),
            array(
                'id'    => 'content',
                'type'  => 'textarea',
                'title' => 'Content',
            ),
        )
    ));
}


//输出短代码
function content_cloud($atts, $content = null)
{
    // 获取标题和颜色
    $atts = shortcode_atts(array(
        'title' => '', // 设置默认标题为空
        'color' => '', // 设置默认颜色为空
    ), $atts);

    $title = $atts['title'];
    $color = $atts['color'];

    // 输出带有标题和颜色的内容
    return '<div style="color: ' . esc_attr($color) . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('cloud', 'content_my_shortcode');
