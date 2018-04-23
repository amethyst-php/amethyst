<?php

namespace Railken\LaraOre\Core\Listener\Attributes\ActionId;

use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Contracts\ParameterBagContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;
use Illuminate\Support\Collection;

class ActionIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'action_id';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\ListenerActionIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ListenerActionIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ListenerActionIdNotAuthorizedException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'listener.attributes.action_id.fill',
        Tokens::PERMISSION_SHOW => 'listener.attributes.action_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'action';
    }
    
    /**
     * Retrieve eloquent relation.
     *
     * @param EntityContract $entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRelationBuilder(EntityContract $entity)
    {
        return $entity->action();
    }

    /**
     * Retrieve relation manager.
     *
     * @param EntityContract $entity
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        switch ($entity->action_type) {
            case 'Action\Email\Email':
                return new \Railken\LaraOre\Action\Email\EmailManager($this->getManager()->getAgent());
            break;
            case 'Action\Notification\Notification':
                return new \Railken\LaraOre\Action\Notification\NotificationManager($this->getManager()->getAgent());
            break;
        }

        throw new Exceptions\ListenerActionIdManagerNotFoundException();
    }

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        try {
            return parent::valid($entity, $value);
        } catch (Exceptions\ListenerActionIdManagerNotFoundException $e) {
            return false;
        }
    }


    /**
     * Update entity value.
     *
     * @param EntityContract       $entity
     * @param ParameterBagContract $parameters
     *
     * @return Collection
     */
    public function update(EntityContract $entity, ParameterBagContract $parameters)
    {
        $errors = new Collection();

        try {
            return parent::update($entity, $parameters);
        } catch (Exceptions\ListenerActionIdManagerNotFoundException $e) {
            $errors->push(new $this->exceptions[Tokens::NOT_VALID]($parameters->get($this->getName())));
        }

        return $errors;
    }
}
