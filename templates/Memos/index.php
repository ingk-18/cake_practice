<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Memo> $memos
 */
?>
<div class="memos index content">
    <?= $this->Html->link(__('New Memo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= $params['title'] ?></h3>
    <div class="table-responsive">
        <table>
            <tbody>
                <?= $this->Form->create($memo, [
                    'type' => 'post',
                    'url' => ['action' => 'index', $params['user_id'] ?? null, 
                    '?' => ['count' => $params['count'] ?? 1],
                    'valueSources' => ['query', 'context']]
                ]); ?>

                <?= $this->Form->textarea('memo', ['rows' => '5', 'cols' => '5']); ?>
                <?= $this->Form->button('フォームの送信', ['type' => 'submit']); ?>
                <?= $this->Form->end() ?>
            </tbody>
        </table>
    </div>
</div>
