// 等待文档加载完成后执行JavaScript代码
document.addEventListener("DOMContentLoaded", function () {
    // 获取所有折叠面板元素
    const foldPanels = document.querySelectorAll(".leaf_fold_all");


    // 为每个折叠面板元素添加点击事件监听器
    foldPanels.forEach((panel) => {
        const title = panel.querySelector(".leaf_fold_title");
        const hideText = panel.querySelector(".leaf_fold_hide_text");

        // 添加点击事件监听器
        title.addEventListener("click", function () {
            // 切换折叠面板内容的显示状态
            if (hideText.style.display === "none") {
                hideText.style.display = "block";
                title.classList.add("leaf_folding_title");
            } else {
                hideText.style.display = "none";
                title.classList.remove("leaf_folding_title");
            }
        });
    });
});

//复制功能
function copyToClipboard(text) {
    const textarea = document.createElement("textarea");
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
}

// 获取所有具有复制和克隆功能的图标元素
const copyIcons = document.querySelectorAll(".fa-copy");
const cloneIcons = document.querySelectorAll(".fa-clone");

// 添加点击事件监听器以实现复制功能
copyIcons.forEach(icon => {
    icon.addEventListener("click", function () {
        // 获取当前图标元素所在的父节点以及所需复制的文本内容
        const parentBlock = this.parentElement;
        const textToCopy = parentBlock.querySelector(".lead_cloud_tq").innerText;

        // 调用复制函数，将提取码复制到剪贴板
        copyToClipboard(textToCopy);

        // 创建一个新的 div 元素，用于显示复制成功的提示信息
        const newDiv = document.createElement("div");
        newDiv.className = "leaf-prompt-pop-ups_blocl";

        // 创建一个子 div 元素，用于显示附加内容
        const additionalDiv = document.createElement("div");
        additionalDiv.className = "leaf-promp-content leaf-promp-content-show";
        additionalDiv.innerText = "✅成功复制提取码";

        // 将附加内容的 div 元素作为子元素添加到 newDiv 中
        newDiv.appendChild(additionalDiv);
        // 将新元素插入到 body 末尾
        document.body.appendChild(newDiv);

        setTimeout(function () {
            newDiv.classList.add("active");
        }, 10);

        // 自动删除新元素（延时 5 秒）
        setTimeout(function () {
            newDiv.remove();
        }, 3000);
    });
});

// 添加点击事件监听器以实现克隆功能
cloneIcons.forEach(icon => {
    icon.addEventListener("click", function () {
        // 获取当前图标元素所在的父节点以及所需复制的文本内容
        const parentBlock = this.parentElement;
        const textToClone = parentBlock.querySelector(".lead_cloud_jy").innerText;

        // 调用复制函数，将解压码复制到剪贴板
        copyToClipboard(textToClone);

        // 创建一个新的 div 元素，用于显示复制成功的提示信息
        const newDiv = document.createElement("div");
        newDiv.className = "leaf-prompt-pop-ups_blocl";

        // 创建一个子 div 元素，用于显示附加内容
        const additionalDiv = document.createElement("div");
        additionalDiv.className = "leaf-promp-content leaf-promp-content-show";
        additionalDiv.innerText = "✅成功复制解压码";

        // 将附加内容的 div 元素作为子元素添加到 newDiv 中
        newDiv.appendChild(additionalDiv);
        // 将新元素插入到 body 末尾
        document.body.appendChild(newDiv);

        setTimeout(function () {
            newDiv.classList.add("active");
        }, 10);
        // 自动删除新元素（延时 5 秒）
        setTimeout(function () {
            newDiv.remove();
        }, 3000);
    });
});

// 图片懒加载功能
document.addEventListener('DOMContentLoaded', function () {
    // 获取所有需要懒加载的图片元素
    var lazyImages = document.querySelectorAll('.leaf_images_are_preloaded');

    // 创建一个 Intersection Observer 对象
    var imageObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var img = entry.target;

                var originalSrc = img.getAttribute('data-original');
                var tempSrc = img.getAttribute('src');

                // 创建一个新的 Image 对象
                var preloadImage = new Image();

                // 设置加载完成的回调函数
                preloadImage.onload = function () {
                    // 仅当网络状态为200时，将 src 属性替换为 data-original 的值
                    if (preloadImage.naturalWidth > 0) {
                        img.setAttribute('src', originalSrc);
                    }
                };

                // 设置加载失败的回调函数
                preloadImage.onerror = function () {
                    // 如果网络状态不是200，保留原始的 src 属性
                    img.setAttribute('src', tempSrc);
                };

                // 设置 Image 对象的 src 属性为 data-original 的值
                preloadImage.src = originalSrc;

                // 停止观察该图片，因为图片已经加载过了
                observer.unobserve(img);
            }
        });
    });

    // 开始观察需要懒加载的图片
    lazyImages.forEach(function (img) {
        imageObserver.observe(img);
    });
});

function toggleTextClass(element) {
    // 获取要修改的 p 元素
    var textElement = element.querySelector('.leaf_click_view_text') || element.querySelector('.leaf_click_view_text_block');

    // 如果元素有 leaf_click_view_text 类，则替换为 leaf_click_view_text_block，否则反之
    if (textElement.classList.contains('leaf_click_view_text')) {
        textElement.classList.remove('leaf_click_view_text');
        textElement.classList.add('leaf_click_view_text_block');
    } else {
        textElement.classList.remove('leaf_click_view_text_block');
        textElement.classList.add('leaf_click_view_text');
    }
}


//主题点赞功能
$.fn.postLike = function () {
    if ($(this).hasClass('done')) {
        return false;
    } else {
        $(this).addClass('done');
        var id = $(this).data("id"),
            action = $(this).data('action'),
            rateHolder = $(this).children('.count');
        var ajax_data = {
            action: "bigfa_like",
            um_id: id,
            um_action: action
        };
        $.post("/wp-admin/admin-ajax.php", ajax_data, function (data) {
            $(rateHolder).html(data);
        });
        return false;
    }
};
$(document).on("click", ".favorite", function () {
    $(this).postLike();
});