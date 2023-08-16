<footer class="leaf_footer_all">
    <div class="leaf_footer_all_balck">
        <?php leaf_close_home_foot_assets(); ?>
        
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
    var category_id = <?php echo get_queried_object_id(); ?>;
    var search_keyword = "<?php echo get_search_query(); ?>";
</script>