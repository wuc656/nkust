<script type="text/javascript">
    function refresh_rows(obj,g_data = null){
        var page = obj.attr('data-ci-pagination-page');
        var type = obj.attr('data-status');
        var state = {
            page : 'request_list',
            list_type : (type == undefined) ? history.state.list_type : type,
            list_page : (page == undefined) ? '1' : page ,
            detail_id : null
        }
        history.pushState(state,null,ajax_get(state,g_data))
        return false;
    }

    function row_init(){
        if ($('tr').length > 1) {
            $('tr[data-status]').each(function(){
                var status_arr = ['bg-danger', 'bg-success', 'bg-primary', 'bg-warning', 'bg-info'];
                var x = parseInt($(this).attr('data-status'));
                $(this).addClass(status_arr[x]).click(function(){
                    var state = {
                        page : 'request_detail',
                        list_type : history.state.list_type,
                        list_page : history.state.list_page,
                        detail_id : $(this).attr('data-uid')
                    }
                    history.pushState(state,null,ajax_get(state))
                })
                var tsrow = $(this).children('td[data-type="status"]');
                tsrow.text(zh_status(tsrow.text()))
            })
        } else {
            $('article').first().css('background-image',"url(<?=base_url('assets/img/Congratulations.png');?>)").addClass('congratulations');
        }
    }
    function zh_status(sw) {
        switch(sw) {
        <?php foreach ($this->lang->line('list_types') as $key => $value): ?>
            case '<?=$key;?>':
                return "<?=$value;?>";
                break;
        <?php endforeach ?>
        }
    }
</script>
<div class="row bkg-green col-md-8 col-md-offset-2 text-center">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-success s_type mg-t-1" data-status="latest" onclick="return refresh_rows($(this));">
                <input type="radio" autocomplete="off"><?=$this->lang->line('list_latest')?>
            </label>
        <?php foreach ($this->lang->line('list_types') as $key => $value): ?>
            <label class="btn btn-success s_type mg-t-1" data-status="<?=$key;?>" onclick="return refresh_rows($(this));">
                <input type="radio" autocomplete="off"><?=$value;?>
            </label>
        <?php endforeach ?>
    </div>
    <select name="vendor[]" class="selectpicker mg-t-1" title="選擇廠商...">
        <?php foreach ($this->config->item('vendor_list') as $key => $value): ?>
            <option value="<?=$key;?>"><?=$value;?></option>
        <?php endforeach ?>
    </select>
</div>
<article class="row pd-0 col-md-8 col-md-offset-2" style="background-color: rgba(255,255,255,0.4);">
    <div>
        <section class="table-responsive noscrollbar box-shadow pd-0" style="min-height: 300px;">
            <table class="table table-status">
                <thead class="bkg-green">
                    <?php foreach ($columns as $value): ?>
                    <th class="text-center"><?=$this->lang->line($value);?></th>
                    <?php endforeach; ?>
                </thead><!--
            --> <tbody>
                <?php foreach ($lists as $data): ?>
                    <tr data-uid="<?=$data['uid']?>" data-status="<?=$data['status']?>" data-vendor="<?=$data['vendor']?>">
                        <?php foreach ($columns as $key => $value): ?>
                        <td class="text-center" data-type="<?=$key;?>"><?=$data[$key]?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    <section class="text-center bkg-green text-white">
        <?=$pagination;?>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            row_init();
            hideScrollBar();
        })
    </script>
</article>
<script type="text/javascript">
    $(document).ready(function(){
        $('.s_type[data-status=' + "<?=$type;?>" +']').addClass('active');
        $('.selectpicker').eq(0).selectpicker('val','<?=$vendor;?>').selectpicker(('<?=$type;?>' == '2') ? 'show' : 'hide').selectpicker('refresh').on('change', function(){
            refresh_rows($(this),{vendor : $(this).val()});
        });
    });
</script>