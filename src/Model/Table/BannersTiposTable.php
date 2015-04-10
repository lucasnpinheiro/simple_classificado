<?php

namespace App\Model\Table;

use App\Model\Entity\BannersTipo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BannersTipos Model
 */
class BannersTiposTable extends Table {

    public $filterArgs = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'descricao' => ['type' => 'like'],
        'altura' => ['type' => 'value'],
        'largura' => ['type' => 'value'],
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
        $this->table('banners_tipos');
        $this->displayField('id');
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
                ->allowEmpty('descricao')
                ->add('altura', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('altura')
                ->add('largura', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('largura')
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

}
