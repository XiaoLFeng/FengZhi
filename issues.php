<?PHP
// 开启session
session_start();
// 禁用错误报告
error_reporting(0);
// 引入设置
$is = htmlspecialchars($_GET["is"]);
include("./config.inc.php");
include("./plugins/mysql_conn.php");
// 引入插件
include("./plugins/color.php");  //引入夜间模式插件
// 导入数据库
$SQL = mysqli_query($conn,"SELECT * FROM equation_inorganic");
$SQL_issues = $conn->query( "SELECT * FROM issues" );
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
<?PHP
// 条件判断
if ($is == NULL) {
?>
<!-- 顶部 -->
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP echo $setting["Info"]["name"] ?> &mdash; 问题/资源提交</h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <p>如果需要 “提交问题” 或 “提交资源” 请在下方填写对应文件内容</p>
        </div>
    </div>
</div>
<!-- 内容提交 -->
<div class="mdui-container">
    <div class="mdui-valign mdui-m-y-4">
        <div class="mdui-typo mdui-center mdui-btn-raised mdui-hoverable mdui-col-sm-12">
            <form action="./plugins/issues_push.php" method="post">
                <div class="mdui-center">
                    <div class="mdui-textfield mdui-col-sm-4">
                        <i class="mdui-icon material-icons">account_circle</i>
                        <input class="mdui-textfield-input" type="name" id="name" name="name" placeholder="昵称" required/>
                    </div>
                    <div class="mdui-textfield mdui-col-sm-4">
                        <i class="mdui-icon material-icons">email</i>
                        <input class="mdui-textfield-input" type="email" id="email" name="email" placeholder="邮箱" required/>
                    </div>
                    <div class="mdui-textfield mdui-col-sm-4">
                        <i class="mdui-icon material-icons">mode_comment</i>
                        <input class="mdui-textfield-input" type="chat" id="chat" name="chat" placeholder="QQ/WeChat"/>
                    </div>
                    <div class="mdui-textfield mdui-col-sm-12">
                        <i class="mdui-icon material-icons">title</i>
                        <input class="mdui-textfield-input" type="title" id="titlet" name="title" placeholder="标题" maxlength="60" required/>
                    </div>
                    <div class="mdui-col-sm-12 mdui-m-y-1">
                        <div class="mdui-textfield mdui-col-sm-12">
                            <textarea class="mdui-textfield-input" id="rom" name="rom" rows="8" maxlength="2000" placeholder="填写内容（支持MarkDown语法）" required></textarea>
                        </div>
                    </div>
                    <div class="mdui-float-right mdui-m-y-1">
                        <select class="mdui-select mdui-m-a-1" mdui-select="{position: 'bottom'}" id="type" name="type">
                            <option value="Ziyuan-error">资源出错</option>
                            <option value="BUG">BUG反馈</option>
                            <option value="Ziyuan">资源提交</option>
                        </select>
                        <button class="mdui-m-a-1 mdui-btn mdui-color-theme-accent mdui-ripple">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 数据库查询内容 -->
<div class="mdui-container">
    <div class="mdui-container mdui-hidden-sm-up">
        <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
            <div class="mdui-typo mdui-center">
                <h2>请使用pad端及以上的大屏查阅</h2>
            </div>
        </div>
    </div>
    <div class="mdui-table-fluid mdui-m-y-2 mdui-hidden-sm-down">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>反馈/提交内容</th>
                    <th>提交者</th>
                    <th>详情</th>
                </tr>
            </thead>
            <tbody>
    <?PHP
    while($issue = mysqli_fetch_object($SQL_issues)) {
        ?>
        <tr>
            <td><strong><?PHP echo $issue->id ?></strong></td>
            <td><?PHP 
                                                        echo $issue->title;
                                                        if ($issue->closed == "false") {
                                                            echo '<font color="grey"> [</font><font color="green">开放</font><font color="grey">]</font>'; 
                                                        } else {
                                                            echo '<font color="grey"> [</font><font color="red">关闭</font><font color="grey">]</font>';
                                                        }
                                                        if (!$issue->replay == NULL) {
                                                            echo '<font color="grey"> [</font><font color="blue">开发者已回复</font><font color="grey">]</font>'; 
                                                        }
                                                    ?></td>
            <td><?PHP echo $issue->name ?></td>
            <td><a href="?is=<?PHP echo $issue->id ?>"><button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">查阅</button></a></td>
        </tr>
    <?PHP
    }
    ?>
            </tbody>
        </table>
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
<?PHP 
// 如果有
} else {
    $SQL_issue = $conn->query( "SELECT * FROM issues where id=$is" );
    $issue = mysqli_fetch_object($SQL_issue);
?>
<div class="mdui-container">
    <div class="mdui-col-xs-12 mdui-valign mdui-m-t-1 mdui-m-y-1">
        <div class="mdui-typo mdui-center">
            <h2><?PHP if ($issue->type == "BUG") {
                echo "BUG反馈";
            } elseif ($issue->type == "Ziyuan") {
                echo "资源提交";
            } elseif ($issue->type == "Ziyuan-error") {
                echo "资源错误";
            } ?> &mdash; <?PHP echo $issue->title ?></h2>
        </div>
    </div>
</div>
<div class="mdui-container">
    <div class="mdui-typo">
        <div class="mdui-m-y-2 mdui-float-right">
            <a href="./issues.php"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">返回</button></a>
        </div>
        <!-- 输出数据 -->
        <h5><strong>发布者昵称：</strong><?PHP echo $issue->name ?></h5>
        <h1><strong>◉ 发布者描述内容</strong></h1>
        <div class="mdui-m-l-5" id="content"></div>
        <?PHP
        if (!$issue->replay == NULL) {
            echo "<h1><strong>◉ 开发者内容反馈</strong></h1>\n";
            echo '<div class="mdui-m-l-5" id="replay"></div>';
        }
        ?>
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
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    document.getElementById('content').innerHTML =
    marked('<?PHP $rom = str_replace('/n/n', '\n\n' , $issue->rom ); echo $rom ?>');
</script>
<script>
    document.getElementById('replay').innerHTML =
    marked('<?PHP $replay = str_replace('/n/n', '\n\n' , $issue->replay ); echo $replay ?>');
</script>
<?PHP
}
?>
</html>
<?PHP
mysqli_free_result($SQL);
mysqli_free_result($SQL_issue);
mysqli_free_result($SQL_issues);
mysqli_close($conn);
?>