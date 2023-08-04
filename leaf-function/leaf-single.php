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
 * @param int $first_image 用于输出是 特色图  第一张图片 默认随机图 其中一个图片
 * 
 * @return string $thumbnail_id 获取文章内的特色图并判断是否存在
 * 
 * @return string $first_image 经过所有的判断输出最终的图片
 * 
 **/

function leaf_featured_image($post_id)
{
    // 设置一个初始值设定或返回默认值
    $first_image = '';
    $leaf_diy_thumbnail = _leaf_post('leaf_post_thumbnail_img', '');

    // 获取文章模块功能的缩略图
    if ($leaf_diy_thumbnail) {
        $first_image = $leaf_diy_thumbnail;
    }

    // 获取文章内容
    $post_content = get_post_field('post_content', $post_id);

    // 使用正则表达式匹配文章内容中的第一个 img 标签的 src 属性
    preg_match('/<img[^>]*src=["\']([^"\']+)["\'][^>]*>/', $post_content, $matches);

    if (!empty($matches)) {
        // 从匹配的 img 标签中提取图片的 URL
        $first_image = $matches[1];
    }

    // 如果文章内容中没有图片，则获取特色图片
    if (!$first_image) {
        $thumbnail_id = get_post_thumbnail_id($post_id);
        if ($thumbnail_id) {
            $first_image = wp_get_attachment_url($thumbnail_id);
        }
    }

    if (!$first_image) {
        return 'http://localhost/wp-content/themes/leaf-acg-theme/leaf-api/leaf-acg-img-api/acg.php';
    }

    return $first_image;
}


//适用于三张图片的文章样式的缩略图
function leaf_featured_many_image($post_id, $img_number = 1)
{
    // 设置一个初始值设定或返回默认值
    $first_image = '';

    // 获取文章内容
    $post_content = get_post_field('post_content', $post_id);

    // 使用正则表达式匹配文章内容中的 img 标签的 src 属性
    preg_match_all('/<img[^>]*src=["\']([^"\']+)["\'][^>]*>/', $post_content, $matches);

    if (!empty($matches[1])) {
        // 获取指定位置的图片的 URL
        if (isset($matches[1][$img_number - 1])) {
            $first_image = $matches[1][$img_number - 1];
        }
    }


    if (!$first_image) {
        return 'http://localhost/wp-content/themes/leaf-acg-theme/leaf-api/leaf-acg-img-api/acg.php';
    }

    return $first_image;
}

//自定义文章首页的摘要输出，默认为55字符
function leaf_post_excerpt($excerpt_length = 55)
{
    global $post; // 确保获取全局的 $post 对象
    $excerpt = '';

    if ($post) {
        $excerpt = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, $excerpt_length, '…');
    }

    return $excerpt;
}
//发布时间设置
function leaf_post_time()
{
    global $post;

    // 获取文章的发布时间（以Unix时间戳格式表示）
    $post_time = strtotime(get_the_time('Y-m-d H:i:s', $post->ID));

    // 获取当前时间的时间戳
    $current_time = current_time('timestamp');

    // 计算时间差（单位：秒）
    $diff = abs($current_time - $post_time);

    // 根据时间差大小显示相应的时间提示
    if ($diff < 60) {
        $time = sprintf(_n('%s秒前', '%s秒前', $diff), $diff);
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        $time = sprintf(_n('%s分钟前', '%s分钟前', $mins), $mins);
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        $time = sprintf(_n('%s小时前', '%s小时前', $hours), $hours);
    } elseif ($diff < 2592000) {
        $days = floor($diff / 86400);
        $time = sprintf(_n('%s天前', '%s天前', $days), $days);
    } elseif ($diff < 31536000) {
        $months = floor($diff / 2592000);
        $time = sprintf(_n('%s个月前', '%s个月前', $months), $months);
    } else {
        $years = floor($diff / 31536000);
        $time = sprintf(_n('%s年前', '%s年前', $years), $years);
    }

    return $time;
}
add_filter('the_time', 'leaf_post_time');

//文章作者头像获取
function leaf_post_user_avatar()
{
    $author_avatar_url = get_avatar_url(get_the_author_meta('user_email'));
    echo $author_avatar_url;
}

//文章的标签获取
function leaf_post_tag($tages_number_many = 6)
{
    $tags = get_the_tags();
    if ($tags) {
        $tages_number = 1;
        foreach ($tags as $tag) {
            // 输出每个标签的名称和链接
            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '"><span class="leaf_posting_classify_' . $tages_number . ' leaf_posting_classify_all">' . esc_html($tag->name) . '</span></a>';
            $tages_number++;
            if ($tages_number > $tages_number_many) {
                break; // 当标签数量超过6个时，跳出循环
            }
        }
    }
}

// 获取文章的阅读次数
function get_post_views($post_id)
{

    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }

    echo number_format_i18n($count);
}

// 设置更新文章的阅读次数
function set_post_views()
{

    global $post;

    $post_id = $post->ID;
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);

    if (is_single() || is_page()) {

        if ($count == '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
    }
}
add_action('get_header', 'set_post_views');

//获取上一篇的图片函数

//获取上一篇的图片函数

//获取文章的副标题
function leaf_post_deputy_title()
{
    $deputy_title = _leaf_post('leaf-post-deputy-title', '');


    if ($deputy_title != '') {
        echo $deputy_title;
    }
}
function leaf_post_deputy_color()
{
    $deputy_title_color = _leaf_post('leaf_post_deputy_title_color', '');
    $deputy_title_color_diy = _leaf_post('leaf_post_deputy_title_color_skin', '');

    if ($deputy_title_color != '') {
        echo '#' . $deputy_title_color_diy;
    }
    if ($deputy_title_color_diy != '') {
        echo $deputy_title_color;
    }
}
//获取文章的背景图
function leaf_post_background_img()
{
    $background_img = _leaf_post('leaf_post_backgroundimg', '');
    if ($background_img != '') {
        echo 'background-image: url(' . $background_img . ');';
    }
}
//首页文章获取上下页功能
function leaf_custom_pagination()
{
    global $wp_query;

    $big = 999999999; // 需要一个足够大的数字，确保所有页面都能显示在分页中

    // 获取当前页码
    $current_page = max(1, get_query_var('paged'));

    // 获取首页链接
    $home_url = esc_url(home_url('/'));

    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'current' => $current_page,
        'mid_size' => 2,
        'prev_text' => '',
        'next_text' => '下一页',
    ));

    // 添加上一页链接到分页字符串之前
    if (is_paged()) {
        if ($paginate_links) {
            $prev_text = '<a class="prev" href="' . ($current_page > 1 ? get_pagenum_link($current_page - 1) : $home_url) . '">上一页</a>';
            $paginate_links = $prev_text . $paginate_links;
        }
    }

    // 输出分页链接
    if ($paginate_links) {
        echo '<div class="leaf-custom-pagination">';
        echo $paginate_links;
        echo '</div>';
    }
}
