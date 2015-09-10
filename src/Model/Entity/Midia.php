<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Midia Entity.
 */
class Midia extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'model' => true,
        'foreign_key' => true,
        'name' => true,
        'file' => true,
        'status' => true,
        'uptaded' => true,
    ];
}
