<header>
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme mdui-shadow-2 mdui-appbar-inset">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#menu'}" mdui-tooltip="{content: '菜单'}"><i class="mdui-icon material-icons">menu</i></a>
        <a href="javascript:;" class="mdui-typo-title"><?php echo $setting["Info"]["name"] ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="<?PHP 
                if ($_COOKIE["night"] == "night") {
                    echo "?night=day";
                } else {
                    echo "?night=night";
                }
                ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '夜间模式'}"><i class="mdui-icon material-icons">brightness_4</i></a>
        <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '刷新'}"><i class="mdui-icon material-icons">refresh</i></a>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple"><i class="mdui-icon material-icons">more_vert</i></a>
    </div>
</div>
</header>