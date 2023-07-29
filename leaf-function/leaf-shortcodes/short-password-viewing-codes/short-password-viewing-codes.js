(function (tinymce) {
    tinymce.create('tinymce.plugins.cntent_password_viewing', {
        init: function (ed, url) {
            ed.addButton('cntent_password_viewing', {
                title: '密码查看内容',
                image: url + '/password-viewing.png', //注意图片的路径 url是当前js的路径
                onclick: function () {
                    ed.selection.setContent('[password_viewing key="输入密码" illustrate="密码下的说明"]需要隐藏的内容[/password_viewing]'); //这里是你要插入到编辑器的内容，你可以直接写上广告代码
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('cntent_password_viewing', tinymce.plugins.cntent_password_viewing);
})(window.tinymce);

