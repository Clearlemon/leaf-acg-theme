<?php

if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_time', array(
    'title'       => 'Leaf-时间',
    'classname'   => 'leaf_home_time',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_time_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '时间',
    ),
    array(
        'id'          => 'leaf_home_time_select',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'home_time_default'  => '默认',
    'home_time_particle'  => '粒子跳动',
        ),
        'default'     => 'home_time_default'
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
if( ! function_exists( 'leaf_home_time' ) ) {
    function leaf_home_time( $args, $home_time ) {

if ( isset( $home_time['leaf_home_time'] ) && ! empty( $home_time['leaf_home_time'] ) ) {
            echo $home_time['leaf_home_time_widget_title'];
}

    }
}
}
?>