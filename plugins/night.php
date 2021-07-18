<?PHP
// 引入数据
//获取开启夜间模式取值
$night = htmlspecialchars($_GET["night"]);
// 构建时间检测函数模块
$time = date("H:i");
// 创建函数（手动开启夜间模式）
if ($night == 'day' or $night == 'night') {
    if ($night == 'night') {
        //删除Cookie
        setcookie("night","",time()-1,"/");
        // 创建Cookie
        setcookie( "night", "night" , time() + 10800 , "/" );
        header("location:?");
        ?><script language="javascript">location.reload(true)</script><?
        if ($setting["Debug"] == true) {
            echo "创建 night 的Cookie为 night";
            echo "<br/>";
        }
    } else {
        //删除Cookie
        setcookie("night","",time()-1,"/");
        // 创建Cookie
        setcookie( "night", "day" , time() + 10800 , "/" );
        header("location:?");
        ?><script language="javascript">location.reload(true)</script><?
        if ($setting["Debug"] == true) {
            echo "创建 night 的Cookie为 day";
            echo "<br/>";
        }
    }
    if ($setting["Debug"] == true) {
        echo "进入夜间模式控制栏";
        echo "<br/>";
    }
}

// 设置主题颜色
function check_night_time_primary() {
    // 引入全局变量
    global $setting;
    global $time;
    // 判断COOKIE是否开启夜间模式
    if (isset($_COOKIE["night"]) == false or isset($_COOKIE["night"]) == NULL) {
        // 时间条件判断是否开启
        if ($time >= "18:00" && $time <= "23:59" or $time >= "00.00" && $time <= "06:00") {
            echo "grey";
        } else {
            echo $setting["Web"]["color"];
        }
    } elseif ($_COOKIE["night"] == "night") {
        echo "grey";
    } else {
        echo $setting["Web"]["color"];
    }
}

// 设置主题次颜色
function check_night_time_accent() {
    // 引入全局变量
    global $setting;
    global $time;
    // 判断COOKIE是否开启夜间模式
    if (isset($_COOKIE["night"]) == false or isset($_COOKIE["night"]) == NULL) {
        // 时间条件判断是否开启
        if ($time >= "18:00" && $time <= "23:59" or $time >= "00.00" && $time <= "06:00") {
            echo "pink";
        } else {
            echo $setting["Web"]["subcolor"];
        }
    } elseif ($_COOKIE["night"] == "night") {
        echo "pink";
    } else {
        echo $setting["Web"]["subcolor"];
    }
}

// 设置背景颜色改为深色，并且修改字体为白色（仅限部分）
function check_night_black() {
    // 引入全局变量
    global $time;
    // 判断COOKIE是否开启夜间模式
    if (isset($_COOKIE["night"]) == false or isset($_COOKIE["night"]) == NULL) {
        // 时间条件判断是否开启
        if ($time >= "18:00" && $time <= "23:59" or $time >= "00.00" && $time <= "06:00") {
            echo "mdui-theme-layout-dark";
        }
    } elseif ($_COOKIE["night"] == "night") {
        echo "mdui-theme-layout-dark";
    }
}

// DeBUG模式（报错查询）
if ($setting["Debug"] == true) {
    echo "check_night_time_primary函数模块（输出）：";
    check_night_time_primary();
    echo "<br/>";
    echo "check_night_time_accent函数模块（输出）：";
    check_night_time_accent();
    echo "<br/>";
    echo "check_night_black函数模块（输出）：";
    check_night_black();
    echo "<br/>";
    echo "Cookie调用情况：";
    echo $_COOKIE["night"];
}