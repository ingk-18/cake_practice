<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Memo> $memos
 */
?>
<div class="memos index content">
    <?= $this->Html->link(__('New Memo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Memos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('memo_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($memos as $memo): ?>
                <tr>
                    <td><?= $this->Number->format($memo->id) ?></td>
                    <td><?= $this->Number->format($memo->memo_id) ?></td>
                    <td><?= $memo->has('user') ? $this->Html->link($memo->user->id, ['controller' => 'Users', 'action' => 'view', $memo->user->id]) : '' ?></td>
                    <td><?= h($memo->created) ?></td>
                    <td><?= h($memo->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $memo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $memo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $memo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memo->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
