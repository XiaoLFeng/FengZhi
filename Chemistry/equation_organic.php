<?PHP
// 开启session
session_start();
// 禁用错误报告
error_reporting(0);
// 引入设置
include("../config.inc.php");
include("../plugins/mysql_conn.php");
// 引入插件
include("../plugins/color.php");  // 引入主题颜色修改
include("../plugins/img.php"); // 图片库自动判断
$listOnL = 8;
$listOn = 803;
// 导入数据库
$SQL = mysqli_query($conn,"SELECT * FROM equation_organic");  
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
<body class="mdui-theme-primary-<?php echo check_night_time_primary() ?> mdui-theme-accent-<?php echo check_night_time_accent() ?> padding-top mdui-appbar-with-toolbar mdui-drawer-body-left <?PHP echo check_night_black() ?>">
<!-- 顶部TAB -->
<?PHP include_once('../header.php'); ?>
<!-- 菜单 -->
<?PHP include_once('../menu.php'); ?>
<!-- 正文 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 化学 | 有机方程式</h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <p>由于计算机输入法无特殊字符，请勿以展示的方程式为准，请打开后展示的方程式为最终方程式</p>
        </div>
    </div>
</div>
<div class="mdui-container mdui-valign mdui-typo">
    <div class="mdui-container mdui-m-y-4">
        <div class="mdui-panel mdui-panel-popout" mdui-panel="{accordion: true}">
            <!-- 循环内容 -->
            <?PHP
            while ($List = mysqli_fetch_object($SQL)) {
            ?>
            <div class="mdui-panel-item">
                <div class="mdui-panel-item-header">
                    <div class="mdui-panel-item-title"><?PHP echo $List->equation?></div>
                    <div class="mdui-panel-item-summary"><?PHP echo $List->info?></div>
                    <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-panel-item-body">
                <div class="mdui-valign mdui-m-b-1">
                    <div class="mdui-center">
                        <img src="<?PHP echo $List->image?>" alt="">
                    </div>
                </div>
                <div><strong>
                    <?PHP echo $List->intext?>
                </strong></div>
                </div>
            </div>
            <?PHP
            }
            ?>
            <!-- 结束循环 -->
        </div>
    </div>
</div>
<!-- 页脚版权内容 -->
<?PHP include("../footer.html") ?>
</body>
<!-- MDUI JavaScript -->
<script
    src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
    integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
    crossorigin="anonymous"
></script>
</html>
<?PHP
mysqli_free_result($SQL);
mysqli_close($conn);
?>