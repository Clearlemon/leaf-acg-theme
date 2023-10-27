<?php
function leaf_single_first_style()
{
    //置顶文章输出
    if (is_home() && !is_paged() && is_sticky()) {
        $args = array(
            'posts_per_page' => -1,
            'post__in'  => get_option('sticky_posts')
        );
        $sticky_posts = new WP_Query($args);
        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
        while ($sticky_posts->have_posts()) : $sticky_posts->the_post();
            if ($leaf_close_home_post_assets == 'leaf_article_style') {
                leaf_article_style();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_biglong_style') {
                leaf_article_biglong_style();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                leaf_article_three_img_card_style();
            }
        endwhile;
        wp_reset_query();
    }
    //普通文章输出
    while (have_posts()) {
        the_post();
        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
        if (!is_sticky() || is_paged()) {
            if ($leaf_close_home_post_assets == 'leaf_article_style') {
                leaf_article_style();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_biglong_style') {
                leaf_article_biglong_style();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                leaf_article_three_img_card_style();
            }
        }
    }
}

//第二章文章样式编写
function leaf_single_second_style()
{
    //置顶文章输出
    if (is_home() && !is_paged() && is_sticky()) {
        $args = array(
            'posts_per_page' => -1,
            'post__in'  => get_option('sticky_posts')
        );
        $sticky_posts = new WP_Query($args);
        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
        while ($sticky_posts->have_posts()) : $sticky_posts->the_post();
            if ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
                leaf_small_card_articles_alling();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
                leaf_article_container();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
                leaf_article_photo_album();
            }
        endwhile;
        wp_reset_query();
    }
    //普通文章输出
    while (have_posts()) {
        the_post();

        $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
        if (!is_sticky() || is_paged()) {
            if ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
                leaf_small_card_articles_alling();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
                leaf_article_container();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
                leaf_article_photo_album();
            }
        }
    }
}

//运用在首页分类ajax加载的功能

function leaf_close_home_post_assets()
{
    $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
    if ($leaf_close_home_post_assets == 'leaf_article_style') {
        if (_leaf_post('', 'leaf-post-genre',) == 'leaf-post-genre-1') {
            leaf_article_style();
        } elseif (_leaf_post('', 'leaf-post-genre',) == 'leaf-post-genre-2') {
            leaf_article_biglong_style();
        } elseif (_leaf_post('', 'leaf-post-genre',) == 'leaf-post-genre-3') {
            leaf_article_three_img_card_style();
        }
    } elseif ($leaf_close_home_post_assets == 'leaf_article_biglong_style') {
        leaf_article_biglong_style();
    } elseif ($leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
        leaf_article_three_img_card_style();
    }
}

