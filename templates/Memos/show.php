<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>

<?php for ($i = 1; $i <= 3; $i++) { ?>    
<div class="memos index content">
    <h3><?= '質問'.$i ?></h3>
    <p>ここには質問いれるここには質問いれるここには質問いれるここには質問いれるここには質問いれるここには質問いれる</p>
    <div class="table-responsive">
        <table>
            <thead>
                <tr><th>memo</th></tr>
            </thead>
            <tbody>
                <tr><th><?= $memos['memo'.$i] ?></th></tr>
            </tbody>
        </table>
    </div>
    <div>
        <?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'index', '?' => ['count' => $i]]]); ?>
        <?= $this->Form->button('修正する', ['type' => 'submit', 'name' => 'edit', 'value' => '1']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<p>　</p>
<?php } ?>
<div>
    <?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'show']]); ?>
    <?= $this->Form->button('保存する', ['type' => 'submit', 'name' => 'regist', 'value' => '2']); ?>
    <?= $this->Form->end() ?>
</div>
