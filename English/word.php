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
$listOnL = 3;
$listOn = 302;
// 数据提交（筛选器）
$post = $_POST["select"];
if ($post == "clear") {
    setcookie("english_word","",time()-1,"/");
    header("location:?");
} elseif ($post == "1") {
    setcookie( "english_word", "1" , time() + 10800 , "/" );
    header("location:?");
} elseif ($post == "2") {
    setcookie( "english_word", "2" , time() + 10800 , "/" );
    header("location:?");
} elseif ($post == "3") {
    setcookie( "english_word", "3" , time() + 10800 , "/" );
    header("location:?");
}
// 条件判断加入！
$limit_size = $setting["English"]["Page"]; // 数据库单页容器大小
// 判断是否键入数值
if ($page == NULL) {
    header("location:?page=1");
} elseif ($page < 1) {
    header("location:?page=1");
} else {
    $limit_start = (($page-1) * $limit_size);
}
if (isset($_COOKIE["english_word"]) == NULL) {
    $connect = "SELECT * FROM english_word order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM english_word order by id_name desc";
} elseif ($_COOKIE["english_word"] == 1) {
    $connect = "SELECT * FROM english_word where version='C' order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM english_word where version='C' order by id_name desc";
} elseif ($_COOKIE["english_word"] == 2) {
    $connect = "SELECT * FROM english_word where version='G' order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM english_word where version='G' order by id_name desc";
} elseif ($_COOKIE["english_word"] == 3) {
    $connect = "SELECT * FROM english_word where version='bc' order by id_name desc limit $limit_start,$limit_size";
    $connectL = "SELECT * FROM english_word where version='bc' order by id_name desc";
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
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; English | Word</h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <p>本单词库不仅包括高考词汇</p>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-col-xs-8 mdui-m-y-2">
        <div class="mdui-typo mdui-row-md-4">
            <form action="" method="post">
                <h4>筛选器</h4>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="clear" <?PHP if(isset($_COOKIE["english_word"]) == NULL){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    全部(默认)
                </label>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="1" <?PHP if($_COOKIE["english_word"] == 1){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    仅初中单词
                </label>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="2" <?PHP if($_COOKIE["english_word"] == 2){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    仅高中单词
                </label>
                <label class="mdui-radio mdui-col-xs-2">
                    <input type="radio" id="select" name="select" value="3" <?PHP if($_COOKIE["english_word"] == 3){echo "checked";} ?>/>
                    <i class="mdui-radio-icon"></i>
                    仅补充单词
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
                    <div class="mdui-panel-item-title"><?PHP echo $List->word?></div>
                    <div class="mdui-panel-item-summary mdui-col-xs-1"><?PHP echo $List->type?></div>
                    <div class="mdui-panel-item-summary mdui-col-xs-2"><?PHP echo $List->translate?></div>
                    <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-panel-item-body">
                    <div>
                        <p>单词：<?PHP echo $List->word ?></p>
                        <p>翻译：<?PHP echo $List->translate ?></p>
                        <p>词性：<?PHP if($List->type == NULL){echo "无";}else{echo $List->type;} ?></p>
                        <strong><?PHP 
                                    if ($List->grammar == NULL) {
                                        echo "暂无该详细的单词详解";
                                    } else {
                                        echo $List->grammar;
                                    }  
                                ?></strong>
                    </div>
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