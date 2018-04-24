<?php

namespace Railken\LaraOre\Api\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Railken\Bag;

abstract class RestController extends Controller
{
    protected $keys;
    protected $manager;
    protected static $query = [];
    protected static $fillable = [];

    public function __construct()
    {
        $this->keys = new Bag();
        $this->keys->query = static::$query;
        $this->keys->selectable = collect(empty(static::$selectable) ? static::$query : static::$selectable);
        $this->keys->sortable = collect(empty(static::$sortable) ? static::$query : static::$sortable);
        $this->keys->fillable = static::$fillable;
    }

    /**
     * Return a new instance of Manager.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Parse the key before using it in the query.
     *
     * @param string $key
     *
     * @return string
     */
    public function parseKey($key)
    {
        $keys = explode('.', $key);

        if (count($keys) === 1) {
            $keys = [$this->manager->repository->newEntity()->getTable(), $keys[0]];
        }

        return DB::raw('`'.implode('.', array_slice($keys, 0, -1)).'`.'.$keys[count($keys) - 1]);
    }

    /**
     * Serialize entity.
     *
     * @param mixed $record
     * @param array $select
     *
     * @return array
     */
    public function serialize($record, $select)
    {
        return $this
            ->manager
            ->serializer
            ->serialize($record, $select)
            ->all();
    }
}
