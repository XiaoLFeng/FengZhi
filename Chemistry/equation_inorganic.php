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
$listOn = 802;
// 数据提交（筛选器）
$post = $_POST["select"];
if ($post == "clear") {
    setcookie("chemistry_inorganic","",time()-1,"/");
    header("location:?");
} elseif ($post == "1") {
    setcookie( "chemistry_inorganic", "1" , time() + 10800 , "/" );
    header("location:?");
} elseif ($post == "2") {
    setcookie( "chemistry_inorganic", "2" , time() + 10800 , "/" );
    header("location:?");
}
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
// 数据库
if (isset($_COOKIE["chemistry_inorganic"]) == NULL) {
    $connect = "SELECT * FROM equation_inorganic order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM equation_inorganic order by id_name desc";
} elseif ($_COOKIE["chemistry_inorganic"] == 1) {
    $connect = "SELECT * FROM equation_inorganic where period='高中' order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM equation_inorganic where period='高中' order by id_name desc";
} elseif ($_COOKIE["chemistry_inorganic"] == 2) {
    $connect = "SELECT * FROM equation_inorganic where period='初中' order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM equation_inorganic where period='初中' order by id_name desc";
}
// 导入数据库
$SQL = mysqli_query($conn,$connect);
$SQLL = mysqli_query($conn,$connectL);
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
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 化学 | 无机方程式</h2>
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
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-m-y-2">
        <div class="mdui-typo mdui-row-md-3">
            <form action="" method="post">
                <h4>筛选器</h4>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="clear" <?PHP if(isset($_COOKIE["chemistry_inorganic"]) == NULL){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    清空（默认）
                </label>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="1" <?PHP if($_COOKIE["chemistry_inorganic"] == 1){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    仅看高中
                </label>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="2" <?PHP if($_COOKIE["chemistry_inorganic"] == 2){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    仅看初中
                </label>
                <div class="mdui-col-xs-2">
                    <button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">确认</button>
                </div>
            </form>
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
                        <img src="<?PHP img() ?>Chemistry/方程式/无机/<?PHP echo $List->image?>" alt="">
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