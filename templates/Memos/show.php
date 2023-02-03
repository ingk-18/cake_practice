<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>
<div class="row">
    <div class="related">
        <div class="row">
            <dl>
                <?php foreach($memo as $memo){ ?>
                    <dt>ユーザーID</dt>
                    <li><?= $memo->user->id; ?></li>
                    <dt>ユーザー名</dt>
                    <li><?= $memo->user->username; ?></li>
                    <dt>メッセージ</dt>
                    <li><?= $memo->message; ?></li>
                    <?php } ?>
            </dl>
        </div>
    </div>
</div>