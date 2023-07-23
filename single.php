<html>
<?php
//引用主题的头部文件
require_once get_theme_file_path('/header.php');
//引用Wordpress自带的头部函数文件
wp_head();
?>
<?php
require_once get_theme_file_path('/leaf-theme/theme-single/theme-single-first.php');
?>
<?php
//引用主题的底部文件
require_once get_theme_file_path('/footer.php');
//引用Wordpress自带的底部函数文件
wp_footer();
?>

</html>