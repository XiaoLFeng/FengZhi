<?PHP
// 判断系统
function img() {
    if ($_SERVER['SERVER_NAME'] == "127.0.0.1") {
        echo "../sources/img/";
    } else {
        if ($setting["Info"]["TCcdnOPEN"] == true) {
            echo $setting["Info"]["TCCDN"];
        } else {
            echo $setting["Info"]["jsdelivr"]."sources/img/";
        }
    }
}