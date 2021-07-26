<?PHP
// 开启session
session_start();
// 禁用错误报告
error_reporting(0);
// 引入设置
$page = htmlspecialchars($_GET["page"]);
include("../config.inc.php");
include("../plugins/mysql_conn.php");
// 引入插件
include("../plugins/color.php");  // 引入主题颜色修改
include("../plugins/img.php"); // 图片库自动判断
$listOnL = 8;
$listOn = 804;
// 条件判断加入
$limit_size = $setting["Chemistry"]["Page"]; // 数据库单页容器大小
// 判断是否键入数值
if ($page == NULL) {
    header("location:?page=1");
} elseif ($page < 1) {
    header("location:?page=1");
} else {
    $limit_start = (($page-1) * $limit_size);
}
// 导入数据库
$SQL = mysqli_query($conn,"SELECT * FROM experimental_equipment order by id desc limit $limit_start,$limit_size");
$SQLL = mysqli_query($conn,"SELECT * FROM experimental_equipment order by id desc");
$num_max = mysqli_num_rows($SQLL);
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
                        <td><button class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#info-<?PHP echo $x?>'}">详细信息</button></td>
                    </tr>
                    <div class="mdui-dialog" id="info-<?PHP echo $x?>">
                        <div class="mdui-dialog-title"><?PHP echo $List->name?></div>
                        <div class="mdui-dialog-content"><strong>使用方法：</strong><?PHP echo $List->info?><br/><strong>注意事项：</strong><?PHP if($List->warning == NULL or $List->warning == "无"){echo "暂无该内容";}else{echo $List->warning;}?><br/><img src="<?PHP img(); echo "Chemistry/器具/".$List->name.".jpg" ?>" alt=""></div>
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
<!-- 翻页组件 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <?PHP
            // 判断页码
            if ($page == NULL or $page == 1) {
                echo "首页";
            } else {
                echo '<a href="?page=1">';
                echo '首页';
                echo '</a>';
            }
            ?> | <?PHP
            if ($page == NULL or $page == 1) {
                echo '上一页';
            } else {
                echo '<a href="?page='.($page-1).'">';
                echo '上一页';
                echo '</a>';
            }
            ?> | <?PHP
            if ($page*$limit_size < $num_max) {
                echo '<a href="?page='.($page+1).'">';
                echo '下一页';
                echo '</a>';
            } else {
                echo '下一页';
            }
            ?> | <?PHP
            if ($page*$limit_size < $num_max) {
                // 判断末页
                if (is_float($num_max/$limit_size)) {
                    if ($num_max/$limit_size > round($num_max/$limit_size)) {
                        $page = round($num_max/$limit_size)+1;
                    } else {
                        $page = round($num_max/$limit_size);
                    }
                } else {
                    $page = $num_max/$limit_size;
                }
                echo '<a href="?page='.$page.'">';
                echo '末页';
                echo '</a>';
            } else {
                echo '末页';
            }
            ?></p>
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