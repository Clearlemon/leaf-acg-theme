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

let left = document.querySelector(".leaf-button-left")
let right = document.querySelector(".leaf-button-right")
let m = document.querySelectorAll(".m")
let images = document.querySelector(".leaf_slide_ul_all")
// 我们先设置一个index用来计算和控制图片的位置，再设置一个time作为定时器
let index = 0
let time// 在这里我们先创建一个position为复用函数，作用就是结合index来定义当前图片的位置的
function position() {
    images.style.left = (index * -100) + "%"
}
// 然后我们创建一个复用函数add为加函数，如果当前图片的位置值index大于等于当前图片数量的话，
// 就说明超出了计算范围，所以得清零，如若不然index就加一
function add() {
    if (index >= m.length - 1) {
        index = 0
    } else {
        index++
    }
}
// 反之desc为减函数，如果当前图片的位置值index小于1了，那么他的值就反弹到最顶端，也就是轮播图的最后面，如若不然index就减一
function desc() {
    if (index < 1) {
        index = m.length - 1
    } else {
        index--
    }
}
// 创建一个timer来当做复用时间的函数，，每隔3秒钟index就加一，然后加入增加add函数和desc函数来判断一下，再加入定位函数
function timer() {
    time = setInterval(() => {
        index++
        desc()
        add()
        position()
    }, 3000)
}
// 接下来我们设置一下按钮，left为左边的按钮，因为点击时图片会反方向倒退，所以我们套入desc减函数进去，顺便定位一下
// 点击的时候我们必须先把定时器给停掉再重新执行一遍，不然会在你点击下一张图片时，定时器倒计时一到也跟着生效，这样子就会连跳两张图片了
left.addEventListener("click", () => {
    desc()
    position()
    clearInterval(time)
    timer()
})
// 右边的按钮和左边也是差不多
right.addEventListener("click", () => {
    add()
    position()
    clearInterval(time)
    timer()
})
// 在弄好左右两个按钮的时候，我们还需要生效下面的小图片按钮，
// 首先我们先遍历一遍，然后获取当前点击的那个小图片按钮的值并赋值给index，这样子就可以随之跳转
for (let i = 0; i < m.length; i++) {
    m[i].addEventListener("click", () => {
        index = i;
        position();
        clearInterval(time)
        timer()
    })
}
// 最后的最后我们将定时器开起来，这样子图片就可以自动轮播啦
// timer()

//图片预加载功能
window.addEventListener('DOMContentLoaded', function () {
    //获取图片的属性
    var thumbnails = document.querySelectorAll('.leaf_images_are_preloaded');

    thumbnails.forEach(function (thumbnail) {
        var originalSrc = thumbnail.getAttribute('data-original');
        var tempSrc = thumbnail.getAttribute('src');

        // 创建一个新的 Image 对象
        var img = new Image();

        // 设置加载完成的回调函数
        img.onload = function () {
            // 替换原始的 src 属性
            thumbnail.setAttribute('src', originalSrc);
        };

        // 设置加载失败的回调函数
        img.onerror = function () {
            // 如果加载失败，保留原始的 src 属性
            thumbnail.setAttribute('src', tempSrc);
        };

        // 设置 Image 对象的 src 属性为 data-original 的值
        img.src = originalSrc;
    });
});

const carousel = document.querySelector(".leaf_slider_article_flex");
const firstImg = carousel.querySelector("img");
const arrowImgs = document.querySelectorAll(".leaf_slider_article_swipe");

let isDragStart = false;
let prevPageX, prevScrollLeft;
let firstImgWidth = firstImg.clientWidth + 14;

arrowImgs.forEach(img => {
    img.addEventListener("click", () => {
        const direction = img.classList.contains("leaf_slider_article_swipe_left") ? -1 : 1;
        carousel.scrollBy({
            left: direction * firstImgWidth,
            behavior: "smooth"
        });
    });
});

const dragStart = (e) => {
    isDragStart = true;
    prevPageX = e.pageX;
    prevScrollLeft = carousel.scrollLeft;
};

const dragging = (e) => {
    if (!isDragStart) return;
    e.preventDefault();

    const containerRect = carousel.getBoundingClientRect();
    const containerLeft = containerRect.left;
    const containerRight = containerRect.right;
    const mouseX = e.clientX;

    if (mouseX < containerLeft || mouseX > containerRight) {
        dragStop();
        return;
    }

    let positionDiff = e.pageX - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
};


const dragStop = () => {
    isDragStart = false;
};

const stopOnMouseLeave = (e) => {
    const containerRect = carousel.getBoundingClientRect();
    const containerLeft = containerRect.left;
    const containerRight = containerRect.right;
    const mouseX = e.clientX;

    if (mouseX < containerLeft || mouseX > containerRight) {
        dragStop();
    }
};

carousel.addEventListener("mouseleave", stopOnMouseLeave);
carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
carousel.addEventListener("mouseup", dragStop);


