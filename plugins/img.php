<?PHP
// 判断系统
function img() {
    global $setting;
    if ($_SERVER['SERVER_NAME'] == "127.0.0.1") {
        echo "../";
    } else {
        if ($setting["Info"]["TCcdnOPEN"] == true) {
            echo $setting["Info"]["TCCDN"];
        } else {
            echo $setting["Info"]["jsdelivr"];
        }
    }
}