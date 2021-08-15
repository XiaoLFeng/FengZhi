<?PHP
// 配置函数
// 主菜单颜色配置
function check($lists){
    // 引入全局变量
    global $listfor;
    // 条件判断
    if ($listfor == $lists) {
        echo 'mdui-text-color-'; //MDUI颜色代码
        check_night_time_accent();
    }
}
// 父菜单颜色配置
function listOnL($listOn) {
    // 引入全局变量
    global $listOnL;
    // 条件判断
    if ($listOnL == $listOn) {
        echo 'mdui-text-color-'; //MDUI颜色代码
        check_night_time_accent();
    }
}
// 子菜单颜色配置
function listOn($listO) {
    // 引入全局变量
    global $listOn;
    // 条件判断
    if ($listOn == $listO) {
        echo 'mdui-text-color-'; //MDUI颜色代码
        check_night_time_accent();
    }
}
?>
<div class="mdui-drawer mdui-shadow-6 <?PHP if ($listfor == 1) {echo "mdui-drawer-close";}?> <?PHP echo check_night_black() ?>" id="menus">
    <ul class="mdui-list" mdui-collapse="{Behavior: true}">
        <a href="../">
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
                <a href="../Chinese/">
                    <li class="mdui-list-item mdui-ripple <?php listOn(101) ?>">首页</li>
                </a>
                <a href="../Chinese/ancient_poetry.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(102) ?>">古诗、古文</li>
                </a>
            </ul>
        </li>
        <!-- 数学 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 2){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(2) ?>">straighten</i>
                <div class="mdui-list-item-content <?php listOnL(2) ?>">数学库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(2) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Math/">
                    <li class="mdui-list-item mdui-ripple <?php listOn(201) ?>">首页</li>
                </a>
            </ul>
        </li>
        <!-- 英语 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 3){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(3) ?>">child_care</i>
                <div class="mdui-list-item-content <?php listOnL(3) ?>">英语库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(3) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../English/">
                    <li class="mdui-list-item mdui-ripple <?php listOn(301) ?>">首页</li>
                </a>
                <a href="../English/word.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(302) ?>">Word</li>
                </a>
            </ul>
        </li>
        <!-- 日语 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 4){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(4) ?>">tag_faces</i>
                <div class="mdui-list-item-content <?php listOnL(4) ?>">日语库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(4) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Nihongo/">
                    <li class="mdui-list-item mdui-ripple <?php listOn(401) ?>">首页</li>
                </a>
                <a href="../Nihongo/tango.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(402) ?>">単語「たんご」</li>
                </a>
            </ul>
        </li>
        <!-- 物理 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 5){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(5) ?>">timer</i>
                <div class="mdui-list-item-content <?php listOnL(5) ?>">物理库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(5) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Physics/">
                    <li class="mdui-list-item mdui-ripple <?php listOn(501) ?>">首页</li>
                </a>
            </ul>
        </li>
        <!-- 历史 
        <li class="mdui-collapse-item <?PHP if($listOnL == 6){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(6) ?>">collections_bookmark</i>
                <div class="mdui-list-item-content <?php listOnL(6) ?>">历史库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(6) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Chinese/index.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(601) ?>">首页</li>
                </a>
            </ul>
        </li>-->
        <!-- 生物 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 7){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(7) ?>">pregnant_woman</i>
                <div class="mdui-list-item-content <?php listOnL(7) ?>">生物库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(7) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Chinese/index.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(701) ?>">首页</li>
                </a>
            </ul>
        </li>
        <!-- 化学 -->
        <li class="mdui-collapse-item <?PHP if($listOnL == 8){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(8) ?>">bubble_chart</i>
                <div class="mdui-list-item-content <?php listOnL(8) ?>">化学库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(8) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Chemistry/">
                    <li class="mdui-list-item mdui-ripple <?php listOn(801) ?>">首页</li>
                </a>
                <a href="../Chemistry/equation_inorganic.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(802) ?>">化学方程式（无机）</li>
                </a>
                <a href="../Chemistry/equation_organic.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(803) ?>">化学方程式（有机）</li>
                </a>
                <a href="../Chemistry/experimental_equipment.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(804) ?>">化学仪器</li>
                </a>
            </ul>
        </li>
        <!-- 政治
        <li class="mdui-collapse-item <?PHP if($listOnL == 9){echo "mdui-collapse-item-open";}?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(9) ?>">book</i>
                <div class="mdui-list-item-content <?php listOnL(9) ?>">政治库</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons  <?php listOnL(9) ?>">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <a href="../Chinese/index.php">
                    <li class="mdui-list-item mdui-ripple <?php listOn(901) ?>">首页</li>
                </a>
            </ul>
        </li>
        [End] -->
        <a href="https://doc.chs.pub/FZGD/">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons <?php listOnL(10) ?>">near_me</i>
                <div class="mdui-list-item-content <?php listOnL(10) ?>">地理库</div>
            </li>
        </a>
    </ul>
</div>