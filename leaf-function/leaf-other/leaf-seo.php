<?php
function leaf_seo()
{
    if (is_home()) {
?>

        <head>
            <title>
                <?php
                echo get_bloginfo('name');
                echo '-';
                echo get_bloginfo('description'); ?>
            </title>
            <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
            <meta name="description" content="一个免费好看的二次元个人博客主题。">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
            <style type="text/css">
                <?php leaf_theme_overall_color(); ?>
            </style>
        </head>
    <?php
    } elseif (is_archive()) {
    ?>

        <head>
            <title>
                <?php
                echo single_cat_title();
                echo '-';
                echo get_bloginfo('description'); ?>
            </title>
            <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
            <meta name="description" content="一个免费好看的二次元个人博客主题。">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
            <style type="text/css">
                <?php leaf_theme_overall_color(); ?>
            </style>
        </head>

    <?php
    } elseif (is_single()) {
    ?>

        <head>
            <title>
                <?php
                echo the_title();
                echo '-';
                echo get_bloginfo('description'); ?>
            </title>
            <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
            <meta name="description" content="一个免费好看的二次元个人博客主题。">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
            <style type="text/css">
                <?php leaf_theme_overall_color(); ?>
            </style>
        </head>

    <?php
    } elseif (is_search()) {
    ?>

        <head>
            <title>
                <?php
                echo get_search_query();
                echo '-';
                echo get_bloginfo('description'); ?>
            </title>
            <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
            <meta name="description" content="一个免费好看的二次元个人博客主题。">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
            <style type="text/css">
                <?php leaf_theme_overall_color(); ?>
            </style>
        </head>

<?php
    }
}
function leaf_seo_title()
{
}
function leaf_seo_keywords()
{
}
function leaf_seo_description()
{
}
