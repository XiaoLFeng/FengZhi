<?PHP
// 启用SESSION
session_start();
//入库
include_once("../config.inc.php");
include_once("../plugins/mysql_conn.php");
// 防乱码
header("Content-type:text/html;charset-utf-8");

// 获取数据内容
$name = $_POST["name"];
$email = $_POST["email"];
$chat = $_POST["chat"];
$title = $_POST["title"];
$roms = $_POST["rom"];
$type = $_POST["type"];
$closed = "false";
// 数据提交时间
date_default_timezone_set("Asia/Shanghai"); // 校准时间
$uptime = date("Y-m-d");

// 连接数据库
$result = $conn->query( "SELECT * FROM issues" );

// 修改ROM
$rom = str_replace(array("\r\n", "\r", "\n"), '/n/n' , $roms );

// 自动ID归档
$ids = mysqli_fetch_object($result);
if ($ids->id == NULL) {
    $id = 1;
} else {
    $id = ($ids->id);
}

// 邮件发送模块

// 条件判断
if ($setting["Debug"] == false) {
    // 上传数据
    $conn->query("INSERT INTO issues(name,email,chat,title,rom,type,closed,uptime) VALUES('".$name."','".$email."','".$chat."','".$title."','".$rom."','".$type."','".$closed."','".$uptime."')");
    ?><script language="javascript">window.location.href = "../issues.php"</script><?php
} else {
    // DeBUG模式
    echo '[DeBUG] 数据库连接';
    echo "<br/>";
    if ($conn->connect_error) {
        echo "数据库连接失败";
        echo "<br/>";
        echo "报错信息：" .$conn->connect_error;
    } else {
        echo "数据库连接成功";
    }
    echo "<br/>";
    echo "<br/>";
    echo '[DeBUG] 填入数据库情况';
    echo "<br/>";
    if ($conn->query("INSERT INTO issues(name,email,chat,title,rom,type,closed,uptime) VALUES('".$name."','".$email."','".$chat."','".$title."','".$rom."','".$type."','".$closed."','".$uptime."')") == True ) {
        echo "注册成功！";
    } else {
        echo "失败";
    }
    echo "<br/>";
    echo "<br/>";
    echo '[DeBUG] 数据输出';
    echo "<br/>";
    echo "id: ".$id;
    echo "<br/>";
    echo "name: ".$name;
    echo "<br/>";
    echo "email: ".$email;
    echo "<br/>";
    echo "chat: ".$chat;
    echo "<br/>";
    echo "title: ".$title;
    echo "<br/>";
    echo "rom: ".$rom;
    echo "<br/>";
    echo "type: ".$type;
    echo "<br/>";
    echo "uptime: ".$uptime;
    echo "<br/>";
    echo '<a href="../issues.php"><button">返回</button></a>';
}
?>