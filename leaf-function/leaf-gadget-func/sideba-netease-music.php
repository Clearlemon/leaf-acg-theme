<?php
class Leaf_home_netease_music extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-网易云音乐');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_netease_music_widgets()
{
    register_widget('Leaf_home_netease_music');
}
add_action('widgets_init', 'Leaf_home_netease_music_widgets');

?>