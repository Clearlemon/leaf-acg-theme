<?php
if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_weather', array(
    'title'       => 'Leaf-天气',
    'classname'   => 'leaf_home_weather',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_weather_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '天气',
    ),
    array(
        'id'          => 'leaf_home_weather_select',
        'type'        => 'select',
        'title'       => '天气样式选择',
    'options'     => array(
    'home_weather_default'  => '默认样式',
    ),
    'default'     => 'home_weather_default'
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
if( ! function_exists( 'leaf_home_weather' ) ) {
    function leaf_home_weather( $args, $home_weather ) {

if ( isset( $home_weather['leaf_home_weather'] ) && ! empty( $home_weather['leaf_home_weather'] ) ) {
            echo $home_weather['leaf_home_weather_widget_title'];
}

    }
}
}
?>