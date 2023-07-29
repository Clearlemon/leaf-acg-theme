<?php

class Comment
{

    public function init()
    {

        //
        add_filter('comment_text', array(__CLASS__, 'remove_kh'));

        //https://developer.wordpress.org/reference/hooks/comment_old_status_to_new_status/
        //当注释状态从一种特定状态转换到另一种状态时激发钩子。
        //add_action('comment_unapproved_to_approved',array($this,'comment_unapproved_to_approved_action'));

        //将评论插入数据库后立即激发钩子。
        //add_action('comment_post', array($this,'comment_unapproved_to_approved'));

        //add_filter('b2_comment_post_type', array(__CLASS__,'get_post_type'));

        //为评论时间降序排序方式
        add_filter('comments_template_query_args', function ($args) {
            $args['order'] = 'DESC';
            return $args;
        });
    }

    /**
     * 添加评论
     *
     * @param init [comment_post_ID] 文章id
     * @param string [comment] 评论正文
     * @param init [comment_parent] 评论父id
     * @param string [author] 
     * 
     * @return string 成功
     * @author icydm
     * @version 1.0.0
     * @since 2021
     */
    public static function send_comment($args)
    {

        $user_id = get_current_user_id();

        if (!$user_id) return array('error' => '请先登录之后再参与讨论');

        if (isset($args['_wp_unfiltered_html_comment'])) {
            unset($args['_wp_unfiltered_html_comment']);
        }

        if (strlen($args['comment']) < 2)  return array('error' => '评论字数过少！');

        //删除标签
        $args['comment'] = strip_tags($args['comment']);

        $comment = wp_handle_comment_submission(wp_unslash($args));

        if (is_wp_error($comment)) {
            return array('error' => $comment->get_error_messages());
        }

        $post_id = $args['comment_post_ID'];

        $comments = get_comments('post_id=' . $post_id . '&comment__in=' . $comment->comment_ID . '&include_unapproved=' . $user_id);

        $list = wp_list_comments(
            array(
                'callback' => array(__CLASS__, 'comment_callback'),
                'max_depth' => 2,
                'echo' => false
            ),
            $comments
        );

        unset($comment);
        return $list;
    }

    public static function comment_callback($comment, $args, $depth)
    {


        $user_id = $comment->user_id;

        //顶级评论id
        $top_comment_id = 0;

        //父评论
        if ($comment->comment_parent) {
            $comment_parent = get_comment($comment->comment_parent);
            $top_comment_id = $comment_parent->comment_ID;

            if ($comment_parent->comment_parent) {

                //$top_comment_id = $comment_parent->comment_parent;
                //获取顶级评论
                $top_comment_id = self::get_top_comment_id($comment_parent);

                $parent_user_data = get_userdata($comment_parent->user_id);

                unset($comment_parent);

                if ($parent_user_data) :

                    $parent_user = '回复 <a target="_blank" class="user-name" href="' . get_author_posts_url($parent_user_data->ID) . '">@' . trim(esc_attr($parent_user_data->display_name)) . '</a> ：';

                endif;
            }
        } else {
            $top_comment_id = $comment->comment_ID;
        }

        $id_html = "id=\"comment-$comment->comment_ID\"";
?>

        <li class="comment-item">
            <figure class="comment-avatar">
                <?php echo
                moe_get_avatar(array(
                    'src' => get_avatar_url($comment->user_id, 43),
                    'alt' => get_the_author_meta('display_name', $comment->user_id)
                ));
                ?>
            </figure>
            <div <?php echo $id_html; ?> class="comment-container">
                <div class="comment-user-info">
                    <?php echo self::get_comment_author($comment); ?>
                </div>
                <div class="comment-content" itemprop="text">
                    <div class="comment-content-text"><?php echo $parent_user;
                                                        comment_text(); ?></div>
                    <div class="comment-details">
                        <span class="comment-time"><?php echo moe_time_ago($comment->comment_date) ?></span>
                        <?php echo self::get_comment_vote($comment->comment_ID) ?>
                        <span class="comment-reply" onclick="moeComments.reply(<?php echo $comment->comment_ID ?>,<?php echo $top_comment_id ?>)">回复</span>
                    </div>
                    <?php echo self::get_comment_tags($comment) ?>
                </div>

        <? }

    public static function comment_callback_end()
    {
        echo '</div></li>';
    }

    //获取顶级评论
    public static function get_top_comment_id($comment)
    {
        $top_comment_id = $comment_parent->comment_parent;
        while ($comment->comment_parent) {
            $comment = get_comment($comment->comment_parent);
            $top_comment_id = $comment->comment_ID;
        }

        return $top_comment_id;
    }

