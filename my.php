<?PHP
// 开启session
session_start();
//禁用错误报告
error_reporting(0);
// 引入设置
include("./config.inc.php");
// 引入插件
include("./plugins/night.php");  //引入夜间模式插件
$listfor = 2;
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
<?PHP include_once('./header.php'); ?>
<!-- 菜单 -->
<?PHP include_once('./menu.php'); ?>
<!-- 正文 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 产品使用说明</h2>
        </div>
    </div>
</div>
<div class="mdui-container mdui-valign mdui-typo">
    <div class="mdui-container">
        <div class="mdui-m-y-1">
            <h2 class="mdui-text-color-blue mdui-m-t-4">你好~</h2>
            <h5>这里是 <strong>筱锋-知识库</strong> [
                <strong class="mdui-text-color-blue-400">F</strong>eng 
                <strong class="mdui-text-color-blue-400">Z</strong>hi ]
            </h5>
            <h5>简称 <strong class="mdui-text-color-blue-300">FengZhi</strong></h5>
            <div class="mdui-m-l-2">
                <p>FengZhi 是一个为学习而生的一个网站，他没有十全十美的知识点，但也少不了必要的重点。</p>
                <p>本站致力于打造一个高中知识体系的网站，会尽力维护此站点</p>
                <p>该站点不会设置任何注册项目以及VIP项目，全部内容免费（科学无国界，学业正是如此）</p>
            </div>
        </div>
        <div class="mdui-m-y-1">
            <h2 class="mdui-text-color-blue mdui-m-t-4">关于我们</h2>
            <div class="mdui-m-l-2">
                <p><strong class="mdui-text-color-blue-300">FengZhi</strong> 是一个知识点收纳站点。</p>
                <p>本站建立于<strong>2021年07月01日</strong>，由站长 <a href="https://www.xiaolfeng.cn/">筱锋xiao_lfeng</a> 全权运营。所以我并不打算上传试卷，写试卷那样，没意思。</p>
                <p>我只专门做知识点梳理和说明。</p>
                <p>目前开发优先化学（因为我想到的是化学方程式的六大基本）</p>
                <p>所以打算开工化学先</p>
                <p>后续肯定会添加其他</p>
                <p>但是如何添加或者添加什么就由时间来决定吧。</p>
                <p>毕竟马上上高三了</p>
                <p>我们正在为你更好的体验而努力！祝您使用愉快！</p>
                <p>我们的的QQ交流群：<a href="https://qm.qq.com/cgi-bin/qm/qr?k=viCI56D_CRmtKMQZVzKCm9Rhy_0KUwVQ&jump_from=webapi">453996639</a></p>
            </div>
        </div>
        <div class="mdui-m-y-1">
            <h2 class="mdui-text-color-blue mdui-m-t-4">条款和规则</h2>
            <div class="mdui-m-l-2">
                <p>请您仔细阅读以下条款，使用本网站的任何功能及服务即视为您已同意以下所有条款。</p>
                <h5>用户守则</h5>
                <ul>
                    <li>用户需遵守中华人民共和国的法律法规。</li>
                    <li>用户不得发布政治、宗教、迷信相关信息。</li>
                    <li>请互相尊重，请勿人身攻击、侮辱漫骂。</li>
                </ul>
                <p>本站有权对条款作出修改或变更，所作的任何修改将发布于网站该页面中，恕不另行通知。</p>
            </div>
        </div>
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