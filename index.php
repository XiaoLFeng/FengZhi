<?PHP
// 开启session
session_start();
//禁用错误报告
error_reporting(0);
// 引入设置
include("./config.inc.php");
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
<body class="mdui-theme-primary-<?php echo $setting["Web"]["color"] ?> mdui-theme-accent-<?php echo $setting["Web"]["subcolor"] ?> padding-top mdui-appbar-with-toolbar">
<!-- 顶部TAB -->
<header>
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme mdui-shadow-2 mdui-appbar-inset">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#menu'}" mdui-tooltip="{content: '菜单'}"><i class="mdui-icon material-icons">menu</i></a>
        <a href="javascript:;" class="mdui-typo-title"><?php echo $setting["Info"]["name"] ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '刷新'}"><i class="mdui-icon material-icons">refresh</i></a>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple"><i class="mdui-icon material-icons">more_vert</i></a>
    </div>
</div>
</header>
<!-- 菜单 -->
<?PHP include_once('./menu.php'); ?>
<!-- 正文 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign">
        <div class="mdui-typo mdui-center mdui-m-y-5">
            <h1><?PHP echo $setting["Info"]["name"] ?> &mdash; <?PHP echo $setting["Info"]["subname"] ?></h1>
        </div>
    </div>
</div>
<div class="mdui-container mdui-valign">
    <div class="mdui-center">
        <a href="./my.php"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">开始</button></a>
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