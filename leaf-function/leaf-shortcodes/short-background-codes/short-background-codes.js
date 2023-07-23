(function (tinymce) {
    tinymce.PluginManager.add('cntent_background', function (editor, url) {
        editor.addButton('cntent_background', {
            type: 'menubutton', // 使用下拉框样式
            title: '文字背景颜色',
            image: url + '/background.png', // 注意图片的路径 url是当前js的路径
            menu: [
                {
                    text: '红色背景',
                    value: 'radback',
                    icon: ' ',
                    image: url + '/rad_background.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'radback') {
                            // 插入红色背景标签
                            editor.insertContent('[' + value + ']在此输入内容[/' + value + ']');
                        }
                    },
                },
                {
                    text: '绿色背景',
                    value: 'greenback',
                    icon: ' ',
                    image: url + '/green_background.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'greenback') {
                            // 插入绿色背景标签
                            editor.insertContent('[' + value + ']在此输入内容[/' + value + ']');
                        }
                    },
                },
                {
                    text: '蓝色背景',
                    value: 'blueback',
                    icon: ' ',
                    image: url + '/blue_background.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'blueback') {
                            // 插入蓝色背景标签
                            editor.insertContent('[' + value + ']在此输入内容[/' + value + ']');
                        }
                    },
                },
                {
                    text: '黄色背景',
                    value: 'yellowback',
                    icon: ' ',
                    image: url + '/yellow_background.png', // 注意图片的路径 url是当前js的路径
                    onclick: function () {
                        // 获取选中的值
                        var value = this.value();

                        // 处理所选的菜单选项
                        if (value === 'yellowback') {
                            // 插入黄色背景标签
                            editor.insertContent('[' + value + ']在此输入内容[/' + value + ']');
                        }
                    },
                },
                // 可以根据需要添加更多选项
            ],
        });
    });
})(window.tinymce);
