<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PageSections Model
 *
 * @property \App\Model\Table\PagesTable|\Cake\ORM\Association\BelongsTo $Pages
 *
 * @method \App\Model\Entity\PageSection get($primaryKey, $options = [])
 * @method \App\Model\Entity\PageSection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PageSection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PageSection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PageSection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PageSection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PageSection findOrCreate($search, callable $callback = null, $options = [])
 */
class SectionsTable extends Table
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

        $this->setTable('page_sections');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

       $this->belongsTo('Pages', [
            'foreignKey' => 'page_id',
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
            ->scalar('section_title')
            ->requirePresence('section_title', 'create')
            ->notEmpty('section_title');

        

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
        $rules->add($rules->existsIn(['page_id'], 'Pages'));

        return $rules;
    }
}
