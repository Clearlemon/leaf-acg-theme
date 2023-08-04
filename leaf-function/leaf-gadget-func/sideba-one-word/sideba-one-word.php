<?php

if( class_exists( 'CSF' ) ) {
CSF::createWidget( 'leaf_home_one_word', array(
    'title'       => 'Leaf-一言',
    'classname'   => 'leaf_home_one_word',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_one_word_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '网站一言',
    ),
    array(
        'id'          => 'leaf_home_one_word_select',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'one_word_summer_pockets'  => 'Summer Pockets',
    'one_word_clannad'  => 'Clannad',
    'one_word_air'  => 'Air',
    'one_word_kanon'  => 'Kanon',
    'one_word_angel_beats'  => 'Angel Beats',
        ),
        'default'     => 'home_article_hot_small_picture'
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
if( ! function_exists( 'leaf_home_one_word' ) ) {
    function leaf_home_one_word( $args, $one_word ) {

if ( isset( $one_word['leaf_home_one_word'] ) && ! empty( $one_word['leaf_home_one_word'] ) ) {
            echo $one_word['leaf_home_one_word_widget_title'];
}

    }
}
}
?>