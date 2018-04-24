<?php

namespace Railken\LaraOre\Action\Email\Attributes\Template;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class TemplateAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'template';

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
        Tokens::NOT_DEFINED    => Exceptions\EmailTemplateNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\EmailTemplateNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\EmailTemplateNotAuthorizedException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'email.attributes.template.fill',
        Tokens::PERMISSION_SHOW => 'email.attributes.template.show',
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
        return true;
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
        return ''.
            "{% extends 'emails/layout' %}\n".
            "{% block main %}\n".
            "    <div class='title'>\n".
            "       <h1>Welcome to Aperture Science!</h1>\n".
            "    </div>\n".
            "    <div class='content'>\n".
            "       <p>Hello {{ user.name }}</p>\n".
            "       <a class='btn btn-primary' href='{{ web_url }}/home'>Visit our home</a>\n".
            "    </div>\n".
            '{% endblock %}'.
            '';
    }
}
