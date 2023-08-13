// 图片懒加载功能
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

// 触发懒加载图片的函数
function lazyLoadImages() {
    // 获取所有需要懒加载的图片元素
    var lazyImages = document.querySelectorAll('.leaf_images_are_preloaded');

    // 开始观察需要懒加载的图片
    lazyImages.forEach(function (img) {
        imageObserver.observe(img);
    });
}

// 等待DOM内容完全加载后执行代码
document.addEventListener('DOMContentLoaded', function () {
    // 首次执行懒加载图片函数
    lazyLoadImages();

    // 获取加载更多按钮元素
    var loadMoreButton = document.getElementById('leaf-load-more-button');

    // 在按钮点击后延迟5秒执行懒加载图片函数
    loadMoreButton.addEventListener('click', function () {
        setTimeout(function () {
            lazyLoadImages();
        }, 2000); // 5秒延迟
    });
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
function expandCard(event) {
    const card = event.currentTarget;
    card.classList.add('expand');
}

function collapseCard(event) {
    const card = event.currentTarget;
    card.classList.remove('expand');
}

// 在点击加载更多按钮后执行的代码
function executeAfterLoadMore() {
    // 获取新加载的卡片元素
    const newCards = document.querySelectorAll('.leaf_home_article_container .leaf_home_article_card');

    // 重新绑定展开和折叠事件
    newCards.forEach(card => {
        card.addEventListener('mouseover', expandCard);
        card.addEventListener('mouseout', collapseCard);
    });
}

var H = false;
var paged = 2; // 初始化第二页
jQuery("#leaf-load-more-button").click(function () {
    var ajax_data = {
        action: "ajax_index_post",
        paged: paged,
        total: total,
        category_id: category_id,
    };
    H = true;
    jQuery("#leaf-load-more-button").html('加载中…').addClass('is-loading');
    jQuery.post('/wp-admin/admin-ajax.php', ajax_data, function (data) {
        if ($(".leaf_home_article_small_card_style_all").length) {
            jQuery(".leaf_home_article_small_card_style_all").append(data);//这里是包裹文章的容器名
        } else if ($(".leaf_home_article_style_card").length) {
            jQuery(".leaf_home_article_style_card").append(data);//这里是包裹文章的容器名
        } else if ($(".leaf_article_photo_album_all").length) {
            jQuery(".leaf_article_photo_album_all").append(data);//这里是包裹文章的容器名
        } else if ($(".leaf_category_page_post_all").length) {
            jQuery(".leaf_category_page_post_all").append(data);
        }
        executeAfterLoadMore();
        H = false;
        paged++;
        if (paged > total) {
            jQuery("#leaf-load-more-button").hide();
        } else {
            jQuery("#leaf-load-more-button").html('加载更多').removeClass('is-loading');
        }
    });
});
jQuery(window).scroll(function (i) {
    // if (jQuery("#show-more").length > 0) { // 注释掉此行
    $this = jQuery("#show-more");
    H = true;
    $this.html('加载中…').addClass('is-loading'),
        function (data) {
            jQuery('#show-more').remove();
            H = false;
            jQuery(".leaf_posting_inhome_all").append(data);//这里是包裹文章的容器名
        };
    // } // 注释掉此行
})