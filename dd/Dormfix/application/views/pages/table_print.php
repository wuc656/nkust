<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</head>
	<body>
        <table class="table table-status"  style="border:1px #000 solid;" border="1" cellpadding="5">
            <thead class="bkg-green">
                <?php foreach ($columns as $value): ?>
                <th><?=$this->lang->line($value);?></th>
                <?php endforeach; ?>
            </thead><!--
            --><tbody>
                <?php foreach ($lists as $data): ?>
                <tr data-uid="<?=$data['uid']?>" data-status="<?=$data['status']?>">
                    <?php foreach ($columns as $key => $value): ?>
                    <td data-type="<?=$key;?>"><?=$data[$key]?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
		<style>
			th,td,table {
			text-align: center;
			border-collapse: collapse;
			}
		</style>
		<script>
            function nl2br( str ) {
                return str.replace(/(?:\r\n|\r|\n)/g, '<br>');
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
            $('tr').each(function(){
                var tsrow = $(this);
                var tstext = tsrow.children('td[data-type="status"]');
                tstext.text(zh_status(tstext.text()));
                tstext = tsrow.children('td[data-type="remark"]').text();
                tsrow.children('td[data-type="remark"]').empty().append(nl2br(tstext)).css('text-align','right');
            })
            $(document).ready(function(){
                print();
            })
		</script>
	</body>
</html>