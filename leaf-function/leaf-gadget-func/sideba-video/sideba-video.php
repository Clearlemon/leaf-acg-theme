<?php
if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_video', array(
    'title'       => 'Leaf-视频',
    'classname'   => 'leaf_home_video',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_video_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '视频',
    ),
    array(
        'id'    => 'leaf_home_video_media',
        'type'  => 'upload',
        'title' => '视频媒体选择',
        'preview' => true,
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
if( ! function_exists( 'leaf_home_video' ) ) {
    function leaf_home_video( $args, $home_video ) {

if ( isset( $home_video['leaf_home_video'] ) && ! empty( $home_video['leaf_home_video'] ) ) {
            echo $home_video['leaf_home_video_widget_title'];
}

    }
}
}
?>