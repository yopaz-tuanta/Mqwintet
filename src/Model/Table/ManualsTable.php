<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Traits\SoftDeletes;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Manuals Model
 *
 * @property \App\Model\Table\VideosTable&\Cake\ORM\Association\HasMany $Videos
 *
 * @method \App\Model\Entity\Manual newEmptyEntity()
 * @method \App\Model\Entity\Manual newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Manual> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manual get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Manual findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Manual patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Manual> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manual|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Manual saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Manual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manual>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manual> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manual>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manual>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manual> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManualsTable extends Table
{
    use SoftDeletes;
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('manuals');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Videos', [
            'foreignKey' => 'manual_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