//所有的文章样式块
//左图文章样式
function leaf_article_style()
{
    $post_id = get_the_ID();
    $leaf_post_tag_number = _leaf_post('', 'leaf-post-tag-number');
    $leaf_home_article_module = _leaf('leaf_home_article_module');
    $enabled = $leaf_home_article_module['enabled'];
?>
    <div class="leaf_home_article_style">
        <div class="leaf_home_article_img">
            <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"><img class="leaf_inhome_article_img leaf_images_are_preloaded" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/article_images_are_preloaded.webp" data-original="<?php echo leaf_featured_image($post_id); ?>"></a>
        </div>
        <div class="leaf_home_article_detailed" style="<?php leaf_post_background_img() ?>">
            <div class=" leaf_label_and_title">
                <?php if (is_sticky()) { ?>
                    <span class="leaf_article_small_label">
                        <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"><span>置顶</span></a>
                    </span><?php } ?>
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                    <div class="<?php if (is_sticky()) {
                                    echo 'leaf_home_article_title_all';
                                } else {
                                    echo 'leaf_home_article_title_all_no_article';
                                } ?>">
                        <h4 class="leaf_home_article_title"><?php the_title(); ?></h4>
                        <?php if (isset($enabled) && array_key_exists('module_title', $enabled)) { ?>
                            <h4 class="leaf_home_article_deputy_title" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                            <?php } else {
                            if (!wp_is_mobile()) { ?>
                                <h4 class="leaf_home_article_deputy_title" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                        <?php  }
                        } ?>
                    </div>
                </a>
                <?php if (isset($enabled) && array_key_exists('module_time', $enabled)) { ?>
                    <div class="leaf_home_article_time"><span class="article_time"><?php echo leaf_post_time(); ?></span></div>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <div class="leaf_home_article_time"><span class="article_time"><?php echo leaf_post_time(); ?></span></div>
                <?php  }
                } ?>
            </div>
            <div class="leaf_article_description">
                <p class="article_description_texte">
                    <?php echo leaf_post_excerpt(80); ?>
                </p>
            </div>
            <div class="leaf_article_other_elements">
                <?php if (isset($enabled) && array_key_exists('module_avatar', $enabled)) { ?>
                    <img class="leaf_article_user_img leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <img class="leaf_article_user_img leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                <?php  }
                } ?>
                <?php if (isset($enabled) && array_key_exists('module_name', $enabled)) { ?>
                    <p class="leaf_article_user_name"><?php the_author(); ?></p>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <p class="leaf_article_user_name"><?php the_author(); ?></p>
                <?php  }
                } ?>
                <?php if (isset($enabled) && array_key_exists('module_article', $enabled)) { ?>
                    <div class="leaf_article_browse_comment_like">
                        <?php leaf_browse_comment_like(); ?>
                    </div>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <div class="leaf_article_browse_comment_like">
                            <?php leaf_browse_comment_like(); ?>
                        </div>
                <?php }
                } ?>
                <?php if (isset($enabled) && array_key_exists('module_tag', $enabled)) {  ?>
                    <div class="leaf_article_classification" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                        <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                    </div>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <div class="leaf_article_classification" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                            <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                        </div>
                <?php  }
                } ?>
            </div>
        </div>
    </div>
