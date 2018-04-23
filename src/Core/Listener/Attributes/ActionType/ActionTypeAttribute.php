<?php

namespace Railken\LaraOre\Core\Listener\Attributes\ActionType;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class ActionTypeAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'action_type';

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
        Tokens::NOT_DEFINED    => Exceptions\ListenerActionTypeNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ListenerActionTypeNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ListenerActionTypeNotAuthorizedException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'listener.attributes.action_type.fill',
        Tokens::PERMISSION_SHOW => 'listener.attributes.action_type.show',
    ];

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
        return in_array($value, [
            'Action\Email\Email',
            'Action\Notification\Notification'
        ]);
    }
}
