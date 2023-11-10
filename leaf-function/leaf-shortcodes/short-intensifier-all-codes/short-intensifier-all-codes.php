<?php
//短代码函数文件
if (class_exists('CSF')) {

    $prefix = 'my_shortcodes';
    $img = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-intensifier-all-codes/';

    CSF::createShortcoder($prefix, array(
        'button_title' => 'Leaf-[短代码增强]',
        'select_title' => 'Leaf-[短代码增强]',
        'insert_title' => '添加短代码',
        'show_in_editor' => true,

    ));

    CSF::createSection($prefix, array(
        'title'     => 'Leaf-网盘下载',
        'view'      => 'normal',
        'shortcode' => 'cloud',
        'fields'    => array(
            array(
                'id'    => 'title',
                'type'  => 'text',
                'title' => '标题',
                'help' => '<img src="' . $img . 'short-codes-demo-all/logo_bgq.png">',
            ),
            array(
                'id'        => 'category',
                'type'      => 'image_select',
                'title'     => '网盘分类',
                'options'   => array(
                    'cloud_123pan' => $img . 'cloud-demo-img/cloud_123pan.png',
                    'cloud_ali' => $img . 'cloud-demo-img/cloud_ali.png',
                    'cloud_alist' => $img . 'cloud-demo-img/cloud_alist.png',
                    'cloud_baidu' => $img . 'cloud-demo-img/cloud_baidu.png',
                    'cloud_chengtong' => $img . 'cloud-demo-img/cloud_chengtong.png',
                    'cloud_kuake' => $img . 'cloud-demo-img/cloud_kuake.png',
                    'cloud_lanzouyun' => $img . 'cloud-demo-img/cloud_lanzouyun.png',
                    'cloud_onedrive' => $img . 'cloud-demo-img/cloud_onedrive.png',
                    'cloud_tianyiyun' => $img . 'cloud-demo-img/cloud_tianyiyun.png',
                    'cloud_xunlei' => $img . 'cloud-demo-img/cloud_xunlei.png',
                ),
                'default'   => 'cloud_123pan'
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
        'title'     => 'Leaf-网站卡片',
        'view'      => 'normal',
        'shortcode' => 'my_shortcode',
        'fields'    => array(
            array(
                'id'         => 'card-set',
                'type'       => 'button_set',
                'title'      => '获取文章选择',
                'options'    => array(
                    'enabled'  => '一键获取',
                    'disabled' => '自定义',
                ),
                'default'    => 'enabled'
            ),

            array(
                'id'          => 'post',
                'type'        => 'select',
                'title'       => '输入你想要插入的文章名',
                'placeholder' => '输入你想要插入的文章名',
                'desc' => '请输入你的<b class="leaf_emphasis_fonts">[文章名]</b>',
                //'class' => 'fields_no_padding-top',
                'chosen'      => true,
                'ajax'        => true,
                'multiple'    => true,
                'sortable'    => true,
                'options'     => 'posts',
                //'dependency' => array('home_filter_loading', '==', true),
                'settings' => array(
                    'min_length'  => 1,
                ),
            ),
            array(
                'id'    => 'content',
                'type'  => 'text',
                'class' => 'leaf-no-options-shortcodes',
                'title' => 'Content',
            ),
        )
    ));

    CSF::createSection($prefix, array(
        'title'     => 'Leaf-网址导航',
        'view'      => 'normal',
        'shortcode' => 'my_shortcode',
        'fields'    => array()
    ));
}


//输出网盘下载短代码函数
function content_cloud($atts, $content = null)
{
    // 获取标题和颜色
    $atts = shortcode_atts(array(
        'title' => '', // 设置默认标题为空
        'url' => '',
        'jy' => '',
        'tq' => '',
        'category' => '',
    ), $atts);

    $img = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-intensifier-all-codes/';
    $title = $atts['title'];
    $url = $atts['url'];
    $jy = $atts['jy'];
    $tq = $atts['tq'];
    $category = $atts['category'];
    // 输出带有标题和颜色的内容
    if ($category == 'cloud_123pan') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_123pan.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_ali') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_ali.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_alist') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_alist.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_baidu') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_baidu.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_chengtong') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_chengtong.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_kuake') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_kuake.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_onedrive') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_onedrive.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_lanzouyun') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_lanzouyun.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_tianyiyun') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_tianyiyun.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    } elseif ($category == 'cloud_xunlei') {
        // 使用 $jy_empty 和 $tq_empty 变量来存储是否 $jy 和 $tq 为空的结果
        $jy_empty = empty($jy);
        $tq_empty = empty($tq);

        // 构建字符串时根据 $jy 和 $tq 是否为空，添加不同的内容
        $output = '<div class="leaf_cloud_down_block">
    <div class="leaf_cloud_content_link">
    <div class="leaf_cloud_content_block">
    <div class="leaf_cloud_content_img_block"><img class="leaf_cloud_content_img" src="' . $img . '/cloud-demo-img/cloud_xunlei.png"></div>
    <div class="leaf_cloud_content_title_jy_tq_block">
    <div class="leaf_cloud_content_title">' . esc_html($title) . '</div>
    <div class="leaf_cloud_content_jy_tq">';

        if ($jy_empty && $tq_empty) {
            // 当 $jy 和 $tq 都为空时，不显示任何内容
        } elseif ($jy_empty) {
            // 当 $jy 为空时，只显示解压码
            $output .= '解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        } elseif ($tq_empty) {
            // 当 $tq 为空时，只显示提取码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>';
        } else {
            // 当 $jy 和 $tq 都不为空时，同时显示提取码和解压码
            $output .= '提取码：<span class="lead_cloud_tq">' . esc_html($jy) . '</span><i class="fa-solid fa-copy"></i>解压码：<span class="lead_cloud_jy">' . esc_html($tq) . '</span><i class="fa-solid fa-clone"></i>';
        }

        $output .= '</div>
    </div>
    </div>
    <div class="leaf_cloud_link_block"><a href="' . esc_html($url) . ' " target="_blank"><span class="leaf_cloud_link_text"><i class="fa-solid fa-download"></i>网盘下载<span></a></div>
    </div>
    </div>';

        return $output;
    }
}
add_shortcode('cloud', 'content_cloud');
