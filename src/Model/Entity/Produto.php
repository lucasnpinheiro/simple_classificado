<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity.
 */
class Produto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
    ];
}
