<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity.
 */
class Cliente extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
    
    public function _setDocumento($str){
        return str_replace(['-','.', '/', ' '], '', $str);
    }
    
    public function _getDocumento($str){
        return str_replace(['-','.', '/', ' '], '', $str);
    }
}
