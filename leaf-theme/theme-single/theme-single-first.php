<html>

<?php
leaf_seo();
require_once get_theme_file_path('/leaf-theme/theme-header.php');
?>
<main class="single_all_first">
    <div class="leaf_float_style">
        <div class="single_subject_first">
            <div class="single_featured_images_title">
                <div class="leaf_single_all">
                    <img class="single_featured_images" src="<?php echo leaf_featured_image(get_the_ID()); ?>" alt="">
                    <div class="single_title_time_all">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <h1 class="single_title"><?php the_title(); ?></h1>
                                <div class="single_time_like_comments_browse">
                                    <p class="single_time_all">此文章于：<?php echo leaf_post_time(get_the_ID()) ?>[最后编辑于<?php echo get_the_modified_time('Y-m-d'); ?>]</p>
                                    <p class="single_like_all">喜欢人数： <?php if (get_post_meta($post->ID, 'bigfa_ding', true)) {
                                                                            echo get_post_meta($post->ID, 'bigfa_ding', true);
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></p>
                                    <p class="single_comments_all">浏览人数：<?php get_post_views($post->ID); ?></p>
                                </div>
                    </div>
                </div>

            </div>
            <div class="single_all">
                <div class="leaf_single_breadcrumb_navigation">
                    <p class="breadcrumb_navigation">首页 > <?php echo leaf_single_category_name(get_the_ID()); ?> > 正文</p>
                </div>
                <div class="single_user_classify_illustrate">
                    <div class="single_user_img_name">
                        <div class="single_user_avatar_block"><img class="single_user_avatar" src="<?php echo leaf_post_user_avatar(); ?>" alt=""></div>
                        <div class="single_user_name_block">
                            <p class="single_user_name"><?php the_author(); ?></p>
                            <p class="single_user_registration_time">进站时间为
                                <?php
                                $registration_date =  get_the_author_meta('user_registered', get_the_author_meta('ID'));
                                echo date('Y-m-d', strtotime($registration_date)); ?>
                            </p>
                        </div>
                    </div>
                    <div class="single_classify_block">
                        <p class="single_parent_classify"><?php echo leaf_single_category_name(get_the_ID()); ?></p>
                        <?php if (!empty(leaf_post_child_category_name(get_the_ID()))) { ?>
                            <p class="single_child_classify"><?php echo leaf_single_child_category_name(get_the_ID()); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="single_synopsis_block">
                    <p>这是文章的简介演示，文章一共有3种简介样式，目前展示的是第一张，如果想看其他的样式可以去后台or文档去查看样式，简介样式做的不是特别的好看请见谅</p>
                </div>

        <?php the_content();
                            endwhile;
                        endif;

        ?>
        <div class="leaf_copyright_posting_block">
            <div class="leaf_copyright_all">
                <p class="leaf_copyright_text">
                    这是一个文章的版权样式<br>
                    1.Leaf主题不具备任何盈利的条件。<br>
                    2.Leaf主题并不是一个商用主题。<br>
                    3.禁止一切利用Leaf主题盈利的行为<br></p>
            </div>
        </div>
        <div class="leaf_single_tags_block">
            <span class="leaf__single_tags_icon">标签:</span>
            <div class="leaf_single_tags_all">
                <?php echo leaf_single_tag(); ?>
            </div>
        </div>
        <div class="leaf_like_share_posters_tipping_block">
            <div class="leaf_single_like_share_posters_tipping">
                <div class="leaf_single_like_block"><a href="javascript:;" rel="external nofollow" target="_self" rel="external nofollow" target="_blank" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if (isset($_COOKIE['bigfa_ding_' . $post->ID])) echo ' done'; ?>"><svg t="1690392646880" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3133" width="64" height="64">
                            <path d="M779.2 881.6h-44.8c-17.6 0-32-14.4-32-32s14.4-32 32-32h44.8c4.8 0 51.2-1.6 62.4-28.8 14.4-36.8 72-264 92.8-347.2 3.2-12.8 11.2-49.6 0-62.4-4.8-4.8-14.4-6.4-20.8-6.4H649.6c-17.6 0-32-14.4-32-32s14.4-32 32-32H912c38.4 0 60.8 16 70.4 30.4 30.4 36.8 17.6 91.2 12.8 116.8v1.6c-8 32-76.8 307.2-94.4 355.2-19.2 51.2-76.8 68.8-121.6 68.8z" fill="#43484D" p-id="3134"></path>
                            <path d="M331.2 480c-12.8 0-24-8-30.4-20.8-6.4-16 1.6-35.2 17.6-41.6 24-9.6 44.8-27.2 57.6-49.6l8-14.4c35.2-62.4 57.6-134.4 67.2-214.4 1.6-11.2 4.8-20.8 6.4-27.2 9.6-27.2 46.4-56 92.8-59.2 30.4-1.6 86.4 8 126.4 92.8 64 136 0 212.8-3.2 216-11.2 12.8-32 14.4-44.8 3.2-12.8-11.2-14.4-32-3.2-44.8 1.6-1.6 38.4-51.2-6.4-147.2-11.2-24-32-54.4-60.8-56-20.8-1.6-36.8 11.2-40 17.6 0 0-1.6 4.8-1.6 14.4-9.6 88-35.2 168-75.2 238.4l-8 12.8c-19.2 35.2-51.2 64-89.6 78.4-4.8 1.6-8 1.6-12.8 1.6zM777.6 881.6H500.8c-20.8 0-40-3.2-59.2-11.2-52.8-19.2-128-48-128-48l22.4-59.2 128 48c11.2 4.8 24 6.4 36.8 6.4h276.8c17.6 0 32 14.4 32 32s-14.4 32-32 32z" fill="#43484D" p-id="3135"></path>
                            <path d="M294.4 902.4H97.6c-30.4 0-54.4-25.6-54.4-56V393.6c0-27.2 20.8-65.6 54.4-65.6h196.8c20.8 0 46.4 17.6 46.4 65.6v452.8c0 41.6-24 56-46.4 56z m-187.2-64h169.6V393.6v-1.6H107.2V838.4z" fill="#229BFF" p-id="3136"></path>
                        </svg> <span class="count">
                            <?php if (get_post_meta($post->ID, 'bigfa_ding', true)) {
                                echo get_post_meta($post->ID, 'bigfa_ding', true);
                            } else {
                                echo '0';
                            } ?>
                        </span>
                    </a></div>
                <div class="leaf_single_share_block"><a href="javascript:;" target="_self"><svg t="1690392974995" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4438" width="64" height="64">
                            <path d="M228.957 425.915c-62.524 0-113.391 50.867-113.391 113.391 0 62.523 50.867 113.391 113.391 113.391s113.391-50.867 113.391-113.391c0-62.524-50.867-113.391-113.391-113.391z" fill="#53AFFD" p-id="4439"></path>
                            <path d="M912.528 211.496c0-62.524-50.867-113.391-113.391-113.391s-113.391 50.867-113.391 113.391c0 62.523 50.867 113.391 113.391 113.391s113.391-50.867 113.391-113.391zM799.137 692.696c-62.524 0-113.391 50.867-113.391 113.391 0 62.524 50.867 113.391 113.391 113.391s113.391-50.867 113.391-113.391c0-62.524-50.867-113.391-113.391-113.391z" fill="#1083EA" p-id="4440"></path>
                            <path d="M799.137 657.823c-51.024 0-96.109 25.91-122.794 65.262L376.238 556.332c0.642-5.589 0.983-11.268 0.983-17.026 0-17.893-3.186-35.056-9.021-50.951l320.479-178.073c27.168 30.346 66.618 49.478 110.458 49.478 81.753 0 148.264-66.511 148.264-148.264 0-81.753-66.511-148.265-148.264-148.265-81.753 0-148.264 66.511-148.264 148.265 0 19.32 3.719 37.787 10.472 54.729L342.104 443.609c-27.218-32.131-67.837-52.568-113.147-52.568-81.753 0-148.264 66.511-148.264 148.265 0 81.753 66.511 148.264 148.264 148.264 57.373 0 107.236-32.759 131.875-80.552l294.35 163.554a148.063 148.063 0 0 0-4.31 35.515c0 81.753 66.511 148.264 148.264 148.264 81.753 0 148.264-66.511 148.264-148.264s-66.51-148.264-148.263-148.264zM685.746 211.496c0-62.524 50.867-113.391 113.391-113.391s113.391 50.867 113.391 113.391c0 62.523-50.867 113.391-113.391 113.391S685.746 274.02 685.746 211.496z m-343.398 327.81c0 62.523-50.867 113.391-113.391 113.391S115.566 601.83 115.566 539.306c0-62.524 50.867-113.391 113.391-113.391s113.391 50.867 113.391 113.391z m456.789 380.172c-62.524 0-113.391-50.867-113.391-113.391 0-62.524 50.867-113.391 113.391-113.391s113.391 50.867 113.391 113.391c0 62.524-50.867 113.391-113.391 113.391z" fill="" p-id="4441"></path>
                        </svg><span class="leaf_single_share">分享</span></a></div>
                <div class="leaf_single_posters_block"><a href="javascript:;" target="_self"><svg t="1690393352267" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6115" width="64" height="64">
                            <path d="M877.4 60.6v446.2c-90.4-25.7-162.2-21.8-218.7-7C511 538.7 446.3 658.3 293.8 659.3c-51.3 0.4-98.8-12.9-141.2-33V60.6c0-22.4 18.2-40.4 40.4-40.4h643.9c22.4 0 40.5 18.1 40.5 40.4z" fill="#FFFFFF" p-id="6116"></path>
                            <path d="M291.5 679.5c-48.9 0-98.5-11.8-147.6-35l-11.6-5.5V60.6C132.4 27.2 159.6 0 193 0h643.9c33.4 0 60.6 27.2 60.6 60.6v473l-25.7-7.3c-74.6-21.2-144.6-23.6-208-6.9-60.9 16-107.9 47.1-153.4 77.3-61 40.4-124.2 82.2-216.5 82.8h-2.4z m-118.7-66.3c40.5 17.5 81.1 25.9 120.8 25.8 80.3-0.5 135.7-37.2 194.4-76.1 48.2-31.9 98.1-64.9 165.5-82.7 63.1-16.6 131.5-16.4 203.6 0.4v-420c0-11.1-9.1-20.2-20.2-20.2H193c-11.1 0-20.2 9.1-20.2 20.2v552.6z" fill="#403F3F" p-id="6117"></path>
                            <path d="M877.4 506.9v456.5c0 22.4-18.1 40.4-40.4 40.4H193c-22.2 0-40.4-18.1-40.4-40.4V626.3c42.4 20.1 89.9 33.4 141.2 33 152.5-0.9 217.2-120.6 364.9-159.4 56.4-14.8 128.3-18.8 218.7 7z" fill="#33ABE3" p-id="6118"></path>
                            <path d="M836.9 1024H193c-33.4 0-60.6-27.2-60.6-60.6v-369l28.9 13.6c44.3 21 89 31.3 132.4 31.1 80.3-0.5 135.7-37.2 194.4-76.1 48.2-31.9 98.1-64.9 165.5-82.7 70.5-18.5 147.7-16.1 229.3 7.1l14.7 4.2v471.8c0 33.4-27.2 60.6-60.7 60.6zM172.8 656.8v306.5c0 11.1 9.1 20.2 20.2 20.2h643.9c11.1 0 20.2-9.1 20.2-20.2v-441c-69.1-17.5-134.1-18.5-193.3-2.9-60.9 16-107.9 47.1-153.4 77.3-61 40.4-124.2 82.2-216.5 82.8-40.3 0.2-80.7-7.3-121.1-22.7z" fill="#403F3F" p-id="6119"></path>
                            <path d="M332.1 218.2m-100.6 0a100.6 100.6 0 1 0 201.2 0 100.6 100.6 0 1 0-201.2 0Z" fill="#FFFFFF" p-id="6120"></path>
                            <path d="M332.1 339c-66.6 0-120.8-54.2-120.8-120.8S265.5 97.3 332.1 97.3 453 151.6 453 218.2 398.8 339 332.1 339z m0-201.2c-44.3 0-80.4 36.1-80.4 80.4s36.1 80.4 80.4 80.4 80.4-36.1 80.4-80.4-36-80.4-80.4-80.4z" fill="#403F3F" p-id="6121"></path>
                            <path d="M751.9 905.8h-464c-11.2 0-20.2-9.1-20.2-20.2s9.1-20.2 20.2-20.2h464c11.2 0 20.2 9 20.2 20.2s-9 20.2-20.2 20.2zM751.9 771h-464c-11.2 0-20.2-9-20.2-20.2s9.1-20.2 20.2-20.2h464c11.2 0 20.2 9 20.2 20.2s-9 20.2-20.2 20.2z" fill="#FFFFFF" p-id="6122"></path>
                            <path d="M1003.8 332.4c0 40.8-33 73.7-73.7 73.7H597.2c-45.5 0-82.3-36.9-82.3-82.4 0-13.1 3.1-25.6 8.8-36.6 11.4-23.5 33.8-40.6 60.6-44.7-0.6-5.1-1-10.3-1-15.6 0-68.8 55.7-124.4 124.4-124.4 50.3 0 93.6 29.9 113.3 72.9 9-3.8 18.9-6.1 29.3-6.1 40.8 0 73.7 33 73.7 73.7 0 5.4-0.6 10.7-1.7 15.9 2.6-0.2 5.2-0.4 7.8-0.4 23.7 0 44.7 11.1 58.2 28.5 9.7 12.8 15.5 28.5 15.5 45.5z" fill="#33ABE3" p-id="6123"></path>
                            <path d="M930.1 426.4H597.2c-56.5 0-102.5-46-102.5-102.6 0-16 3.8-31.9 11-45.8 11.6-23.9 32.4-42.2 57.4-50.9v-0.1c0-79.7 64.9-144.6 144.6-144.6 50.4 0 97.1 26.5 123.2 68.8 6.4-1.3 12.8-2 19.4-2 50.6 0 92 40.2 93.9 90.3 23.7 3.5 45.1 16 60.1 35.3 12.9 16.5 19.8 36.4 19.8 57.6-0.1 51.8-42.2 94-94 94zM707.7 122.8c-57.4 0-104.2 46.7-104.2 104.2 0 4.2 0.3 8.5 0.8 13.1l2.4 19.5-19.4 3c-19.8 3-36.8 15.5-45.5 33.5-4.5 8.7-6.8 18.2-6.8 27.8 0 34.3 27.8 62.2 62.1 62.2H930c29.5 0 53.5-24 53.5-53.5 0-12-3.9-23.3-11.3-32.8-11.4-14.8-29.6-22.3-48.1-20.5l-27.4 2.6 5.7-26.9c0.8-4 1.3-7.9 1.3-11.7 0-29.5-24-53.5-53.5-53.5-7.2 0-14.4 1.5-21.4 4.4l-18.1 7.7-8.2-17.9c-16.8-37.3-54.1-61.2-94.8-61.2z" fill="#403F3F" p-id="6124"></path>
                        </svg><span class="leaf_single_posters">海报</span></a></div>
                <div class="leaf_single_tipping_block"><a href="javascript:;" target="_self"><svg t="1690393504486" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="15635" width="64" height="64">
                            <path d="M512 509.1m-444.4 0a444.4 444.4 0 1 0 888.8 0 444.4 444.4 0 1 0-888.8 0Z" fill="#FAB001" p-id="15636"></path>
                            <path d="M887.7 459.1c0-132.5-58-251.3-150-332.7C671.6 87.2 594.4 64.7 512 64.7c-245.4 0-444.4 199-444.4 444.4 0 132.5 58 251.3 150 332.7 66.2 39.1 143.3 61.7 225.8 61.7 245.4 0 444.3-199 444.3-444.4z" fill="#F9E48A" p-id="15637"></path>
                            <path d="M568 102.5c-245.4 0-444.4 199-444.4 444.4 0 122.5 49.7 233.4 130 313.8 57.6 27.3 121.8 42.8 189.8 42.8 245.4 0 444.4-199 444.4-444.4 0-122.5-49.7-233.4-130-313.8-57.6-27.3-121.9-42.8-189.8-42.8z" fill="#FECE0A" p-id="15638"></path>
                            <path d="M704.4 616.4c0 28.6-4.9 44.6-25.2 54.3-15.4 7.3-35 9.4-60.2 10-11.8 0.3-22.1-7.7-25.4-19-0.4-1.5-0.9-3.1-1.4-4.6-5.3-16.7 7.3-33.6 24.8-33.6 8 0 14.3-0.1 17.1-0.3 7.8 0 9.7-1.9 9.7-8.2V514.3c0-14.3-11.6-25.9-25.9-25.9h-36.4c-14.3 0-25.9 11.6-25.9 25.9v195.5c0 14.3-11.6 25.9-25.9 25.9H521c-14.3 0-25.9-11.6-25.9-25.9V514.3c0-14.3-11.6-25.9-25.9-25.9h-33c-14.3 0-25.9 11.6-25.9 25.9v141.6c0 14.3-11.6 25.9-25.9 25.9h-7.3c-14.3 0-25.9-11.6-25.9-25.9V458c0-14.3 11.6-25.9 25.9-25.9h92.2c14.3 0 25.9-11.6 25.9-25.9v-10.9c0-14.8-12.4-26.6-27.2-25.9-38.8 1.7-77.5 2.7-114.6 3-12.1 0.1-22.9-8.3-25.4-20.1 0-0.2-0.1-0.4-0.1-0.6-3.4-16.1 8.3-31.4 24.8-31.8 118-2.7 245.9-10.6 338.3-22.8 11.6-1.5 22.7 4.9 27.2 15.7l1.1 2.6c6.6 15.8-3.4 33.6-20.4 35.8-36.9 4.9-77.2 8.7-119.3 11.9-13.5 1-23.9 12.3-23.9 25.9v17.3c0 14.3 11.6 25.9 25.9 25.9h97c14.3 0 25.9 11.6 25.9 25.9v158.3z" fill="#FFFFFF" p-id="15639"></path>
                        </svg><span class="leaf_single_tipping">打赏</span></a></div>
            </div>
        </div>
            </div>
            <?php
            //文章 | 上下文章样式函数
            leaf_custom_previous_next_links();
            //文章 | 相关文章样式函数
            // leaf_single_related_article_slider();
            //文章 | 评论模块
            if (comments_open()) {
                comments_template();
            }
            ?>
        </div>
        <?php
        leaf_all_separate_sideba_open();
        ?>
    </div>
</main>

<body>
    <script type="text/javascript">
        $.fn.postLike = function() {
            if ($(this).hasClass('done')) {
                return false;
            } else {
                $(this).addClass('done');
                var id = $(this).data("id"),
                    action = $(this).data('action'),
                    rateHolder = $(this).children('.count');
                var ajax_data = {
                    action: "bigfa_like",
                    um_id: id,
                    um_action: action
                };
                $.post("/wp-admin/admin-ajax.php", ajax_data,
                    function(data) {
                        $(rateHolder).html(data);
                    });
                return false;
            }
        };
        $(document).on("click", ".favorite",
            function() {
                $(this).postLike();
            });
    </script>
    <?php
    //引用主题的底部文件
    require_once get_theme_file_path('/leaf-theme/theme-footer.php');
    ?>
</body>

</html>