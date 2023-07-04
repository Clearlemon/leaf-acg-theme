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
    //主题首页设置
    CSF::createSection( $prefix, array(
        'id'  => 'home',
        'title'  => '首页布局功能',
        'icon' => '#icon-shouyetianchong',
        ));
    //主题外观设置
    CSF::createSection( $prefix, array(
        'id'  => 'appearance',
        'title'  => '外观功能',
        'icon' => '#icon-waiguanzidingyi',
        )); 
    //文章内页设置
    CSF::createSection( $prefix, array(
        'id'  => 'single',
        'title'  => '文章内页功能',
        'icon' => '#icon-wenzhanglan',
        ));
    //幻灯片设置
    CSF::createSection( $prefix, array(
        'id'  => 'slide',
        'title'  => '幻灯片功能',
        'icon' => '#icon-zujian-huandengpian',
        ));
    //评论设置
    CSF::createSection( $prefix, array(
        'id'  => 'comments',
        'title'  => '评论功能',
        'icon' => '#icon-pinglun',
        ));
    //用户中心设置
    CSF::createSection( $prefix, array(
        'id'  => 'user',
        'title'  => '用户功能',
        'icon' => '#icon-yonghu',
        ));
    //SEO设置
    CSF::createSection( $prefix, array(
        'id'  => 'seo',
        'title'  => '网站SEO功能',
        'icon' => '#icon-SEO',
        ));
    //主题广告位置设置
    CSF::createSection( $prefix, array(
        'id'  => 'ad',
        'title'  => '广告位置功能',
        'icon' => '#icon-guanggao',
        ));
    //主题优化设置
    CSF::createSection( $prefix, array(
        'id'  => 'optimize',
        'title'  => '优化功能',
        'icon' => '#icon-youhua2',
        'fields'      => array(
            array(
                'type'    => 'heading',
                'content' => '<h3>   ----功能优化----    </h3>',
              ),
            array(
                'type'    => 'subheading',
                'content' => '以下优化为禁用Wordpress某功能的优化功能',
                ),
              array(
                'id'    => 'optimize-nowordpress-version',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress自动更新版本功能',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后Wordpress不会自动更新',
              ),
              array(
                'id'    => 'optimize-gutenberg-editor',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress古腾堡编辑器',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则会将Wordpress的古腾堡编辑器禁用，取而代之的是经典编辑器',
              ),
              array(
                'id'    => 'optimize-block-widgets',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress新版小工具',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则会将Wordpress的新版小工具禁用，取而代之的是经典小工具设置【同时禁用某些我觉得没必要存留的小工具】',
              ),
              array(
                'id'    => 'optimize-postings-revision',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress文章版本修订',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则不会修订版本占用数据库，打乱文章ID，建议关闭',
              ),
              array(
                'id'    => 'optimize-image-restrictions',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress图片限制功能',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则不会压缩超过Wordpress设置的限制图片大小',
              ),
              array(
                'id'    => 'optimize-multiple-image-sizes',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress多图片尺寸',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则不会生产一张图片三四种尺寸，有利于节省网站空间',
              ),
              array(
                'id'    => 'optimize-character-to-ma',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress字符转码',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则不会提高一定的速度，复制的子图也不会变弯',
              ),
              array(
                'id'    => 'optimize-picture-properties',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress插入图片添加属性',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后则不插入图片的时候会添加高和款以及他的class属性就不会会导致图片宽高被定死',
              ),
            array(
                'type'    => 'heading',
                'content' => '<h3>   ----前台输出优化----    </h3>',
              ),
            array(
                'type'    => 'subheading',
                'content' => '以下优化为禁用前台不必要文件的优化功能',
              ),
              array(
                'id'    => 'optimize-wordpress-version',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress版本功能',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后前台不会显示Wordpress的版本号而遭受该版本的漏洞攻击。',
              ),
             array(
                'id'    => 'optimize-admin-banner',
                'type'  => 'switcher',
                'default'  => true,
                'title' => '禁用头部的管理员Banner横条',
                'subtitle' => '默认选项为启用',
                'desc' => '启用后不会显示前台顶部的黑条管理员Banner，关闭也无妨但会影响网站的美观',
              ),
            array(
                'id'    => 'optimize-xml-rpl',
                'type'  => 'switcher',
                'default'  => true,
                'title' => '禁用XML-RPL功能',
                'subtitle' => '默认选项为启用',
                'desc' => '启用后不会被XML-RPC协议使用XML格式的数据进行通信，而无需直接访问WordPress后台。',
              ),
            array(
                'id'    => 'optimize-wordpress-version',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Wordpress版本功能',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后前台不会显示Wordpress的版本号而遭受该版本的漏洞攻击。',
              ),
            array(
                'id'    => 'optimize-emoji',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Emoji表情功能',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后前台不会加载与Emoji相关的文件',
              ),
            array(
                'id'    => 'optimize-gutenberg-reception-style',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用前台的古腾堡编辑器样式',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后前台不会加载与古腾堡编辑器样式文件',
              ),
            array(
                'id'    => 'optimize-classic-reception-style',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用前台的经典编辑器样式',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后前台不会加载与古经典辑器样式文件',
              ),
            array(
                'id'    => 'optimize-dns-prefetch',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用前台dns-prefetch',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后前台网页不再显示WordPress版本号标识符，以免遭受版本号攻击',
              ),
              array(
                'id'    => 'optimize-rest-api',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用前台REST API',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后某些小程序可能无法使用',
              ),
              array(
                'id'    => 'optimize-trackbacks-pingbacks',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用Trackbacks/Pingbacks',
                'subtitle' => '默认选项为禁用',
                'desc' => '启用后某会解决某些垃圾信息和恶意链接的问题',
              ),
            array(
                'type'    => 'heading',
                'content' => '<h3>   ----函数优化----    </h3>',
              ),
            array(
                'type'    => 'subheading',
                'content' => '以下优化为禁用函数的优化功能',
              ),
            array(
                'id'    => 'optimize-translations-api',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用translations_api函数',
                'subtitle' => '默认是为禁用的状态',
                'desc' => '启用后进入设置后，不会再次去WordPress.org查询翻译了',
              ),
            array(
                'id'    => 'optimize-check-php',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用wp_check_php_version函数',
                'subtitle' => '默认是为禁用的状态',
                'desc' => '启用后进入设置后，不会再次去查用户是否要更新PHP了',
              ),
            array(
                'id'    => 'optimize-check-browser',
                'type'  => 'switcher',
                'default'  => false,
                'title' => '禁用wp_check_browser_version函数',
                'subtitle' => '默认是为禁用的状态',
                'desc' => '启用后进入设置后，不会再次去查用户是否要更新浏览器了',
              ),                                    
        ),
        ));       
    //其他设置
    CSF::createSection( $prefix, array(
        'id'  => 'other',
        'title'  => '其他功能',
        'icon' => '#icon-qita',
        ));
    //主题文档
    CSF::createSection($prefix, array(
    'title'  => '主题文档',
    'icon' => '#icon-wendang',
        ));
    //主题更新
    CSF::createSection($prefix, array(
    'title'       => '主题更新',
    'icon' => '#icon-xitonggengxin',
        ));
    //主题备份
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