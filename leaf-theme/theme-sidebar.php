<?php
if (is_home()) {
?>
    <div class="leaf-sidebar">
        <div class="leaf_sidebat_all_fixed">
            <?php dynamic_sidebar('leaf-home-sideba'); ?>
        </div>
    </div>
<?php } ?>
<?php
if (is_single()) {
?>
    <div class="leaf-sidebar">
        <div class="leaf_sidebat_all_fixed">
            <?php dynamic_sidebar('leaf-article-sideba'); ?>
        </div>
    </div>
<?php } ?>
<?php
if (is_search()) {
?>
    <div class="leaf-sidebar">
        <div class="leaf_sidebat_all_fixed">
            <?php dynamic_sidebar('leaf-search-sideba'); ?>
        </div>
    </div>
<?php } ?>
<?php
if (is_archive()) {
?>
    <div class="leaf-sidebar">
        <div class="leaf_sidebat_all_fixed">
            <?php dynamic_sidebar('leaf-classify-sideba'); ?>
        </div>
    </div>
<?php } ?>