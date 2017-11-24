<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobCategories Model
 *
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\HasMany $Jobs
 *
 * @method \App\Model\Entity\JobCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class JobCategoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('job_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Jobs', [
            'foreignKey' => 'job_category_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('cat_name')
            ->requirePresence('cat_name', 'create')
            ->notEmpty('cat_name');

     
        return $validator;
    }
}
