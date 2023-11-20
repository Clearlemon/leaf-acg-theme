<?php if (!defined('ABSPATH')) {
  die;
} // Cannot access directly.
$prefix_page_opts = 'leaf-theme-page-article';

//
// 页面独立功能模块设置
//
// CSF::createMetabox($prefix_page_opts, array(
//   'title'        => 'Custom Page Options',
//   'post_type'    => 'page',
//   'show_restore' => true,
// ));

// //
// // Create a section
// //
// CSF::createSection($prefix_page_opts, array(
//   'title'  => 'Overview',
//   'icon'   => 'fas fa-rocket',
//   'fields' => array(

//     //
//     // A text field
//     //
//     array(
//       'id'    => 'opt-text',
//       'type'  => 'text',
//       'title' => 'Text',
//     ),

//     array(
//       'id'    => 'opt-textarea',
//       'type'  => 'textarea',
//       'title' => 'Textarea',
//       'help'  => 'The help text of the field.',
//     ),

//     array(
//       'id'    => 'opt-upload',
//       'type'  => 'upload',
//       'title' => 'Upload',
//     ),

//     array(
//       'id'    => 'opt-switcher',
//       'type'  => 'switcher',
//       'title' => 'Switcher',
//       'label' => 'The label text of the switcher.',
//     ),

//     array(
//       'id'      => 'opt-color',
//       'type'    => 'color',
//       'title'   => 'Color',
//       'default' => '#3498db',
//     ),

//     array(
//       'id'    => 'opt-checkbox',
//       'type'  => 'checkbox',
//       'title' => 'Checkbox',
//       'label' => 'The label text of the checkbox.',
//     ),

//     array(
//       'id'      => 'opt-radio',
//       'type'    => 'radio',
//       'title'   => 'Radio',
//       'options' => array(
//         'yes'   => 'Yes, Please.',
//         'no'    => 'No, Thank you.',
//       ),
//       'default' => 'yes',
//     ),

//     array(
//       'id'          => 'opt-select',
//       'type'        => 'select',
//       'title'       => 'Select',
//       'placeholder' => 'Select an option',
//       'options'     => array(
//         'opt-1'     => 'Option 1',
//         'opt-2'     => 'Option 2',
//         'opt-3'     => 'Option 3',
//       ),
//     ),

//   )
// ));

// //
// // Create a section
// //
// CSF::createSection($prefix_page_opts, array(
//   'title'  => 'More Fields',
//   'icon'   => 'fas fa-tint',
//   'fields' => array(

//     array(
//       'id'      => 'opt-image-select',
//       'type'    => 'image_select',
//       'title'   => 'Image Select',
//       'options' => array(
//         'opt-1' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
//         'opt-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
//         'opt-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
//         'opt-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
//         'opt-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
//       ),
//       'default' => 'opt-1',
//     ),

//     array(
//       'id'    => 'opt-background',
//       'type'  => 'background',
//       'title' => 'Background',
//     ),

//     array(
//       'type'    => 'notice',
//       'style'   => 'success',
//       'content' => 'A <strong>notice</strong> field with <strong>success</strong> style.',
//     ),

//     array(
//       'id'    => 'opt-icon',
//       'type'  => 'icon',
//       'title' => 'Icon',
//     ),

//     array(
//       'id'    => 'opt-alt-text',
//       'type'  => 'text',
//       'title' => 'Text',
//     ),

//     array(
//       'id'         => 'opt-alt-textarea',
//       'type'       => 'textarea',
//       'title'      => 'Textarea',
//       'subtitle'   => 'A textarea with shortcoder.',
//       'shortcoder' => 'csf_demo_shortcodes',
//     ),

//   )
// ));

//文章功能模块

$prefix_post_opts = 'leaf-theme-post';


CSF::createMetabox($prefix_post_opts, array(
  'title'        => '文章功能模块',
  'post_type'    => 'post',
  'show_restore' => true,

));


