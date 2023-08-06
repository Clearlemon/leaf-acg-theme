// 获取目标元素
var targetDiv = document.querySelector('.leaf-navtop_bigbackground');

// 监听滚动事件
window.addEventListener('scroll', function () {
    // 获取元素距离页面顶部的高度
    var divOffsetTop = targetDiv.offsetTop;

    // 获取滚动距离
    var scrollDistance = window.pageYOffset || document.documentElement.scrollTop;

    // 判断滚动距离是否超过60像素
    if (scrollDistance > divOffsetTop + 60) {
        // 修改 class 属性为 leaf_nav_alooftop
        targetDiv.className = 'leaf_nav_alooftop';
    } else {
        // 恢复原来的 class 属性
        targetDiv.className = 'leaf-navtop_bigbackground';
    }
});

//添加文章分类的class标签元素
//第一种文章样式
function showDiv(element) {
    element.classList.add('show');
}

function hideDiv(element) {
    element.classList.remove('show');
}
//获取所有的卡片元素
const cards = document.querySelectorAll('.leaf_home_article_container .leaf_home_article_card');
//添加展开和不展开事件监听
cards.forEach(card => {
    card.addEventListener('mouseover', expandCard);
    card.addEventListener('mouseout', collapseCard);
});

//对应分类显示
function expandCard(event) {
    const card = event.currentTarget;
    card.classList.add('expand');
}

//对应分类消失
function collapseCard(event) {
    const card = event.currentTarget;
    card.classList.remove('expand');
}
// 图片懒加载功能
document.addEventListener('DOMContentLoaded', function () {
    // 获取所有需要懒加载的图片元素
    var lazyImages = document.querySelectorAll('.leaf_images_are_preloaded');

    // 创建一个 Intersection Observer 对象，用于观察图片是否进入视口
    var imageObserver = new IntersectionObserver(function (entries, observer) {
        // entries 是一个包含所有被观察元素的数组
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                // 当图片进入视口时，执行以下操作

                // 获取图片元素
                var img = entry.target;

                // 获取图片的原始 URL 和当前的临时 URL
                var originalSrc = img.getAttribute('data-original');
                var tempSrc = img.getAttribute('src');

                // 确认 originalSrc 存在且为字符串类型
                if (originalSrc && typeof originalSrc === 'string') {
                    // 创建一个新的 Image 对象，用于预加载图片
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

                    // 设置 Image 对象的 src 属性为 data-original 的值，触发图片预加载
                    preloadImage.src = originalSrc;
                }

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
