<?php
if (class_exists('CSF')) {
    CSF::createWidget('leaf_home_weather', array(
        'title'       => 'Leaf-天气',
        'classname'   => 'leaf_home_weather',
        'description' => '此小工具适用于各种页面',
        'fields'      => array(
            array(
                'id'      => 'leaf_home_weather_widget_title',
                'type'    => 'text',
                'title'   => '小工具标题名称',
                'default' => '天气',
            ),
            array(
                'id'          => 'leaf_home_weather_select',
                'type'        => 'select',
                'title'       => '天气样式选择',
                'options'     => array(
                    'home_weather_default'  => '默认样式',
                ),
                'default'     => 'home_weather_default'
            ),

            array(
                'id'    => 'leaf_all_sideba_fixed',
                'type'  => 'switcher',
                'title' => '是否跟随侧边栏移动',
            ),
            array(
                'id'         => 'leaf_sideba_display_all_pc_or_mobile',
                'type'       => 'radio',
                'title'      => '选择哪个端是否显示',
                'options'    => array(
                    'leaf_sideba_all_pc_and_mobile' => '[PC]和[移动设备]都显示',
                    'leaf_sideba_all_pc' => '只显示[PC]',
                    'leaf_sideba_all_mobile' => '只显示[移动设备]',
                ),
                'default'    => 'leaf_sideba_all_pc_and_mobile',
            ),
        ),
    ));
    if (!function_exists('leaf_home_weather')) {
        function leaf_home_weather($args, $home_weather)
        {

            $sideba_title = $home_weather['leaf_home_weather_widget_title'];
?>
            <div class="sidebar_home_weather_all">
                <?php if (isset($sideba_title) && !empty($sideba_title)) { ?>
                    <p class="leaf_sidebar_title_all">
                        <?php echo $sideba_title; ?>
                    </p>
                <?php } ?>
                <div class="sidebar_home_weather">
                    <link rel="stylesheet" href="https://widget.qweather.net/standard/static/css/he-standard.css?v=1.4.0">
                    <div data-v-75e43ed3="" id="he-plugin-standard" style="width: 100%; height: 270px; font-size: 12px; border-radius: 0px; background-color: rgb(255, 255, 255);">
                        <script data-v-75e43ed3="" type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.14&amp;key=d1a7a5151bc3b5f7de34c34f824da3fe"></script>
                        <div data-v-3b50b9ba="" data-v-75e43ed3="" class="view-vertical">
                            <div data-v-3b50b9ba="" class="wv-v-v-location">
                                <div data-v-4b9dcab4="" data-v-3b50b9ba="" class="wv-lt-row">
                                    <div data-v-4b9dcab4="" class="wv-lt-col-7">
                                        <div data-v-4b9dcab4="" class="wv-lt-location"><span data-v-4b9dcab4="" title="北京" style="color: rgb(67, 67, 67);"></span> <a data-v-4b9dcab4="" href="javascript:void(0)" style="color: rgb(67, 67, 67);">
                                                切换
                                            </a></div>
                                    </div>
                                    <div data-v-4b9dcab4="" class="wv-lt-col-5">
                                        <div data-v-4b9dcab4="" class="wv-lt-refresh"><a data-v-4b9dcab4="" target="_blank" href="https://www.qweather.com/" style="color: rgb(67, 67, 67);"></a></div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-3b50b9ba="" class="wv-v-v-now">
                                <div data-v-5f4c0628="" data-v-3b50b9ba="" class="wv-n-h-now" width="230" height="270">
                                    <div data-v-5f4c0628="" class="wv-n-h-col-10 wv-n-h-text-left">
                                        <div data-v-5f4c0628="" class="wv-n-h-now-img"><img data-v-5f4c0628="" src="https://widget-s.qweather.net/img/plugin/190516/icon/c/100d.png">
                                        </div>
                                        <div data-v-5f4c0628="" class="wv-n-h-now-content">
                                            <div data-v-5f4c0628="" class="wv-n-h-now-tmp"><span data-v-5f4c0628="" style="color: rgb(67, 67, 67);"></span>
                                                <div data-v-5f4c0628="" class="wv-n-h-now-alarm"><!----></div>
                                            </div>
                                            <div data-v-5f4c0628="" class="wv-n-h-now-txt"><span data-v-5f4c0628="" style="color: rgb(67, 67, 67);"></span>
                                                <div data-v-5f4c0628="" class="wv-n-h-now-aqi-item wv-n-h-now-aqi-item-color-1">
                                                    <div data-v-5f4c0628="" class="wv-n-h-label"></div> <span data-v-5f4c0628="">

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-5f4c0628="" class="wv-n-h-now-rain" style="position: relative; margin: 0.6em 0px 0em 0em;"><a data-v-5f4c0628="" target="_blank" href="https://www.qweather.com"><img data-v-5f4c0628="" src="https://widget-s.qweather.net/img/plugin/190516/icon/view/rain.png"></a>
                                        <span data-v-5f4c0628="" class="wv-n-h-now-rain-text" style="color: rgb(67, 67, 67);"></span>
                                    </div>
                                </div>
                                <div data-v-3b50b9ba="" class="wv-v-v-line" style="border-color: rgba(204, 204, 204, 0.5);">
                                </div>
                            </div>
                            <div data-v-3b50b9ba="" class="wv-v-v-forecast">
                                <div data-v-66693262="" data-v-3b50b9ba="" class="wv-f-forecast">
                                    <div data-v-66693262="" class="wv-f-row">
                                        <ul data-v-66693262="" class="wv-f-col-4 wv-f-forecast-item">
                                            <li data-v-66693262="" class="wv-f-forecast-date" style="white-space: nowrap;">
                                                <!---->
                                                <a data-v-66693262="" target="_blank" class="wv-f-a" style="color: rgb(67, 67, 67);">

                                                </a>
                                            </li>
                                            <li data-v-66693262="" class="wv-f-forecast-img" style="height: 99%;"><a data-v-66693262="" target="_blank" class="wv-f-a"><img data-v-66693262="" src="https://widget-s.qweather.net/img/plugin/190516/icon/c/100d.png"></a>
                                            </li>
                                            <li data-v-66693262="" class="wv-f-forecast-tmp" style="white-space: nowrap;"><a data-v-66693262="" target="_blank" class="wv-f-a" style="color: rgb(67, 67, 67);">
                                                </a> <span data-v-66693262="" class="wv-f-forecast-aqi-2">

                                                </span></li>
                                        </ul>
                                        <ul data-v-66693262="" class="wv-f-col-4 wv-f-forecast-item">
                                            <li data-v-66693262="" class="wv-f-forecast-date" style="white-space: nowrap;">
                                                <!---->
                                                <a data-v-66693262="" target="_blank" class="wv-f-a" style="color: rgb(67, 67, 67);">

                                                </a>
                                            </li>
                                            <li data-v-66693262="" class="wv-f-forecast-img" style="height: 99%;"><a data-v-66693262="" target="_blank" class="wv-f-a"><img data-v-66693262="" src="https://widget-s.qweather.net/img/plugin/190516/icon/c/100d.png"></a>
                                            </li>
                                            <li data-v-66693262="" class="wv-f-forecast-tmp" style="white-space: nowrap;"><a data-v-66693262="" target="_blank" class="wv-f-a" style="color: rgb(67, 67, 67);">
                                                </a> <span data-v-66693262="" class="wv-f-forecast-aqi-2">
                                                </span></li>
                                        </ul>
                                        <ul data-v-66693262="" class="wv-f-col-4 wv-f-forecast-item">
                                            <li data-v-66693262="" class="wv-f-forecast-date" style="white-space: nowrap;">
                                                <!---->
                                                <a data-v-66693262="" target="_blank" class="wv-f-a" style="color: rgb(67, 67, 67);">
                                                </a>
                                            </li>
                                            <li data-v-66693262="" class="wv-f-forecast-img" style="height: 99%;"><a data-v-66693262="" target="_blank" class="wv-f-a"><img data-v-66693262="" src="https://widget-s.qweather.net/img/plugin/190516/icon/c/100d.png"></a>
                                            </li>
                                            <li data-v-66693262="" class="wv-f-forecast-tmp" style="white-space: nowrap;"><a data-v-66693262="" target="_blank" class="wv-f-a" style="color: rgb(67, 67, 67);">
                                                </a> <span data-v-66693262="" class="wv-f-forecast-aqi-3">
                                                </span></li>
                                        </ul>
                                    </div>
                                </div> <!---->
                            </div>
                        </div>
                        <script>
                            WIDGET = {
                                "CONFIG": {
                                    "layout": "2",
                                    "height": 270,
                                    "background": "2",
                                    "dataColor": "434343",
                                    "key": "4837d979e7114d26b28e328aa856d6f8"
                                }
                            }
                        </script>
                        <script src="https://widget.qweather.net/standard/static/js/he-standard-common.js?v=2.0"></script>
                    </div>
                </div>
            </div>
<?php

        }
    }
}
?>