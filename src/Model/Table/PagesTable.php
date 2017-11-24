<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 *
 * @property \App\Model\Table\PageSectionsTable|\Cake\ORM\Association\HasMany $PageSections
 *
 * @method \App\Model\Entity\Page get($primaryKey, $options = [])
 * @method \App\Model\Entity\Page newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Page|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Page[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Page findOrCreate($search, callable $callback = null, $options = [])
 */
class PagesTable extends Table
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

        $this->setTable('pages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Sections', [
            'foreignKey' => 'page_id'
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
            ->scalar('page_title')
            ->requirePresence('page_title', 'create')
            ->notEmpty('page_title');

        $validator
            ->scalar('page_slug')
            ->requirePresence('page_slug', 'create')
			//->isUnique('page_slug')
            ->notEmpty('page_slug');


        return $validator;
    }
	 public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['page_slug']));
        return $rules;
    }
}
