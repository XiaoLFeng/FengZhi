<?PHP
/*
 * 开发者 筱锋xiao_lfeng
 * 归属 FrontLeaves 工作室
 */
//定义参数
$sql_host = $setting["sql"]["host"];
$sql_dbname = $setting["sql"]["dbname"];
$sql_username = $setting["sql"]["username"];
$sql_password = $setting["sql"]["password"];
//判断数据库端口
if($setting["sql"]["port"] == 3306 or $setting["sql"]["port"] == NULL){
    //定义参数
    $sql_port = 3306;
} else {
    //定义参数
    $sql_port = $setting["sql"]["port"];
}
//连接数据库
$conn=new MySQLi($sql_host,$sql_username,$sql_password,$sql_dbname,$sql_port);
/*
//检查链接
if($sql_conn->connect_error){
	die("数据库连接失败！".$conn->connect_error);
}
*/