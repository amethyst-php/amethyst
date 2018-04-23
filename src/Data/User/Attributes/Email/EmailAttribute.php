<?php

namespace Railken\Laravel\Core\Data\User\Attributes\Email;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Traits\AttributeValidateTrait;
use Railken\Laravel\Core\Data\User\Attributes\Email\Exceptions as Exceptions;
use Respect\Validation\Validator as v;
use Railken\Laravel\Manager\Tokens;

class EmailAttribute extends BaseAttribute
{

    /**
     * Name attribute
     *
     * @var string
     */
    protected $name = 'email';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model
     *
     * @var boolean
     */
    protected $required = true;

    /**
     * Is the attribute unique
     *
     * @var boolean
     */
    protected $unique = true;

    /**
     * List of all exceptions used in validation
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED => Exceptions\UserEmailNotDefinedException::class,
        Tokens::NOT_VALID => Exceptions\UserEmailNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\UserEmailNotAuthorizedException::class,
        Tokens::NOT_UNIQUE => Exceptions\UserEmailNotUniqueException::class
    ];

    /**
     * List of all permissions
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'user.attributes.email.fill',
        Tokens::PERMISSION_SHOW => 'user.attributes.email.show'
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed $value
     *
     * @return boolean
     */
    public function valid(EntityContract $entity, $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
