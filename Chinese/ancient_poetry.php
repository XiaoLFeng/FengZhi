<?PHP
// 开启session
session_start();
// 禁用错误报告
error_reporting(0);
// 引入设置
$ap = htmlspecialchars($_GET["ap"]);
include("../config.inc.php");
include("../plugins/mysql_conn.php");
$listOnL = 1;
$listOn = 102;
// 导入数据库
$SQL = mysqli_query($conn,"SELECT * FROM equation_inorganic");
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
<?PHP
// 条件判断
if ($ap == NULL) {
?>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 语文 | 古诗、古文</h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <p>请在下方选择你需要的项目</p>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-table-fluid mdui-m-y-4">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>名字</th>
                    <th>作者</th>
                    <th>朝代</th>
                    <th>进入</th>
                </tr>
            </thead>
            <tbody>
    <?PHP
    $handle=opendir('./ancient_poetry');
    while($dir = readdir($handle))
    {
        ?>
        <tr>
            <?PHP
            //过滤当前文件夹和父文件
            if($dir == '.' || $dir == '..' )
            {
                continue;
            }
            $str = str_replace('.md','',$dir);
            ?>
            <td><strong><?PHP echo "《".$str."》"; ?></strong></td>
            <td><?PHP $a=file('./ancient_poetry/'.$str.'.md');$strs = str_replace('#### 作者: ','',$a[2]);echo $strs?></td>
            <td><?PHP $b=file('./ancient_poetry/'.$str.'.md');$strss = str_replace('#### 朝代: ','',$b[4]);echo $strss?></td>
            <td><a href="?ap=<?PHP echo $str ?>"><button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">查阅</button></a></td>
        </tr>
    <?PHP
    }
    ?>
            </tbody>
        </table>
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
<?PHP 
// 如果有
} else {
?>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 语文 | <?PHP $a=file('./ancient_poetry/'.$ap.'.md');$strs = str_replace('###','',$a[0]);echo $strs?></h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-typo">
        <div class="mdui-m-y-2 mdui-float-right">
            <a href="./ancient_poetry.php"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">返回</button></a>
        </div>
        <div id="markdown"></div>
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
<!-- JS -->
<script type="text/javascript" src="../sources/js/marked.min.js"></script>
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.5.0/build/highlight.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.2.1/dist/jquery.min.js"></script>
<script>
$.get('<?php echo './ancient_poetry/'.$ap.'.md' ?>', function(response, status, xhr){
    $("#markdown").html(marked(response));
    });
</script>
<?PHP
}
?>
</html>
<?PHP
mysqli_free_result($SQL);
mysqli_close($conn);
?>