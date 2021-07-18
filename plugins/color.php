<?PHP
// 获取数据
$group = $_POST["Group"];
$time = date("H:i"); // 获取服务器时间

// 判断(赋予Cookie)
if (!$group == NULL) {
    if ($group == "A") {
        // 移除Cookie符合根据时间自动判断
        setcookie("color","",time()-1,"/");
    } elseif ($group == "B") {
        setcookie( "color", "light" , time() + 43200 , "/" );
    } elseif ($group == "C") {
        setcookie( "color", "night" , time() + 43200 , "/" );
    } elseif ($group == "01") { // 主题色自选
        setcookie( "color", "green" , time() + 86400 , "/" );
    }
    $group = NULL;
    header("location:?");
}

// 判断开启
if (isset($_COOKIE["color"]) == NULL) {
    // 判断时间
    if ($time >= "18:00" && $time <= "23:59" or $time >= "00.00" && $time <= "06:00") {
        // 执行函数
        function check_night_time_primary() {
            echo "grey";
        }
        function check_night_time_accent() {
            echo "pink";
        }
        function check_night_black() {
            echo "mdui-theme-layout-dark";
        }
    } else {
        // 执行函数
        function check_night_time_primary() {
            global $setting;
            echo $setting["Web"]["color"];
        }
        function check_night_time_accent() {
            global $setting;
            echo $setting["Web"]["subcolor"];
        }
        function check_night_black() {}
    }
} else {
    // Light
    if ($_COOKIE["color"] == "light") {
        // 执行函数
        function check_night_time_primary() {
            echo "light-green";
        }
        function check_night_time_accent() {
            echo "blue";
        }
        function check_night_black() {}
    }
    // Night
    if ($_COOKIE["color"] == "night") {
        // 执行函数
        function check_night_time_primary() {
            echo "grey";
        }
        function check_night_time_accent() {
            echo "pink";
        }
        function check_night_black() {
            echo "mdui-theme-layout-dark";
        }
    }
    // green
    if ($_COOKIE["color"] == "green") {
        // 执行函数
        function check_night_time_primary() {
            echo "light-green";
        }
        function check_night_time_accent() {
            echo "blue";
        }
        function check_night_black() {}
    }
}

// DeBUG模式（报错查询）
if ($setting["Debug"] == true) {
    echo "[DeBUG] 主题颜色配置：\n\n";
    echo "\ncheck_night_time_primary函数模块（输出）：";
    check_night_time_primary();
    echo "\ncheck_night_time_accent函数模块（输出）：";
    check_night_time_accent();
    echo "\ncheck_night_black函数模块（输出）：";
    check_night_black();
    echo "\nCookie调用情况：";
    echo $_COOKIE["color"];
}