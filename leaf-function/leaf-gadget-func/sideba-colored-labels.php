<?php
if( class_exists( 'CSF' ) ) {

CSF::createWidget( 'leaf_home_colored_labels', array(
    'title'       => 'Leaf-彩色标签云',
    'classname'   => 'leaf_home_colored_labels',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
    array(
        'id'      => 'leaf_home_colored_labels_widget_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '标签云',
    ),
    array(
            'id'      => 'leaf_home_colored_labels_chapter',
            'title'   => '选择要显示的[x]标签数量',
            'max'     => 16,
            'min'     => 0,
            'step'    => 1,
            'unit'    => '个',
            'type'    => 'spinner',
            'default' => 0,
    ),
    array(
            'id'    => 'leaf_home_colored_labels_displayed',
            'type'  => 'number',
            'title' => '不显示的标签',
    ),
    array(
        'id'          => 'leaf_home_colored_labels_select',
        'type'        => 'select',
        'title'       => '热榜文章显示选择',
        'options'     => array(
    'leaf_home_colored_labels_default'  => '默认选择',
    'leaf_home_colored_labels_3D'  => '3D选择',
        ),
        'default'     => 'leaf_home_colored_labels_default'
    ),
    )
));

if ( ! function_exists( 'leaf_home_colored_labels' ) ) {
    function leaf_home_colored_labels( $args, $colored_labels ) {
if ( isset( $colored_labels['leaf_home_colored_labels_widget_title'] ) && ! empty( $colored_labels['leaf_home_colored_labels_widget_title'] ) ) {
    echo $colored_labels['leaf_home_colored_labels_widget_title'];
    }
    }
}
}

?>