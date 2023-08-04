// 判断是否存在 ".maple-back-to-top" 元素
var backToTopBtn = document.querySelector(".maple-back-to-top");
if (backToTopBtn) {
  // 返回顶部按钮作用的代码
  window.addEventListener("scroll", function () {
    var scrollY = window.scrollY;
    if (scrollY >= 300) {
      backToTopBtn.style.display = "block";
    } else {
      backToTopBtn.style.display = "none";
    }
  });

  backToTopBtn.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
}

// 判断是否存在 ".maple-back-to-bottom" 元素
var backToBottomBtn = document.querySelector(".maple-back-to-bottom");
if (backToBottomBtn) {
  // 返回底部按钮作用的代码
  window.addEventListener("scroll", function () {
    var scrollY = window.scrollY;
    if (scrollY <= 0) {
      backToBottomBtn.style.display = "block";
    } else {
      backToBottomBtn.style.display = "none";
    }
  });

  backToBottomBtn.addEventListener("click", function () {
    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
  });
}






