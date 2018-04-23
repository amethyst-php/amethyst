<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Railken\Laravel\ApiHelpers\Paginator;
use Railken\Laravel\ApiHelpers\Filter;
use Railken\Laravel\ApiHelpers\Sorter;

use Railken\SQ\Exceptions\QuerySyntaxException;
use Illuminate\Support\Facades\DB;

trait RestIndexRelationTrait
{

    /**
     * Display resources
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        $query = $this->getQuery($id);
        DB::enableQueryLog();

        # FilterSyntaxException
        try {
            $filter = new Filter();

            if ($request->input('query')) {
                $filter->setKeys($this->keys->query);
                $filter->setParseKey(function ($key) {
                    return $this->parseKey($key);
                });
                $filter->build($query, $request->input('query'));
            }
        } catch (QuerySyntaxException $e) {
            return $this->error(["code" => "QUERY_SYNTAX_ERROR", "message" => "syntax error detected in filter"]);
        }

        # Sorter
        $sort = new Sorter();
        $sort->setKeys($this->keys->sortable->toArray());


        # Check if sort field has
        $sort->add($request->input('sort_field', 'id'), $request->input('sort_direction', 'desc'));

        foreach ($sort->get() as $attribute) {
            $query->orderBy($this->parseKey($attribute->getName()), $attribute->getDirection());
        }


        # Select
        $select = collect(explode(",", $request->input("select", "")));

        $select->count() > 0 &&
            $select = $this->keys->selectable->filter(function ($attr) use ($select) {
                return $select->contains($attr);
            });

       
        $select->count() == 0 &&
            $select = $this->keys->selectable;


        $selectable = $select
            ->map(function ($key) {
                return $this->parseKey($key);
            });


        # Pagination
        $paginator = new Paginator();
        $paginator = $paginator->paginate($query->count(), $request->input('page', 1), $request->input('show', 10));

        $resources = $query
            ->skip($paginator->get('skip'))
            ->take($paginator->get('take'))
            // ->select($selectable->toArray())
            ->get();

        $response = $this->success([
            'resources' => $resources->map(function ($record) use ($select) {
                return $this->serialize($record, $select);
            }),
            'select' => $select->values(),
            'pagination' => $paginator->all(),
            'sort' => $sort,
            'filter' => $filter
        ]);

        return $response;
    }
}
