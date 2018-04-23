<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Checksum;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Contracts\ParameterBagContract;
use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Traits\AttributeValidateTrait;
use Railken\Laravel\Core\Data\File\Attributes\Checksum\Exceptions as Exceptions;
use Respect\Validation\Validator as v;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Storage;

class ChecksumAttribute extends BaseAttribute
{

    /**
     * Name attribute
     *
     * @var string
     */
    protected $name = 'checksum';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model
     *
     * @var boolean
     */
    protected $required = false;

    /**
     * Is the attribute unique
     *
     * @var boolean
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED => Exceptions\FileChecksumNotDefinedException::class,
        Tokens::NOT_VALID => Exceptions\FileChecksumNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\FileChecksumNotAuthorizedException::class
    ];

    /**
     * List of all permissions
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'file.attributes.checksum.fill',
        Tokens::PERMISSION_SHOW => 'file.attributes.checksum.show'
    ];


    /**
     * Fill entity EntityContract with array
     *
     * @param EntityContract $entity
     * @param ParameterBagContract $parameters
     *
     * @return void
     */
    public function fill(EntityContract $entity, ParameterBagContract $parameters)
    {
        if ($entity->storage === 'url') {
            $entity->checksum = hash('sha1', file_get_contents($entity->path));
        }

        if ($entity->storage === 'disk') {
            $entity->checksum = hash('sha1', $entity->getStorage()->get($entity->path));
        }
    }
}
