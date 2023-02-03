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
                <?= $this->Form->create(null, ['type' => 'post','url' => ['action' => 'show', $params['user_id'] ?? null]]); ?>


                <?= $this->Form->textarea('message', ['rows' => '5', 'cols' => '5']); ?>
                <?= $this->Form->button($this->Url->build(['action' => 'index2']), ['type' => 'submit']); ?>


                <?= $this->Form->end() ?>

            

            </tbody>
        </table>
    </div>
</div>