<?php
}
//顶部大图样式
function leaf_article_biglong_style()
{
    $post_id = get_the_ID();
    $leaf_post_tag_number = _leaf_post('', 'leaf-post-tag-number');
    $leaf_home_article_module = _leaf('leaf_home_article_module');
    $enabled = $leaf_home_article_module['enabled'];
?>
    <div class="leaf_home_article_biglong_style">
        <div class="leaf_home_article_biglong_img_title">
            <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                <img class="leaf_home_article_img_long leaf_images_are_preloaded" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/article_images_are_preloaded.webp" data-original="<?php echo leaf_featured_image($post_id); ?>" alt="">
            </a>
            <h2 class="leaf_home_article_main_title_long"><?php the_title(); ?></h2>
            <?php if (isset($enabled) && array_key_exists('module_title', $enabled)) { ?>
                <h4 class="leaf_home_article_deputy_title_long" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                <?php } else {
                if (!wp_is_mobile()) { ?>
                    <h4 class="leaf_home_article_deputy_title_long" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
            <?php  }
            } ?>
        </div>
        <div class="leaf_home_article_biglong_home_article_detailed">
            <div class="leaf_article_other_elements_long">
                <div class="leaf_article_other_long">
                    <?php if (isset($enabled) && array_key_exists('module_avatar', $enabled)) { ?>
                        <div class="leaf_article_user_img_long">
                            <img class="leaf_article_user_img_inlong leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                        </div>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <div class="leaf_article_user_img_long">
                                <img class="leaf_article_user_img_inlong leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                            </div>
                    <?php  }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_name', $enabled)) { ?>
                        <p class="leaf_article_user_name_long"><?php the_author(); ?></p>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <p class="leaf_article_user_name_long"><?php the_author(); ?></p>
                    <?php  }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_article', $enabled)) { ?>
                        <div class="leaf_article_browse_comment_like_long">
                            <?php leaf_browse_comment_like(); ?>
                        </div>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <div class="leaf_article_browse_comment_like_long">
                                <?php leaf_browse_comment_like(); ?>
                            </div>
                    <?php }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_time', $enabled)) { ?>
                        <div class="leaf_home_article_time_long"><span class="article_time_long"><?php echo leaf_post_time(); ?></span></div>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <div class="leaf_home_article_time_long"><span class="article_time_long"><?php echo leaf_post_time(); ?></span></div>
                    <?php  }
                    } ?>
                </div>
                <div class="leaf_article_description_long">
                    <p class="article_description_texte_long">
                        <?php echo leaf_post_excerpt(492); ?>
                    </p>
                </div>
                <?php if (isset($enabled) && array_key_exists('module_tag', $enabled)) {  ?>
                    <div class="leaf_article_classification_long" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                        <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                    </div>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <div class="leaf_article_classification_long" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                            <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                        </div>
                <?php  }
                } ?>
                <?php if (is_sticky()) { ?>
                    <img class="leaf_article_small_label_long" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images//leaf_article_small_label_long.png" alt="">
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}
//底部三图样式
function leaf_article_three_img_card_style()
{
    $post_id = get_the_ID();
    $leaf_post_tag_number = _leaf_post('', 'leaf-post-tag-number');
    $leaf_home_article_module = _leaf('leaf_home_article_module');
    $enabled = $leaf_home_article_module['enabled'];
?>
    <div class="leaf_home_article_three_img_card_style">
        <div class="leaf_home_article_three_img_card_all">
            <div class="leaf_home_article_three_img_card_title">
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                    <h2 class="leaf_home_article_main_title_three_img_card"><?php the_title(); ?></h2>
                    <?php if (isset($enabled) && array_key_exists('module_title', $enabled)) {  ?>
                        <h4 class="leaf_home_article_deputy_title_three_img_card" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <h4 class="leaf_home_article_deputy_title_three_img_card" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                    <?php  }
                    } ?>
                </a>
                <?php if (is_sticky()) { ?>
                    <div class="leaf_article_small_label_card">
                        <p>置顶</p>
                    </div>
                <?php } ?>
                <div class="<?php if (is_sticky()) {
                                echo 'leaf_article_user_img_three_article_img_card';
                            } else {
                                echo 'leaf_article_user_img_three_img_card';
                            } ?> ">
                    <?php if (isset($enabled) && array_key_exists('module_name', $enabled)) {  ?>
                        <p class="leaf_article_user_name_three_img_card"><?php the_author(); ?></p>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <p class="leaf_article_user_name_three_img_card"><?php the_author(); ?></p>
                    <?php  }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_avatar', $enabled)) {  ?>
                        <img class="leaf_article_user_img_inthree_img_card leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <img class="leaf_article_user_img_inthree_img_card leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                    <?php  }
                    } ?>
                </div>
            </div>
            <div class="leaf_article_description_three_img_card">
                <p class="article_description_texte_three_img_card">
                    <?php echo leaf_post_excerpt(542); ?>
                </p>
            </div>
            <div class="leaf_home_article_img_three_img_card">
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"> <img class="three_img_card_ingimg leaf_images_are_preloaded" src="<?php echo leaf_featured_many_image($post_id, 1); ?>"></a>
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"> <img class="three_img_card_ingimg leaf_images_are_preloaded" src="<?php echo leaf_featured_many_image($post_id, 2); ?>"></a>
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"> <img class="three_img_card_ingimg leaf_images_are_preloaded" src="<?php echo leaf_featured_many_image($post_id, 3); ?>"></a>
            </div>
            <div class="leaf_article_other_three_img_card">
                <?php if (isset($enabled) && array_key_exists('module_tag', $enabled)) {  ?>
                    <div class="leaf_article_classification_three_img_card" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                        <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                    </div>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <div class="leaf_article_classification_three_img_card" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                            <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                        </div>
                <?php  }
                } ?>

                <div class="leaf_article_information_three_img_card">
                    <?php if (isset($enabled) && array_key_exists('module_article', $enabled)) {  ?>
                        <div class="leaf_article_browse_comment_like_three_img_card">
                            <?php leaf_browse_comment_like(); ?>
                        </div>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <div class="leaf_article_browse_comment_like_three_img_card">
                                <?php leaf_browse_comment_like(); ?>
                            </div>
                    <?php  }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_time', $enabled)) {  ?>
                        <div class="leaf_home_article_time_three_img_card">
                            <span class="article_time_three_img_card"><?php echo leaf_post_time(); ?></span>
                        </div>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <div class="leaf_home_article_time_three_img_card">
                                <span class="article_time_three_img_card"><?php echo leaf_post_time(); ?></span>
                            </div>
                    <?php  }
                    } ?>

                </div>
            </div>
        </div>
    </div>
