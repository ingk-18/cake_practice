<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>
<div class="row">
    <div class="related">
        <div class="row">
            <ul>
                <?php foreach($memo as $memo){ ?>
                    <li><?= $memo->id; ?></li>
                    <li><?= $memo->user->username; ?></li>
                    <li><?= $memo->message; ?></li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>