<?php
//自定义评论样式
function leaf_comments_module($comment, $args, $depth)
{
    $avatar_url = get_avatar_url($comment, array('size' => 48));

    //  获取当前评论的 ID 和父评论 ID
    $comment_id = $comment->comment_ID;
    $parent_comment_id = $comment->comment_parent;

    // 判断是否有父评论，即是否为回复评论
    $is_reply = $parent_comment_id !== '0';


    // 获取当前评论下的子评论数
    $child_comments = get_comments(array(
        'parent' => $comment_id,
        'status' => 'approve', // 只获取已审核的子评论
    ));
    $child_comments_count = count($child_comments);

    // 根据子评论数判断是否添加自定义 class
    $comment_container_class = ($child_comments_count > 0) ? 'leaf_comments_all_raly_li' : 'leaf_comments_all_li';





    if ($is_reply) {
        // 判断是否为第1个、第3个、第5个...回复评论
        static $reply_comment_count = 0; // 静态变量用于计数回复评论
        $reply_comment_count++;
        if ($is_reply && $reply_comment_count % 2 === 1) {
?>
            <li class="leaf_comments_all_raly_li_right">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('你的评论还在审核当中哦~'); ?></em>
                    <br />
                <?php endif; ?>
                <div class="leaf_time_name_ip_text_comment_inside_block_raly_li_right">
                    <div class="replyuser_and_user_block_raly_li_right">
                        <p class="leaf_user_name_comment_inside_block_raly_li_right"><?php printf(get_comment_author()); ?></p>
                    </div>
                    <div class="leaf_user_reply_text__inside_block_raly_li_right">
                        <?php comment_text(); ?>
                        <?php if ($is_reply) {
                            $parent_comment = get_comment($parent_comment_id);
                            $parent_comment_author = $parent_comment->comment_author;
                            echo '<p class="leaf_user_other_name_comment_inside_block_raly_li_right">:' . esc_html($parent_comment_author) . '@</p>';
                        } ?>
                    </div>
                    <div class="leaf_time_browser_ip_comments_inside_all_block_raly_li_right">
                        <div class="leaf_reply_comments_inside_block_raly_li_right">
                            <?php
                            comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                            ?>
                        </div>
                        <div class="leaf_time_browser_ip_comments_inside_block_raly_li_right">

                            <?php edit_comment_link(__('Edit'), '  ', ''); ?>
                            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                <?php
                                printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="leaf_user_comments_inside_block">
                    <img class="leaf_user_avatar_img_comments_inside" src="<?php echo $avatar_url; ?>" alt="">
                </div>
            </li>
        <?php
        } else { ?>
            <li class="<?php echo esc_attr($comment_container_class); ?>">
                <div class="leaf_user_comments_inside_block">
                    <img class="leaf_user_avatar_img_comments_inside" src="<?php echo $avatar_url; ?>" alt="">
                </div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('你的评论还在审核当中哦~'); ?></em>
                    <br />
                <?php endif; ?>
                <div class="leaf_time_name_ip_text_comment_inside_block">
                    <div class="replyuser_and_user_block">
                        <p class="leaf_user_name_comment_inside_block"><?php printf(get_comment_author()); ?></p>
                    </div>
                    <div class="leaf_user_reply_text__inside_block">
                        <?php if ($is_reply) {
                            $parent_comment = get_comment($parent_comment_id);
                            $parent_comment_author = $parent_comment->comment_author;
                            echo '<p class="leaf_user_other_name_comment_inside_block">@' . esc_html($parent_comment_author) . ':</p>';
                        } ?><?php comment_text(); ?>
                    </div>
                    <div class="leaf_time_browser_ip_comments_inside_all_block">
                        <div class="leaf_time_browser_ip_comments_inside_block">
                            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                <?php
                                printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
                                ?>
                            </a>
                            <?php edit_comment_link(__('Edit'), '  ', ''); ?>
                        </div>
                        <div class="leaf_reply_comments_inside_block">
                            <?php
                            comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                            ?>
                        </div>
                    </div>
                </div>

            </li>

        <?php }
    } else { ?>
        <li class="<?php echo esc_attr($comment_container_class); ?>">
            <div class="leaf_user_comments_inside_block">
                <img class="leaf_user_avatar_img_comments_inside" src="<?php echo $avatar_url; ?>" alt="">
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('你的评论还在审核当中哦~'); ?></em>
                <br />
            <?php endif; ?>
            <div class="leaf_time_name_ip_text_comment_inside_block">
                <div class="replyuser_and_user_block">
                    <p class="leaf_user_name_comment_inside_block"><?php printf(get_comment_author()); ?></p>
                </div>
                <?php comment_text(); ?>
                <div class="leaf_time_browser_ip_comments_inside_all_block">
                    <div class="leaf_time_browser_ip_comments_inside_block">
                        <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                            <?php
                            printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
                            ?>
                        </a>
                        <?php edit_comment_link(__('Edit'), '  ', ''); ?>
                    </div>
                    <div class="leaf_reply_comments_inside_block">
                        <?php
                        comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                        ?>
                    </div>
                </div>
            </div>
        </li>
<?php
    }
}
