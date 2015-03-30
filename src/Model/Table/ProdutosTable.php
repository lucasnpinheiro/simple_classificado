<?php

namespace App\Model\Table;

use App\Model\Entity\Produto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 */
class ProdutosTable extends Table {

    public $filterArgs = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'descricao' => ['type' => 'like'],
        'valor' => ['type' => 'like'],
        'foto' => ['type' => 'like'],
        'categoria_id' => ['type' => 'value'],
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
        $this->table('produtos');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id'
        ]);
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
                ->allowEmpty('descricao')
                ->add('valor', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor')
                ->allowEmpty('foto')
                ->add('categoria_id', 'valid', ['rule' => 'numeric'])
                ->requirePresence('categoria_id', 'create')
                ->notEmpty('categoria_id')
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
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));
        return $rules;
    }

}
