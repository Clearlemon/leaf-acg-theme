<?php
//文章内页导航样式设计
if( class_exists( 'CSF' ) ) {

CSF::createWidget( 'leaf_home_article_hot', array(
    'title'       => 'Leaf-热榜文章',
    'classname'   => 'leaf_home_article_hot',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_article_hot_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '热榜文章',
    ),
    array(
        'id'          => 'leaf_home_article_hot_select',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'home_article_hot_default'  => '默认选择',
    'home_article_hot_comments'  => '评论优先',
    'home_article_hot_like'  => '点赞优先',
    'home_article_hot_browse'  => '浏览优先',
    'home_article_hot_random'  => '随机显示',
        ),
        'default'     => 'home_article_hot_default'
    ),
    array(
        'id'          => 'leaf_home_article_hot_class',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'home_article_hot_big_picture'  => '大图样式',
    'home_article_hot_first_big_picture'  => '第一大图',
    'home_article_hot_small_picture'  => '小图样式',
    'home_article_hot_text'  => '全文字样式',
        ),
        'default'     => 'home_article_hot_small_picture'
    ),
    array(
            'id'      => 'leaf_home_article_hot_day',
            'title'   => '选择要显示最近的[x]天',
            'max'     => 999999,
            'min'     => 0,
            'step'    => 1,
            'unit'    => '天',
            'type'    => 'spinner',
            'default' => 0,
    ),
    array(
            'id'      => 'leaf_home_article_hot_chapter',
            'title'   => '选择要显示的[x]文章',
            'max'     => 16,
            'min'     => 0,
            'step'    => 1,
            'unit'    => '篇',
            'type'    => 'spinner',
            'default' => 0,
    ),
    array(
            'id'    => 'leaf_article_hot_not_displayed',
            'type'  => 'number',
            'title' => '不显示的文章',
    ),
    array(
            'id'    => 'leaf_article_hot_not_displayed_classify',
            'type'  => 'number',
            'title' => '不显示的分类文章',
    ),
    array(
        'id'    => 'leaf_article_hot_new_ups',
        'type'  => 'switcher',
        'title' => '是否以新窗口打开',
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
    
    )
));

// 
// echo=输出  
// $instance['leaf_home_article_hot_title'];=上面的设置选项内容
// 
if( ! function_exists( 'leaf_home_article_hot' ) ) {
    function leaf_home_article_hot( $args, $article_hot ) {
if ( isset( $article_hot['leaf_home_article_hot_widget_title'] ) && ! empty( $article_hot['leaf_home_article_hot_widget_title'] ) ) {
    echo $article_hot['leaf_home_article_hot_widget_title'];

    }
    }
}
}

