<?php
function leaf_slide_first_func()
{
    //判断当前幻灯片设置中是否有有效值
    if (!empty(_leaf('leaf_slide_layout_choose_1'))) {
        //获取幻灯片设置中的值
        $leaf_slide_layout_choose_1 = _leaf('leaf_slide_layout_choose_1');
        //游历所有值并复制给另外一个值key
        foreach ($leaf_slide_layout_choose_1 as $key) {
            //获取幻灯片设置选择的值
            $slide_set_choose = $key['slide_set_choose'];
            //如果是选择[自定义幻灯片]则输出第一个if内的内容如果是[ID设置]则输出elseif的内容
            if ($slide_set_choose == 'customization_set') {
                //获取幻灯片其中的某些设置的值
                $slide_set_title = $key['slide_set_title'];
                $slide_set_sub_title = $key['slide_set_sub_title'];
                $slide_set_img = $key['slide_set_img'];
                $slide_set_avatar = $key['slide_set_avatar'];
                $slide_set_time = $key['slide_set_time'];
                $slide_set_categories = $key['slide_set_categories'];
                $slide_set_name = $key['slide_set_name'];
                $slide_set_new_ups_left = $key['slide_set_new_ups_left'];
                $slide_display_information_all = $key['slide_display_information_all'];
                $slide_set_links = $key['slide_set_links'];
                //以下为获取文章分类的代码
                $post_categories = get_cat_name($slide_set_categories);
                //以下内容为html代码
?>

                <div class="swiper-slide leaf-slide">
                    <?php if (isset($slide_display_information_all) && in_array('slide_in_links', $slide_display_information_all)) { ?><a class="leaf_links" <?php if ($slide_set_new_ups_left == true) { ?> target="_blank" <?php } ?> href="<?php echo $slide_set_links; ?>"><?php } ?>
                        <img class="leaf_slide_back" src="<?php echo $slide_set_img; ?>" alt="">
                        <div class="leaf_slide_outside_div_book">
                            <div class="leaf_slide_all_information">
                                <div class="leaf_slide_classify">
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_categories', $slide_display_information_all)) { ?><p class="slide_classify"><?php echo $post_categories; ?></p><?php } ?>
                                </div>
                                <div class="leaf_slide_title">
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_title', $slide_display_information_all)) { ?><h2 class="slide_title"><?php echo $slide_set_title; ?></h2><?php } ?>
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_sub_title', $slide_display_information_all)) { ?><p class="slide_sub_title"><?php echo $slide_set_sub_title; ?></p><?php } ?>
                                </div>
                                <div class="leaf_slide_avatar_name_time">
                                    <div class="slide_avatar_block">
                                        <?php if (isset($slide_display_information_all) && in_array('slide_in_avatar', $slide_display_information_all)) { ?><img class="slide_avatar" src="<?php echo $slide_set_avatar; ?>" alt=""><?php } ?>
                                    </div>
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_name', $slide_display_information_all)) { ?><p class="slide_name"><?php echo $slide_set_name; ?></p><?php } ?>
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_time', $slide_display_information_all)) { ?><p class="slide_time"><?php echo $slide_set_time ?></p><?php } ?>
                                </div>
                            </div>
                            <?php if (isset($slide_display_information_all) && in_array('slide_in_links', $slide_display_information_all)) { ?>
                        </a><?php } ?>
                </div>
                </div>

            <?php

            } elseif ($slide_set_choose == 'post_id_set') {
                //获取幻灯片的设置
                $slide_set_post_id = $key['slide_set_post_id']; //获取文章的$slide_set_post_id为获取文章ID并赋值
                $slide_set_new_ups_right  = $key['slide_set_new_ups_right'];
                $slide_display_information_all = $key['slide_display_information_all'];
                //依据文章的ID获得相关信息
                $post_link = get_permalink($slide_set_post_id); //获取文章的链接
                $author_id = get_post_field('post_author', $slide_set_post_id); // 获取文章的作者ID
                $author_name = get_the_author_meta('display_name', $author_id); // 获取用户的显示名称（用户名）
                $post_title = get_the_title($slide_set_post_id); //获取文章的标题
                $avatar_url = get_avatar_url($author_id); //获取用户头像链接
                $post_category = leaf_post_category_name($slide_set_post_id)
            ?>
                <div class="swiper-slide leaf-slide">
                    <?php if (isset($slide_display_information_all) && in_array('slide_in_links', $slide_display_information_all)) { ?><a class="leaf_links" <?php if ($slide_set_new_ups_right == true) { ?> target="_blank" <?php } ?> href="<?php echo $post_link; ?>"><?php } ?>
                        <img class="leaf_slide_back" src="<?php echo leaf_featured_image($slide_set_post_id); ?>" alt="">
                        <div class="leaf_slide_outside_div_book">
                            <div class="leaf_slide_all_information">
                                <div class="leaf_slide_classify">
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_categories', $slide_display_information_all)) { ?><p class="slide_classify"><?php echo $post_category; ?></p><?php } ?>
                                </div>
                                <div class="leaf_slide_title">
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_title', $slide_display_information_all)) { ?><h2 class="slide_title"><?php echo $post_title; ?></h2><?php } ?>
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_sub_title', $slide_display_information_all)) { ?><p class="slide_sub_title"><?php echo leaf_post_excerpt(20, $slide_set_post_id); ?></p><?php } ?>
                                </div>
                                <div class="leaf_slide_avatar_name_time">
                                    <div class="slide_avatar_block">
                                        <?php if (isset($slide_display_information_all) && in_array('slide_in_avatar', $slide_display_information_all)) { ?><img class="slide_avatar" src="<?php echo $avatar_url; ?>" alt=""><?php } ?>
                                    </div>
                                    <?php if (isset($slide_display_information_all) && in_array('slide_name', $slide_display_information_all)) { ?><p class="slide_name"><?php echo $author_name; ?></p><?php } ?>
                                    <?php if (isset($slide_display_information_all) && in_array('slide_in_time', $slide_display_information_all)) { ?><p class="slide_time"><?php echo leaf_post_time($slide_set_post_id); ?></p><?php } ?>
                                </div>
                            </div>
                            <?php if (isset($slide_display_information_all) && in_array('slide_in_links', $slide_display_information_all)) { ?>
                        </a><?php } ?></div>
                </div>
<?php
            }
        }
    }
}
