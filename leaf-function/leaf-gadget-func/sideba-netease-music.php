<?php
if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_netease_music', array(
    'title'       => 'Leaf-网易云音乐',
    'classname'   => 'leaf_home_netease_music',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_netease_music_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
    ),
    array(
        'id'          => 'leaf_home_netease_music_select',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'leaf_home_netease_music_single'  => '单歌曲样式',
    'leaf_home_netease_music_many'  => '多歌曲样式',
        ),
        'default'     => 'leaf_home_netease_music_single'
    ),
    array(
            'dependency' => array('leaf_home_netease_music_select', '==', 'leaf_home_netease_music_single'),
            'id'    => 'leaf_home_netease_music_id',
            'type'  => 'number',
            'title' => '网易云[歌曲]ID',
    ),
    array(
            'dependency' => array('leaf_home_netease_music_select', '==', 'leaf_home_netease_music_many'),
            'id'    => 'leaf_home_netease_music_id',
            'type'  => 'number',
            'title' => '网易云[歌曲]or[歌单]ID',
    ),
    ),
));
if( ! function_exists( 'leaf_home_netease_music' ) ) {
    function leaf_home_netease_music( $args, $netease_music ) {

if ( isset( $netease_music['leaf_home_netease_music'] ) && ! empty( $netease_music['leaf_home_netease_music'] ) ) {
            echo $netease_music['leaf_home_netease_music_widget_title'];
}

    }
}
}
?>