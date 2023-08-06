<?php if (_leaf('leaf_slide_layout_choose') == 'leaf_slide_layout_choose-1') {
    if (!empty(_leaf('leaf_slide_layout_choose_1'))) {
?>
        <div class="leaf_slide_slider_article_all">
            <div class="leaf_slide_all leaf_slide_first">
                <div class="swiper-wrapper">
                    <?php leaf_slide_first_func(); ?>
                </div>
                <div class="swiper-button-next"><svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-xiangyou"></use>
                    </svg></div>
                <div class="swiper-button-prev"><svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-xiangzuo"></use>
                    </svg></div>
            </div>
        </div>
<?php }
} ?>