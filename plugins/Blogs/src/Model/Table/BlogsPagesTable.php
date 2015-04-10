<?php

namespace App\Model\Table;

use App\Model\Entity\BlogsPage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogsPages Model
 */
class BlogsPagesTable extends Table {

    public $filterArgs = [
        'id' => ['type' => 'value'],
        'nome' => ['type' => 'like'],
        'apelido' => ['type' => 'like'],
        'template' => ['type' => 'like'],
        'status' => ['type' => 'value'],
        'inicial' => ['type' => 'value'],
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
        $this->table('blogs_pages');
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
                ->requirePresence('apelido', 'create')
                ->notEmpty('apelido')
                ->requirePresence('template', 'create')
                ->notEmpty('template')
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->requirePresence('status', 'create')
                ->notEmpty('status')
                ->add('inicial', 'valid', ['rule' => 'numeric'])
                ->requirePresence('incial', 'create')
                ->notEmpty('inicial');

        return $validator;
    }

}
