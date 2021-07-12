<?PHP
// 开启session
session_start();
// 禁用错误报告
error_reporting(0);
// 引入设置
include("../config.inc.php");
include("../plugins/mysql_conn.php");
$listOnL = 2;
$listOn = 203;
// 导入数据库
$SQL = mysqli_query($conn,"SELECT * FROM experimental_equipment");  
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
<body class="mdui-theme-primary-<?php echo $setting["Web"]["color"] ?> mdui-theme-accent-<?php echo $setting["Web"]["subcolor"] ?> padding-top mdui-appbar-with-toolbar mdui-drawer-body-left">
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
<?PHP include_once('../menu.php'); ?>
<!-- 正文 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 化学 | 化学实验室常用仪器介绍</h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <p>如果较难查找可以按下 "CTrl+F" 以打开查询功能</p>
        </div>
    </div>
</div>
<div class="mdui-container mdui-valign mdui-typo">
    <div class="mdui-container mdui-m-y-4">
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>名字</th>
                        <th class="mdui-hidden-sm-down">使用方法</th>
                        <th>查阅</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 循环内容 -->
                    <?PHP
                    $x=1;
                    while ($List = mysqli_fetch_object($SQL)) {
                    ?>
                    <tr>
                        <td><?PHP echo $List->id?></td>
                        <td><?PHP echo $List->name?></td>
                        <td class="mdui-hidden-sm-down"><?PHP echo $List->info?></td>
                        <td>  <button class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#info-<?PHP echo $x?>'}">详细信息</button></td>
                    </tr>
                    <div class="mdui-dialog" id="info-<?PHP echo $x?>">
                        <div class="mdui-dialog-title"><?PHP echo $List->name?></div>
                        <div class="mdui-dialog-content"><strong>使用方法：</strong><?PHP echo $List->info?><br/><strong>注意事项：</strong><?PHP if($List->warning == NULL or $List->warning == "无"){echo "暂无该内容";}else{echo $List->warning;}?><br/><img src="<?PHP echo $setting["Info"]["jsdelivr"]."/Chemistry/器具/".$List->name.".jpg" ?>" alt=""></div>
                        <div class="mdui-dialog-actions">
                            <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确认</button>
                        </div>
                    </div>
                    <?PHP
                    $x++;
                    }
                    ?>
                    <!-- 结束循环 -->
                </tbody>
            </table>
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