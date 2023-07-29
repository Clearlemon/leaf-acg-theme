
<div class="leaf_single_comments_all_block">
    <form method="post" id="commentform" class="comment-form">
        <div class="leaf_comments_avatar_form">
            <div class="leaf_comments_avatar_name_block">
                <img class="leaf_comments_avatar_img" src="https://www.asukatea.cc/wp-content/uploads/2022/12/QQ图片20211210225957.webp" alt="">
                <p class="leaf_comments_avatar_name"></p>
            </div>
            <div class="leaf_comments_form_url_mail_name_expression_all_block">
                <div class="leaf_comments_form_expression_block">
                    <?php if (is_user_logged_in()) : ?>
                    <?php else : ?>
                        <div class="leaf_comments_form_url_mail_name_block">
                            <div class="leaf_comments_all_block">
                                <p class="leaf_comments_name_title">用户名：
                                    <input class="leaf_comments_url leaf_comments_form_all" type="text" name="author" id="author" value="<?php echo esc_attr($commenter['comment_author']); ?>" <?php if ($req) echo 'required'; ?>>
                                </p>
                            </div>
                            <div class="leaf_comments_all_block">
                                <p class="leaf_comments_mail_title">邮箱：
                                    <input class="leaf_comments_url leaf_comments_form_all" type="email" name="email" id="email" value="<?php echo esc_attr($commenter['comment_author_email']); ?>" <?php if ($req) echo 'required'; ?>>
                                </p>
                            </div>
                            <div class="leaf_comments_all_block">
                                <p class="leaf_comments_url_title">网站链接：
                                    <input class="leaf_comments_url leaf_comments_form_all" type="url" name="url" id="url" value="<?php echo esc_attr($commenter['comment_author_url']); ?>">
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <textarea class="leaf_comments_form" name="comment" id="comment" rows="5" required placeholder="来说说你的感受？"></textarea>
                    <div class="leaf_comments_expression_submit">
                        <div class="leaf_comments_expression_text_img">
                            <!-- <span class="leaf_expression_img"><svg t="1690551362500" class="leaf_comments_icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7628" width="16" height="16">
                                    <path d="M512 0C229.7 0 0 229.7 0 512s229.7 512 512 512 512-229.7 512-512S794.3 0 512 0z m0 952.6C269.1 952.6 71.4 754.9 71.4 512S269.1 71.4 512 71.4 952.6 269.1 952.6 512 754.9 952.6 512 952.6z" fill="#27D0D8" p-id="7629"></path>
                                    <path d="M255.60483 411.159939a59.5 59.5 0 1 0 84.144238-84.147175 59.5 59.5 0 1 0-84.144238 84.147175Z" fill="#27D0D8" p-id="7630"></path>
                                    <path d="M684.216818 411.198881a59.5 59.5 0 1 0 84.144239-84.147175 59.5 59.5 0 1 0-84.144239 84.147175Z" fill="#27D0D8" p-id="7631"></path>
                                    <path d="M650.8 563.1c-14.2 13.7-14.5 36.3-0.8 50.5 10.9 11.2 16.8 26 16.8 41.6 0 15.9-6.3 30.8-17.5 42s-26.1 17.3-42 17.3h-0.2c-15.9 0-30.8-6.3-42-17.5-11.2-11.3-17.4-26.2-17.3-42.1v-23.8c0-19.7-16-35.7-35.7-35.7s-35.7 16-35.7 35.7v23.8c0 15.6-5.9 30.3-16.8 41.6-11.1 11.4-25.9 17.9-41.8 18.1-15.2-0.4-30.9-5.7-42.4-16.8-23.6-22.8-24.2-60.6-1.3-84.2 13.7-14.2 13.4-36.8-0.8-50.5s-36.8-13.4-50.5 0.8c-50.3 51.9-49 135 2.9 185.2 24.6 23.9 56.9 37 91.1 37h2.1c35-0.6 67.7-14.7 92-39.8 0.4-0.4 0.8-0.8 1.2-1.3 0.8 0.9 1.6 1.7 2.4 2.5 24.7 24.8 57.5 38.5 92.5 38.6h0.3c34.9 0 67.7-13.5 92.4-38.1 24.8-24.7 38.5-57.5 38.6-92.5 0.1-34.3-13-66.8-36.9-91.5-13.8-14.3-36.4-14.6-50.6-0.9z" fill="#27D0D8" p-id="7632"></path>
                                </svg></span>
                            <span class="leaf_expression_img"><svg t="1690554731294" class="leaf_comments_icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="12170" width="14" height="14">
                                    <path d="M137 137m50 0l650 0q50 0 50 50l0 50q0 50-50 50l-650 0q-50 0-50-50l0-50q0-50 50-50Z" fill="#1AA5FF" p-id="12171"></path>
                                    <path d="M437 237m50 0l50 0q50 0 50 50l0 550q0 50-50 50l-50 0q-50 0-50-50l0-550q0-50 50-50Z" fill="#1AA5FF" p-id="12172"></path>
                                    <path d="M137 137m50 0l50 0q50 0 50 50l0 150q0 50-50 50l-50 0q-50 0-50-50l0-150q0-50 50-50Z" fill="#1AA5FF" p-id="12173"></path>
                                    <path d="M737 137m50 0l50 0q50 0 50 50l0 150q0 50-50 50l-50 0q-50 0-50-50l0-150q0-50 50-50Z" fill="#1AA5FF" p-id="12174"></path>
                                </svg></span> -->
                            <div></div>
                        </div>
                        <div class="leaf_comments_submit_button"><input id="submit" type="submit" name="submit" class="leaf_submit" value="提交评论"></div>
                    </div>
                </div>
            </div>
        </div>
        <p class="form-submit">
            <?php comment_id_fields(); ?>
        </p>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php

    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die('Please do not load this page directly. Thanks!');

    if (post_password_required()) { ?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
        return;
    }

    if (have_comments()) :

    ?>
        <div id="comments" class="leaf_user_comments_all_block">
            <!-- 自定义评论列表 -->
            <ol class="leaf_comments_all">
                <?php
                wp_list_comments(array('callback' => 'leaf_comments_module',));
                ?>
            </ol>

        </div>
    <?php else :
    ?>
        <div class="leaf_no comments_text_block">
            <p class="leaf_no comments_text">这篇文章貌似还没有评论呢~</p>
        </div>

    <?php
    endif;
    ?>
    <div class="leaf_comment_pagination_block_all">
        <?php
        $post_info = get_post(get_the_ID(), ARRAY_A);
        if (!$post_info['comment_count']) {
        ?>
        <?php }
        if ($post_info['comment_count']) {
            paginate_comments_links(array(
                'prev_next' => true
            ));
        }
        ?>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('#commentform').submit(function(event) {
            event.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            $.ajax({
                url: '<?php echo esc_url(site_url('/wp-comments-post.php')); ?>',
                method: 'POST',
                data: formData,
                dataType: 'html',
                success: function(response) {
                    // Optional: You can do something with the response HTML if needed
                    console.log(response);

                    // Optional: Display a success message
                    alert('评论成功！');

                    // Optional: Clear the form fields after successful submission
                    $('#commentform')[0].reset();

                    // Optional: You may reload the comments section to show the new comment
                    $('#comments').load(location.href + ' #comments');
                },
                error: function(error) {
                    // Optional: Handle errors
                    console.error('Error:', error);
                },
            });
        });
    });
</script>