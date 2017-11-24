<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\SubCategoriesTable|\Cake\ORM\Association\BelongsTo $SubCategories
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SubCategories', [
            'foreignKey' => 'sub_category_id',
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
            ->scalar('category_id')
            ->requirePresence('category_id', 'create')
            ->notEmpty('category_id');
			
		$validator
			->scalar('sub_category_id')
			->requirePresence('sub_category_id','create')
			->notEmpty('sub_category_id');
			
        $validator
            ->scalar('product_title')
            ->requirePresence('product_title', 'create')
            ->notEmpty('product_title');

        $validator
            ->scalar('product_image')
            ->allowEmpty('product_image');

        $validator
            ->scalar('product_desc')
            ->allowEmpty('product_desc');

        $validator
            ->scalar('status')
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['sub_category_id'], 'SubCategories'));

        return $rules;
    }
	
	public function allItems($catId){
		if($catId){
			$allItems=$this->find()->contain(['SubCategories'])->where(['Items.status'=>'active','SubCategories.status'=>'active','Items.category_id '=>$catId])->order(['Items.sort_order'=>'asc','SubCategories.sort_order'=>'asc'])->toArray();
			if($allItems){
				foreach($allItems as $item){
					$arrItems[$item['sub_category']['id']]['name']=$item['sub_category']['sub_category_title'];
					$arrItems[$item['sub_category']['id']]['desc']=$item['sub_category']['sub_category_desc'];
					$arrItems[$item['sub_category']['id']]['layout_style']=$item['sub_category']['layout_style'];
					$arrItems[$item['sub_category']['id']]['layout_col']=$item['sub_category']['layout_col'];
					$arrItems[$item['sub_category']['id']]['sub_category_image']=$item['sub_category']['sub_category_image'];
					$arrItems[$item['sub_category']['id']]['Items'][]=$item;
				}
				return $arrItems;
			}
		}else{
			return false;
		}
	
	}
}
