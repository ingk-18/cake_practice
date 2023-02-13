<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>

<?php for ($i = 1; $i <= $count -1; $i++) { ?>    
<div class="memos index content">
    <h3><?= '質問'.$i ?></h3>
    <p>今日は最後の日今日は最後の日今日は最後の日今日は最後の日今日は最後の日今日は最後の日今日は最後の日</p>
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
        <?= $this->Form->button('修正する', ['type' => 'submit', 'name' => 'edit']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<p>　</p>
<?php } ?>
<div>
    <?= $this->Form->create(null, [
        'type' => 'post',
        'url' => ['action' => 'show', $params['user_id'] ?? null, 
        '?' => ['count' => $params['count'] ?? 1]]
    ]); ?>
    <?= $this->Form->button('保存する', ['type' => 'submit', 'name' => 'regist']); ?>
    <?= $this->Form->end() ?>
</div>
