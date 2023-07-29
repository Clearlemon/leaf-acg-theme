<?php
//相关文章
function leaf_single_related_article_slider()
{
    echo '114514';
}

//文章点赞功能
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
add_action('wp_ajax_bigfa_like', 'bigfa_like');
function bigfa_like()
{
    global $wpdb, $post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ($action == 'ding') {
        $bigfa_raters = get_post_meta($id, 'bigfa_ding', true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('bigfa_ding_' . $id, $id, $expire, '/', $domain, false);
        if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
            update_post_meta($id, 'bigfa_ding', 1);
        } else {
            update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
        }

        echo get_post_meta($id, 'bigfa_ding', true);
    }

    die;
}

// 添加上一篇和下一篇文章链接
function leaf_custom_previous_next_links()
{
    //获取上一篇文章的ID
    $previous_post = get_previous_post();
    //获取下一篇文章的ID
    $next_post = get_next_post();
    //进行上一篇或者下一篇来判断

    if ($previous_post || $next_post) {
        echo '<div class="lea_fprevious_next_links">';
        //如果上一篇有文章的话则输出这些html，如果没有则不会输出相关内容
        if ($previous_post) {
            echo '<div class="leaf_previous_post_link_title_block"><a href="' . get_permalink($previous_post->ID) . '">';
            echo '<img class="leaf_fprevious_next_img" src="' . leaf_featured_image(get_the_ID()) . '">';
            echo '<span class="leaf_previous_post_link_text"><svg t="1690439328619" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5569" width="20" height="20">
                    <path d="M0 0h1024v1024H0V0z" fill="#202425" opacity=".01" p-id="5570"></path>
                    <path d="M122.402133 560.264533a68.266667 68.266667 0 0 1 0-96.529066l307.2-307.2a68.266667 68.266667 0 1 1 96.529067 96.529066L335.4624 443.733333H853.333333a68.266667 68.266667 0 1 1 0 136.533334H335.4624l190.6688 190.6688a68.266667 68.266667 0 1 1-96.529067 96.529066l-307.2-307.2z" fill="#1296db" p-id="5571" data-spm-anchor-id="a313x.7781069.0.i0" class="selected"></path>
                </svg>上一篇</span>';
            echo '<span class="leaf_previous_post_link_title">【' . $previous_post->post_title . '】</span>';
            echo '</a></div>';
        }
        //如果下一篇有文章的话则输出这些html，如果没有则不会输出相关内容
        if ($next_post) {
            echo '<div class="leaf_next_post_link_title_block"><a href="' . get_permalink($next_post->ID) . '">';
            echo '<span class="leaf_next_post_link_text">下一篇<svg t="1690439475629" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6583" width="20" height="20">
                    <path d="M0 0h1024v1024H0V0z" fill="#202425" opacity=".01" p-id="6584"></path>
                    <path d="M901.597867 463.735467a68.266667 68.266667 0 0 1 0 96.529066l-307.2 307.2a68.266667 68.266667 0 1 1-96.529067-96.529066L688.5376 580.266667H170.666667a68.266667 68.266667 0 1 1 0-136.533334h517.870933l-190.6688-190.6688a68.266667 68.266667 0 1 1 96.529067-96.529066l307.2 307.2z" fill="#1296db" p-id="6585" data-spm-anchor-id="a313x.7781069.0.i4" class="selected"></path>
                </svg></span>';
            echo '<span class="leaf_next_post_link_title">【' . $next_post->post_title . '】</span>';
            echo '<img class="leaf_fprevious_next_img" src="' . leaf_featured_image(get_the_ID()) . '">';
            echo '</a></div>';
        }
        echo '</div>';
    }
}

/**
 *[判断图片并输出特色图功能] 判断并获取文章的缩略图 输出顺序为 特色图 > 第一张图片 > 默认随机图
 *
 * @param int $post_id 获取到的文章的ID
 * 
 * @param int $first_image 用于输出是 特色图  第一张图片 默认随机图 其中一个图片
 * 
 * @return string $thumbnail_id 获取文章内的特色图并判断是否存在
 * 
 * @return string $first_image 经过所有的判断输出最终的图片
 * 
 **/
function leaf_featured_image($post_id)
{
    //获取文章的ID
    $post = get_post($post_id);
    // 设置一个初始值设定或返回默认值
    $first_image = '';

    //检查当前文章内是否有特色图片，如果有的话则存于$first_image中，如果没有就不执行
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        $first_image = wp_get_attachment_url($thumbnail_id);
    }

    // 查找文章内容中的第一张图片
    if (has_block('image', $post->post_content)) {
        $blocks = parse_blocks($post->post_content);
        foreach ($blocks as $block) {
            if ($block['blockName'] === 'core/image') {
                $first_image = $block['attrs']['url'];
                break;
            }
        }
    }

    // 如果文章内容中没有图片，则获取特色图片
    if (!$first_image) {
        $thumbnail_id = get_post_thumbnail_id($post_id);
        if ($thumbnail_id) {
            $first_image = wp_get_attachment_url($thumbnail_id);
        }
    }

    if (!$first_image) {
        return 'https://api.amogu.cn/api/acg';
    }

    return $first_image;
}
