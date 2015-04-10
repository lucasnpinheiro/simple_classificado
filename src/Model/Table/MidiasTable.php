<?php
namespace App\Model\Table;

use App\Model\Entity\Midia;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Midias Model
 */
class MidiasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('midias');
        $this->displayField('name');
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
            ->allowEmpty('model')
            ->add('foreign_key', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('foreign_key')
            ->allowEmpty('name')
            ->allowEmpty('file')
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status')
            ->add('uptaded', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('uptaded');

        return $validator;
    }
}
