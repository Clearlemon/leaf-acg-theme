<?php

use function PHPSTORM_META\type;

if (class_exists('CSF')) {

  $prefix = 'leaf-themes';
  $img_url = get_template_directory_uri() . '/leaf-assets/leaf-images/leaf-background-settings/';
  $img_setings_url = get_template_directory_uri() . '/leaf-assets/leaf-images/leaf-setings-demo/';
  $webp_format = '.webp';


  CSF::createOptions($prefix, array(
    'menu_title' => '叶ACG主题设置',
    'menu_slug'  => 'maple-themes',
    'framework_title'    => '<div class="admin-logo"></div>',
    'footer_text'        => '<div class="maple-set-admin-bottom">叶ACG主题是一个极易上手的主题</br>同时也是一个DIY较高的主题<br>此主题不仅仅对是一个主题，也是我人生中独自一人开发的第一款个人博客主题<br>框架延续的了枫主题的布局风格！问我为什么不修改呢？答案就是我懒！<br>
                            <div class="maple-set-admin-bottom-ico"><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-github"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-shejiaotubiao-39"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-youxiang"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-gitee"></use></svg><svg class="admin-bottom-icon" aria-hidden="true"><use class="maple-ico-admin" xlink:href="#icon-bilibili"></use></svg></div></div>
                            <div class="maple-set-admin-bottom-img"><img class="admin-bottom-img" src="' . get_template_directory_uri() . '/admin-function/assets/images/tg.webp"/><img class="admin-bottom-img" src="' . get_template_directory_uri() . '/admin-function/assets/images/qq.webp"/></div>',
  ));
  //主题首页设置
  CSF::createSection($prefix, array(
    'id'  => 'home',
    'title'  => '首页布局功能',
    'icon' => 'icon-shouye',
  ));

  CSF::createSection($prefix, array(
    'parent'      => 'home',
    'title'       => 'LOGO图标',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array(
      array(
        'id'    => 'leaf-web-icon',
        'type'  => 'upload',
        'title' => '网站的icon图标',
        'preview' => true,
        'default' => $img_url . 'favicon.ico',
        'desc'  => '图片的大小建议为<b class="leaf_emphasis_fonts">32*32</b>，最好是为ico格式',
      ),
      array(
        'id'         => 'close-logo',
        'title'      => '[PC]LOGO样式选择',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'type'       => 'image_select',
        'desc' => '选择你喜欢的导航logo样式，第一个为<b class="leaf_emphasis_fonts">[文字样式]</b>，第二个为<b class="leaf_emphasis_fonts">[图片样式]</b>。',
        'options'    => array(
          'text-logo' => $img_setings_url . 'texte-logo-deom' . $webp_format,
          'img-logo' => $img_setings_url . 'img-logo-deom' . $webp_format,
        ),
        'default' =>  'img-logo',
      ),
      array(
        'dependency' => array('close-logo', '==', 'img-logo'),
        'id'            => 'logo-tabbed-img',
        'type'          => 'tabbed',
        'title'         => '图片LOGO选项设置',
        'tabs'          => array(
          array(
            'title'     => '图片链接',
            'icon'      => 'fa fa-image',
            'fields'    => array(
              array(
                'id'    => 'leaf-web-logo',
                'type'  => 'upload',
                'title' => '网站的LOGO图像',
                'preview' => true,
                'default' => $img_url . 'logo' . $webp_format,
                'desc'  => '图片的大小建议为200*50，推荐使用Webp格式的图片',
              ),
            )
          ),
          array(
            'title'     => '其他功能',
            'icon'      => 'fa-solid fa-gear',
            'fields'    => array(
              array(
                'id'    => 'img-logo-sweep-light',
                'type'  => 'switcher',
                'title' => '图片扫光',
              ),
            )
          ),
        )
      ),
      array(
        'dependency' => array('close-logo', '==', 'text-logo'),
        'id'            => 'logo-tabbed-text',
        'type'          => 'tabbed',
        'title'         => '文字LOGO选项设置',
        'tabs'          => array(
          array(
            'title'     => '文字填写',
            'icon'      => 'fa-solid fa-pen',
            'fields'    => array(
              array(
                'id'    => 'leaf-text-logo',
                'type'  => 'text',
                'title' => '网站的LOGO文字',
                'default' => '叶ACG主题',
              ),
            )
          ),
          array(
            'title'     => '其他功能',
            'icon'      => 'fa-solid fa-gear',
            'fields'    => array(
              array(
                'id'    => 'text-logo-sweep-light',
                'type'  => 'switcher',
                'title' => '文字扫光',
              ),
              array(
                'id'    => 'text-logo-color',
                'type'  => 'color',
                'title' => '文字LOGO颜色',
              ),
            )
          ),
        )
      ),
      // array(
      //   'id'         => 'close-logo',
      //   'title'      => '[移动端]LOGO样式选择',
      //   'subtitle'   => '显示策略',
      //   'inline'     => true,
      //   'type'       => 'image_select',
      //   'class' => 'leaf-three-tabbed-img',
      //   'desc' => '选择你喜欢的导航logo样式，第一个为菜单页<b class="leaf_emphasis_fonts">[背景图+LOGO图]</b>样式，第二个为菜单页纯<b class="leaf_emphasis_fonts">[LOGO图]</b>样式,第三个为只在<b class="leaf_emphasis_fonts">导航栏顶部显示[LOGO]</b>样式。',
      //   'options'    => array(
      //     'mobile-bg-logo' => $img_setings_url . 'mobile-logo-bg'.$webp_format,
      //     'mobile-img-logo' => $img_setings_url . 'mobile-logo-img'.$webp_format,
      //     'mobile-home-img-logo' => $img_setings_url . 'mobile-home-logo-img'.$webp_format
      //   ),
      //   'default' =>  'mobile-img-logo',
      // ),
    ),
  ));

  CSF::createSection($prefix, array(
    'parent'      => 'home',
    'title'       => '顶部设置',
    'icon'        => 'icon-dingbudaohang',
    'description' => '',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----导航栏样式选择----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '导航栏居左&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp导航栏居中&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp导航栏居右',
      ),
      array(
        'id'         => 'close-nav-layout',
        'title'      => '[PC]导航栏样式选择',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'type'       => 'image_select',
        'class' => 'leaf-three-tabbed-img',
        'desc' => '选择你喜欢的导航栏样式，图片分别为居左，居中，居右三种样式',
        'options'    => array(
          'to-left' => $img_setings_url . 'nav-left-deom' . $webp_format,
          'to-center' => $img_setings_url . 'nav-center-deom' . $webp_format,
          'to-right' => $img_setings_url . 'nav-right-deom' . $webp_format,
        ),
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----搜素样式选择----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '弹出搜素&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp传统搜索框',
      ),
      array(
        'id'         => 'close-logo',
        'title'      => '搜索框样式选择',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'type'       => 'image_select',
        'desc' => '选择你喜欢的搜索样式，第一个为<b class="leaf_emphasis_fonts">[弹窗搜索]</b>样式，第二个为<b class="leaf_emphasis_fonts">[搜索框搜索]</b>样式。<b class="leaf_emphasis_fonts">[手机版默认为弹窗式搜索，不可更换！！]</b>',
        'options'    => array(
          'pop-ups-search-deom' => $img_setings_url . 'pop-ups-search-deom' . $webp_format,
          'input-search-deom' => $img_setings_url . 'input-search-deom' . $webp_format,
        ),
        'default' =>  'input-search-deom',
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----Banner样式选择----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '大图Banner样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp视频Banner样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp无Banner样式',
      ),
      array(
        'id'         => 'leaf_close_big_banner',
        'title'      => '大图Banner样式选择',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'type'       => 'image_select',
        'class' => 'leaf-three-tabbed-img',
        'desc' => '选择你喜欢的<b class="leaf_emphasis_fonts">Banner</b>样式，第一个为<b class="leaf_emphasis_fonts">[纯图片]</b>样式，第二个为<b class="leaf_emphasis_fonts">[MP4]</b>样式，第三个则不显示<b class="leaf_emphasis_fonts">[Banner]</b>',
        'options'    => array(
          'leaf_home_banner_1' => $img_setings_url . 'leaf_home_banner_1' . $webp_format,
          'leaf_home_banner_2' => $img_setings_url . 'leaf_home_banner_2' . $webp_format,
          'leaf_no_home_banner' => $img_setings_url . 'leaf_no_home_banner' . $webp_format,
        ),
        'default' =>  'leaf_no_home_banner',
      ),
      array(
        'id'            => 'leaf_banner_seting',
        'type'          => 'accordion',
        'title'         => 'Banner设置',
        'dependency' => array('leaf_close_big_banner', '!=', 'leaf_no_home_banner', ' ', true),
        'desc' => '<b class="leaf_emphasis_fonts">无Banner样式</b>不可使用此设置。',
        'accordions'    => array(
          array(
            'title'     => 'Banner设置块',
            'icon'      => 'fa fa-heart',
            'fields'    => array(
              array(
                'id'    => 'leaf_banner_img_upload',
                'type'  => 'upload',
                'title' => '图片样式选择',
                'preview' => true,
                'dependency' => array('leaf_close_big_banner', '==', 'leaf_home_banner_1', true),
              ),
              array(
                'id'    => 'leaf_banner_mp4_upload',
                'type'  => 'upload',
                'title' => '视频样式选择',
                'preview' => true,
                'dependency' => array('leaf_close_big_banner', '==', 'leaf_home_banner_2', true),
              ),
              array(
                'id'       => 'leaf_banner_height',
                'type'     => 'number',
                'title'    => 'Banner图的高度设置',
                'unit'   => '%',
                'default' => 40,
              ),
              array(
                'id'    => 'leaf_banner_title_switcher',
                'type'  => 'switcher',
                'title' => '是否开启Banner文字样式',
              ),
              array(
                'id'    => 'leaf_banner_title_h1',
                'type'  => 'text',
                'title' => '大标题文字',
                'dependency' => array('leaf_banner_title_switcher', '==', true, ' ', ' ', ' ', 'visible'),
              ),
              array(
                'id'    => 'leaf_banner_title_h4',
                'dependency' => array(
                  array('leaf_banner_title_switcher', '==', true),
                  array('leaf_banner_one_word_switcher', '==', false, ' ', ' ', ' ', 'visible'),
                ),
                'type'  => 'text',
                'title' => '副标题文字',
              ),
              array(
                'id'    => 'leaf_banner_one_word_switcher',
                'type'  => 'switcher',
                'title' => '是否开启一言',
                'desc' => '即代替<b class="leaf_emphasis_fonts">Banner的[副标题文字]</b>块。',
              ),
              array(
                'id'         => 'banner_one_word_choose',
                'type'       => 'button_set',
                'title'      => '一言选择',
                'class' => 'fields_no_padding-top',
                'dependency' => array('leaf_banner_one_word_switcher', '==', true),
                'options'    => array(
                  'word_cl'  => 'Clannad',
                  'word_air' => 'AIR',
                  'word_sp'  => 'Summer pockets',
                  'word_ab' => 'Angel Beats!',
                ),
                'default'    => 'word_cl'
              ),

              array(
                'id'         => 'show_banner_inpage_checkbox',
                'type'       => 'checkbox',
                'title'      => '文章加载方式',
                'class' => 'fields_no_padding-top leaf_radio_horizontal',
                'options'    => array(
                  'show_home_page' => '首页',
                  'show_single_page' => '文章页',
                  'show_category_page' => '分类页',
                  'show_search_page' => '搜素页',
                  'show_tag_page' => '标签页',
                  'show_links_page' => '友情页',
                  'pull_say_loading' => '说说页',
                ),
                'default'    => array('show_home_page')
              ),
            )
          ),
        ),
      ),

    ),
  ));

  CSF::createSection($prefix, array(
    'parent'      => 'home',
    'title'       => '文章样式设置',
    'icon'        => 'icon-yangshishezhi',
    'description' => '',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----文章样式选择----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '左图文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp顶部大图文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp底部三图文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp传统方形文章样式&nbsp&nbsp&nbsp|
                &nbsp&nbsp&nbsp顶图方形文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp[bing]图文章样式&nbsp&nbsp&nbsp|',
      ),
      array(
        'id'         => 'leaf_close_home_post_assets',
        'title'      => '首页文章样式',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'class' => 'leaf-six-tabbed-img',
        'type'       => 'image_select',
        'desc' => '选择你喜欢的文章首页样式,每一篇文章都只会显示<b class="leaf_emphasis_fonts">[当前选择]</b>的文章样式来进行输出，如果想单独修改个别文章的样式可以去<b class="leaf_emphasis_fonts">[文章发布页]</b>选择你想要的文章样式',
        'options'    => array(
          'leaf_article_style' => $img_setings_url . 'leaf_article_style' . $webp_format,
          'leaf_article_biglong_style' => $img_setings_url . 'leaf_article_biglong_style' . $webp_format,
          'leaf_article_three_img_card_style' => $img_setings_url . 'leaf_article_three_img_card_style' . $webp_format,
          'leaf_small_card_articles_alling' => $img_setings_url . 'leaf_small_card_articles_alling' . $webp_format,
          'leaf_article_container' => $img_setings_url . 'leaf_article_container' . $webp_format,
          'leaf_article_photo_album' => $img_setings_url . 'leaf_article_photo_album' . $webp_format,
        ),
        'default' =>  'input-search-deom',
      ),
      array(
        'id'         => 'leaf_post_radio',
        'type'       => 'radio',
        'title'      => '文章加载方式',
        'class' => 'fields_no_padding-top leaf_radio_horizontal',
        'options'    => array(
          'paginated_loading' => '分页加载',
          'ajax_loading' => 'AJAX刷新加载',
          'pull_down_loading' => '下拉自动加载',
        ),
        'default'    => array('paginated_loading')
      ),

      array(
        'type'    => 'heading',
        'content' => '<h3>   ----文章模块样式选择----    </h3>',
      ),
      //副标题
      array(
        'type'    => 'subheading',
        'content' => '左图文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp顶部大图文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp底部三图文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp传统方形文章样式&nbsp&nbsp&nbsp|
                &nbsp&nbsp&nbsp顶图方形文章样式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp[bing]图文章样式&nbsp&nbsp&nbsp|',
      ),
    ),
  ));

  CSF::createSection($prefix, array(
    'parent'      => 'home',
    'title'       => '底部设置',
    'icon'        => 'icon-zujian-dibudaohang',
    'description' => '',
    'fields'      => array(),
  ));
  //主题外观设置
  CSF::createSection($prefix, array(
    'id'  => 'appearance',
    'title'  => '外观功能',
    'icon' => 'icon-waiguanzidingyi',
  ));


  CSF::createSection($prefix, array(
    'parent'      => 'appearance',
    'title'       => '全局设置',
    'icon'        => 'icon-quanjushezhi',
    'description' => '',
    'fields'      => array(

      //全局颜色模块开始
      //标题
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----全局颜色模块----    </h3>',
      ),
      //副标题
      array(
        'type'    => 'subheading',
        'content' => '全局主题颜色&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp全局文字颜色&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp全局文字[:hover]颜色&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp全局链接颜色&nbsp&nbsp&nbsp|
                &nbsp&nbsp&nbsp全局链接[:hover]颜色&nbsp&nbsp&nbsp|',
      ),
      //主题全局配色开始
      array(
        'title'    => "全局主题色",
        'subtitle' => '默认主题高亮颜色',
        'id'       => 'leaf_theme_overall_color',
        'type' => 'color',
        'class' => 'fields_no_padding-bottom',
        'desc'     => '如果想选择下方的颜色则需将上方所选择的颜色<b class="leaf_emphasis_fonts">清空</b>才能选择|颜色默认值是<b class="leaf_emphasis_fonts">[空值]</b>',
      ),
      array(
        'title'      => ' ',
        'desc'       => '',
        'dependency' => array('leaf_theme_overall_color', '==', '', '', 'visible'),
        'id'         => "leaf_theme_overall_color_skin",
        'class' => 'fields_no_padding-top',
        'type'       => "palette",
        'options'    => array(
          ' ' => array(' '),
          'ff1856' => array('#fd2760'),
          'f04494' => array('#f04494'),
          'ae53f3' => array('#ae53f3'),
          '627bf5' => array('#627bf5'),
          '00a2e3' => array('#00a2e3'),
          '16b597' => array('#16b597'),
          '36af18' => array('#36af18'),
          '8fb107' => array('#8fb107'),
          'b18c07' => array('#b18c07'),
          'e06711' => array('#e06711'),
          'f74735' => array('#f74735'),
        ),
      ),
      //主题全局配色结束
      //全局文字颜色设置开始
      array(
        'title'    => "全局文字颜色",
        'subtitle' => '默认主题文字高亮颜色',
        'id'       => 'leaf_text_overall_color',
        'type' => 'color',
        'class' => 'fields_no_padding-bottom',
        'desc'     => '如果想选择下方的颜色则需将上方所选择的颜色<b class="leaf_emphasis_fonts">清空</b>才能选择|颜色默认值是<b class="leaf_emphasis_fonts">[空值]</b>',
      ),
      array(
        'title'      => ' ',
        'desc'       => '',
        'dependency' => array('leaf_text_overall_color', '==', '', '', 'visible'),
        'id'         => "leaf_text_overall_color_skin",
        'class' => 'fields_no_padding-top',
        'type'       => "palette",
        'options'    => array(
          ' ' => array(' '),
          'fd2760' => array('#fd2760'),
          'f04494' => array('#f04494'),
          'ae53f3' => array('#ae53f3'),
          '627bf5' => array('#627bf5'),
          '00a2e3' => array('#00a2e3'),
          '16b597' => array('#16b597'),
          '36af18' => array('#36af18'),
          '8fb107' => array('#8fb107'),
          'b18c07' => array('#b18c07'),
          'e06711' => array('#e06711'),
          'f74735' => array('#f74735'),
        ),
      ),
      //全局文字颜色设置结束
      //全局文字[:hover]颜色设置开始
      array(
        'title'    => "全局文字[:hover]颜色",
        'subtitle' => '默认主题文字高亮颜色',
        'id'       => 'leaf_text_hover_overall_color',
        'type' => 'color',
        'class' => 'fields_no_padding-bottom',
        'desc'     => '如果想选择下方的颜色则需将上方所选择的颜色<b class="leaf_emphasis_fonts">清空</b>才能选择|颜色默认值是<b class="leaf_emphasis_fonts">[空值]</b>',
      ),
      array(
        'title'      => ' ',
        'desc'       => '',
        'dependency' => array('leaf_text_hover_overall_color', '==', '', '', 'visible'),
        'id'         => "leaf_text_hover_overall_color_skin",
        'class' => 'fields_no_padding-top',
        'type'       => "palette",
        'options'    => array(
          ' ' => array(' '),
          'fd2760' => array('#fd2760'),
          'f04494' => array('#f04494'),
          'ae53f3' => array('#ae53f3'),
          '627bf5' => array('#627bf5'),
          '00a2e3' => array('#00a2e3'),
          '16b597' => array('#16b597'),
          '36af18' => array('#36af18'),
          '8fb107' => array('#8fb107'),
          'b18c07' => array('#b18c07'),
          'e06711' => array('#e06711'),
          'f74735' => array('#f74735'),
        ),
      ),
      //全局文字颜色设置结束
      //全局链接颜色设置开始
      array(
        'title'    => "全局链接颜色",
        'subtitle' => '默认主题链接高亮颜色',
        'id'       => 'leaf_link_text_overall_color',
        'type' => 'color',
        'class' => 'fields_no_padding-bottom',
        'desc'     => '如果想选择下方的颜色则需将上方所选择的颜色<b class="leaf_emphasis_fonts">清空</b>才能选择|颜色默认值是<b class="leaf_emphasis_fonts">[空值]</b>',
      ),
      array(
        'title'      => ' ',
        'desc'       => '',
        'dependency' => array('leaf_link_text_overall_color', '==', '', '', 'visible'),
        'id'         => "leaf_link_text_overall_color_skin",
        'class' => 'fields_no_padding-top',
        'type'       => "palette",
        'options'    => array(
          ' ' => array(' '),
          'fd2760' => array('#fd2760'),
          'f04494' => array('#f04494'),
          'ae53f3' => array('#ae53f3'),
          '627bf5' => array('#627bf5'),
          '00a2e3' => array('#00a2e3'),
          '16b597' => array('#16b597'),
          '36af18' => array('#36af18'),
          '8fb107' => array('#8fb107'),
          'b18c07' => array('#b18c07'),
          'e06711' => array('#e06711'),
          'f74735' => array('#f74735'),
        ),
      ),
      //全局文字颜色设置结束
      //全局文字颜色设置开始
      array(
        'title'    => "全局链接[:hover]颜色",
        'subtitle' => '默认主题链接[:hover]高亮颜色',
        'id'       => 'leaf_link_text_hover_overall_color',
        'type' => 'color',
        'class' => 'fields_no_padding-bottom',
        'desc'     => '如果想选择下方的颜色则需将上方所选择的颜色<b class="leaf_emphasis_fonts">清空</b>才能选择|颜色默认值是<b class="leaf_emphasis_fonts">[空值]</b>',
      ),
      array(
        'title'      => ' ',
        'desc'       => '',
        'dependency' => array('leaf_link_text_hover_overall_color', '==', '', '', 'visible'),
        'id'         => "leaf_link_text_hover_overall_color_skin",
        'class' => 'fields_no_padding-top',
        'type'       => "palette",
        'options'    => array(
          ' ' => array(' '),
          'fd2760' => array('#fd2760'),
          'f04494' => array('#f04494'),
          'ae53f3' => array('#ae53f3'),
          '627bf5' => array('#627bf5'),
          '00a2e3' => array('#00a2e3'),
          '16b597' => array('#16b597'),
          '36af18' => array('#36af18'),
          '8fb107' => array('#8fb107'),
          'b18c07' => array('#b18c07'),
          'e06711' => array('#e06711'),
          'f74735' => array('#f74735'),
        ),
      ),
      //全局文字颜色设置结束
      //全局颜色模块结束

      //全局侧边栏开始
      //标题
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----全局侧边栏模块[开 or 关]----    </h3>',
      ),
      //副标题
      array(
        'type'    => 'subheading',
        'content' => '首页侧边栏&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp文章页侧边栏&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp分类页侧边栏&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp友情链页侧边栏&nbsp&nbsp&nbsp|
                &nbsp&nbsp&nbsp搜索页侧边栏&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp标签页侧边栏&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp其他页侧边栏&nbsp&nbsp&nbsp|',
      ),
      //所有侧边栏开启开始
      array(
        'id'    => 'leaf_all_sideba_open',
        'type'  => 'switcher',
        'title' => '所有侧边栏',
      ),
      // 所有侧边栏开启结束
      //单独页面侧边栏开启开始
      array(
        'id'    => 'leaf_home_sideba_open',
        'type'  => 'switcher',
        'title' => '单独开启首页侧边栏[首页]侧边栏',
        'dependency' => array('leaf_all_sideba_open', '==', '', '', 'false'),
        'desc'     => '如果想要单独开启这个侧边栏块的话请<b class="leaf_emphasis_fonts">禁用[所有侧边栏]</b>这个开关才能进行选择>',
      ),
      array(
        'id'    => 'leaf_single_sideba_open',
        'type'  => 'switcher',
        'title' => '单独开启[文章页]侧边栏',
        'dependency' => array('leaf_all_sideba_open', '==', '', '', 'false'),
        'desc'     => '如果想要单独开启这个侧边栏块的话请<b class="leaf_emphasis_fonts">禁用[所有侧边栏]</b>这个开关才能进行选择>',
      ),
      array(
        'id'    => 'leaf_tag_sideba_open',
        'type'  => 'switcher',
        'title' => '单独开启[标签页]侧边栏',
        'dependency' => array('leaf_all_sideba_open', '==', '', '', 'false'),
        'desc'     => '如果想要单独开启这个侧边栏块的话请<b class="leaf_emphasis_fonts">禁用[所有侧边栏]</b>这个开关才能进行选择>',
      ),
      array(
        'id'    => 'leaf_classify_sideba_open',
        'type'  => 'switcher',
        'title' => '单独开启[分类页]侧边栏',
        'dependency' => array('leaf_all_sideba_open', '==', '', '', 'false'),
        'desc'     => '如果想要单独开启这个侧边栏块的话请<b class="leaf_emphasis_fonts">禁用[所有侧边栏]</b>这个开关才能进行选择>',
      ),
      array(
        'id'    => 'leaf_links_sideba_open',
        'type'  => 'switcher',
        'title' => '单独开启[友情页]侧边栏',
        'dependency' => array('leaf_all_sideba_open', '==', '', '', 'false'),
        'desc'     => '如果想要单独开启这个侧边栏块的话请<b class="leaf_emphasis_fonts">禁用[所有侧边栏]</b>这个开关才能进行选择>',
      ),
      array(
        'id'    => 'leaf_search_sideba_open',
        'type'  => 'switcher',
        'title' => '单独开启[搜索页]侧边栏',
        'dependency' => array('leaf_all_sideba_open', '==', '', '', 'false'),
        'desc'     => '如果想要单独开启这个侧边栏块的话请<b class="leaf_emphasis_fonts">禁用[所有侧边栏]</b>这个开关才能进行选择>',
      ),

    ),
  ));




  //文章内页设置
  CSF::createSection($prefix, array(
    'id'  => 'single',
    'title'  => '文章内页功能',
    'icon' => 'icon-wenzhang',
  ));
  CSF::createSection($prefix, array(
    'parent'      => 'single',
    'title'       => '页面布局',
    'icon'        => 'icon-quanjushezhi',
    'description' => '',
    'fields'      => array(
      array(
        'id'         => 'leaf_post_layout_choose',
        'title'      => '首页文章样式',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'type'       => 'image_select',
        'desc' => '选择你喜欢的文章页样式,默认选择第一篇<b class="leaf_emphasis_fonts">[顶部大图]</b>的文章样式。',
        'options'    => array(
          'leaf_post_layout_choose-1' => $img_setings_url . 'leaf_post_layout_choose-1' . $webp_format,
          'leaf_post_layout_choose-2' => $img_setings_url . 'leaf_post_layout_choose-2' . $webp_format,
        ),
        'default' =>  'input-search-deom',
      ),
    ),
  ));
  CSF::createSection($prefix, array(
    'parent'      => 'single',
    'title'       => '内容布局',
    'icon'        => 'icon-quanjushezhi',
    'description' => '',
    'fields'      => array(),
  ));
  //幻灯片设置
  CSF::createSection($prefix, array(
    'id'  => 'slide',
    'title'  => '幻灯片功能',
    'icon' => 'icon-zujian-huandengpian',
  ));
  CSF::createSection($prefix, array(
    'parent'      => 'slide',
    'title'       => '幻灯片布局',
    'icon'        => 'icon-quanjushezhi',
    'description' => '',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----幻灯片模块样式选择----    </h3>',
      ),
      //副标题
      array(
        'type'    => 'subheading',
        'content' => '[单]大图模式&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp[左]大图+[右]小图*2&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp[左]大图+[右]小图*6&nbsp&nbsp&nbsp',
      ),
      array(
        'id'         => 'leaf_slide_layout_choose',
        'title'      => '首页文章样式',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'class' => 'leaf-three-tabbed-img',
        'type'       => 'image_select',
        'desc' => '选择你喜欢的幻灯片样式默认为<b class="leaf_emphasis_fonts">不显示[幻灯片]</b>样式,如以启用幻灯片且不想展示幻灯片可以将你的<b class="leaf_emphasis_fonts">[幻灯片设置块]</b>全部<b class="leaf_emphasis_fonts">清除</b>即可',
        'options'    => array(
          'leaf_slide_layout_choose-1' => $img_setings_url . 'leaf_slide_layout_choose-1' . $webp_format,
          'leaf_slide_layout_choose-2' => $img_setings_url . 'leaf_slide_layout_choose-2' . $webp_format,
          'leaf_slide_layout_choose-3' => $img_setings_url . 'leaf_slide_layout_choose-3' . $webp_format,
        ),
        'default' =>  'input-search-deom',
      ),
      //第一种幻灯片样式开始
      array(
        'dependency' => array('leaf_slide_layout_choose', '==', 'leaf_slide_layout_choose-1', true),
        'id'        => 'leaf_slide_layout_choose_1',
        'type'      => 'group',
        'title'     => '左边大图',
        'accordion_title_prefix' => '幻灯片设置块[全局-第一种]',
        'accordion_title_auto' => false,
        'accordion_title_number'  =>  true,
        'fields'    => array(
          array(
            'id'         => 'slide_set_choose',
            'type'       => 'button_set',
            'title'      => '设置选择',
            'options'    => array(
              'customization_set'  => '自定义幻灯片',
              'post_id_set' => 'ID设置幻灯片',
            ),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----手动设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能需要你手动添加相关信息且不可以和[自动获取]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_title',
            'type'  => 'text',
            'title' => '幻灯片标题',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_sub_title',
            'type'  => 'text',
            'title' => '幻灯片[副标题]or[简介内容]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_links',
            'type'  => 'text',
            'title' => '幻灯片[链接]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_img',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[图片]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_avatar',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[头像]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'       => 'slide_set_time',
            'class' => 'fields_no_padding-top',
            'type'     => 'datetime',
            'title'    => '时间设置',
            'subtitle' => '',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'settings' => array(
              'altFormat'  => 'F j, Y',
              'dateFormat' => 'Y-m-d',
            ),
          ),
          array(
            'id'          => 'slide_set_categories',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
            'type'        => 'select',
            'title'       => '分类设置',
            'placeholder' => '请输入分类名称',
            'chosen'      => true,
            'ajax'        => true,
            'options'     => 'categories',
            'settings' => array(
              'min_length'  => 1,
            ),
          ),
          array(
            'id'    => 'slide_set_name',
            'type'  => 'text',
            'title' => '幻灯片[用户名]',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'slide_set_new_ups_left',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----ID设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能只适合文章类型获取相关内容信息功能，且不可以和[手动填写]功能一起使用',
          ),
          array(
            'id'          => 'slide_set_post_id',
            'type'        => 'select',
            'title' => '文章的ID',
            'placeholder' => '输出你要展示的文章名字',
            'chosen'      => true,
            'ajax'        => true,
            'options'     => 'posts',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
            'settings' => array(
              'min_length'  => 1,
            ),
          ),
          array(
            'id'    => 'slide_set_new_ups_right',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----全局幻灯片展示设置----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能用于控制[手动]和[ID]设置的展示功能，并不是单独于其中一个的功能。',
          ),
          array(
            'id'         => 'slide_display_location_all',
            'type'       => 'checkbox',
            'title'      => '轮播图显示页面',
            'class' => 'leaf_radio_horizontal',
            'options'    => array(
              'slide_home' => '首页',
              'slide_post' => '文章页',
              'slide_links' => '友联页',
              'slide_categories' => '分类页',
              'slide_tage' => '标签页',
            ),
            'default'    => array('slide_home')
          ),
          array(
            'id'         => 'slide_display_information_all',
            'type'       => 'checkbox',
            'title'      => '幻灯片展示块',
            'class' => 'fields_no_padding-top leaf_radio_horizontal',
            'options'    => array(
              'slide_in_categories' => '分类',
              'slide_in_title' => '标题',
              'slide_in_sub_title' => '副标题',
              'slide_in_time' => '时间',
              'slide_in_name' => '用户名',
              'slide_in_avatar' => '用户头像',
              'slide_in_links' => '文章链接',
            ),
            'default'    => array('slide_in_sub_title', 'slide_in_title', 'slide_in_categories', 'slide_in_time', 'slide_in_name', 'slide_in_avatar', 'slide_in_links')
          ),
        ),
      ),
      //第二种幻灯片样式结束
      //第二种幻灯片样式设置块开始
      array(
        'dependency' => array('leaf_slide_layout_choose', '==', 'leaf_slide_layout_choose-2', true),
        'id'        => 'leaf_slide_layout_choose_2_left',
        'type'      => 'group',
        'title'     => '左边大图',
        'accordion_title_prefix' => '幻灯片设置块[左-第二种]',
        'accordion_title_auto' => false,
        'accordion_title_number'  =>  true,
        'fields'    => array(
          array(
            'id'         => 'slide_set_choose',
            'type'       => 'button_set',
            'title'      => '设置选择',
            'options'    => array(
              'customization_set'  => '自定义幻灯片',
              'post_id_set' => 'ID设置幻灯片',
            ),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----手动设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能需要你手动添加相关信息且不可以和[自动获取]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_title',
            'type'  => 'text',
            'title' => '幻灯片标题',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_sub_title',
            'type'  => 'text',
            'title' => '幻灯片[副标题]or[简介内容]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_links',
            'type'  => 'text',
            'title' => '幻灯片[链接]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_img',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[图片]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_avatar',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[头像]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'       => 'slide_set_time',
            'class' => 'fields_no_padding-top',
            'type'     => 'datetime',
            'title'    => '时间设置',
            'subtitle' => '',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'settings' => array(
              'altFormat'  => 'F j, Y',
              'dateFormat' => 'Y-m-d',
            ),
          ),
          array(
            'id'          => 'slide_set_categories',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
            'type'        => 'select',
            'title'       => '分类设置',
            'placeholder' => '请输入分类名称',
            'chosen'      => true,
            'ajax'        => true,
            'options'     => 'categories',
            'settings' => array(
              'min_length'  => 1,
            ),
          ),
          array(
            'id'    => 'slide_set_name',
            'type'  => 'text',
            'title' => '幻灯片[用户名]',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'slide_set_new_ups_left',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----ID设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能只适合文章类型获取相关内容信息功能，且不可以和[手动填写]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_post_id',
            'type'  => 'number',
            'title' => '文章的ID',
            'unit'        => '文章ID',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_new_ups_right',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----全局幻灯片展示设置----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能用于控制[手动]和[ID]设置的展示功能，并不是单独于其中一个的功能。',
          ),
          array(
            'id'         => 'slide_display_location_left',
            'type'       => 'checkbox',
            'title'      => '轮播图显示页面',
            'class' => 'leaf_radio_horizontal',
            'options'    => array(
              'slide_home' => '首页',
              'slide_post' => '文章页',
              'slide_links' => '友联页',
              'slide_categories' => '分类页',
              'slide_tage' => '标签页',
            ),
            'default'    => array('slide_home')
          ),
          array(
            'id'         => 'slide_display_information_left',
            'type'       => 'checkbox',
            'title'      => '幻灯片展示块',
            'class' => 'fields_no_padding-top leaf_radio_horizontal',
            'options'    => array(
              'slide_in_categories' => '分类',
              'slide_in_title' => '标题',
              'slide_in_sub_title' => '副标题',
              'slide_in_time' => '时间',
              'slide_in_name' => '用户名',
              'slide_in_avatar' => '用户头像',
              'slide_in_links' => '文章链接',
            ),
            'default'    => array('slide_in_sub_title', 'slide_in_title', 'slide_in_categories', 'slide_in_time', 'slide_in_name', 'slide_in_avatar', 'slide_in_links')
          ),
        ),
      ),
      array(
        'id'        => 'leaf_slide_layout_choose_2_right',
        'dependency' => array('leaf_slide_layout_choose', '==', 'leaf_slide_layout_choose-2', true),
        'type'      => 'group',
        'title'     => '右小图',
        'accordion_title_prefix' => '幻灯片设置块[右-第二种]',
        'accordion_title_auto' => false,
        'accordion_title_number'  =>  true,
        'max' => 2,
        'fields'    => array(
          array(
            'id'         => 'slide_set_choose',
            'type'       => 'button_set',
            'title'      => '设置选择',
            'options'    => array(
              'customization_set'  => '自定义幻灯片',
              'post_id_set' => 'ID设置幻灯片',
            ),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----手动设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能需要你手动添加相关信息且不可以和[自动获取]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_title',
            'type'  => 'text',
            'title' => '幻灯片标题',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_sub_title',
            'type'  => 'text',
            'title' => '幻灯片[副标题]or[简介内容]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_links',
            'type'  => 'text',
            'title' => '幻灯片[链接]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_img',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[图片]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_avatar',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[头像]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'       => 'slide_set_time',
            'class' => 'fields_no_padding-top',
            'type'     => 'datetime',
            'title'    => '时间设置',
            'subtitle' => '',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'settings' => array(
              'altFormat'  => 'F j, Y',
              'dateFormat' => 'Y-m-d',
            ),
          ),
          array(
            'id'          => 'slide_set_categories',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
            'type'        => 'select',
            'title'       => '分类设置',
            'placeholder' => '请输入分类名称',
            'chosen'      => true,
            'ajax'        => true,
            'options'     => 'categories',
            'settings' => array(
              'min_length'  => 1,
            ),
          ),
          array(
            'id'    => 'slide_set_name',
            'type'  => 'text',
            'title' => '幻灯片[用户名]',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'slide_set_new_ups_left',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----ID设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能只适合文章类型获取相关内容信息功能，且不可以和[手动填写]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_post_id',
            'type'  => 'number',
            'title' => '文章的ID',
            'unit'        => '文章ID',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_new_ups_right',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----全局幻灯片展示设置----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能用于控制[手动]和[ID]设置的展示功能，并不是单独于其中一个的功能。',
          ),
          array(
            'id'         => 'slide_display_location_right',
            'type'       => 'checkbox',
            'title'      => '轮播图显示页面',
            'class' => 'leaf_radio_horizontal',
            'options'    => array(
              'slide_home' => '首页',
              'slide_post' => '文章页',
              'slide_links' => '友联页',
              'slide_categories' => '分类页',
              'slide_tage' => '标签页',
            ),
            'default'    => array('slide_home')
          ),
          array(
            'id'         => 'slide_display_information_right',
            'type'       => 'checkbox',
            'title'      => '幻灯片展示块',
            'class' => 'fields_no_padding-top leaf_radio_horizontal',
            'options'    => array(
              'slide_in_categories' => '分类',
              'slide_in_title' => '标题',
              'slide_in_sub_title' => '副标题',
              'slide_in_time' => '时间',
              'slide_in_name' => '用户名',
              'slide_in_avatar' => '用户头像',
              'slide_in_links' => '文章链接',
            ),
            'default'    => array('slide_in_sub_title', 'slide_in_title', 'slide_in_categories', 'slide_in_time', 'slide_in_name', 'slide_in_avatar', 'slide_in_links')
          ),
        ),
      ),
      //第二种幻灯片样式设置块结束
      //第三种幻灯片样式设置块开始
      array(
        'dependency' => array('leaf_slide_layout_choose', '==', 'leaf_slide_layout_choose-3', true),
        'id'        => 'leaf_slide_layout_choose_3_left',
        'type'      => 'group',
        'title'     => '左边大图',
        'accordion_title_prefix' => '幻灯片设置块[左-第三种]',
        'accordion_title_auto' => false,
        'accordion_title_number'  =>  true,
        'fields'    => array(
          array(
            'id'         => 'slide_set_choose',
            'type'       => 'button_set',
            'title'      => '设置选择',
            'options'    => array(
              'customization_set'  => '自定义幻灯片',
              'post_id_set' => 'ID设置幻灯片',
            ),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----手动设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能需要你手动添加相关信息且不可以和[自动获取]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_title',
            'type'  => 'text',
            'title' => '幻灯片标题',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_sub_title',
            'type'  => 'text',
            'title' => '幻灯片[副标题]or[简介内容]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_links',
            'type'  => 'text',
            'title' => '幻灯片[链接]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_img',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[图片]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_avatar',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[头像]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'       => 'slide_set_time',
            'class' => 'fields_no_padding-top',
            'type'     => 'datetime',
            'title'    => '时间设置',
            'subtitle' => '',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'settings' => array(
              'altFormat'  => 'F j, Y',
              'dateFormat' => 'Y-m-d',
            ),
          ),
          array(
            'id'          => 'slide_set_categories',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
            'type'        => 'select',
            'title'       => '分类设置',
            'placeholder' => '请输入分类名称',
            'chosen'      => true,
            'ajax'        => true,
            'options'     => 'categories',
            'settings' => array(
              'min_length'  => 1,
            ),
          ),
          array(
            'id'    => 'slide_set_name',
            'type'  => 'text',
            'title' => '幻灯片[用户名]',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'slide_set_new_ups_left',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----ID设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能只适合文章类型获取相关内容信息功能，且不可以和[手动填写]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_post_id',
            'type'  => 'number',
            'title' => '文章的ID',
            'unit'        => '文章ID',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_new_ups_right',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----全局幻灯片展示设置----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能用于控制[手动]和[ID]设置的展示功能，并不是单独于其中一个的功能。',
          ),
          array(
            'id'         => 'slide_display_location_left',
            'type'       => 'checkbox',
            'title'      => '轮播图显示页面',
            'class' => 'leaf_radio_horizontal',
            'options'    => array(
              'slide_home' => '首页',
              'slide_post' => '文章页',
              'slide_links' => '友联页',
              'slide_categories' => '分类页',
              'slide_tage' => '标签页',
            ),
            'default'    => array('slide_home')
          ),
          array(
            'id'         => 'slide_display_information_left',
            'type'       => 'checkbox',
            'title'      => '幻灯片展示块',
            'class' => 'fields_no_padding-top leaf_radio_horizontal',
            'options'    => array(
              'slide_in_categories' => '分类',
              'slide_in_title' => '标题',
              'slide_in_sub_title' => '副标题',
              'slide_in_time' => '时间',
              'slide_in_name' => '用户名',
              'slide_in_avatar' => '用户头像',
              'slide_in_links' => '文章链接',
            ),
            'default'    => array('slide_in_sub_title', 'slide_in_title', 'slide_in_categories', 'slide_in_time', 'slide_in_name', 'slide_in_avatar', 'slide_in_links')
          ),
        ),
      ),
      array(
        'id'        => 'leaf_slide_layout_choose_3_right',
        'dependency' => array('leaf_slide_layout_choose', '==', 'leaf_slide_layout_choose-3', true),
        'type'      => 'group',
        'title'     => '右小图',
        'accordion_title_prefix' => '幻灯片设置块[右-第三种]',
        'accordion_title_auto' => false,
        'accordion_title_number'  =>  true,
        'fields'    => array(
          array(
            'id'         => 'slide_set_choose',
            'type'       => 'button_set',
            'title'      => '设置选择',
            'options'    => array(
              'customization_set'  => '自定义幻灯片',
              'post_id_set' => 'ID设置幻灯片',
            ),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----手动设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能需要你手动添加相关信息且不可以和[自动获取]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_title',
            'type'  => 'text',
            'title' => '幻灯片标题',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_sub_title',
            'type'  => 'text',
            'title' => '幻灯片[副标题]or[简介内容]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_links',
            'type'  => 'text',
            'title' => '幻灯片[链接]',
            'class' => 'fields_no_padding-top',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_img',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[图片]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_avatar',
            'class' => 'fields_no_padding-top',
            'type'  => 'upload',
            'preview' => true,
            'title' => '幻灯片[头像]上传',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'id'       => 'slide_set_time',
            'class' => 'fields_no_padding-top',
            'type'     => 'datetime',
            'title'    => '时间设置',
            'subtitle' => '',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'settings' => array(
              'altFormat'  => 'F j, Y',
              'dateFormat' => 'Y-m-d',
            ),
          ),
          array(
            'id'          => 'slide_set_categories',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
            'type'        => 'select',
            'title'       => '分类设置',
            'placeholder' => '请输入分类名称',
            'chosen'      => true,
            'ajax'        => true,
            'options'     => 'categories',
            'settings' => array(
              'min_length'  => 1,
            ),
          ),
          array(
            'id'    => 'slide_set_name',
            'type'  => 'text',
            'title' => '幻灯片[用户名]',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'slide_set_new_ups_left',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'customization_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----ID设置幻灯片----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能只适合文章类型获取相关内容信息功能，且不可以和[手动填写]功能一起使用',
          ),
          array(
            'id'    => 'slide_set_post_id',
            'type'  => 'number',
            'title' => '文章的ID',
            'unit'        => '文章ID',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'id'    => 'slide_set_new_ups_right',
            'class' => 'fields_no_padding-top',
            'type'  => 'switcher',
            'title' => '新窗口打开',
            'dependency' => array('slide_set_choose', '==', 'post_id_set', '', 'visible'),
          ),
          array(
            'type'    => 'heading',
            'content' => '<h3>   ----全局幻灯片展示设置----    </h3>',
          ),
          array(
            'type'    => 'subheading',
            'content' => '注：本功能用于控制[手动]和[ID]设置的展示功能，并不是单独于其中一个的功能。',
          ),
          array(
            'id'         => 'slide_display_location_right',
            'type'       => 'checkbox',
            'title'      => '轮播图显示页面',
            'class' => 'leaf_radio_horizontal',
            'options'    => array(
              'slide_home' => '首页',
              'slide_post' => '文章页',
              'slide_links' => '友联页',
              'slide_categories' => '分类页',
              'slide_tage' => '标签页',
            ),
            'default'    => array('slide_home')
          ),
          array(
            'id'         => 'slide_display_information_right',
            'type'       => 'checkbox',
            'title'      => '幻灯片展示块',
            'class' => 'fields_no_padding-top leaf_radio_horizontal',
            'options'    => array(
              'slide_in_categories' => '分类',
              'slide_in_title' => '标题',
              'slide_in_sub_title' => '副标题',
              'slide_in_time' => '时间',
              'slide_in_name' => '用户名',
              'slide_in_avatar' => '用户头像',
              'slide_in_links' => '文章链接',
            ),
            'default'    => array('slide_in_sub_title', 'slide_in_title', 'slide_in_categories', 'slide_in_time', 'slide_in_name', 'slide_in_avatar', 'slide_in_links')
          ),

        ),
      ),
      //第三种幻灯片样式设置块结束
    ),
  ));
  //评论设置
  CSF::createSection($prefix, array(
    'id'  => 'comments',
    'title'  => '评论功能',
    'icon' => 'icon-pinglun',
  ));
  //用户中心设置
  CSF::createSection($prefix, array(
    'id'  => 'user',
    'title'  => '用户功能',
    'icon' => 'icon-yonghu',
  ));
  //SEO设置
  CSF::createSection($prefix, array(
    'id'  => 'seo',
    'title'  => '网站SEO功能',
    'icon' => 'icon-SEO',
  ));
  //主题广告位置设置
  CSF::createSection($prefix, array(
    'id'  => 'ad',
    'title'  => '广告位置功能',
    'icon' => 'icon-guanggao',
  ));
  //主题优化设置
  CSF::createSection($prefix, array(
    'id'  => 'optimize',
    'title'  => '优化功能',
    'icon' => 'icon-youhua2',
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
  CSF::createSection($prefix, array(
    'id'  => 'other',
    'title'  => '其他功能',
    'icon' => 'icon-qita',
  ));
  CSF::createSection($prefix, array(
    'parent'      => 'other',
    'title'       => 'TinyMCE编辑器功能',
    'icon'        => 'fa-solid fa-pen-to-square',
    'description' => '',
    'fields'      => array(
      array(
        'id'         => 'close-editor',
        'title'      => '编辑器样式选择',
        'subtitle'   => '显示策略',
        'inline'     => true,
        'type'       => 'image_select',
        'class' => 'leaf-three-tabbed-img',
        'desc' => '选择你所需的编辑器功能样式，第一个为<b class="leaf_emphasis_fonts">[原版编辑器]</b>样式，第二个为<b class="leaf_emphasis_fonts">[自定义丰富原版编辑器]</b>样式，第三个为<b class="leaf_emphasis_fonts">[自定义丰富原版编辑器+主题自带部分短代码样式]</b>样式。',
        'options'    => array(
          'original-tinymce' => $img_setings_url . 'original_tinymce.webp',
          'abundant-tinymce' => $img_setings_url . 'abundant_tinymce.webp',
          'leaf-tinymce' => $img_setings_url . 'abundant_tinymce.webp',
        ),
        'default' =>  'original-tinymce',
      ),
    ),
  ));
  //主题文档
  CSF::createSection($prefix, array(
    'title'  => '主题文档',
    'icon' => 'icon-wendang',
  ));
  //主题更新
  CSF::createSection($prefix, array(
    'title'       => '主题更新',
    'icon' => 'icon-xitonggengxin',
  ));
  //主题备份
  CSF::createSection($prefix, array(
    'title'  => '备份&导入',
    'icon' => 'icon-beifenhuifu',
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
