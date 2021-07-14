<?PHP
// 引入配置
include('../config.inc.php');
// 配置函数
// 主菜单颜色配置
function check($lists){
    // 引入全局变量
    global $setting,$listfor;
    // 条件判断
    if ($listfor == $lists) {
        echo 'mdui-text-color-'; //MDUI颜色代码
        check_night_time_accent();
    }
}
// 父菜单颜色配置
function listOnL($listOn) {
    // 引入全局变量
    global $setting,$listOnL;
    // 条件判断
    if ($listOnL == $listOn) {
        echo 'mdui-text-color-'; //MDUI颜色代码
        check_night_time_accent();
    }
}
// 子菜单颜色配置
function listOn($listO) {
    // 引入全局变量
    global $setting,$listOn;
    // 条件判断
    if ($listOn == $listO) {
        echo 'mdui-text-color-'; //MDUI颜色代码
        check_night_time_accent();
    }
}
?>
<div class="mdui-drawer mdui-shadow-3 <?PHP if ($listfor == 1) {echo "mdui-drawer-close";}?> <?PHP echo check_night_black() ?>" id="menu">
    <ul class="mdui-list" mdui-collapse="{Behavior: true}">
        <a href="../index.php">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php check(1) ?>">home</i>
                <div class="mdui-list-item-content <?php check(1) ?>">首页</div>
            </li>
        </a>
        <a href="../my.php">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php check(2) ?>">assistant_photo</i>
                <div class="mdui-list-item-content <?php check(2) ?>">简介</div>
            </li>
        </a>
        <!-- 语文 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 1){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(1) ?>">book</i>
                <div class="mdui-list-item-content <?php listOnL(1) ?>">语文库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(1) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Chinese/index.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(101) ?>">首页</li>
                </a>
                <a href="../Chinese/ancient_poetry.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(102) ?>">古诗、古文</li>
                </a>
            </ul>
        </li>
        <!-- 化学 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 2){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(2) ?>">bubble_chart</i>
                <div class="mdui-list-item-content <?php listOnL(2) ?>">化学库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(2) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Chemistry/equation_inorganic.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(201) ?>">化学方程式（无机）</li>
                </a>
                <a href="../Chemistry/equation_organic.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(202) ?>">化学方程式（有机）</li>
                </a>
                <a href="../Chemistry/experimental_equipment.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(203) ?>">化学仪器</li>
                </a>
            </ul>
        </li>
    </ul>
</div>