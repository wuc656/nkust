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
                    <tr data-uid="<?=$data['uid']?>" data-status="<?=$data['status']?>">
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
        row_init();
        hideScrollBar();
    </script>
</article>