<?PHP
// 开启session
session_start();
//禁用错误报告
error_reporting(0);
// 引入设置
include("./config.inc.php");
// 引入插件
include("./plugins/color.php");  // 引入主题颜色修改
include("./plugins/img.php"); // 图片库自动判断
$listfor = 1;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="full-screen" content="yes"><!--UC强制全屏-->
    <meta name="browsermode" content="application"><!--UC应用模式-->
    <meta name="x5-fullscreen" content="true"><!--QQ强制全屏-->
    <meta name="x5-page-mode" content="app"><!--QQ应用模式-->
    <!-- QQ标签识别 -->
    <meta itemprop="name" content="<?php echo $setting["Info"]["name"] ?>">
    <meta name="description" itemprop="description" content="<?php echo $setting["INFO"]["subname"] ?>">
    <meta itemprop="image" content="<?php echo $setting["Web"]["Icon"] ?>">
    <!-- 主要 -->
    <title><?PHP echo $setting["Info"]["name"] ?> &mdash; <?PHP echo $setting["Info"]["subname"] ?></title>
    <link rel="shortcut icon" href="<?php echo $setting["Web"]["Icon"] ?>" type="image/x-icon">
    <!-- MDUI CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
        crossorigin="anonymous"
    />
</head>
<body class="mdui-theme-primary-<?php echo check_night_time_primary() ?> mdui-theme-accent-<?php echo check_night_time_accent() ?> padding-top mdui-appbar-with-toolbar <?PHP echo check_night_black() ?>">
<!-- 顶部TAB -->
<?PHP include_once('./header.php'); ?>
<!-- 菜单 -->
<?PHP include_once('./menu.php'); ?>
<!-- 正文 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign">
        <div class="mdui-typo mdui-center mdui-m-y-4">
            <h1><?PHP echo $setting["Info"]["name"] ?> <?PHP echo $setting["Info"]["subname"] ?></h1>
        </div>
    </div>
</div>
<div class="mdui-container mdui-valign">
    <div class="mdui-center mdui-m-y-1">
        <a href="./my.php"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">开始</button></a>
    </div>
</div>
<!-- 快捷栏 -->
<div class="mdui-container mdui-m-y-4">
    <div class="mdui-row-xs-3 mdui-grid-list">
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="./Chinese/"><img src="<?PHP img() ?>sources/img/yuwen.png"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">语文</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>厚硕的双翅,激人永远搏击长空</div>
                </div>
            </div>
            </div>
        </div>
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP img() ?>sources/img/shuxue.png"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">数学</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>说一不二,三心两意,四面楚歌,七上八下</div>
                </div>
            </div>
            </div>
        </div>
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/card.webp"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">英语</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>Welcome~</div>
                </div>
            </div>
            </div>
        </div>
        <!-- [Start]
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/card.webp"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">日语</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>こんにちは</div>
                </div>
            </div>
            </div>
        </div>
        [End] -->
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="./Physics/index.php"><img src="<?PHP echo img() ?>sources/img/wuli.png"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">物理</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>E=mc²</div>
                </div>
            </div>
            </div>
        </div>
        <!-- [Start]
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/card.webp"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">历史</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>秦始皇</div>
                </div>
            </div>
            </div>
        </div>
        [End] -->
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/shengwu.png"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">生物</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>人体的构造</div>
                </div>
            </div>
            </div>
        </div>
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/huaxue.png"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">化学</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>4Na + O₂ == 2Na₂O</div>
                </div>
            </div>
            </div>
        </div>
        <!-- [Start]
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/card.webp"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">政治</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>政治是以经济为基础的上层建筑，是经济的集中表现</div>
                </div>
            </div>
            </div>
        </div>
        <div class="mdui-col">
            <div class="mdui-grid-tile mdui-m-a-2">
            <a href="javascript:;"><img src="<?PHP echo img() ?>sources/img/card.webp"/></a>
            <div class="mdui-grid-tile-actions">
                <div class="mdui-grid-tile-text">
                    <div class="mdui-grid-tile-title">地理</div>
                    <div class="mdui-grid-tile-subtitle"><i class="mdui-icon material-icons">library_books</i>地理学是研究地球表面的地理环境中各种...</div>
                </div>
            </div>
            </div>
        </div>
        [End] -->
    </div>
</div>
<!-- 页脚版权内容 -->
<?PHP include("./footer.html") ?>
</body>
<!-- MDUI JavaScript -->
<script
    src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
    integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
    crossorigin="anonymous"
></script>
</html>