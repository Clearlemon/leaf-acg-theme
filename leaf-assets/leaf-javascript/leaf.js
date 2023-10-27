
//添加文章分类的class标签元素
//第一种文章样式
function showDiv(element) {
    element.classList.add('show');
}

function hideDiv(element) {
    element.classList.remove('show');
}
//获取所有的卡片元素

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

const cards = document.querySelectorAll('.leaf_home_article_container .leaf_home_article_card');
//添加展开和不展开事件监听
cards.forEach(card => {
    card.addEventListener('mouseover', expandCard);
    card.addEventListener('mouseout', collapseCard);
});

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

    // 定义执行懒加载图片函数的定时器
    var lazyLoadTimer = setInterval(function () {
        lazyLoadImages();
    }, 2000); // 2秒延迟

    // 获取加载更多按钮元素
    var loadMoreButton = document.getElementById('leaf-load-more-button');

    // 在按钮点击后重新设置定时器
    loadMoreButton.addEventListener('click', function () {
        clearInterval(lazyLoadTimer); // 清除之前的定时器
        setTimeout(function () {
            lazyLoadImages();
            // 在按钮点击后重新启动定时器
            lazyLoadTimer = setInterval(function () {
                lazyLoadImages();
            }, 2000); // 2秒延迟
        }, 2000);
    });
});

var H = false;
var paged = 2; // 初始化第二页
var loadingDelay = false;
jQuery("#leaf-load-more-button").click(function () {
    var ajax_data = {
        action: "ajax_index_post",
        paged: paged,
        total: total,
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
        } else if ($(".leaf_posting_inhome_all").length) {
            jQuery(".leaf_posting_inhome_all").append(data);//这里是包裹文章的容器名
        }
        executeAfterLoadMore();
        H = false;
        paged++;
        if (paged > total) {
            jQuery("#leaf-load-more-button").html('没有更多的文章了').removeClass('is-loading');
        } else {
            jQuery("#leaf-load-more-button").html('加载更多').removeClass('is-loading');
        }
    });
});


jQuery(document).ready(function ($) {
    var selectedCategory = ''; // 初始化选择的分类
    var paged = 1; // 初始化页码

    $('.home_category').on('click', function () {

        $('.home_category').removeClass('current_click');

        // 为当前点击的 <li> 添加 'current' 和 'click' 类
        $(this).addClass('current_click');

        selectedCategory = $(this).attr('cateid');
        paged = 1; // 重置页码

        if (selectedCategory === '0') {
            selectedCategory = ''; // 将0转换为空字符串，以获取所有文章
        }

        loadPosts(selectedCategory, paged); // 调用加载文章函数
    });

    $('#leaf-load-car-more-button').on('click', function () {
        paged++; // 增加页码
        loadPosts(selectedCategory, paged); // 调用加载文章函数

    });

    // 默认加载所有文章
    $('.home_category[cateid="0"]').trigger('click');
});

function loadPosts(selectedCategory, paged) {
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'POST',
        data: {
            action: 'leaf_home_ajax_sift_post',
            category: selectedCategory,
            paged: paged
        },
        success: function (response) {
            lazyLoadImages();
            if (paged === 1) {
                $('#filtered-posts').html(response); // 替换内容，以显示第一页的文章
            } else {
                $('#filtered-posts').append(response); // 追加内容，以加载更多文章
            }
            if (paged > total) {
                jQuery("#leaf-load-car-more-button").html('没有更多的文章了').removeClass('is-loading');
            } else {
                jQuery("#leaf-load-car-more-button").html('加载更多').removeClass('is-loading');
            }
        }
    });
}
