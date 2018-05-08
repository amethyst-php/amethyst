<?php

namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestCreateTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestIndexTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestRemoveTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestShowTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestUpdateTrait;
use Railken\LaraOre\Core\EventLog\EventLogManager;
use Railken\LaraEye\Filter;
use Railken\SQ\Exceptions\QuerySyntaxException;
use Railken\LaraOre\Api\Support\Paginator;
use Railken\LaraOre\Api\Support\Sorter;
use Railken\LaraOre\Api\Support\Exceptions\InvalidSorterFieldException;

class EventLogsController extends RestController
{
    use RestIndexTrait;
    use RestShowTrait;
    use RestCreateTrait;
    use RestUpdateTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index.
     *
     * @var array
     */
    public static $query = [
        'id',
        'event_class',
        'created_at',
        'updated_at',
    ];

    /**
     * List of params that can be selected in the index.
     *
     * @var array
     */
    public static $fillable = [
        'event_class',
        'vars',
    ];

    public function __construct(EventLogManager $manager)
    {
        $this->manager = $manager;
        $this->manager->setAgent($this->getUser());
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\DataBase\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }

    /**
     * Render a template.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function stats(Request $request)
    {
        $query = $this->getQuery();

        // Select
        $select = collect(explode(',', $request->input('select', '')));

        $select->count() > 0 &&
            $select = $this->keys->selectable->filter(function ($attr) use ($select) {
                return $select->contains($attr);
            });

        $select->count() == 0 &&
            $select = $this->keys->selectable;

        $selectable = $select;
    
        try {
            if ($request->input('query')) {

                $filter = new Filter($this->manager->getTableName(), $selectable->toArray());
                $filter->buid($query, $request->input('query'));
            }
        } catch (QuerySyntaxException $e) {
            return $this->error(['code' => 'QUERY_SYNTAX_ERROR', 'message' => 'syntax error detected in filter']);
        }


        $query->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as created_at"), DB::raw('count(*) as total'));
        $query->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"));

        // Pagination
        $paginator = new Paginator();
        $paginator = $paginator->paginate($query->count(), $request->input('page', 1), $request->input('show', 10));

        $resources = $query
            ->skip($paginator->get('skip'))
            ->take($paginator->get('take'))
            ->get();

        $response = $this->success([
            'resources' => $resources->map(function ($record) {
                return $record;
            }),
            'pagination' => $paginator->all(),
        ]);

        return $response;
    }
}
