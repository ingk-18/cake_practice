<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Memo Entity
 *
 * @property int $id
 * @property int $memo_id
 * @property int $user_id
 * @property string|null $message
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Memo[] $memos
 * @property \App\Model\Entity\User $user
 */
class Memo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'memo_id' => true,
        'user_id' => true,
        'message' => true,
        'created' => true,
        'modified' => true,
        // 'memos' => true,
        // 'user' => true,
    ];
}
