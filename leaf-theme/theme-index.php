<html>

<head>
    <title>叶ACG - 一个好看的二次元博客主题</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="keywords" content="ACG,二次元,游戏,主题,Wordpress,叶">
    <meta name="description" content="一个免费好看的二次元个人博客主题。">
    <link rel="shortcut icon" href="favicon.ico">
    <style>
        .leaf_slide_all {
            width: 500px;
            height: 250px;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 10px 5px 50px rgba(122, 39, 39, 0.39);
        }

        .leaf_slide_ul_all {
            width: 500%;
            height: 100%;
            display: flex;
            position: absolute;
            left: 0;
            transition: .2s;
        }

        .leaf_li_imgs {
            width: 100%;
            background-size: cover;
        }

        .leaf_slide_selection {
            display: flex;
            justify-content: space-evenly;
            position: absolute;
            bottom: 15px;
            width: 25%;
            z-index: 999;
            left: 50%;
            transform: translateX(75%);
        }

        .slide_selection {
            width: 10px;
            height: 10px;
            cursor: pointer;
            border-radius: 50%;
            border: solid rgba(255, 255, 255, 0.5) 5px;
            background-color: #fff;
        }

        .leaf_change_imgs_button {
            width: 100%;
            margin-top: 20%;
            height: 20%;
            position: absolute;
            display: flex;
            justify-content: space-between;
            user-select: none;
        }

        .leaf-button-left,
        .leaf-button-right {
            font-size: 20px;
            background-color: rgba(102, 123, 161, 0.288);
            padding: 0 10px;
            cursor: pointer;
            line-height: 50px;
            color: #fff;
        }

        .leaf_imgas_in_slide {
            width: 100%;
            object-fit: cover;
            height: 100%;
        }

        .leaf_li_imgs>h1 {
            position: relative;
            top: -80px;
            color: white;
            left: 15;
            z-index: 9999;
        }

        .leaf_li_imgs>h3 {
            position: relative;
            top: -75px;
            color: white;
            left: 15;
            z-index: 9999;
        }

        .leaf_change_imgs_button {
            position: relative;
        }

        .leaf_change_imgs_button .leaf-button-left,
        .leaf_change_imgs_button .leaf-button-right {
            opacity: 0;
            transition: opacity 0.5s;
        }

        .leaf_change_imgs_button:hover .leaf-button-left,
        .leaf_change_imgs_button:hover .leaf-button-right {
            opacity: 1;
        }
    </style>
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.css" rel="stylesheet">
</head>
<!-- 头部代码开始 -->
<header class="leaf-header-all">
    <!-- 菜单栏总体布局开始 -->
    <div class="leaf-navtop_bigbackground">
        <!-- LOGO图开始 -->
        <div class="logo_img_text"><img class="leaf-img_logo" src="img/admin-logo.png" alt=""></div>
        <!-- LOGO图结束 -->
        <!-- 菜单导航开始 -->
        <nav class="leaf-headnav">
            <ul class="leaf-menu-ul">
                <li class="leaf_first_menu"><a href="">主页<i class="fa-solid fa-caret-right"></i></a></li>
                <li class="leaf_first_menu"><a href="">说说<i class="fa-solid fa-caret-right"></i></a></li>
                <li class="leaf_first_menu"><a href="">分类<i class="fa-solid fa-caret-right"></i></a></li>
                <li class="leaf_first_menu"><a href="">友联<i class="fa-solid fa-caret-right"></i></a></li>
                <li class="leaf_first_menu"><a href="">其他<i class="fa-solid fa-caret-right"></i></a></li>
                <li class="leaf_first_menu"><a href="">游戏<i class="fa-solid fa-caret-right"></i></a>
                    <ul class="leaf-menu_inli_ul">
                        <li class="leaf-second_menu"><a href="">GAL</a>
                            <ul class="leaf-menu_inli_inul_ul">
                                <li class="leaf-third_menu">AVG</li>
                            </ul>
                        </li>
                        <li class="leaf-second_menu"><a href="">SLG</a>
                            <ul class="leaf-menu_inli_inul_ul">
                                <li class="leaf-third_menu">RPG</li>
                            </ul>
                        </li>
                        <li class="leaf-second_menu"><a href="">这是第二菜单</a>
                            <ul class="leaf-menu_inli_inul_ul">
                                <li class="leaf-third_menu">这是第三菜单</li>
                            </ul>
                        </li>
                        <li class="leaf-second_menu"><a href="">这是第二菜单</a>
                            <ul class="leaf-menu_inli_inul_ul">
                                <li class="leaf-third_menu">KRKR</li>
                            </ul>
                        </li>
                        <li class="leaf-second_menu"><a href="">这是第二菜单</a>
                            <ul class="leaf-menu_inli_inul_ul">
                                <li class="leaf-third_menu">这是第三菜单</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- 菜单导航结束 -->
        <!-- 搜索框开始 -->
        <div class="leaf-banner_search">
            <a href="#serch"><i class="fa-solid fa-magnifying-glass"></i>Search一下下吧</a>
        </div>
        <!-- 搜索框结束 -->
        <!-- 右侧登录注册开始 -->
        <div class="leaf-user_img_admin">
            <div class="leaf_login_enroll_img">
                <i class="login_img"></i>
                <span class="leaf-user_login"><a href="">登录</a></span>
                <b class="login-enroll-texte"><span>or</span></b>
                <span class="leaf-user_enroll"><a href="">注册</a></span>
                <i class="enroll_img"></i>
            </div>
        </div>
    </div>
    <!-- 右侧登录注册结束 -->
    <!-- 菜单栏总体布局结束 -->
    <!-- 大图Banner开始 -->
    <div class="leaf-head_nav_backgroundimg">
        <img src="img/bacg.jpg" width="100%" height="40%" alt="">
        <div class="leaf_title-speech">
            <h1 class="leaf_h1_title">生命的美好就是在那一瞬</h1>
            <h2 class="leaf_h4_title">你好世界</h2>
        </div>
    </div>
    <!-- 大图Banner结束 -->
