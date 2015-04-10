<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BannersTipo Entity.
 */
class BannersTipo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'descricao' => true,
        'altura' => true,
        'largura' => true,
        'status' => true,
    ];
}
