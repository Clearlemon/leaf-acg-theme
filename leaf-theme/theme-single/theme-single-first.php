<html>

<head>
    <title>叶ACG - 一个好看的二次元博客主题</title>
    <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
    <meta name="description" content="一个免费好看的二次元个人博客主题。">
    <style type="text/css">
        .icon {
            width: 1em;
            height: 1em;
            vertical-align: -0.15em;
            fill: currentColor;
            overflow: hidden;
        }
    </style>
</head>
<?php
require_once get_theme_file_path('/leaf-theme/theme-header.php');
?>
<main class="single_all_first">
    <div class="single_subject_first">
        <?php if (have_posts()) : while (have_posts()) : the_post();

                the_content();
            endwhile;
        endif; 
        
        ?>
    </div>
    <div class="leaf-sidebar">我是侧边栏</div>
</main>

<body>
    <?php
    //引用主题的底部文件
    require_once get_theme_file_path('/leaf-theme/theme-footer.php');
    ?>
</body>

</html>