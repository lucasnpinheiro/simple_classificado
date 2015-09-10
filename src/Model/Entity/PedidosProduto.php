<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PedidosProduto Entity.
 */
class PedidosProduto extends Entity
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
