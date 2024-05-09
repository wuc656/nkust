<div class="row text-white bkg-dark-gray pd-b-1 pd-t-1 col-md-8 col-md-offset-2">
    <form>
        <div>
            <label>單號：</label><span name="uid"></span>
            <input type="hidden" name="uid">
        </div>
        <div>
            <label>地點：</label><span name="place"></span>
        </div>
        <div>
            <label>故障原因：</label><span name="situation"></span>
        </div>
        <div>
            <label>聯絡方式：</label><span name="contact"></span>
        </div>
        <div>
            <label>狀態更新：</label>
            <select name="status" class="selectpicker" data-width="100%" disabled>
                <?php foreach ($this->lang->line('list_types') as $key => $value): ?>
                    <option value="<?=$key;?>"><?=$value;?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div id="vendor" class="hidden">
            <label>所屬廠商：</label>
            <select name="vendor[]" class="selectpicker" multiple data-width="100%">
                <?php foreach ($this->config->item('vendor_list') as $key => $value): ?>
                    <option value="<?=$key;?>"><?=$value;?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>備註歷史：</label>
            <div id="remark" class="mg-h-2"></div>
        </div>
        <div class="form-group">
            <label>備註：</label>
            <textarea name="remark" class="form-control" placeholder="備註功能填寫完成會自動加入時間標籤" style="max-width: 100%;min-width: 100%;" rows="3"></textarea>
        </div>
        <div class="col-md-6 pd-0"><button type="submit" class="btn btn-default">送出</button></div>
        <div class="col-md-6 pd-0 text-right"><a class="btn btn-default" href="<?=base_url('index.php/request_print');?>">列印此頁</a></div>
    </form>
</div>
<script type="text/javascript">
    status_sp = $('form .selectpicker').eq(0);
    vendor_sp = $('form .selectpicker').eq(1);
    function nl2br( str ) {
        return str.replace(/(?:\r\n|\r|\n)/g, '<br>');
    } 
    function list_manager() {
        status_sp.on('change', function(){
            if ($(this).val() == "2") {
                $('#vendor').removeClass('hidden');
                vendor_sp.selectpicker('refresh')
            } else {
                $('#vendor').addClass('hidden');
            }
        });
        $('tbody>tr').unbind('click').click(function(){
            var strow = $(this)
            var status = strow.attr('data-status');
            var vendor = strow.attr('data-vendor');
            var uid = strow.attr('data-uid');
            status_sp.selectpicker('val', status).prop('disabled', false).selectpicker('refresh').trigger('change');
            vendor_sp.selectpicker('val', vendor.split(',')).selectpicker('refresh')
            $('#remark').empty().append(nl2br(strow.children('td[data-type="remark"]').text()))
            $("form *[name]:not(.selectpicker, textarea)").each(function(){
                var name = $(this).attr('name');
                $(this).text(strow.children('td[data-type=' + name + ']').text());
                $(this).val(strow.children('td[data-type=' + name + ']').text());
            })
            $('html, body').stop().animate({scrollTop: $('html').prop('scrollHeight')}, 200, 'swing');
            $.get('/dormfix/index.php/amain/get_contact',{'uid' : uid} ,function(response){
                $('form span[name=contact]').text(response);
            })
        })
    }
    $('button[type="submit"]').click(function(){
        var state = history.state
        var value = status_sp.val();
        var data = $('form').first().serialize();
        $.ajax({
            type: "POST",
            url: "<?=base_url('index.php/detail_update');?>",
            data: data,
            success: function(response){
                if ($('tr').length == 2 && state.list_page > 1 && value == 1)
                    state.list_page--;
                state.page = 'request_list';
                state.scrollHeight = $(window).scrollTop();
                history.pushState(state,null,ajax_get(state));
                row_init();
                list_manager();
            },
            error: function(response){
                console.log(response)
            }
        })
        return false;
    })
    $(document).ready(function(){
        list_manager();
        status_sp.selectpicker('val', 0);
    })
</script>