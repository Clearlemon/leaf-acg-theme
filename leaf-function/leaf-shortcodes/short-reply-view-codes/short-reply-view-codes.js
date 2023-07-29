(function (tinymce) {
    tinymce.create('tinymce.plugins.cntent_reply_view', {
        init: function (ed, url) {
            ed.addButton('cntent_reply_view', {
                title: '回复查看内容',
                image: url + '/reply-view.png', //注意图片的路径 url是当前js的路径
                onclick: function () {
                    ed.selection.setContent('[reply_view]需要隐藏的内容[/reply_view]'); //这里是你要插入到编辑器的内容，你可以直接写上广告代码
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('cntent_reply_view', tinymce.plugins.cntent_reply_view);
})(window.tinymce);

