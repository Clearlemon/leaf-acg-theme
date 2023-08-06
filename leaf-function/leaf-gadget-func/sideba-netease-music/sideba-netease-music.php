<?php
if (class_exists('CSF')) {
    CSF::createWidget('leaf_home_netease_music', array(
        'title'       => 'Leaf-网易云音乐',
        'classname'   => 'leaf_home_netease_music',
        'description' => '此小工具适用于各种页面',
        'fields'      => array(
            array(
                'id'      => 'leaf_home_netease_music_widget_title',
                'type'    => 'text',
                'title'   => '小工具标题名称',
                'default' => '网站音乐',
            ),
            array(
                'id'          => 'leaf_home_netease_music_select',
                'type'        => 'button_set',
                'title'       => '热榜文章显示选择',
                'options'     => array(
                    'leaf_home_netease_music_single'  => '单歌曲样式',
                    'leaf_home_netease_music_many'  => '多歌曲样式',
                ),
                'default'     => 'leaf_home_netease_music_single'
            ),
            array(
                'dependency' => array('leaf_home_netease_music_select', '==', 'leaf_home_netease_music_single'),
                'id'        => 'leaf_music_add',
                'class' => 'fields_no_padding-top',
                'type'      => 'group',
                'title'     => ' ',
                'subtitle' => '音乐添加',
                'fields'    => array(
                    array(
                        'id'    => 'add_music_title',
                        'class' => 'fields_no_padding-top',
                        'type'  => 'text',
                        'title' => '歌曲名',
                    ),
                    array(
                        'id'    => 'add_music_writer',
                        'class' => 'fields_no_padding-top',
                        'type'  => 'text',
                        'title' => '歌曲作者',
                    ),
                    array(
                        'id'    => 'add_music_photo',
                        'class' => 'fields_no_padding-top',
                        'type'  => 'upload',
                        'title' => '歌曲图片',
                        'preview' => true,
                    ),
                    array(
                        'id'    => 'add_music_links',
                        'class' => 'fields_no_padding-top',
                        'type'  => 'text',
                        'title' => '歌曲链接',
                    ),
                ),
            ),
            array(
                'dependency' => array('leaf_home_netease_music_select', '==', 'leaf_home_netease_music_many'),
                'id'    => 'leaf_home_netease_music_id',
                'type'  => 'number',
                'title' => '网易云[歌曲]or[歌单]ID',
                'unit'        => '歌单ID',
                'help' => '只支持网易云歌单ID',
                'desc' => '请填写你的网易云<b class="leaf_emphasis_fonts">不[歌单ID]</b>，网易云歌单的ID位置如下<b class="leaf_emphasis_fonts">[页面段才有ID]</b><br>
                https://music.163.com/#/playlist?id=<b class="leaf_emphasis_fonts">8611394350</b><br>
                <b class="leaf_emphasis_fonts">[id=]</b>之后的数字则为ID',
            ),
            array(
                'id'         => 'music_checkbox',
                'type'       => 'checkbox',
                'title'      => ' ',
                'subtitle' => '播放器样式设置',
                'class' => 'fields_no_padding-top leaf_radio_horizontal',
                'options'    => array(
                    'autoplay' => '自动播放',
                    'listFolded' => '歌单折叠',
                    'mini' => '迷你样式',
                ),
                'default'    => array('autoplay')
            ),
            array(
                'id'         => 'music_loop_checkbox',
                'type'       => 'radio',
                'title'      => ' ',
                'subtitle' => '音频循环设置',
                'class' => 'fields_no_padding-top leaf_radio_horizontal',
                'options'    => array(
                    'all' => '单曲循环',
                    'one' => '列表循环',
                    'none' => '列表结束',
                ),
                'default'    => array('autoplay')
            ),
            array(
                'id'         => 'music_order_checkbox',
                'type'       => 'radio',
                'title'      => ' ',
                'subtitle' => '音频播放设置',
                'class' => 'fields_no_padding-top leaf_radio_horizontal',
                'options'    => array(
                    'list' => '顺序播放',
                    'random' => '随机播放',
                ),
                'default'    => array('list')
            ),
            array(
                'id'      => 'music_volume',
                'type'    => 'slider',
                'title'   => ' ',
                'class' => 'fields_no_padding-top',
                'subtitle' => '音频声音设置',
                'default' => 0.7,
                'min'     => 0,
                'max'     => 1,
                'step'    => 0.1,
            ),
            array(
                'id'    => 'music_theme',
                'class' => 'fields_no_padding-top',
                'type'  => 'color',
                'title' => ' ',
                'subtitle' => '播放器颜色设置',
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
    if (!function_exists('leaf_home_netease_music')) {
        function leaf_home_netease_music($args, $netease_music)
        {
            if (empty($netease_music['leaf_home_netease_music'])) {
                $leaf_music_add = $netease_music['leaf_music_add'];
?>
                <div class="leaf_sidebar_home_netease_cloud_music">
                    <?php if (!empty($netease_music['leaf_home_netease_music_widget_title'])) { ?>
                        <p class="leaf_sidebar_title_all"><?php echo $netease_music['leaf_home_netease_music_widget_title']; ?></p>
                    <?php } ?>
                    <?php if ($netease_music['leaf_home_netease_music_select'] == 'leaf_home_netease_music_single') { ?>
                        <div id="leaf_netease_music"></div>
                    <?php } ?>
                    <?php if ($netease_music['leaf_home_netease_music_select'] == 'leaf_home_netease_music_many') { ?>
                        <meting-js server="netease" lrc-type="0" mini="<?php echo is_array($netease_music['music_checkbox']) && in_array('mini', $netease_music['music_checkbox']) ? 'true' : 'false'; ?>" theme="<?php if (!empty($netease_music['music_theme'])) {
                                                                                                                                                                                                                        echo $netease_music['music_theme'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo '#e7eff5bd';
                                                                                                                                                                                                                    } ?>" order="<?php echo $netease_music['music_order_checkbox'] === 'list' ? 'list' : 'random' ?>" type="playlist" id="<?php if (!empty($netease_music['leaf_home_netease_music_id'])) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo $netease_music['leaf_home_netease_music_id'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo '8611394350';
                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>" list-folded="<?php echo is_array($netease_music['music_checkbox']) && in_array('listFolded', $netease_music['music_checkbox']) ? 'true' : 'false'; ?>" autoplay="<?php echo is_array($netease_music['music_checkbox']) && in_array('autoplay', $netease_music['music_checkbox']) ? 'true' : 'false'; ?>" loop="<?php echo ($netease_music['music_loop_checkbox'] === 'all' || $netease_music['music_loop_checkbox'] === 'one' || $netease_music['music_loop_checkbox'] === 'none') ?  $netease_music['music_loop_checkbox'] : 'none'; ?>"></meting-js>
                    <?php } ?>
                </div>
                <?php if ($netease_music['leaf_home_netease_music_select'] == 'leaf_home_netease_music_single') { ?>
                    <script>
                        const ap = new APlayer({
                            container: document.getElementById('leaf_netease_music'),
                            autoplay: <?php echo is_array($netease_music['music_checkbox']) && in_array('autoplay', $netease_music['music_checkbox']) ? 'true' : 'false'; ?>,
                            listFolded: <?php echo is_array($netease_music['music_checkbox']) && in_array('listFolded', $netease_music['music_checkbox']) ? 'true' : 'false'; ?>,
                            mini: <?php echo is_array($netease_music['music_checkbox']) && in_array('mini', $netease_music['music_checkbox']) ? 'true' : 'false'; ?>,
                            volume: <?php if (!empty($netease_music['music_volume'])) {
                                        echo $netease_music['music_volume'];
                                    } else {
                                        echo '0.7';
                                    } ?>,
                            order: '<?php echo $netease_music['music_order_checkbox'] === 'list' ? 'list' : 'random' ?>',
                            loop: '<?php echo ($netease_music['music_loop_checkbox'] === 'all' || $netease_music['music_loop_checkbox'] === 'one' || $netease_music['music_loop_checkbox'] === 'none') ?  $netease_music['music_loop_checkbox'] : 'none'; ?>',
                            theme: '<?php if (!empty($netease_music['music_theme'])) {
                                        echo $netease_music['music_theme'];
                                    } else {
                                        echo '#e7eff5bd';
                                    } ?>',
                            audio: [<?php foreach ($leaf_music_add as $key) {
                                        $add_music_title = $key['add_music_title'];
                                        $add_music_links = $key['add_music_links'];
                                        $add_music_photo = $key['add_music_photo'];
                                        $add_music_writer = $key['add_music_writer']; ?> {
                                    name: '<?php echo !empty($add_music_title) ? $add_music_title : '无歌名'; ?>', //歌曲名称
                                    artist: '<?php echo !empty($add_music_writer) ? $add_music_writer : '无作者'; ?>', //歌曲作者
                                    url: '<?php echo !empty($add_music_photo) ? $add_music_photo : 'https://music.163.com/song/media/outer/url?id=1925831429'; ?>', //歌曲源文件地址
                                    cover: '<?php echo !empty($add_music_links) ? $add_music_links : 'https://p1.music.126.net/iTGo_SDqTJX9dAKAMCcL9Q==/109951167120338326.jpg?param=130y130'; ?>', //歌曲封面地址
                                }, <?php } ?>]
                        });
                    </script>
                <?php } ?>
<?php
            }
        }
    }
}
?>