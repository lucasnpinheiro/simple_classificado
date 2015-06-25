<?php
namespace Configuracoes\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Configuracoes\Model\Entity\Configuraco;

/**
 * Configuracoes Model
 */
class ConfiguracoesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('configuracoes');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('nome', 'create')
            ->notEmpty('nome')
            ->requirePresence('chave', 'create')
            ->notEmpty('chave')
            ->allowEmpty('value')
            ->add('required', 'valid', ['rule' => 'numeric'])
            ->requirePresence('required', 'create')
            ->notEmpty('required')
            ->requirePresence('options', 'create')
            ->notEmpty('options')
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
