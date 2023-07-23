(function (tinymce) {
    tinymce.create('tinymce.plugins.cntent_hidden', { //注意这里有个 cntent_hidden
        init: function (ed, url) {
            ed.addButton('cntent_hidden', { //注意这一行有一个 cntent_hidden
                title: '登录查看内容',
                image: url + '/hide.png', //注意图片的路径 url是当前js的路径
                onclick: function () {
                    ed.selection.setContent('[hidden]需要隐藏的内容[/hidden]'); //这里是你要插入到编辑器的内容，你可以直接写上广告代码
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('cntent_hidden', tinymce.plugins.cntent_hidden); //注意这里有两个 cntent_hidden
})(window.tinymce);

