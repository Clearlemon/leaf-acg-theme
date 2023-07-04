<?php
class Leaf_home_video extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-叶主题视频');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_video_widgets()
{
    register_widget('Leaf_home_video');
}
add_action('widgets_init', 'Leaf_home_video_widgets');

?>