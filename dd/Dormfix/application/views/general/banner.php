<!--<?=$this->session->lang;?>-->
<div class="background-image"></div>
<div class="container-fluid">
    <div class="btn-group dropdown mg-1" style="position: fixed;right: 0px;z-index: 1001; opacity: 0.9;">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-globe"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right menu" role="menu">
            <li><span class="lang-sm lang-lbl-full" lang="zh-tw"></span></li>
            <li><span class="lang-sm lang-lbl-full" lang="en"></span></li>
        </ul>
    </div>
    <script type="text/javascript">
        $('.menu>li>span').click(function() {
            var lang_set = $(this).attr('lang');
            //console.log($(this).children('span').attr('lang'));
            $.ajax({
                type: "GET",
                url: "<?=base_url('index.php/change_lang/');?>" + lang_set,
                success: function(){
                    location.reload();
                }
            })
        })
    </script>
    <header class="text-white text-shadow mg-b-3 mg-t-3">
        <div class="row">
            <hgroup class="col-md-7 col-lg-6 col-md-offset-2 text-center">
                <h1 class="header-main">國立高雄科技大學</h1>
                <h4>National Kaohsiung University of Science and Technology</h4>
            </hgroup>
        </div>
        <div class="row">
            <hgroup class="col-md-4 col-md-offset-6 col-lg-offset-6 text-center">
                <h1>宿舍報修系統</h1>
                <h4>Dormitory Fix System</h4>
            </hgroup>
        </div>
    </header>
</div>