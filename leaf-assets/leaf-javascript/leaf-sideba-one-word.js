if ($("#hitokoto_text_summer_pockets ").length) {
    if (window.location.protocol === "https:") {
        var url = "https://" + window.location.hostname;
    } else {
        var url = "http://" + window.location.hostname;
    }

    url += "/wp-content/themes/leaf-acg-theme/leaf-api/leaf-one-word-api/summer-pockets-word/summer-pockets-word.php";

    $.ajax({
        url: url,
        dataType: "text",
        success: function (data) {
            // data 就是一言内容，可以通过 DOM 操作将其输出到页面上
            $("#hitokoto_text_summer_pockets").text(data);
        },
        error: function () {
            // 处理错误
            console.log("Failed to get hitokoto.");
        }
    });
} else if ($("#hitokoto_text_angel_beats").length) {
    if (window.location.protocol === "https:") {
        var url = "https://" + window.location.hostname;
    } else {
        var url = "http://" + window.location.hostname;
    }

    url += "/wp-content/themes/leaf-acg-theme/leaf-api/leaf-one-word-api/angel-beats-word/angel-beats-word.php";

    $.ajax({
        url: url,
        dataType: "text",
        success: function (data) {
            // data 就是一言内容，可以通过 DOM 操作将其输出到页面上
            $("#hitokoto_text_angel_beats").text(data);
        },
        error: function () {
            // 处理错误
            console.log("Failed to get hitokoto.");
        }
    });
} else if ($("#hitokoto_text_air").length) {
    if (window.location.protocol === "https:") {
        var url = "https://" + window.location.hostname;
    } else {
        var url = "http://" + window.location.hostname;
    }

    url += "/wp-content/themes/leaf-acg-theme/leaf-api/leaf-one-word-api/air-word/air-word.php";

    $.ajax({
        url: url,
        dataType: "text",
        success: function (data) {
            // data 就是一言内容，可以通过 DOM 操作将其输出到页面上
            $("#hitokoto_text_air").text(data);
        },
        error: function () {
            // 处理错误
            console.log("Failed to get hitokoto.");
        }
    });
} else if ($("#hitokoto_text_clannad").length) {
    if (window.location.protocol === "https:") {
        var url = "https://" + window.location.hostname;
    } else {
        var url = "http://" + window.location.hostname;
    }

    url += "/wp-content/themes/leaf-acg-theme/leaf-api/leaf-one-word-api/clannad-word/clannad-word.php";

    $.ajax({
        url: url,
        dataType: "text",
        success: function (data) {
            // data 就是一言内容，可以通过 DOM 操作将其输出到页面上
            $("#hitokoto_text_clannad").text(data);
        },
        error: function () {
            // 处理错误
            console.log("Failed to get hitokoto.");
        }
    });
} else if ($("#hitokoto_text_kanon").length) {
    if (window.location.protocol === "https:") {
        var url = "https://" + window.location.hostname;
    } else {
        var url = "http://" + window.location.hostname;
    }

    url += "/wp-content/themes/leaf-acg-theme/leaf-api/leaf-one-word-api/kanon-word/kanon-word.php";

    $.ajax({
        url: url,
        dataType: "text",
        success: function (data) {
            // data 就是一言内容，可以通过 DOM 操作将其输出到页面上
            $("#hitokoto_text_kanon").text(data);
        },
        error: function () {
            // 处理错误
            console.log("Failed to get hitokoto.");
        }
    });
}