<?php
}
//第一种卡片样式
function leaf_small_card_articles_alling()
{
    $post_id = get_the_ID();
    $leaf_home_article_module = _leaf('leaf_home_article_module');
    $enabled = $leaf_home_article_module['enabled'];
?>
    <div class="leaf_home_small_card_articles_alling">
        <div class="leaf_home_small_card_articles_img">
            <div class="leaf_home_small_card_img">
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"><img class="leaf_home_small_incard_img leaf_images_are_preloaded" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/article_images_are_preloaded.webp" data-original="<?php echo leaf_featured_image($post_id); ?>" alt=""></a>
                <?php if (is_sticky()) { ?>
                    <img class="leaf_home_small_incard_figure" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/small_incard_figure.png">
                    <span class="leaf_home_small_incard_papertop">置顶</span>
                <?php } ?>
                <?php if (isset($enabled) && array_key_exists('module_time', $enabled)) {  ?>
                    <span class="leaf_home_small_incard_time"><?php echo leaf_post_time(); ?></span>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <span class="leaf_home_small_incard_time"><?php echo leaf_post_time(); ?></span>
                <?php  }
                } ?>
            </div>
            <div class="leaf_home_small_card_content_all">
                <div class="leaf_home_small_card_title_all">
                    <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                        <h2 class="leaf_home_small_card_content_title_main"><?php the_title(); ?></h2>
                        <?php if (isset($enabled) && array_key_exists('module_title', $enabled)) {  ?>
                            <h4 class="leaf_home_small_card_content_title_deputy" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                            <?php } else {
                            if (!wp_is_mobile()) { ?>
                                <h4 class="leaf_home_small_card_content_title_deputy" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                        <?php  }
                        } ?>
                    </a>
                </div>
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                    <p class="leaf_home_small_card_texte">
                        <?php echo leaf_post_excerpt(45); ?>
                    </p>
                </a>
                <div class="leaf_home_small_card_other_all">
                    <div class="leaf_home_small_card_user_all">
                        <?php if (isset($enabled) && array_key_exists('module_avatar', $enabled)) {  ?>
                            <img class="leaf_home_small_card_user_img leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                            <?php } else {
                            if (!wp_is_mobile()) { ?>
                                <img class="leaf_home_small_card_user_img leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                        <?php  }
                        } ?>
                        <?php if (isset($enabled) && array_key_exists('module_name', $enabled)) {  ?>
                            <p class="leaf_home_small_card_user_name"><?php the_author(); ?></p>
                            <?php } else {
                            if (!wp_is_mobile()) { ?>
                                <p class="leaf_home_small_card_user_name"><?php the_author(); ?></p>
                        <?php  }
                        } ?>
                        <?php if (isset($enabled) && array_key_exists('module_article', $enabled)) {  ?>
                            <div class="leaf_home_small_card_browse_comment_like">
                                <?php leaf_browse_comment_like(); ?>
                            </div>
                            <?php } else {
                            if (!wp_is_mobile()) { ?>
                                <div class="leaf_home_small_card_browse_comment_like">
                                    <?php leaf_browse_comment_like(); ?>
                                </div>
                        <?php  }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
//第二种卡片样式
function leaf_article_container()
{
    $post_id = get_the_ID();
    $leaf_post_tag_number = _leaf_post('', 'leaf-post-tag-number');
    $leaf_home_article_module = _leaf('leaf_home_article_module');
    $enabled = $leaf_home_article_module['enabled'];
?>
    <div class="leaf_home_article_container">
        <div class="leaf_home_article_card">
            <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                <div class="leaf_home_article_img_card">
                    <img class="leaf_home_article_inimg_card leaf_images_are_preloaded" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/article_images_are_preloaded.webp" data-original="<?php echo leaf_featured_image($post_id); ?>" alt="">
                </div>
            </a>
            <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                <div class="leaf_home_article_title_card">
                    <h2 class="leaf_home_article_main_title_card"><?php the_title(); ?></h2>
                </div>
            </a>

            <div class="leaf_article_topimg_card"> <?php if (is_sticky()) { ?><img src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/postingtop_bg.png" alt=""> <?php } ?></div>
            <?php if (isset($enabled) && array_key_exists('module_article', $enabled)) {  ?>
                <div class="leaf_article_browse_comment_like_card">
                    <?php leaf_browse_comment_like(); ?>
                </div>
                <?php } else {
                if (!wp_is_mobile()) { ?>
                    <div class="leaf_article_browse_comment_like_card">
                        <?php leaf_browse_comment_like(); ?>
                    </div>
            <?php  }
            } ?>
            <div class="leaf_home_article_content_card">
                <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>">
                    <?php if (isset($enabled) && array_key_exists('module_title', $enabled)) {  ?>
                        <h4 class="leaf_home_article_deputy_title_card" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <h4 class="leaf_home_article_deputy_title_card" style="color:<?php echo leaf_post_deputy_color(); ?>;"><?php echo leaf_post_deputy_title(); ?></h4>
                    <?php  }
                    } ?>
                </a>
                <p class="leaf_article_description_texte_card">
                    <?php echo leaf_post_excerpt(81); ?>
                </p>
                <h6 class="leaf_article_classification_title_card">标签</h6>
                <?php if (isset($enabled) && array_key_exists('module_tag', $enabled)) {  ?>
                    <div class="leaf_article_classification_card" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                        <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                    </div>
                    <?php } else {
                    if (!wp_is_mobile()) { ?>
                        <div class="leaf_article_classification_card" onmouseover="showDiv(this)" onmouseout="hideDiv(this)">
                            <?php echo leaf_post_tag($leaf_post_tag_number); ?>
                        </div>
                <?php  }
                } ?>

                <div class="leaf_article_other_elements_card">
                    <?php if (isset($enabled) && array_key_exists('module_avatar', $enabled)) {  ?>
                        <img class="leaf_article_user_img_card leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <img class="leaf_article_user_img_card leaf_images_are_preloaded" src="<?php echo leaf_post_user_avatar(); ?>" alt="">
                    <?php  }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_name', $enabled)) {  ?>
                        <p class="leaf_article_user_name_card"><?php the_author(); ?></p>
                        <?php } else {
                        if (!wp_is_mobile()) { ?>
                            <p class="leaf_article_user_name_card"><?php the_author(); ?></p>
                    <?php  }
                    } ?>
                    <?php if (isset($enabled) && array_key_exists('module_time', $enabled)) {  ?>
                        <div class="leaf_home_article_time_card"><span class="article_time_card"><?php echo leaf_post_time(); ?></span>
                            <?php } else {
                            if (!wp_is_mobile()) { ?>
                                <div class="leaf_home_article_time_card"><span class="article_time_card"><?php echo leaf_post_time(); ?></span> </div>
                        <?php  }
                        } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
//图片文章样式
function leaf_article_photo_album()
{
    $post_id = get_the_ID();
    $leaf_home_article_module = _leaf('leaf_home_article_module');

?>
    <div class="leaf_article_photo_album_img_time_title">
        <div class="leaf_photo_album_img_blurry">
            <div class="leaf_photo_album_size_type">
                <p class="photo_album_size_type">1980*1080</p>
                <p class="photo_album_type">jpg</p>
            </div>
            <div class="leaf_photo_album_size_type_title">
                <p class="photo_album_size_type_title"><?php the_title(); ?></p>
            </div>
            <a class="leaf_home_article_links leaf_link_all" href="<?php echo get_permalink(); ?>"><img class="leaf_article_photo_album_img leaf_images_are_preloaded" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/article_images_are_preloaded.webp" data-original="<?php echo leaf_featured_image($post_id); ?>" alt=""></a>
        </div>
    </div>
    <?php
}

//首页文章展示方式
function leaf_home_post_ajax_assets()
{
    $home_filter_loading = _leaf('home_filter_loading');
    if ($home_filter_loading == false) {
    ?>
        <div class="leaf_posting_inhome_all">
            <?php
            $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
            if ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
            ?>
                <div class="leaf_home_article_small_card_style">
                    <div class="leaf_home_article_small_card_style_all">
                        <?php leaf_single_second_style(); ?>
                    </div>
                </div>
            <?php    } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
            ?>
                <div class="leaf_home_article_card_style">
                    <div class="leaf_home_article_style_card">
                        <?php leaf_single_second_style(); ?>
                    </div>
                </div>
            <?php } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
            ?>
                <div class="leaf_home_article_photo_album_style">
                    <div class="leaf_article_photo_album_all">
                        <?php leaf_single_second_style(); ?>
                    </div>
                </div>
                <?php
            } elseif ($leaf_close_home_post_assets == 'leaf_article_style') {
                leaf_single_first_style();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_biglong_style') {
                leaf_single_first_style();
            } elseif ($leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                leaf_single_first_style();
            } else {
                ?>貌似没有设置文章展示块欸？要不去后台设置一下吗？
            <?php
            }
            ?>
        </div>
        <?php
    } else {

        $home_filter_loading_select = _leaf('home_filter_loading_select');
        if (is_array($home_filter_loading_select)) {
            $cateid = implode(',', $home_filter_loading_select);
        ?>
            <div class="leaf_posting_inhome_ajax_all">
                <div class="ajax_car_choose">
                    <ul class="leaf_post_home_choose">
                        <li class="home_category" cateid="0">全部文章</li>
                        <?php
                        // 分割合并后的分类ID字符串为数组
                        $cateid_array = explode(',', $cateid);
                        foreach ($cateid_array as $single_cateid) {
                            // 输出每个分类的 ID 和名称
                            $category_name = get_cat_name($single_cateid);
                            echo '<li class="home_category" cateid="' . $single_cateid . '">' . $category_name . '</li>';
                        }
                        ?>
                    </ul>
                </div>

                <?php
                $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
                if ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
                ?>
                    <div class="leaf_home_article_small_card_style">
                        <div id="filtered-posts" class="leaf_home_article_small_card_style_all">
                        </div>
                    </div>
                <?php    } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
                ?>
                    <div class="leaf_home_article_card_style">
                        <div id="filtered-posts" class="leaf_home_article_style_card">
                        </div>
                    </div>
                <?php } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
                ?>
                    <div class="leaf_home_article_photo_album_style">
                        <div id="filtered-posts" class="leaf_article_photo_album_all">
                        </div>
                    </div>
                <?php
                } elseif ($leaf_close_home_post_assets == 'leaf_article_style' || $leaf_close_home_post_assets == 'leaf_article_biglong_style' || $leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                ?>
                    <div id="filtered-posts" class="leaf_post_content_ajax_assets"></div>
                <?php
                } else {
                ?>
                    <p>貌似没有设置文章展示块欸？要不去后台设置一下吗？</p>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
        ?>
            <div class="leaf_posting_inhome_ajax_all">
                <div class="ajax_car_choose">
                    <ul class="leaf_post_home_choose">
                        <li class="home_category" cateid="0">全部文章</li>
                    </ul>
                </div>
                <?php
                $leaf_close_home_post_assets = _leaf('leaf_close_home_post_assets');
                if ($leaf_close_home_post_assets == 'leaf_small_card_articles_alling') {
                ?>
                    <div class="leaf_home_article_small_card_style">
                        <div id="filtered-posts" class="leaf_home_article_small_card_style_all">
                        </div>
                    </div>
                <?php    } elseif ($leaf_close_home_post_assets == 'leaf_article_container') {
                ?>
                    <div class="leaf_home_article_card_style">
                        <div id="filtered-posts" class="leaf_home_article_style_card">
                        </div>
                    </div>
                <?php } elseif ($leaf_close_home_post_assets == 'leaf_article_photo_album') {
                ?>
                    <div class="leaf_home_article_photo_album_style">
                        <div id="filtered-posts" class="leaf_article_photo_album_all">
                        </div>
                    </div>
                <?php } ?>
                <div id="filtered-posts" class="leaf_post_content_ajax_assets"></div>
            </div>
<?php
        }
    }
}
//首页判断是否开启幻灯片则修改css
function leaf_home_main_css_change()
{
    $leaf_slide_layout_choose = _leaf('leaf_slide_layout_choose');

    if ($leaf_slide_layout_choose == _leaf('leaf_slide_layout_choose-1') || _leaf('leaf_slide_layout_choose-2') || _leaf('leaf_slide_layout_choose-3')) {
        echo 'leaf_postings_main';
    } else {
        echo 'leaf_slideshow_postings_main';
    }
}
