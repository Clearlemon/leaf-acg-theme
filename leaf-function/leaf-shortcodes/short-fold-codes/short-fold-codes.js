(function (tinymce) {
    tinymce.create('tinymce.plugins.cntent_fold', { //注意这里有个 cntent_fold
        init: function (ed, url) {
            ed.addButton('cntent_fold', { //注意这一行有一个 cntent_fold
                title: '折叠面板',
                image: url + '/fold.png', //注意图片的路径 url是当前js的路径
                onclick: function () {
                    ed.selection.setContent('[fold title="标题"]折叠面板内的内容[/fold]'); //这里是你要插入到编辑器的内容，你可以直接写上广告代码
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('cntent_fold', tinymce.plugins.cntent_fold); //注意这里有两个 cntent_fold
})(window.tinymce);

