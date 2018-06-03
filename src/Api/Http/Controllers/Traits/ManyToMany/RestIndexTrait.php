<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits\ManyToMany;

use Illuminate\Http\Request;
use Railken\LaraEye\Filter;
use Railken\SQ\Exceptions\QuerySyntaxException;
use Railken\LaraOre\Api\Support\Paginator;
use Railken\LaraOre\Api\Support\Sorter;
use Railken\LaraOre\Api\Support\Exceptions\InvalidSorterFieldException;

trait RestIndexTrait
{

    /**
     * Display resources
     *
     * @param mixed $key
     * @param Request $request
     *
     * @return response
     */
    public function index($key, Request $request)
    {
        return $this->createIndexResponseByQuery($this->getQuery($key, $request), $request);
    }

    public function createIndexResponseByQuery($query, Request $request)
    {
        # Sorter
        $sort = new Sorter();
        $sort->setKeys($this->keys->sortable->toArray());


        try {
            $sort->add($request->input('sort_field', 'id'), strtolower($request->input('sort_direction', 'desc')));
        } catch (InvalidSorterFieldException $e) {
            return $this->error(["code" => "SORT_INVALID_FIELD", "message" => "Invalid field for sorting"]);
        }

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


        $selectable = $select;


        try {
            if ($request->input('query')) {
                $filter = new Filter($this->manager->newEntity()->getTable(), $selectable->toArray());
                $filter->buid($query, $request->input('query'));
            }
        } catch (QuerySyntaxException $e) {
            return $this->error(['code' => 'QUERY_SYNTAX_ERROR', 'message' => 'syntax error detected in filter']);
        }

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
            'sort' => $sort->get()->map(function ($attribute) {
                return ['name' => $attribute->getName(), 'value' => $attribute->getDirection()];
            })->toArray(),
        ]);

        // print_r(\DB::getQueryLog());
        return $response;
    }
}
