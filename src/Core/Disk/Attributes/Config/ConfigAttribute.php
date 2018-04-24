<?php

namespace Railken\LaraOre\Core\Disk\Attributes\Config;

use Illuminate\Support\Collection;
use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class ConfigAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'config';

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
        Tokens::NOT_DEFINED    => Exceptions\DiskConfigNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\DiskConfigNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\DiskConfigNotAuthorizedException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'disk.attributes.config.fill',
        Tokens::PERMISSION_SHOW => 'disk.attributes.config.show',
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
        if (!is_array($value)) {
            return false;
        }

        $availables = [
            's3'    => ['key', 'secret', 'region', 'bucket', 'url'],
            'local' => ['root', 'url', 'visibility'],
        ];

        if (!isset($availables[$entity->driver])) {
            return false;
        }

        $diff = (new Collection($value))->keys()->diff($availables[$entity->driver]);

        return $diff->count() === 0;
    }

    /**
     * Retrieve default value.
     *
     * @param EntityContract $entity
     *
     * @return mixed
     */
    public function getDefault(EntityContract $entity)
    {
        return [];
    }
}
