<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogsPage Entity.
 */
class BlogsPage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'apelido' => true,
        'template' => true,
        'status' => true,
        'incial' => true,
    ];
}
