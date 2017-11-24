<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoreLocationDaysTimes Model
 *
 * @property \App\Model\Table\StoreLocationsTable|\Cake\ORM\Association\BelongsTo $StoreLocations
 *
 * @method \App\Model\Entity\StoreLocationDaysTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoreLocationDaysTime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoreLocationDaysTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoreLocationDaysTime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoreLocationDaysTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoreLocationDaysTime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoreLocationDaysTime findOrCreate($search, callable $callback = null, $options = [])
 */
class StoreLocationDaysTimesTable extends Table
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

        $this->setTable('store_location_days_times');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('StoreLocations', [
            'foreignKey' => 'store_location_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('from_open_day')
            ->allowEmpty('from_open_day');

        $validator
            ->scalar('to_open_day')
            ->allowEmpty('to_open_day');

        $validator
            ->scalar('from_open_time')
            ->allowEmpty('from_open_time');

        $validator
            ->scalar('to_open_time')
            ->allowEmpty('to_open_time');

        $validator
            ->scalar('status')
            ->allowEmpty('status');

        $validator
            ->dateTime('added_date')
            ->requirePresence('added_date', 'create')
            ->notEmpty('added_date');

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
        $rules->add($rules->existsIn(['store_location_id'], 'StoreLocations'));

        return $rules;
    }
	
	public function formatDayTimeData($data,$id){
		if($data){
			foreach($data['store_open_days_from'] as $key=>$ddata){
				if($id){
					$arrData['store_location_id']=$id;
				}
				$arrData['from_open_day']=$ddata;
				$arrData['to_open_day']=$data['store_open_days_to'][$key];
				$arrData['from_open_time']=$data['store_open_time_from'][$key];
				$arrData['to_open_time']=$data['store_open_time_to'][$key];
				$arrData['status']='active';
				$arrData['added_date']=date('Y-m-d H:i:s');
				$dataArr[]=$arrData;
			}
		}
		
		
		return $dataArr;
	}
}
