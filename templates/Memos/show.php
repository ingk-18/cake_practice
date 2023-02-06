<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>

<?php var_dump($memos) ?>
<?php for ($i = 1; $i <= $count -1; $i++) { ?>    
    <div class="memos index content">
    <h3><?= '質問'.$i ?></h3>
    <p>あああああああああああああああああああああああああああああああああああああああああああああああ</p>
    <div class="table-responsive">
        <table>
            <thead>
                <tr><th>memo</th></tr>
            </thead>
            <tbody>
                <tr><th><?= $memos['test'.$i] ?></th></tr>
            </tbody>
        </table>
    </div>
</div>
<p>　</p>
<?php } ?>
