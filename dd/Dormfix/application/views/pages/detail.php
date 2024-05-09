<article class="text-white text-wrap row bkg-green col-md-8 col-md-offset-2">
    <header id="detail" uid="<?=$uid;?>">
        <h2><?=$this->lang->line('list_thead_detail')?></h2>
    </header>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_uid')?>： <span><?=$uid;?></span></h4>
    </section>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_place')?>： <span><?=$place;?></span></h4>
    </section>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_sender')?>： <span><?=$sender;?></span></h4>
    </section>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_situation')?>： <span><?=$situation;?></span></h4>
    </section>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_create_time')?>： <span><?=$create_time;?></span></h4>
    </section>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_last_reply_time')?>： <span><?=$last_reply_time;?></span></h4>
    </section>
    <div class="row"><hr style="margin: 0px;"></div>
    <section data-status class="mg-h-2">
        <h3><?=$this->lang->line('list_thead_status')?>： <span><?=$this->lang->line('list_types')[$status];?></span></h3>
    </section>
    <section class="mg-h-2 mg-b-2">
        <h4><?=$this->lang->line('list_thead_remark')?>：</h4>
        <h4 class="mg-h-2"><span><?=nl2br($remark);?></span></h4>
    </section>
</article>