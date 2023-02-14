<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Memo> $memos
 */
?>
<div class="memos index content">
    <?= $this->Html->link(__('New Memo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= '質問'.$params['count'] ?></h3>
    <div class="table-responsive">
        <table>
            <tbody>
                <?= $this->Form->create( null, [
                    'type' => 'post',
                    'url' => ['action' => 'index', $params['user_id'] ?? null, 
                    '?' => ['count' => $params['count'] ?? 1],
                ]]); ?>

                <?= $this->Form->textarea('message', ['rows' => '5', 'cols' => '5', 'value' => $memo ?? '']); ?>
                <?php if( isset($memo) ){ ?>
                    <?= $this->Form->button('フォームの修正', ['type' => 'submit', 'name' => 'send', 'value' => '2']); ?>
                <?php }else{ ?>
                    <?= $this->Form->button('フォームの送信', ['type' => 'submit', 'name' => 'send', 'value' => '1']); ?>
                <?php } ?>
                <?= $this->Form->end() ?>
            </tbody>
        </table>
    </div>
</div>
