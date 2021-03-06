<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoriesTable extends Table
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

        $this->setTable('categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		$this->hasMany('SubCategories')
            ->setForeignKey('category_id')
            ->setDependent(true);
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
            ->scalar('category_title')
            ->requirePresence('category_title', 'create')
            ->notEmpty('category_title');

        $validator
            ->scalar('category_desc')
            ->allowEmpty('category_desc');

        $validator
            ->scalar('category_image')
            ->allowEmpty('category_image');

        return $validator;
    }
	
	
	public function formatCategories($data){
		if(!empty($data)){
			foreach($data as $catData){
				$catArr[$catData['category_title']]=$catData;
			}
			return $catArr;
		}else{
			return false;
		}
		
	}
}
