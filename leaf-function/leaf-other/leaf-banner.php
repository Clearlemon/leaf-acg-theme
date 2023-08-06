<?php
function leaf_banner_genre()
{
    $banner_close = _leaf('leaf_close_big_banner');

    //获取后台'type' => 'accordion'内所有的值
    //获取$accordion_values对应设置的id值并复制给自己创建的值中
    $accordion_values = _leaf('leaf_banner_seting');

    $leaf_banner_img_upload = $accordion_values['leaf_banner_img_upload'];
    $leaf_banner_mp4_upload = $accordion_values['leaf_banner_mp4_upload'];
    $leaf_banner_height = $accordion_values['leaf_banner_height'];
    $leaf_banner_title_switcher = $accordion_values['leaf_banner_title_switcher'];
    $leaf_banner_title_h1 = $accordion_values['leaf_banner_title_h1'];
    $leaf_banner_title_h4 = $accordion_values['leaf_banner_title_h4'];
    $leaf_banner_one_word_switcher = $accordion_values['leaf_banner_one_word_switcher'];
    $banner_one_word_choose  = $accordion_values['banner_one_word_choose'];
    //输出内容
    if ($banner_close == 'leaf_home_banner_1') { ?>
        <div class="leaf-head_nav_backgroundimg">
            <img class="leaf_header_banner_bg" src="<?php echo $leaf_banner_img_upload; ?>" width="100%" height="<?php if ($leaf_banner_height == '') {
                                                                                                                        echo '40';
                                                                                                                    } else {
                                                                                                                        echo $leaf_banner_height;
                                                                                                                    } ?>%" alt="">
            <div class="leaf_title-speech">
                <?php if ($leaf_banner_title_switcher == true) { ?>
                    <h1 class="leaf_h1_title"><?php echo $leaf_banner_title_h1; ?></h1>
                    <?php if ($leaf_banner_one_word_switcher == true) {
                        if ($banner_one_word_choose == 'word_cl') { ?>
                            <h2 id="cl-one-word" class="leaf_h4_title"></h2>
                        <?php } elseif ($banner_one_word_choose == 'word_air') { ?>
                            <h2 id="air-one-word" class="leaf_h4_title"></h2>
                        <?php } elseif ($banner_one_word_choose == 'word_ab') { ?>
                            <h2 id="ab-one-word" class="leaf_h4_title"></h2>
                        <?php } elseif ($banner_one_word_choose == 'word_sp') { ?>
                            <h2 id="sp-one-word" class="leaf_h4_title"></h2>
                        <?php }
                    } else { ?>
                        <h2 class="leaf_h4_title"><?php echo $leaf_banner_title_h4; ?></h2>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php
    } elseif ($banner_close == 'leaf_home_banner_2') { ?>
        <div class="leaf-head_nav_backgroundimg">
            <video id="hengfu" autoplay="" class="video" loop="" muted="" src="<?php echo $leaf_banner_mp4_upload; ?>" width="100%" style="object-fit: cover;" height="<?php if ($leaf_banner_height == '') {
                                                                                                                                                                            echo '40';
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $leaf_banner_height;
                                                                                                                                                                        } ?>%"></video>
            <div class="leaf_title-speech">
                <?php if ($leaf_banner_title_switcher == true) { ?>
                    <h1 class="leaf_h1_title"><?php echo $leaf_banner_title_h1; ?></h1>
                    <?php if ($leaf_banner_one_word_switcher == true) {
                        if ($banner_one_word_choose == 'word_cl') { ?>
                            <h2 id="cl-one-word" class="leaf_h4_title"></h2>
                        <?php } elseif ($banner_one_word_choose == 'word_air') { ?>
                            <h2 id="air-one-word" class="leaf_h4_title"></h2>
                        <?php } elseif ($banner_one_word_choose == 'word_ab') { ?>
                            <h2 id="ab-one-word" class="leaf_h4_title"></h2>
                        <?php } elseif ($banner_one_word_choose == 'word_sp') { ?>
                            <h2 id="sp-one-word" class="leaf_h4_title"></h2>
                        <?php }
                    } else { ?>
                        <h2 class="leaf_h4_title"><?php echo $leaf_banner_title_h4; ?></h2>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
<?php } elseif ($banner_close == 'leaf_no_home_banner') {
        echo '';
    }
}
