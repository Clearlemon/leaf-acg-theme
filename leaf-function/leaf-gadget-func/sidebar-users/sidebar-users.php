<?php

if (class_exists('CSF')) {
    CSF::createWidget('leaf_home_user', array(
        'title'       => 'Leaf-首页用户信息',
        'classname'   => 'leaf_home_user',
        'description' => '此小工具适用于各种页面',
        'fields'      => array(
            array(
                'id'      => 'leaf_home_user_widget_title',
                'type'    => 'text',
                'title'   => '小工具标题名称',
                'default' => '个人信息',
            ),
            array(
                'id'    => 'leaf_home_user_bg',
                'type'  => 'upload',
                'title' => '背景图片选择',
                'preview' => true,
            ),
            array(
                'id'    => 'leaf_home_user_avatar',
                'type'  => 'upload',
                'title' => '[自定义]头像选择',
                'preview' => true,
            ),
            array(
                'id'      => 'leaf_home_user_name',
                'type'    => 'text',
                'title'   => '[自定义]名称',
            ),
            array(
                'id'      => 'leaf_home_user_say',
                'type'    => 'text',
                'title'   => '[自定义]说明',
            ),
            array(
                'id'       => 'leaf_home_user_box_html',
                'type'     => 'code_editor',
                'title'    => '用户名称下自定义html',
                'settings' => array(
                    'theme'  => 'mdn-like',
                    'mode'   => 'htmlmixed',
                ),
                'default'  => '<p>这是用户简介区块</p>',
            ),
            array(
                'id'    => 'leaf_all_sideba_fixed',
                'type'  => 'switcher',
                'title' => '是否跟随侧边栏移动',
            ),
            array(
                'id'         => 'leaf_sideba_display_all_pc_or_mobile',
                'type'       => 'radio',
                'title'      => '选择哪个端是否显示',
                'options'    => array(
                    'leaf_sideba_all_pc_and_mobile' => '[PC]和[移动设备]都显示',
                    'leaf_sideba_all_pc' => '只显示[PC]',
                    'leaf_sideba_all_mobile' => '只显示[移动设备]',
                ),
                'default'    => 'leaf_sideba_all_pc_and_mobile',
            ),
        ),
    ));
    if (!function_exists('leaf_home_user')) {
        function leaf_home_user($args, $home_user)
        {
            $sideba_title = $home_user['leaf_home_user_widget_title'];
            $leaf_home_user_bg = $home_user['leaf_home_user_bg'];
            $leaf_home_user_avatar = $home_user['leaf_home_user_avatar'];
            $leaf_home_user_name = $home_user['leaf_home_user_name'];
            $leaf_home_user_say = $home_user['leaf_home_user_say'];
            $leaf_home_user_box_html = $home_user['leaf_home_user_box_html'];

?>
            <div class="leaf_sidebar_home_user_all">
                <?php if (isset($sideba_title) && !empty($sideba_title)) { ?>
                    <p class="leaf_sidebar_title_all">
                        <?php echo $sideba_title; ?>
                    </p>
                <?php } ?>
                <div class="leaf_sidebar_user_all">
                    <div class="sidebar_home_user_bg_avatar">
                        <div class="sidebar_home_user_bg">
                            <img class="sidebar_img" src="<?php if (!empty($leaf_home_user_bg)) {
                                                                echo $leaf_home_user_bg;
                                                            } else {
                                                                echo get_template_directory_uri() . '/leaf-assets/leaf-images/leaf-background-settings/leaf_home_user_bg.webp';
                                                            } ?>" alt="">
                            <div class="sidebar_home_user_name_briefly">
                                <img class="sidebar_avatar" src="<?php if (!empty($leaf_home_user_avatar)) {
                                                                        echo $leaf_home_user_avatar;
                                                                    } else {
                                                                        echo get_template_directory_uri() . '/leaf-assets/leaf-images/leaf-background-settings/leaf_home_user_avatar.webp';
                                                                    } ?>" alt="">
                                <div class="name_briefly_all">
                                    <h3 class="sidebar_home_user_name"><?php if (!empty($leaf_home_user_name)) {
                                                                            echo $leaf_home_user_name;
                                                                        } else {
                                                                            echo '朝花夕拾';
                                                                        } ?></h3>
                                    <p class="sidebar_home_user_briefly"><?php if (!empty($leaf_home_user_say)) {
                                                                                echo $leaf_home_user_say;
                                                                            } else {
                                                                                echo '随风而舞，随风而落';
                                                                            } ?></p>
                                </div>
                            </div>
                            <?php leaf_sidebar_home_user_information(); ?>
                        </div>
                        <div class="sidebar_home_user_html"><?php if (!empty($leaf_home_user_box_html)) {
                                                                echo $leaf_home_user_box_html;
                                                            } else {
                                                                echo '<p>这是用户简介区块</p>';
                                                            } ?></div>
                    </div>

                </div>
            </div>
        <?php
        }
        function leaf_sidebar_home_user_information()
        {
            // 获取评论数量
            $comment_count = wp_count_comments();
            $total_comments = $comment_count->approved;

            // 获取文章数量
            $post_count = wp_count_posts()->publish;

            // 获取友情链接数量
            $link_count = get_bookmarks(array('category' => 0, 'hide_invisible' => 0));
            $total_links = $link_count ? count($link_count) : 0;

            // 获取分类数量
            $categories = get_categories();
            $category_count = $categories ? count($categories) : 0;

            // 获取标签数量
            $tags = get_tags();
            $tag_count = $tags ? count($tags) : 0;

        ?>
            <div class="sidebar_home_user_information">
                <div class="user_information_classifys">
                    <span class="information_title">分类</span>
                    <p class="information_number"><?php echo $category_count; ?></p>
                </div>
                <div class="user_information_tag">
                    <span class="information_title">标签</span>
                    <p class="information_number"><?php echo $tag_count; ?></p>
                </div>
                <div class="user_information_comments">
                    <span class="information_title">评论</span>
                    <p class="information_number"><?php echo $total_comments; ?></p>
                </div>
                <div class="user_information_article">
                    <span class="information_title">文章</span>
                    <p class="information_number"><?php echo $post_count; ?></p>
                </div>
                <div class="user_information_links">
                    <span class="information_title">友联</span>
                    <p class="information_number"><?php echo $total_links; ?></p>
                </div>
            </div>
<?php
        }
    }
}
