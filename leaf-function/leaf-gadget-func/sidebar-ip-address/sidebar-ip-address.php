<?php
if (class_exists('CSF')) {
    CSF::createWidget('leaf_home_ip_address', array(
        'title'       => 'Leaf-IP地址',
        'classname'   => 'leaf_home_ip_address',
        'description' => '此小工具适用于各种页面',
        'fields'      => array(
            array(
                'id'      => 'leaf_home_ip_address_widget_title',
                'type'    => 'text',
                'title'   => '小工具标题名称',
                'default' => 'IP地址',
            ),
            array(
                'id'          => 'leaf_home_ip_address_select',
                'type'        => 'select',
                'title'       => 'IP地址样式',
                'options'     => array(
                    'home_ip_address_default'  => '默认样式',
                ),
                'default'     => 'home_ip_address_default'
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
    if (!function_exists('leaf_home_ip_address')) {
        function leaf_home_ip_address($args, $home_ip_address)
        {
            $sideba_title = $home_ip_address['leaf_home_ip_address_widget_title'];
            $leaf_home_ip_address_select = $home_ip_address['leaf_home_ip_address_select'];
?>
            <div class="sidebar_home_ip_all">
                <?php if (isset($sideba_title) && !empty($sideba_title)) { ?>
                    <p class="leaf_sidebar_title_all">
                        <?php echo $sideba_title; ?>
                    </p>
                <?php } ?>
                <div class="sidebar_ip_img">
                    <img class="sidebar_ip" src="<?php echo leaf_ip_img_choose($leaf_home_ip_address_select); ?>" height="150">
                </div>
            </div>
<?php

        }
        function leaf_ip_img_choose($leaf_home_ip_address_select)
        {
            if (!empty($leaf_home_ip_address_select)) {
                switch ($leaf_home_ip_address_select) {
                    case 'home_ip_address_default':
                        echo 'https://leaf.lmeon.com/ip/';
                        break;
                    default:
                        echo '';
                        break;
                }
            }
        }
    }
}
?>