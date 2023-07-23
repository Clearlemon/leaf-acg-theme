(function (tinymce) {
    tinymce.PluginManager.add('cntent_video', function (editor, url) {
        editor.addButton('cntent_video', {
            type: 'menubutton', // 使用下拉框样式
            title: '插入视频',
            image: url + '/video.png', // 注意图片的路径 url是当前js的路径
            menu: [
                {
                    text: '哔哩哔哩',
                    value: 'bilibili',
                    icon: ' ',
                    image: url + '/bilibili.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'bilibili') {
                            // 插入红色背景标签
                            editor.insertContent('[' + value + ' url="输入BV号"][/' + value + ']');
                        }
                    },
                },
                {
                    text: '优酷视频',
                    value: 'youku',
                    icon: ' ',
                    image: url + '/youku.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'youku') {
                            // 插入绿色背景标签
                            editor.insertContent('[' + value + ' url="输入视频ID"][/' + value + ']');
                        }
                    },
                },
                {
                    text: '腾讯视频',
                    value: 'tencent',
                    icon: ' ',
                    image: url + '/tencent.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'tencent') {
                            // 插入蓝色背景标签
                            editor.insertContent('[' + value + ' url="输入视频ID"][/' + value + ']');
                        }
                    },
                },
                {
                    text: '上传视频',
                    value: 'leafvideo',
                    icon: ' ',
                    image: url + '/leafvideo.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'leafvideo') {
                            // 插入蓝色背景标签
                            editor.insertContent('[' + value + ' url="输入视频链接" src="输入视频的封面图片"][/' + value + ']');
                        }
                    },
                },
            ],
        });
    });
})(window.tinymce);
