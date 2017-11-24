<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoreLocations Model
 *
 * @method \App\Model\Entity\StoreLocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoreLocation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoreLocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoreLocation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoreLocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoreLocation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoreLocation findOrCreate($search, callable $callback = null, $options = [])
 */
class StoreLocationsTable extends Table
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

        $this->setTable('store_locations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		$this->hasMany('StoreLocationDaysTimes')
            ->setForeignKey('store_location_id')
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('store_title')
            ->requirePresence('store_title', 'create')
            ->notEmpty('store_title');

		$validator
            ->scalar('store_country')
            ->allowEmpty('store_country');	
			
        $validator
            ->scalar('store_city')
            ->allowEmpty('store_city');

        $validator
            ->scalar('store_address')
            ->allowEmpty('store_address');

        $validator
            ->scalar('store_image')
            ->allowEmpty('store_image');

        $validator
            ->scalar('store_lat')
            ->allowEmpty('store_lat');

        $validator
            ->scalar('store_lon')
            ->allowEmpty('store_lon');

        $validator
            ->scalar('store_phone')
            ->allowEmpty('store_phone');

        $validator
            ->scalar('store_open_days')
            ->allowEmpty('store_open_days');

        $validator
            ->scalar('store_open_time')
            ->allowEmpty('store_open_time');

       

        return $validator;
    }
	
	public function locationByCity()
	{
		$data=$this->find()->contain(['StoreLocationDaysTimes'])->where(['StoreLocations.status'=>'active']);
		if($data){
			foreach($data as $loc){
				$resArr[$loc['store_city']][]=$loc;
			}
			return $resArr;
		}else{
			return false;
		}
	}
}
