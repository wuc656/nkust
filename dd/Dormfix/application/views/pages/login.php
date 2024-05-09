<div class="bg-primary row col-md-8 col-md-offset-2 login-parent">
    <div class="pd-3 login-plat">
    <form id="login-form" action="<?=base_url('index.php/manage/login');?>" method="post">
        <div class="form-group">
            <label>帳號</label>
            <input type="text" name="account" autocapitalize="off" autocorrect="off" class="form-control" placeholder="僅限管理員">
        </div>
        <div class="form-group">
            <label>密碼</label>
            <input type="password" name="passwd" class="form-control" placeholder="密碼">
        </div>
		<script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
        <div class="mg-t-3">
            <button type="submit" data-login data-sitekey="<?=$this->config->item('sitekey');?>" data-callback='onSubmit' class="btn btn-primary btn-lg btn-block g-recaptcha">登入</button>
        </div>
    </form>
	<script>
		function onSubmit(token) {
		  document.getElementById("login-form").submit();
		}
     </script>
    </div>
</div>