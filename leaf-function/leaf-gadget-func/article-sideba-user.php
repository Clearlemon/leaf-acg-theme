<?php
//文章内页导航样式设计
if( class_exists( 'CSF' ) ) {

CSF::createWidget( 'leaf_article_user', array(
    'title'       => 'Leaf-文章内页用户信息',
    'classname'   => 'leaf_article_user',
    'description' => '此小工具适用于文章内页才会显示',
    'fields'      => array(
    array(
        'id'      => 'leaf_article_user_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
    ),
    array(
        'id'    => 'leaf_article_user_bg',
        'type'  => 'upload',
        'title' => '背景图片选择',
        'preview' => true,
    ),
    array(
        'id'    => 'leaf_article_user_article_number',
        'type'  => 'number',
        'title' => '文章数量显示',
    ),
    array(
        'id'    => 'leaf_article_user_profile',
        'type'  => 'switcher',
        'title' => '用户信息是否开启',
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
// $instance['leaf_article_user_title'];=上面的设置选项内容
// 
}
if ( ! function_exists( 'leaf_article_user' ) ) {
    function leaf_article_user( $args, $instance ) {

        foreach ( $instance as $key => $article_user ) {
            if ( isset( $article_user ) && ! empty( $article_user ) ) {


                echo $instance['leaf_article_user_widget_title'];


                
            }
        }

    }
}
