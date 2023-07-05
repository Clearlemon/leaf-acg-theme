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
    function leaf_home_colored_labels( $args, $instance ) {

        foreach ( $instance as $key => $colored_labels ) {
            if ( isset( $colored_labels ) && ! empty( $colored_labels ) ) {
                if ( $key === 'leaf_home_colored_labels_widget_title' ) {
                    echo $colored_labels;
                }
            }
        }
    }
}
}

?>