    //获取评论列表
    public static function get_comment_list($data)
    {
        $paged = (int)$data['paged'];
        $post_id = (int)$data['post_id'];
        $user_id = get_current_user_id();

        if ($post_id) {
            $include_unapproved = $user_id;
        } else {
            $guest = wp_get_current_commenter();
            $include_unapproved = $guest['comment_author_email'] ? $guest['comment_author_email'] : 'empty';
        }

        //$term_list = wp_get_post_terms($postid, 'labtype', array('fields' => 'slugs'));

        $order = 'DESC'; //get_option('comment_order');

        $args = array(
            'post_id' => $post_id,
            'order'   => $order,
            'status'  => 'approve',
            'include_unapproved' => $include_unapproved,
        );

        //热门排序
        if (isset($data['orderby']) && $data['orderby']) {
            if (in_array($data['orderby'], array('moe_comment_like'))) {
                $args['orderby']  = 'meta_value_num';
                $args['meta_key'] = $data['orderby'];
            } else {
                $args['order'] = $data['orderby'];
            }
        }

        //只看作者
        if (!empty($data['author']) && $data['author'] === true) {
            $author = get_post_field('post_author', $post_id);
            $args['author__in']   = [$author];
            $args['hierarchical'] = false; //禁用二级评论
        }

        $comments = get_comments($args);


        $list = wp_list_comments(
            array(
                'callback' => array(__CLASS__, 'comment_callback'),
                'page' => $paged,
                'per_page' => get_option('comments_per_page'),
                'max_depth' => 2,
                'echo' => false
            ),
            $comments
        );

        $pages = get_comment_pages_count($comments);
        unset($comments);

        if ($list) {
            return array('data' => $list, 'pages' => $pages);
        } else {
            return array('error' => __('没有更多评论了', 'b2'));
        }
    }

    //获取评论用户
    public static function get_comment_author($comment)
    {

        $user_id = $comment->user_id;

        if (!$user_id) return (string)$comment->comment_author;

        //获取文章作者id
        $post_author = get_post_field('post_author', $comment->comment_post_ID);

        $user_data = get_userdata($user_id);

        $author = "";


        if ($user_data) {
            $author .= User::get_user_name_html($user_data->ID, $user_data->display_name); //'<a target="_blank" class="user-name" href="'.get_author_posts_url($user_data->ID).'">'.trim(esc_attr($user_data->display_name)).'</a>';
        } else {
            $author .= '<span class="user-none">已删除</span>';
        }

        //作者本人评论
        if ($user_id == $post_author) {
            //$author .= '<span class="comment-auth comment-auth-mod">作者</span>';
        }

        return $author;
    }

    /**
     * 过滤评论内容删除括号
     * 
     **/
    public static function remove_kh($comment_text)
    {
        $comment_text = str_replace(array('{{', '}}'), '', $comment_text);

        return wp_kses_post(self::comment_filters($comment_text));
    }

    //评论表情过滤替换
    public static function comment_filters($comment_text)
    {
        $arr = [];

        preg_match_all('/\[(.*?)\]/s', $comment_text, $matches);

        if (array_key_exists(1, $matches)) {
            $smilies =  moe_get_option('comment_smilies_arg');

            if (is_array($smilies) && $smilies) {
                foreach ($smilies as $value) {
                    if (!isset($arr[$value['size']])) {
                        $arr[$value['size']] = [];
                    }

                    $value['list'] && $arr[$value['size']] = array_merge(array_column($value['list'], 'icon', 'name'), $arr[$value['size']]);
                }
            }

            $encoded = array_map(function ($v) use ($arr) {
                foreach ($arr as $key => $value) {
                    if (isset($value[$v])) {
                        return '<img class="emoticon-image ' . $key . '" src="' . $value[$v] . '" alt="' . $v . '">';
                    }
                }
            }, $matches[1]);

            if (array_filter($encoded)) {
                return str_replace($matches[0], $encoded, $comment_text);
            }
        }

        return $comment_text;
    }

