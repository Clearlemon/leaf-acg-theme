<?php
class Leaf_home_one_word extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-一言');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_one_word_widgets()
{
    register_widget('Leaf_home_one_word');
}
add_action('widgets_init', 'Leaf_home_one_word_widgets');

?>