CSF::createSection($prefix_post_opts, array(
  'title'  => '文章[展示]功能',
  'icon'   => 'fas fa-tint',
  'fields' => array(

    array(
      'id'    => 'leaf-post-deputy-title',
      'type'  => 'text',
      'title' => '副标题',
    ),

    array(
      'title'    => "副标题颜色",
      'subtitle' => '副标题文字颜色',
      'id'       => 'leaf_post_deputy_title_color',
      'type' => 'color',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '如果想选择下方的颜色则需将上方所选择的颜色<b class="leaf_emphasis_fonts">清空</b>才能选择|颜色默认值是<b class="leaf_emphasis_fonts">[空值]</b>',
    ),
    array(
      'title'      => ' ',
      'desc'       => '',
      'dependency' => array('leaf_post_deputy_title_color', '==', '', '', 'visible'),
      'id'         => "leaf_post_deputy_title_color_skin",
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

    array(
      'id'    => 'leaf_post_backgroundimg',
      'type'  => 'upload',
      'preview' => true,
      'title' => '文章样式背景图片上传',
      'desc'     => '此功能默认情况下是不启用的，如果想使用的话请自行设计样式并上传<b class="leaf_emphasis_fonts">[图片]</b>即可',
      'library'      => 'image',
    ),

    array(
      'dependency' => array('leaf-post-genre', '!=', 'leaf-post-genre-3', ' ', ' ', ' ', 'visible'),
      'id'    => 'leaf_post_thumbnail_img',
      'type'  => 'upload',
      'title' => '文章缩略图上传',
      'preview' => true,
      'desc'     => '缩略图的展现顺序为 ><b class="leaf_emphasis_fonts"> 文章缩略图 </b>><b class="leaf_emphasis_fonts"> 特色图 </b>><b class="leaf_emphasis_fonts"> 文章内第一张图 </b>><b class="leaf_emphasis_fonts"> 随机图API </b>此顺序就行展示
      <br>Tip:<b class="leaf_emphasis_fonts">[顶部三图风格不适用此功能]</b>',
      'library'      => 'image',
    ),
  )
));

CSF::createSection($prefix_post_opts, array(
  'title'  => '文章[简介]功能',
  'icon'   => 'fas fa-tint',
  'fields' => array(
    array(
      'id'    => 'post_profile_switcher',
      'type'  => 'switcher',
      'title' => '是否开启文章简介',
    ),
    array(
      'id'         => 'post_profile_set',
      'type'       => 'button_set',
      'title'      => 'Button Set',
      'options'    => array(
        'profile_1'  => '简介样式1',
        'profile_2' => '简介样式2',
        'profile_3' => '简介样式3',
      ),
      'default'    => 'profile_1'
    ),

    array(
      'title'    => "[第一种]-简介内容",
      'id'       => 'first_profile_text',
      'type' => 'text',
      'desc'     => '用于推动给SEO标题',
      'dependency' => array('post_profile_set' == 'profile_1'),
    ),
  )
));

CSF::createSection($prefix_post_opts, array(
  'title'  => '文章[SEO]功能',
  'icon'   => 'fas fa-tint',
  'fields' => array(

    array(
      'id'    => 'post_seo_switcher',
      'type'  => 'switcher',
      'title' => '是否开启独立SEO',
      'desc'     => '如需要字段与文章SEO则开启此功能<b class="leaf_emphasis_fonts">功能可能会与插件起冲突，慎用！！！</b>',
    ),

    array(
      'title'    => "SEO标题",
      'id'       => 'post_seo_title',
      'type' => 'text',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推动给SEO标题',
    ),

    array(
      'title'    => "SEO关键字",
      'id'       => 'post_seo_keywords',
      'type' => 'text',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推送给SEO关键字',
    ),

    array(
      'title'    => "SEO内容",
      'id'       => 'post_seo_description',
      'type' => 'textarea',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推送给SEO内容',
    ),
  ),
));
//侧边栏模块功能

$prefix_meta_opts = 'leaf-theme-post_meta';

CSF::createMetabox($prefix_meta_opts, array(
  'title'     => '[样式风格]&[标签数量]选择',
  'post_type' => array('post'),
  'context'   => 'side',

));

CSF::createSection($prefix_meta_opts, array(
  'fields' => array(

    array(
      'id'          => 'leaf-post-genre',
      'type'        => 'select',
      'title'       => '风格选择',
      'options'     => array(
        'leaf-post-genre-0'     => '跟随全局设置',
        'leaf-post-genre-1'     => '左边大图风格',
        'leaf-post-genre-2'     => '顶部大图风格',
        'leaf-post-genre-3'     => '底部三图风格',
      ),
      'default' =>  'leaf-post-genre-0',
    ),
    array(
      'id'    => 'leaf-post-tag-number',
      'type'  => 'number',
      'title' => '要显示的标签数量',
      'default'  => '6',
    ),

  )
));
