<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Traits\SoftDeletes;
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * News Model
 *
 * @method \App\Model\Entity\News newEmptyEntity()
 * @method \App\Model\Entity\News newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\News> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\News get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\News findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\News patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\News> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\News|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\News saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\News>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\News>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\News>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\News> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\News>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\News>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\News>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\News> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewsTable extends Table
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

        $this->setTable('news');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->dateTime('released')
            ->allowEmptyDateTime('released');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }
}
