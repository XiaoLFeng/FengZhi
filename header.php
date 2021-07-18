<header>
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme mdui-shadow-2 mdui-appbar-inset">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#menus'}" mdui-tooltip="{content: '菜单'}"><i class="mdui-icon material-icons">menu</i></a>
        <a href="javascript:;" class="mdui-typo-title"><?php echo $setting["Info"]["name"] ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <p href="" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '设置主题'}" mdui-dialog="{target: '#Theme'}"><i class="mdui-icon material-icons">color_lens</i></p>
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
<!-- 弹窗 -->
<div class="mdui-container">
    <form action="" method="post">
    <div class="mdui-dialog" id="Theme">
        <div class="mdui-dialog-title"><strong>设置主题</strong></div>
        <div class="mdui-dialog-content">
            <h3>主题色</h3>
            <div class="mdui-container">
                <div class="mdui-row-md-4">
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="A" <?PHP if($_COOKIE["color"] == NULL) {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        自动
                        </label>
                    </div>
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="B" <?PHP if($_COOKIE["color"] == "light") {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        亮色
                        </label>
                    </div>
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="C" <?PHP if($_COOKIE["color"] == "night") {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        <strong>深色</strong>
                        </label>
                    </div>
                </div>
            </div>
            <h3>搭配色</h3>
            <div class="mdui-container">
                <div class="mdui-row-md-4">
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="01" <?PHP if($_COOKIE["color"] == "green") {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        <strong class="mdui-text-color-light-green">◉</strong><strong class="mdui-text-color-blue">◉</strong>
                        </label>
                    </div>
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="02" <?PHP if($_COOKIE["color"] == "amber") {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        <strong class="mdui-text-color-amber">◉</strong><strong class="mdui-text-color-deep-orange">◉</strong>
                        </label>
                    </div>
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="03" <?PHP if($_COOKIE["color"] == "light-blue") {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        <strong class="mdui-text-color-light-blue">◉</strong><strong class="mdui-text-color-deep-purple">◉</strong>
                        </label>
                    </div>
                    <div class="mdui-col">
                        <label class="mdui-radio">
                        <input type="radio" id="Group" name="Group" value="04" <?PHP if($_COOKIE["color"] == "indigo") {echo "checked";} ?>/>
                        <i class="mdui-radio-icon"></i>
                        <strong class="mdui-text-color-indigo">◉</strong><strong class="mdui-text-color-pink">◉</strong>
                        </label>
                    </div>
                </div>
            </div>
            </div>
            <div class="mdui-dialog-actions">
                <button class="mdui-btn mdui-ripple">我选好了</button>
            </div>
        </div>
    </form>
</div>
</header>