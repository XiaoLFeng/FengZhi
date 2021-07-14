<header>
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme mdui-shadow-2 mdui-appbar-inset">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#menus'}" mdui-tooltip="{content: '菜单'}"><i class="mdui-icon material-icons">menu</i></a>
        <a href="javascript:;" class="mdui-typo-title"><?php echo $setting["Info"]["name"] ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="<?PHP 
                // 判断Cookie条件进行调配
                if ($_COOKIE["night"] == "night") {
                    echo "?night=day";
                } else {
                    echo "?night=night";
                }
                ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '夜间模式'}"><i class="mdui-icon material-icons">brightness_4</i></a>
        <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '刷新'}"><i class="mdui-icon material-icons">refresh</i></a>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-menu="{target: '#menu'}" mdui-tooltip="{content: '更多'}"><i class="mdui-icon material-icons">more_vert</i></a>
        <!-- 更多[Start] -->
        <ul class="mdui-menu mdui-menu-cascade" id="menu">
            <li class="mdui-menu-item">
                <a href="../issues.php" class="mdui-ripple">
                    <i class="mdui-menu-item-icon mdui-icon material-icons">accessibility</i>
                    issues
                    <span class="mdui-menu-item-helper">问题/资源提交</span>
                </a>
            </li>
            </li>
        </ul>
        <!-- 更多[End] -->
    </div>
</div>
</header>