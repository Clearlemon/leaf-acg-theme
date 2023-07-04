<?php
class Leaf_home_ip_address extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-IP地址');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_ip_address_widgets()
{
    register_widget('Leaf_home_ip_address');
}
add_action('widgets_init', 'Leaf_home_ip_address_widgets');

?>