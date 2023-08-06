<?php

if (class_exists('CSF')) {
    CSF::createWidget('leaf_home_one_word', array(
        'title'       => 'Leaf-一言',
        'classname'   => 'leaf_home_one_word',
        'description' => '此小工具适用于各种页面',
        'fields'      => array(
            array(
                'id'      => 'leaf_home_one_word_widget_title',
                'type'    => 'text',
                'title'   => '小工具标题名称',
                'default' => '网站一言',
            ),
            array(
                'id'          => 'leaf_home_one_word_select',
                'type'        => 'select',
                'title'       => '热榜文章显示选择',
                'options'     => array(
                    'one_word_summer_pockets'  => 'Summer Pockets',
                    'one_word_clannad'  => 'Clannad',
                    'one_word_air'  => 'Air',
                    'one_word_kanon'  => 'Kanon',
                    'one_word_angel_beats'  => 'Angel Beats',
                ),
                'default'     => 'home_article_hot_small_picture'
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
    if (!function_exists('leaf_home_one_word')) {
        function leaf_home_one_word($args, $one_word)
        {
            $sideba_title = $one_word['leaf_home_one_word_widget_title'];
            $leaf_home_one_word_select = $one_word['leaf_home_one_word_select'];

?>
            <div class="leaf_sidebar_home_one_word_all">
                <?php if (isset($sideba_title) && !empty($sideba_title)) { ?>
                    <p class="leaf_sidebar_title_all">
                        <?php echo $sideba_title; ?>
                    </p>
                <?php } ?>
                <div class="sidebar_home_one_word">
                    <div class="sidebar_home_one_word_in">
                        <div class="one_word_left">『</div>
                        <?php leaf_one_word($leaf_home_one_word_select); ?>
                        <div class="one_word_right">』</div>
                    </div>
                    <div class="one_word_name">—— 「<?php leaf_one_word_name($leaf_home_one_word_select); ?>」</div>
                </div>
            </div>
<?php
        }
        //依据选项更换名字
        function leaf_one_word_name($selected_option)
        {
            if (!empty($selected_option)) {
                switch ($selected_option) {
                    case 'one_word_summer_pockets':
                        echo 'Summer Pockets';
                        break;
                    case 'one_word_clannad':
                        echo 'Clannad';
                        break;
                    case 'one_word_air':
                        echo 'Air';
                        break;
                    case 'one_word_kanon':
                        echo 'Kanon';
                        break;
                    case 'one_word_angel_beats':
                        echo 'Angel Beats';
                        break;
                    default:
                        echo '';
                        break;
                }
            }
        }
    }

    //获取一言句子
    function leaf_one_word($hitokoto_text)
    {
        if (!empty($hitokoto_text)) {
            switch ($hitokoto_text) {
                case 'one_word_summer_pockets':
                    echo '<h2 class="one_word" id="hitokoto_text_summer_pockets"></h2>';
                    break;
                case 'one_word_clannad':
                    echo '<h2 class="one_word" id="hitokoto_text_clannad"></h2>';
                    break;
                case 'one_word_air':
                    echo '<h2 class="one_word" id="hitokoto_text_air"></h2>';
                    break;
                case 'one_word_kanon':
                    echo '<h2 class="one_word" id="hitokoto_text_kanon"></h2>';
                    break;
                case 'one_word_angel_beats':
                    echo '<h2 class="one_word" id="hitokoto_text_angel_beats"></h2>';
                    break;
                default:
                    echo '';
                    break;
            }
        }
    }
}
?>