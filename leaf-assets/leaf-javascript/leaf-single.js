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