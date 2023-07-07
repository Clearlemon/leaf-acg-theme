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

//后台音乐播放器代码
var backToTopBtn = document.querySelector(".player_module");
if (backToTopBtn) {
  const core = window._PlayerCore;
  var src;

  if (window.location.protocol === "https:") {
    src = "https://" + window.location.hostname;
  } else {
    src = "http://" + window.location.hostname;
  }
  // 播放路径自行修改
  src += "/wp-content/themes/leaf-acg-theme/admin-function/assets/mp3/Nevada.mp3";

  core.AppendSongOnTail({
    // 显示名称
    name: "Nevada",
    // 显示顺序
    id: 1,
    // 播放路径
    src: src,
    // 显示图片
    img: "http://p2.music.126.net/qAhLCjp85CaQizkf23Yk4Q==/109951167197748224.jpg?param=130y130"
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
