<?php

namespace Railken\LaraOre\Api\Query\Visitors;

use Railken\SQ\Contracts\NodeContract;
use Railken\SQ\Languages\BoomTree\Nodes as Nodes;
use Railken\Laravel\ApiHelpers\Query\Visitors\BaseVisitor;
use Railken\SQ\Exceptions\QuerySyntaxException;

class KeyVisitor extends BaseVisitor
{

    /**
     * @var \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    protected $manager;

    /**
     * @param \Railken\Laravel\Manager\Contracts\ManagerContract $manager
     *
     * @return $this
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    public function setKeys($keys)
    {
        $this->keys = $keys;

        return $this;
    }
    
    /**
     * Visit the node and update the query.
     *
     * @param mixed $query
     * @param \Railken\SQ\Contracts\NodeContract $node
     * @param string                             $context
     */
    public function visit($query, NodeContract $node, string $context)
    {
        if ($node instanceof Nodes\KeyNode) {
            $key = $node->getValue();

            if (!in_array($key, $this->keys->toArray())) {
                throw new QuerySyntaxException();
            }

            $keys = explode(".", $key);


            if (count($keys) === 1) {
                $keys = [$this->manager->repository->newEntity()->getTable(), $keys[0]];
            }

            $node->setValue($key);
        }

        foreach ($node->getChilds() as $child) {
            $this->visit($query, $child, $context);
        }
    }
}
