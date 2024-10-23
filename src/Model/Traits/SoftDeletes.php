<?php
declare(strict_types=1);

namespace App\Model\Traits;
use Cake\ORM\Query\SelectQuery;

trait SoftDeletes
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        if (!$this->getSchema()->column('deleted')) {
            throw new \RuntimeException('Model must have a deleted column.');
        }
    }

    public function findActive(SelectQuery $query): SelectQuery
    {
        return $query->where(['deleted IS' => null]);
    }

    public function findTrashed(SelectQuery $query): SelectQuery
    {
        return $query->where(['deleted IS NOT' => null]);
    }

    public function softDelete(int|string $id): object
    {
        $entity = $this->get($id);
        $entity->deleted = date('Y-m-d H:i:s');
        return $this->save($entity);
    }

    public function restore(int|string $id): object
    {
        $entity = $this->get($id);
        $entity->deleted = null; 
        return $this->save($entity);
    }
}