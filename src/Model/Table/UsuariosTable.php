<?php

namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 */
class UsuariosTable extends Table {

    public $filterArgs = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'email' => ['type' => 'like'],
        'senha' => ['type' => 'like'],
        'status' => ['type' => 'value'],
        'created' => ['type' => 'like'],
        'modified' => ['type' => 'like'],
        'updated' => ['type' => 'like'],
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('usuarios');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Searchable');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create')
                ->requirePresence('nome', 'create')
                ->notEmpty('nome')
                ->add('email', 'valid', ['rule' => 'email'])
                ->requirePresence('email', 'create')
                ->notEmpty('email')
                ->allowEmpty('senha')
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
    
    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity) {
        if (!empty($entity->senha)) {
            $senha = (new \Cake\Auth\DefaultPasswordHasher())->hash($entity->senha);
            $entity->senha = $senha;
        } else {
            unset($entity->senha);
        }
        return true;
    }

}
