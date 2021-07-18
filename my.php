<?PHP
// 开启session
session_start();
//禁用错误报告
error_reporting(0);
// 引入设置
include("./config.inc.php");
// 引入插件
include("./plugins/color.php");  // 引入主题颜色修改
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
                <p>本站致力于打造一个初中/高中一体的知识体系的网站</p>
                <p>该站点不会设置任何注册项目以及VIP项目，全部内容免费（科学无国界，学业正是如此），如果你要赞助，那就另当别论（但不建议年龄较小，经济负担较为严重的家庭赞助，这样我们也过意不去）</p>
            </div>
        </div>
        <div class="mdui-m-y-1">
            <h2 class="mdui-text-color-blue mdui-m-t-4">关于我们</h2>
            <div class="mdui-m-l-2">
                <p><strong class="mdui-text-color-blue-300">FengZhi</strong> 是一个知识点收纳站点，是一个由学生自主开发的项目</p>
                <p>本站开发于<strong>2021年07月01日</strong>，由站长 <a href="https://www.xiaolfeng.cn/">筱锋xiao_lfeng</a> 管理和开发。</p>
                <p>由 <a href="https://gaoice.ba7jcm.live/">高&冰</a> 提供建议以及初中部分内容</p>
                <p>由 <a href="https://blog.chs.pub/">晓白的小站</a> 提供开发建议</p>
                <br/>
                <p>我们并不打算在这里提供任何试题，我们只是专门做知识点梳理和说明。毕竟我们是专门做知识点整理的</p>
                <p>您也可以上传知识点，因为仅仅靠我们几个人不一定能完善，还需要大家的多多支持</p>
                <p>本站目前位处于 阿里云香港轻量应用服务器 运行</p>
                <p>知识点将在后续慢慢补充，欢迎大家前来补充知识点。</p>
                <p>但是如何添加或者添加什么就由时间来决定吧。毕竟马上上高三了</p>
                <p>我们正在为你更好的体验而努力！祝您使用愉快！</p>
                <p>我们的的QQ交流群：<a href="https://qm.qq.com/cgi-bin/qm/qr?k=viCI56D_CRmtKMQZVzKCm9Rhy_0KUwVQ&jump_from=webapi">453996639</a></p>
            </div>
        </div>
        <div class="mdui-m-y-1">
            <h2 class="mdui-text-color-blue mdui-m-t-4">条款和规则</h2>
            <div class="mdui-m-l-2">
                <p>请您仔细阅读以下条款，使用本网站的任何功能及服务即视为您已同意以下所有条款。</p>
                <h5 class="mdui-text-color-red">使用条款</h5>
                    <ul>
                        <li>本站内容不一定是完全正确的，也有可能存在疏漏，内容不清晰，以及知识点错误。如果您在访问时看见任何错误，请在右上角问题提交写入资源出错，提交给我们。我们对出错的内容深感抱歉！</li>
                        <li>本站站点位于香港（由于站长未满18岁缘故，无法进行服务器备案，所以暂时不能使用国内服务器），故您在使用的时候，本站点可能会有部分延迟，敬请见谅~</li>
                    </ul>
                <h5>用户规则</h5>
                <ul>
                    <li>在发布资源以及问题提交部分，请遵守中华人民共和国的相关法规，以及当地（香港）的法律法规。用户不得发布政治、宗教、迷信相关信息。请互相尊重，请勿人身攻击、侮辱漫骂。</li>
                    <li>如有违反，本站将不做任何通知，直接拉入黑名单禁止访问</li>
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