    //获取指定用户评论数量
    public static function get_user_comment_count($user_id)
    {
        global $wpdb;
        $count = $wpdb->get_var($wpdb->prepare('
                    SELECT COUNT(comment_ID) 
                    FROM ' . $wpdb->comments . ' 
                    WHERE user_id = %d', $user_id));
        return $count ? $count : 0;

        // $args = array(
        //     'user_id' => $user_id,
        //     'status'  => $comments_status,
        //     'count'   => true,
        // );
        // $count = get_comments($args);
    }

    /**
     * 评论投票
     *
     * @param string $type 投票类型 like dislike
     * @param init $comment_id 评论id
     * 
     * @return string 成功
     * @author icydm
     * @version 1.0.0
     * @since 2021
     */
    public static function comment_vote($type, $comment_id)
    {

        $user_id = get_current_user_id();
        if (!$user_id) return array('error' => '请先登录之后再参与参与投票哦！');

        $comment = get_comment((int)$comment_id);

        if (!$comment) return array('error' => '投票的评论不存在');

        //用户喜欢的评论
        $comment_likes = get_user_meta($user_id, 'moe_comment_likes', true);
        $comment_likes = is_array($comment_likes) ? $comment_likes : array();
        $key = array_search($comment_id, $comment_likes); //in_array()

        $comment_like = (int)get_comment_meta($comment_id, 'moe_comment_like', true);

        if ($key === false) {
            $comment_likes[] = $comment_id;
            $comment_like += 1;
        } else {
            unset($comment_likes[$key]);
            $comment_like -= 1;
        }

        update_user_meta($user_id, 'moe_comment_likes', $comment_likes);
        update_comment_meta($comment_id, 'moe_comment_like', $comment_like);

        return array('like' => $comment_like);
    }

    public static function get_comment_vote($comment_id)
    {
        if (!$comment_id) return;

        $user_id = get_current_user_id();

        $comment_likes = get_user_meta($user_id, 'moe_comment_likes', true);
        $comment_likes = is_array($comment_likes) ? $comment_likes : array();

        $is_like = in_array($comment_id, $comment_likes); //in_array()

        $comment_like = (int)get_comment_meta($comment_id, 'moe_comment_like', true);

        return '
            <span class="comment-like dislike ' . ($is_like  ? 'voted' : '') . '" onclick="moeComments.vote(\'like\',' . $comment_id . ',this)">
                <a href="javascript:void(0)"><i class="ri-thumb-up-line"></i><span> ' . $comment_like . '</span></a>
            </span>
        ';
    }

    public static function get_comment_tags($comment)
    {
        if (!$comment) return;

        //获取文章作者id
        $post_author = get_post_field('post_author', $comment->comment_post_ID);

        $comment_likes = get_user_meta($post_author, 'moe_comment_likes', true);
        $comment_likes = is_array($comment_likes) ? $comment_likes : array();

        if (in_array($comment->comment_ID, $comment_likes)) {
            return '
                <div class="comment-tags"><span>作者觉得很赞</span></div>
            ';
        }

        return;
    }

    /**
     * 获取指定用户的评论列表
     * 
     * @param int $user_id 用户ID
     * @param int $paged 当前页数
     * @param int $size 每页显示数量
     * 
     * @return array 包含评论信息的数组，如果出现错误则返回一个包含错误信息的数组
     */
    public static function get_user_comment_list($user_id, $paged, $size)
    {
        $user_id = (int)$user_id;
        $paged = (int)$paged;
        $size = (int)$size;

        if ($size > 20 || $size < 1) return array('error' => '请求数量错误');
        if ($paged < 0) return array('error' => '请求格式错误');

        // 设置查询参数
        $args = array(
            'user_id' => $user_id,
            'status' => 'approve',
            'number' => $size,
            'offset' => ($paged - 1) * $size,
            'orderby' => 'comment_date',
            'order' => 'DESC'
        );

        // 获取评论列表
        $comments = get_comments($args);

        // 存储评论信息的数组
        $comment_list = array();

        // 遍历评论列表，将每个评论的相关信息存储到数组中
        foreach ($comments as $comment) {
            $comment_post = get_post($comment->comment_post_ID);
            $comment_parent = get_comment($comment->comment_parent);
            print_r();
            $comment_list[] = array(
                'comment_post' => $comment_post ? array(
                    'id' => $comment->comment_post_ID,
                    'title' => $comment_post->post_title,
                    'link' => get_permalink($comment_post->ID),
                    'type' => $comment_post->post_type,
                ) : null,
                'comment' => array(
                    'id' => $comment->comment_ID,
                    'parent_id' => $comment->comment_parent,
                    'content' => $comment->comment_content,
                    'date' => moe_time_ago($comment->comment_date, true),
                    'post_id' => $comment->comment_post_ID
                ),
                'comment_parent' => $comment_parent ? array(
                    'id' => $comment_parent->comment_ID,
                    'parent_id' => $comment_parent->comment_parent,
                    'content' => $comment_parent->comment_content,
                    'date' => moe_time_ago($comment_parent->comment_date, true),
                    'post_id' => $comment_parent->comment_post_ID
                ) : null,
            );
        }

        global $wpdb;
        $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(comment_ID) AS total FROM $wpdb->comments WHERE comment_approved = 1 AND user_id = %s", $user_id));

        // 返回评论信息的数组
        return array(
            'pages' => ceil($count / $size),
            'data' => $comment_list
        );
    }
}
