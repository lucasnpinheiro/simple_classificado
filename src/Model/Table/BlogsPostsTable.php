<?php

namespace App\Model\Table;

use App\Model\Entity\BlogsPost;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * BlogsPosts Model
 */
class BlogsPostsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->table('blogs_posts');
        $this->displayField('titulo');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('BlogsPagesPosts', [
            'foreignKey' => 'blogs_post_id'
        ]);
        $this->addBehavior('Search.Search');
    }

    public function searchConfiguration() {
        return $this->searchConfigurationDynamic();
    }

    private function searchConfigurationDynamic() {
        $search = new Manager($this);
        $c = $this->schema()->columns();
        foreach ($c as $key => $value) {
            $t = $this->schema()->columnType($value);
            if ($t != 'string' AND $t != 'text') {
                $search->value($value, ['field' => $this->aliasField($value)]);
            } else {
                $search->like($value, ['before' => true, 'after' => true, 'field' => $this->aliasField($value)]);
            }
        }

        return $search;
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
                ->requirePresence('titulo', 'create')
                ->notEmpty('titulo')
                ->requirePresence('conteudo', 'create')
                ->notEmpty('conteudo')
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

}
