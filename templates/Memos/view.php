<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Memo'), ['action' => 'edit', $memo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Memo'), ['action' => 'delete', $memo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Memos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Memo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="memos view content">
            <h3><?= h($memo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $memo->has('user') ? $this->Html->link($memo->user->id, ['controller' => 'Users', 'action' => 'view', $memo->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($memo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Memo Id') ?></th>
                    <td><?= $this->Number->format($memo->memo_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($memo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($memo->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($memo->message)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Memos') ?></h4>
                <?php if (!empty($memo->memos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Memo Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($memo->memos as $memos) : ?>
                        <tr>
                            <td><?= h($memos->id) ?></td>
                            <td><?= h($memos->memo_id) ?></td>
                            <td><?= h($memos->user_id) ?></td>
                            <td><?= h($memos->message) ?></td>
                            <td><?= h($memos->created) ?></td>
                            <td><?= h($memos->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Memos', 'action' => 'view', $memos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Memos', 'action' => 'edit', $memos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Memos', 'action' => 'delete', $memos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
