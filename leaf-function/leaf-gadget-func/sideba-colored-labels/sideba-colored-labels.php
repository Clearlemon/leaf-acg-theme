<?php
if (class_exists('CSF')) {

    CSF::createWidget('leaf_home_colored_labels', array(
        'title'       => 'Leaf-彩色标签云',
        'classname'   => 'leaf_home_colored_labels',
        'description' => '此小工具适用于各种页面',
        'fields'      => array(
            array(
                'id'      => 'leaf_home_colored_labels_widget_title',
                'type'    => 'text',
                'title'   => '小工具标题名称',
                'default' => '标签云',
            ),
            array(
                'id'      => 'leaf_home_colored_labels_chapter',
                'title'   => '选择要显示的[x]标签数量',
                'max'     => 16,
                'min'     => 0,
                'step'    => 1,
                'unit'    => '个',
                'type'    => 'spinner',
                'default' => 0,
            ),
            array(
                'id'    => 'leaf_home_colored_labels_displayed',
                'type'  => 'text',
                'title' => '不显示的标签',
            ),
            array(
                'id'          => 'leaf_home_colored_labels_select',
                'type'        => 'select',
                'title'       => '热榜文章显示选择',
                'options'     => array(
                    'leaf_home_colored_labels_default'  => '默认选择',
                    'leaf_home_colored_labels_3D'  => '3D选择',
                ),
                'default'     => 'leaf_home_colored_labels_default'
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

    if (!function_exists('leaf_home_colored_labels')) {
        function leaf_home_colored_labels($args, $colored_labels)
        {
            $sideba_title = $colored_labels['leaf_home_colored_labels_widget_title'];
            $sideba_tag_number = $colored_labels['leaf_home_colored_labels_chapter'];
            $exclude_tags = explode(',', $colored_labels['leaf_home_colored_labels_displayed']);
?>
            <div class="sidebar_home_tag_all">
                <?php if (isset($sideba_title) && !empty($sideba_title)) { ?>
                    <p class="leaf_sidebar_title_all">
                        <?php echo $sideba_title; ?>
                    </p>
                <?php } ?>
                <div class="sidebar_home_tag">
                    <div class="leaf_tagcloud  tagcloud fl">

                        <?php leaf_sideba_tag($sideba_tag_number, $exclude_tags); ?>
                    </div>
                </div>
            </div>
            <script>
                tagcloud({
                    selector: ".leaf_tagcloud",
                    fontsize: 14,
                    radius: 65,
                    mspeed: "slow",
                    ispeed: "slow",
                    direction: 135,
                    keep: true
                });
            </script>
<?php
        }

        function leaf_sideba_tag($tag_number = '', $exclude_tag_ids = array())
        {
            $tags = get_the_tags();
            if ($tags) {
                $counter = 0; // 计数器用于跟踪输出的标签数量
                foreach ($tags as $tag) {
                    // 检查当前标签的ID是否不在排除列表中
                    if (!in_array($tag->term_id, $exclude_tag_ids)) {
                        // 输出每个标签的名称和链接
                        echo '<span class="leaf_span_tag"><a class=" leaf_link_tag" href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></span>';
                        $counter++; // 增加计数器
                        if ($tag_number !== '' && $counter >= $tag_number) {
                            break; // 当标签数量达到指定数量时，跳出循环
                        }
                    }
                }
            }
        }
    }
}
