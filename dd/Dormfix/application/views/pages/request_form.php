<section class="row bkg-red pd-v-1 pd-h-3 col-md-8 col-md-offset-2 text-white">
    <h2><?= $this->lang->line('form_chm');?></h2>
        <?= ol($this->lang->line('form_chm_ol'),array('class' => 'font-important'))?>
        <?= ul($this->lang->line('form_chm_ul'),array('class' => 'font-important'))?>
    <h2><?= $this->lang->line('form_precautions');?></h2>
        <?= ul($this->lang->line('form_precautions_ul'),array('class' => 'font-important'))?>
</section>
<div class="pd-h-3 pd-t-1 row bkg-red text-white col-md-8 col-md-offset-2">
<form action="request_sent" id="request-form">
    <div class="form-group">
        <label><?=$this->lang->line('form_position')?></label>
        <div>
        <select class="selectpicker" placeholder="樓別" name="place[]" data-width="fit" title="選擇樓別">
            <option>弘德樓</option>
            <option>慧樓</option>
            <option>勤業樓</option>
	    <option>思賢樓</option>
        </select>
        <select class="selectpicker" placeholder="樓層" name="place[]" data-width="fit" title="選擇樓層">
        </select>
        <select class="selectpicker" placeholder="類別" name="place[]" data-width="fit" title="選擇區域別">
            <option>公共區域</option>
            <option>房間內</option>
            <option>網路(含無線)</option>
			<option>電腦</option>
        </select>
        <select class="selectpicker hidden" placeholder="請選擇地點..." name="place[]" data-width="fit" title="選擇故障點">
            <optgroup label="公共區域">
            </optgroup>
            <option>其它</option>
        </select>
        </div>
    </div>
    <div class="form-group needed">
        <label><?=$this->lang->line('form_situation')?></label>
        <textarea class="form-control" name="situation" rows="4" placeholder="<?=$this->lang->line('form_placeholder_situation')?>"></textarea>
    </div>
    <div class="form-group needed">
        <label><?=$this->lang->line('form_sender')?></label>
        <input type="text" name="sender[]" class="form-control" placeholder="<?=$this->lang->line('form_placeholder_sender_roomnum')?>">
        <input type="text" name="sender[]" class="form-control" placeholder="<?=$this->lang->line('form_placeholder_sender_name')?>">
    </div>
    <div class="form-group">
        <label><?=$this->lang->line('form_contact_information')?></label>
        <input type="text" name="contact" class="form-control" placeholder="<?=$this->lang->line('form_placeholder_contact_information')?>">
    </div>
    <div class="form-group">
        <label><?=$this->lang->line('form_pincode')?></label>
        <input type="text" name="secret" class="form-control" placeholder="<?=$this->lang->line('form_placeholder_pincode')?>">
    </div>
    <div class="form-group" style="text-align: right;">
        <button type="submit" onclick="return onSubmit()" class="btn btn-default"><?=$this->lang->line('form_send')?></button>
        <a class="btn btn-default" href="request_list"><?=$this->lang->line('form_back')?></a>
    </div>
</form>
</div>
<div class="row col-md-8 col-md-offset-2 pd-0">
    <div space class="hidden bkg-red btn btn-danger btn-square btn-block"><?=$this->lang->line('form_error')?></div>
</div>
<script type="text/javascript">
	function onSubmit() {
		if (check_empty()) {
			document.getElementById("request-form").submit();
        } else {
            return false;
        }
	}
    function check_empty() {
		var button = $('button[type=submit]');
		button.addClass('disabled');
        var x = true;
          var roomnum = new RegExp(/^[1459]{1}[0-9]{1}[0-9]{1}[0-9]{1}-[1-4]$/);
		  var teacher = new RegExp(/^[9]{1}[23579]{1}[0-9]{1}[0-9]{1}[1-3]{1}-[1-2]$/);
		  //var test = new RegExp(/^[0-9]{5}$/);
          //var teacher = new RegExp(/^[0-9]{4}$/);
		  //var roomnum = new RegExp(/^[a-z]$/);
		  //var teacher = new RegExp(/^[a-z]$/);
        $('form .form-control .needed').each(function(){
            if ($(this).val().length < 1) {
                $('div[space]').removeClass('hidden');
                x = false;
				button.removeClass('disabled');
                setTimeout(function(){$('div[space]').addClass('hidden')}, 3000);
            }
        })
        var rnval = $('input[name^="sender"]').eq(0).val();
        if (!(roomnum.test(rnval) || teacher.test(rnval))) {
            $('div[space]').removeClass('hidden');
            x = false;
			button.removeClass('disabled');
            setTimeout(function(){$('div[space]').addClass('hidden')}, 3000);   
        }
        return x;
    }
    $(document).ready(function(){
        $(".selectpicker").selectpicker('refresh');
        $("select[name^='place']").eq(2).change(function(){
            if ($(this).val() == '公共區域') {
                $("select[name^='place']").eq(3).removeClass('hidden').parent().removeClass('hidden').selectpicker('refresh');
            } else {
                $("select[name^='place']").eq(3).val(0).addClass('hidden').selectpicker('refresh');
            }
        })
        $("select[name^='place']").eq(0).change(function(){
            pages = $(this).prop('selectedIndex') - 1;
            $.getJSON('get_building_data/' + pages,function(response) {
                $("select[name^='place']").eq(2).val(0).selectpicker('refresh');
                $(".selectpicker").eq(1).empty().append(function(){
                    var x = '';
                    $.each(response.floors,function(index, value) {
                        x += '<option>' + value + 'F</option>';
                    })
                    return x;
                }).selectpicker('refresh');
                $('optgroup').eq(0).empty().append(function(){
                    var x = '';
                    $.each(response.publicside,function(index, value) {
                        x += '<option>' + value + '</option>';
                    });
                    return x;
                }).parent().selectpicker('refresh');
            })
        })
    });
</script>