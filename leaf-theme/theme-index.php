<html>

<head>
    <title>叶ACG - 一个好看的二次元博客主题</title>
    <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
    <meta name="description" content="一个免费好看的二次元个人博客主题。">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <style type="text/css">
        <?php leaf_theme_overall_color(); ?>
    </style>
</head>
<!-- 头部代码开始 -->
<?php require_once get_theme_file_path('/leaf-theme/theme-header.php');  ?>
<main class="leaf_postings_main">
    <div class="leaf_article_display">
        <?php require_once get_theme_file_path('/leaf-theme/theme-slide/theme-slide-first.php'); ?>
        <!-- 文章主题样式开始 -->
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
            } elseif ($leaf_close_home_post_assets == 'leaf_article_style' || $leaf_close_home_post_assets == 'leaf_article_biglong_style' || $leaf_close_home_post_assets == 'leaf_article_three_img_card_style') {
                leaf_single_first_style();
            } else {
                ?>貌似没有设置文章展示块欸？要不去后台设置一下吗？
            <?php
            }

            leaf_custom_pagination();
            ?>
        </div>
        <!-- 文章主题样式结束 -->

    </div>
    <!-- 侧边栏样式开始 -->
    <?php
    require_once get_theme_file_path('/leaf-theme/theme-sidebar.php');
    ?>
    <!-- 侧边栏样式结束 -->
</main>
<?php
require_once get_theme_file_path('/leaf-theme/theme-footer.php');
?>

<body>
    <script>
        // // 播放器设置
        // let vs = document.getElementById('videoAr');
        // const player = new Plyr(vs, {
        //   i18n: {
        //     speed: '速度',
        //     normal: '正常',
        //   },
        //   loop: {
        //     active: true
        //   },
        //   speed: {
        //     selected: 1,
        //     options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 3, 4],
        //   },
        //   disableContextMenu: true
        // });
        //         // 标签云设置
        //         tagcloud({
        //             selector: ".tagcloud",  //元素选择器
        //             fontsize: 14,       //基本字体大小, 单位px
        //             radius: 65,         //滚动半径, 单位px
        //             mspeed: "slow",   //滚动最大速度, 取值: slow, normal(默认), fast
        //             ispeed: "slow",   //滚动初速度, 取值: slow, normal(默认), fast
        //             direction: 135,     //初始滚动方向, 取值角度(顺时针360): 0对应top, 90对应left, 135对应right-bottom(默认)...
        //             keep: true          //鼠标移出组件后是否继续随鼠标滚动, 取值: false, true(默认) 对应 减速至初速度滚动, 随鼠标滚动
        //         });
        //         window.player = player;

    </script>

</body>

</html>