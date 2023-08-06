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


//后台一言JS
if (window.location.protocol === "https:") {
  var url = "https://" + window.location.hostname;
} else {
  var url = "http://" + window.location.hostname;
}

url += "/wp-content/themes/leaf-acg-theme/admin-function/classes/leaf-admin-one-word.class.php";

$.ajax({
  url: url,
  dataType: "text",
  success: function (data) {
    // data 就是一言内容，可以通过 DOM 操作将其输出到页面上
    $("#maple-madin-Banner-one-word").text(data);
  },
  error: function () {
    // 处理错误
    console.log("Failed to get hitokoto.");
  }
});



