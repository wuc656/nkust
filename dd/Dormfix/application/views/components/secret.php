<div class="col-3 form-inline" id="situation">
    <input type="password" class="form-control" data-width="fit" name="secret">
    <label class="btn btn-default">確認</label>
</div>
<script type="text/javascript">
    $('#situation>label').click(function(){
        $.ajax({
            url:    "<?=base_url('index.php/getsituation');?>",
            type:   'GET',
            data:   {
                    uid: $('#detail').attr('uid'),
                    secret: $('input[name="secret"]').val()
                    },
            success: function(response) {
                        $('#situation').replaceWith(response);
                    },
            error:  function() {
                        alert('密碼錯誤');
                    }
        });
    })
</script>