<?php

namespace Configuracoes\Model\Entity;

use Cake\ORM\Entity;

/**
 * Configuraco Entity.
 */
class Configuraco extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
    ];

}
