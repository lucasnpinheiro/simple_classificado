<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Banner Entity.
 */
class Banner extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
