<footer class="leaf_footer_all">
    <div class="leaf_footer_all_balck">
        <div class="leaf_footer_link_profile_copyright_sideab_contact">
            <div class="leaf_footer_profile_contact_sideab_block">
                <div class="leaf_footer_profile_block">
                    <p class="footer_logo_title">LEAF主题</p>
                    <p class="leaf_footer_profile">Leaf-主题是一个二次元个人博客主题，有着丰富的文章样式，以及强大的编辑器功能，还有那无微不至的优化功能，最后就是那浓浓的二次元味道~~</p>
                </div>
                <div class="leaf_footer_sideab_block">这里是小工具</div>
                <div class="leaf_footer_contact_block">
                    <div class="leaf_footer_contact_img_text"><img class="leaf_footer_contact_img" src="http://localhost/wp-content/themes/leaf-acg-theme/admin-function/assets/images/tg.webp">
                        <p class="leaf_footer_contact_text">QQ</p>
                    </div>
                    <div class="leaf_footer_contact_img_text"><img class="leaf_footer_contact_img" src="http://localhost/wp-content/themes/leaf-acg-theme/admin-function/assets/images/tg.webp">
                        <p class="leaf_footer_contact_text">bilibili</p>
                    </div>
                </div>
            </div>
            <div class="leaf_footer_link_block">
                <div class="leaf_footer_link_text_block">
                    <div class="leaf_footer_text_block">
                        <p class="leaf_footer_texe">友情链接：</p>
                    </div>
                    <div class="leaf_footer_link_img_block">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                        <img class="leaf_footer_link_img" src="http://localhost/wp-content/themes/leaf-acg-theme/leaf-assets/leaf-images/admin-logo.png" alt="">
                    </div>
                </div>
            </div>
            <div class="leaf_footer_copyright_block">
                <div class="leaf_footer_copyright">Leaf-主题 @2023-2023 所属权力归Leaf主题所有</div>
                <div class="leaf_mysql_data">数据库<?php echo get_num_queries(); ?>次查询 | 用时：<?php timer_stop(1, 7) ?>秒 | 消耗了：<?php echo memory_get_peak_usage() / 1024 / 1024; ?>MB 内存
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    //判断当前是否有class为leaf_slide_first
    if ($(".leaf_slide_first").length) {
        var swiper = new Swiper(".leaf_slide_first", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }
    var total = <?php echo $GLOBALS["wp_query"]->max_num_pages; ?>;
</script>