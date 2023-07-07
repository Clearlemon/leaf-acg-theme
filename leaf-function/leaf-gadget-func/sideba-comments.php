<?php
if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_comments', array(
    'title'       => 'Leaf-最新评论',
    'classname'   => 'leaf_home_article_hot',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_comments_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '网站评论',
    ),
    array(
            'id'      => 'leaf_home_comments_day',
            'title'   => '选择要显示最近[x]天的评论',
            'max'     => 999999,
            'min'     => 0,
            'step'    => 1,
            'unit'    => '天',
            'type'    => 'spinner',
            'default' => 0,
    ),
    array(
            'id'      => 'leaf_home_comments_chapter',
            'title'   => '选择要显示的[x]评论数量',
            'max'     => 16,
            'min'     => 0,
            'step'    => 1,
            'unit'    => '条',
            'type'    => 'spinner',
            'default' => 0,
    ),
    array(
            'id'    => 'leaf_home_comments_not_displayed',
            'type'  => 'number',
            'title' => '不显示的用户评论',
    ),
    array(
            'id'    => 'leaf_home_comments_no_article',
            'type'  => 'number',
            'title' => '不显示的文章评论',
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
if( ! function_exists( 'leaf_home_comments' ) ) {
    function leaf_home_comments( $args, $home_comments ) {

    echo $home_comments['leaf_home_comments_widget_title'];


    }
}
}
