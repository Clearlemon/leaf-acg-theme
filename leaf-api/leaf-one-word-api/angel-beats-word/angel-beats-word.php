<?php
// 确保计数器文件存在，并获取计数值
$counter_file = "counter.dat";
if (!file_exists($counter_file)) {
    file_put_contents($counter_file, "0");
}
$counter = intval(file_get_contents($counter_file));

// 更新计数值并保存
$_SESSION['#'] = true;
$counter++;
file_put_contents($counter_file, $counter);

// 获取句子文件的绝对路径
$path = dirname(__FILE__);
$file_path = $path . "/angel-beats.txt";

// 检查文件是否存在
if (file_exists($file_path)) {
    // 读取文件内容并按行存储在数组中
    $file = file($file_path);

    // 随机选择一行句子
    $random_line = rand(0, count($file) - 1);
    $content = trim($file[$random_line]);
} else {
    // 如果文件不存在，给出默认句子
    $content = "The world is beautiful.";
}

// 处理编码和格式化请求
if (isset($_GET['encode']) && $_GET['encode'] === 'js') {
    // 输出JS格式
    echo "function api(){document.write('" . $content . "');}";
} else if (isset($_GET['encode']) && $_GET['encode'] === 'json') {
    // 输出JSON格式
    header('Content-type:text/json');
    $content = array('text' => $content);
    echo json_encode($content, JSON_UNESCAPED_UNICODE);
} else {
    // 默认输出纯文本格式
    echo $content;
}