</header>
<!-- 头部代码结束 -->
<main class="leaf_postings_main">
    <div class="leaf_article_display">
        <div class="leaf_home_slide">
            <div class="leaf_slide_all">
                <ul class="leaf_slide_ul_all" style="left: -400%;">
                    <li class="leaf_li_imgs"><img class="leaf_imgas_in_slide" src="img/bacg.jpg" alt="">
                        <h1>大标题</h1>
                        <h3>小标题</h3>
                    </li>
                    <li class="leaf_li_imgs"><img class="leaf_imgas_in_slide" src="img/bacg.jpg" alt="">
                        <h1>大标题</h1>
                        <h3>小标题</h3>
                    </li>
                    <li class="leaf_li_imgs"><img class="leaf_imgas_in_slide" src="img/bacg.jpg" alt="">
                        <h1>大标题</h1>
                        <h3>小标题</h3>
                    </li>
                    <li class="leaf_li_imgs"><img class="leaf_imgas_in_slide" src="img/bacg.jpg" alt="">
                        <h1>大标题</h1>
                        <h3>小标题</h3>
                    </li>
                    <li class="leaf_li_imgs"><img class="leaf_imgas_in_slide" src="img/bacg.jpg" alt="">
                        <h1>大标题</h1>
                        <h3>小标题</h3>
                    </li>
                </ul>
                <div class="leaf_change_imgs_button">
                    <div class="leaf-button-left">&lt;</div>
                    <div class="leaf-button-right">&gt;</div>
                </div>
            </div>
        </div>
    </div>
    <div class="leaf-sidebar">侧边栏</div>
</main>
<footer class="leaf_footer_all">
    <div></div>
</footer>

<body>
    <script src="js/index.js"></script>
    <script>

        let left = document.querySelector(".leaf-button-left")
        let right = document.querySelector(".leaf-button-right")
        let slide_selection = document.querySelectorAll(".slide_selection")
        let leaf_slide_ul_all = document.querySelector(".leaf_slide_ul_all")
        // 我们先设置一个index用来计算和控制图片的位置，再设置一个time作为定时器
        let index = 0
        let time// 在这里我们先创建一个position为复用函数，作用就是结合index来定义当前图片的位置的
        function position() {
            leaf_slide_ul_all.style.left = (index * -100) + "%"
        }
        // 然后我们创建一个复用函数add为加函数，如果当前图片的位置值index大于等于当前图片数量的话，
        // 就说明超出了计算范围，所以得清零，如若不然index就加一
        function add() {
            if (index >= slide_selection.length - 1) {
                index = 0
            } else {
                index++
            }
        }
        // 反之desc为减函数，如果当前图片的位置值index小于1了，那么他的值就反弹到最顶端，也就是轮播图的最后面，如若不然index就减一
        function desc() {
            if (index < 1) {
                index = slide_selection.length - 1
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
        for (let i = 0; i < slide_selection.length; i++) {
            slide_selection[i].addEventListener("click", () => {
                index = i;
                position();
                clearInterval(time)
                timer()
            })
        }
        // 最后的最后我们将定时器开起来，这样子图片就可以自动轮播啦
        // timer()



    </script>

</html>