<div class="row col-md-8 col-md-offset-2 pd-0" id="<?=$id;?>">
    <span class="btn btn-<?=$color;?> btn-square btn-block"><?=$value;?></span>
</div>
<script type="text/javascript">
    setTimeout(function() {
      $('#<?=$id;?>').remove();
    }, <?=$time;?>);
</script>