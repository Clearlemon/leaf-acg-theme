<?php

if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_user', array(
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
        'id'          => 'leaf_home_user_select',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'leaf_home_user_automatic'  => '[自动]填写',
    'leaf_home_user_manual'  => '[手动]填写',
        ),
        'default'     => 'leaf_home_user_manual'
    ),
    array(
        'dependency' => array('leaf_home_user_select', '==', 'leaf_home_user_manual'),
        'id'    => 'leaf_home_user_avatar',
        'type'  => 'upload',
        'title' => '[自定义]的头像图片选择',
        'preview' => true,
    ),
    array(
        'dependency' => array('leaf_home_user_select', '==', 'leaf_home_user_manual'),
        'id'      => 'leaf_home_user_name',
        'type'    => 'text',
        'title'   => '[自定义]的名称',
    ),
    array(
        'id'       => 'leaf_home_user_box_html',
        'type'     => 'code_editor',
        'title'    => '用户名下的自定义html',
        'settings' => array(
        'theme'  => 'mdn-like',
        'mode'   => 'htmlmixed',
    ),
        'default'  => '<h1>这是用户简介区块</h1>',
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
if( ! function_exists( 'leaf_home_user' ) ) {
    function leaf_home_user( $args, $home_user ) {

if ( isset( $home_user['leaf_home_user'] ) && ! empty( $home_user['leaf_home_user'] ) ) {
            echo $home_user['leaf_home_user_widget_title'];
}

    }
}
}
?>