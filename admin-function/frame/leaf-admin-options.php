<?php
if( class_exists( 'CSF' ) ) {

    $prefix = 'leaf-themes';
    $imagepath = get_template_directory_uri() . '/style-actions/img/';
    CSF::createOptions( $prefix, array(
    'menu_title' => '叶ACG主题设置',
    'menu_slug'  => 'maple-themes',
    'framework_title'    => '<div class="admin-logo"></div>',
    'footer_text'        => '<div class="maple-set-admin-bottom">叶ACG主题是一个极易上手的主题</br>同时也是一个DIY较高的主题<br>此主题不仅仅对是一个主题，也是我人生中独自一人开发的第一款个人博客主题<br>框架延续的了枫主题的布局风格！问我为什么不修改呢？答案就是我懒！<br>
                            <div class="maple-set-admin-bottom-ico"><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-github"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-shejiaotubiao-39"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-youxiang"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-gitee"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-bilibili"></use></svg></div></div>
                            <div class="maple-set-admin-bottom-img"><img class="admin-bottom-img" src="'.get_template_directory_uri().'/admin-function/assets/images/tg.webp"/><img class="admin-bottom-img" src="'.get_template_directory_uri().'/admin-function/assets/images/qq.webp"/></div>',
    ));
    //主题文档
    CSF::createSection($prefix, array(
    'title'  => '主题文档',
    'icon' => '#icon-wendang',
    ));
    CSF::createSection( $prefix, array(
    'id'  => 'home',
    'title'  => '首页',
    'icon' => '#icon-shouye',
    ));
    CSF::createSection($prefix, array(
    'title'       => '主题更新',
    'icon' => '#icon-gengxin',
    ));
    CSF::createSection($prefix, array(
    'title'  => '备份&导入',
    'icon' => '#icon-shujubeifen',
    'fields'      => array(
            array(
                'type' => 'backup',
        ),                  
    ),
    ));

}
add_filter('admin_footer_text', 'maple_admin_footer', 99999);
function maple_admin_footer()
{
    return '感谢您使用<a href="https://wordpress.org">WordPress</a>和<a href="#">叶ACG主题进行建站</a>';
}

?>