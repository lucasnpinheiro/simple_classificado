<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity.
 */
class Usuario extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
    ];

    protected function _setSenha($password) {
        if (!empty($password)) {
            return (new DefaultPasswordHasher)->hash($password);
        }
        return null;
    }
    

}
