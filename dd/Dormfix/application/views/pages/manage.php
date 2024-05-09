<div class="bg-primary row col-md-8 col-md-offset-2 ">
    <div class="pd-3 col-sm-offset-3 col-sm-6">
        <section class="mg-v-2">
            <h4>管理者： <span><?=$name;?></span></h4>
        </section>
        <section class="mg-v-2">
            <h4>上次登入時間： <span><?=$prev_login;?></span></h4>
        </section>
        <section class="mg-v-2">
            <h4>此次登入時間： <span><?=$last_login;?></span></h4>
        </section>
        </section>
        <div class="mg-t-3">
            <button class="btn btn-warning btn-lg btn-block btn-square" onclick="return shchpwd($(this))">改密碼</button>
        </div>
        <div id="chpwd" class="hidden">
            <form action="<?=base_url('index.php/manage/chpwd');?>" method="post">
                <div class="form-group">
                  <label for="old_pwd">舊密碼：</label>
                  <input name="old_pwd" type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="new_pwd">新密碼：</label>
                  <input name="new_pwd" type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="confrimpwd">重新輸入新密碼：</label>
                  <input name="confrim" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" onclick="return chpwd()" class="btn btn-warning btn-lg btn-block btn-square">修改</button>
                </div>
            </form>
        </div>
        <div class="mg-t-3">
            <button onclick="logout()" class="btn btn-danger btn-lg btn-block btn-square">登出</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    function logout() {
        window.location.replace('<?=base_url('index.php/manage/logout');?>');
    }
    function shchpwd(obj) {
        obj.parent().addClass('hidden');
        $('#chpwd').removeClass('hidden');
    }
    function chpwd() {
        var new_pwd = $('input[name=confrim]').val();
        if (new_pwd.length > 3 && ($('input[name=confrim]').val() == $('input[name=new_pwd]').val())) {
            return true;
        } else {
            $('input[name=confrim]').addClass('notmatch');
            $('input[name=new_pwd]').addClass('notmatch');
            setTimeout(function() {
              $('input[name=confrim]').removeClass('notmatch');
              $('input[name=new_pwd]').removeClass('notmatch');
            }, 2000);
            return false;
        }
    }
</script>