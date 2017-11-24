<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubCategories Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\SubCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class SubCategoriesTable extends Table
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

        $this->setTable('sub_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
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
            ->scalar('sub_category_title')
            ->requirePresence('sub_category_title', 'create')
            ->notEmpty('sub_category_title');

        $validator
            ->scalar('sub_category_desc')
            ->allowEmpty('sub_category_desc');

        $validator
            ->scalar('sub_category_image')
            ->allowEmpty('sub_category_image');

        $validator
            ->scalar('layout_style')
            ->allowEmpty('layout_style');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
