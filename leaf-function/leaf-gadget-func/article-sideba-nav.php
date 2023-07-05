<?php
//文章内页导航样式设计
if( class_exists( 'CSF' ) ) {

CSF::createWidget( 'leaf_article_nav', array(
    'title'       => 'Leaf-文章内页目录导航',
    'classname'   => 'leaf_article_nav',
    'description' => '此小工具适用于文章内页才会显示',
    'fields'      => array(
    array(
        'id'      => 'leaf_article_nav_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
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
        'leaf_sideba_all_pc_and_mobile' => '[PC]和[mobile]都显示',
        'leaf_sideba_all_pc' => '只显示[PC]',
        'leaf_sideba_all_mobile' => '只显示[mobile]',
    ),
        'default'    => 'leaf_sideba_all_pc_and_mobile', 
    ),
    )
));
// 
// echo=输出  
// $instance['leaf_article_nav_title'];=上面的设置选项内容
// 
  if( ! function_exists( 'leaf_article_nav' ) ) {
    function leaf_article_nav( $args, $instance ) {
        foreach ( $instance as $key => $article_nav ) {
            if ( isset( $article_nav ) && ! empty( $article_nav ) ) {
      echo $instance['leaf_article_nav_title'];

            }
        }
    }
  }

}
