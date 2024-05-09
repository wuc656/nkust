<div class="container-fluid" id="nav">
    <div class="row col-md-8 col-md-offset-2 pd-0">
        <div class="col-xs-4 pd-0">
            <a class="btn btn-square btn-success form-control " data-state="request_list" href="<?=base_url('index.php/request_list');?>" onclick="return false;">
                <span class="glyphicon glyphicon-list"></span><span class="font-important"> List</span>
            </a>
        </div>
        <div class="col-xs-4 pd-0">
            <a class="btn btn-square btn-danger form-control" data-state="request" href="<?=base_url('index.php/request');?>" onclick="return false;">
                <span class="glyphicon glyphicon-wrench"></span><span class="font-important"> Form</span>
            </a>
        </div>
        <div class="col-xs-4 pd-0">
            <a class="btn btn-square btn-primary form-control font-important" data-state="manage" href="/dormfix/index.php/manage" onclick="return false;">
                <span class="glyphicon glyphicon-user"></span><span class="font-important"> Manage</span>
            </a>
        </div>
        <!--div class="col-xs-4 pd-0">
            <a class="btn btn-square btn-info form-control font-important" href="http://studorm.kuas.edu.tw/">
                <span class="glyphicon glyphicon-home"></span><span class="font-important"> Home</span>
            </a>
        </div-->
    </div>
</div>
<script type="text/javascript">
    $('#nav a[data-state]').click(function(){
        var state = {
            page : $(this).attr('data-state'),
            list_type : history.state.list_type,
            list_page : history.state.list_page,
            detail_id : history.state.detail_id
        }
        history.pushState(state, null, ajax_get(state));
        $(this).blur();
    })
</script>
<div id="wrapper" class="container-fluid mg-b-3">