<?php
class Leaf_home_weather extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-天气');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_weather_widgets()
{
    register_widget('Leaf_home_weather');
}
add_action('widgets_init', 'Leaf_home_weather_widgets');

?>