<script type="text/javascript" language="javascript">
    /* <![CDATA[ */
    function grin(tag) {
        var myField;
        tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') { // textarea的id要为comment
            myField = document.getElementById('comment');
        } else {
            return false;
        }
        if (document.selection) {
            myField.focus();
            sel = document.selection.createRange();
            sel.text = tag;
            myField.focus();
        } else if (myField.selectionStart || myField.selectionStart == '0') {
            var startPos = myField.selectionStart;
            var endPos = myField.selectionEnd;
            var cursorPos = endPos;
            myField.value = myField.value.substring(0, startPos) +
                tag +
                myField.value.substring(endPos, myField.value.length);
            cursorPos += tag.length;
            myField.focus();
            myField.selectionStart = cursorPos;
            myField.selectionEnd = cursorPos;
        } else {
            myField.value += tag;
            myField.focus();
        }
    }
    /* ]]> */
</script>
<div id="smilelink"><!-- 下面全部替换为你的表情图片路径 -->
    <a onclick="javascript:grin(':?:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_question.gif" title="汗" alt="汗" /></a>
    <a onclick="javascript:grin(':razz:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_razz.gif" title="色" alt="色" /></a>
    <a onclick="javascript:grin(':sad:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_sad.gif" title="悲" alt="悲" /></a>
    <a onclick="javascript:grin(':evil:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_evil.gif" title="闭嘴" alt="闭嘴" /></a>
    <a onclick="javascript:grin(':!:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_exclaim.gif" title="调皮" alt="调皮" /></a>
    <a onclick="javascript:grin(':smile:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_smile.gif" title="笑" alt="笑" /></a>
    <a onclick="javascript:grin(':oops:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_redface.gif" title="惊" alt="惊" /></a>
    <a onclick="javascript:grin(':grin:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_biggrin.gif" title="亲" alt="亲" /></a>
    <a onclick="javascript:grin(':eek:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_surprised.gif" title="雷" alt="雷" /></a>
    <a onclick="javascript:grin(':shock:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_eek.gif" title="馋" alt="馋" /></a>
    <a onclick="javascript:grin(':???:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_confused.gif" title="晕" alt="晕" /></a>
    <a onclick="javascript:grin(':cool:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_cool.gif" title="酷" alt="酷" /></a>
    <a onclick="javascript:grin(':lol:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_lol.gif" title="奸" alt="奸" /></a>
    <a onclick="javascript:grin(':mad:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_mad.gif" title="怒" alt="怒" /></a>
    <a onclick="javascript:grin(':twisted:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_twisted.gif" title="狂" alt="狂" /></a>
    <a onclick="javascript:grin(':roll:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_rolleyes.gif" title="萌" alt="萌" /></a>
    <a onclick="javascript:grin(':wink:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_wink.gif" title="吃" alt="吃" /></a>
    <a onclick="javascript:grin(':idea:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_idea.gif" title="贪" alt="贪" /></a>
    <a onclick="javascript:grin(':arrow:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_arrow.gif" title="囧" alt="囧" /></a>
    <a onclick="javascript:grin(':neutral:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_neutral.gif" title="羞" alt="羞" /></a>
    <a onclick="javascript:grin(':cry:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_cry.gif" title="哭" alt="哭" /></a>
    <a onclick="javascript:grin(':mrgreen:')"><img src="<?php bloginfo('template_directory'); ?>/images/smilies/icon_mrgreen.gif" title="嘿" alt="嘿" /></a>
</div>