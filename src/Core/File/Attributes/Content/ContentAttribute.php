<?php

namespace Railken\LaraOre\Core\File\Attributes\Content;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;
use Railken\Laravel\Manager\Contracts\ParameterBagContract;
use Illuminate\Support\Facades\Storage;

class ContentAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'content';

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
        Tokens::NOT_DEFINED    => Exceptions\FileContentNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\FileContentNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\FileContentNotAuthorizedException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'file.attributes.content.fill',
        Tokens::PERMISSION_SHOW => 'file.attributes.content.show',
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
     * Update entity value.
     *
     * @param EntityContract       $entity
     * @param ParameterBagContract $parameters
     *
     * @return Collection
     */
    public function fill(EntityContract $entity, ParameterBagContract $parameters)
    {
        $filename = $entity->path;
        $content = $this->decode('base64_decode', $parameters->get('content'));

        if (!$entity->ext) {
            Storage::disk('local')->put($filename, $content);
            $mimetype = Storage::disk('local')->mimeType($filename);
            $ext = array_search($mimetype, config('filesystems.mime_types'));
            Storage::disk('local')->delete($filename);
        }
        $path = $filename.".".$ext;
        $entity->ext = $ext;
        $entity->path = $path;
        $entity->content_type = $mimetype;

        $entity->getStorage()->put($path, $content, $entity->access);
    }

    /**
     * Decode content
     *
     * @param string $encoding
     * @param string $encoded
     *
     * @return string
     */
    public function decode($encoding, $content)
    {
        switch ($encoding) {
            case 'base64': default:
                $content = preg_replace("/^data\:image\/([\w]*)\;base64\,/", "", $content);
                return base64_decode($content);
            break;
        }
    }

    /**
     * Delete entity value.
     *
     * @param EntityContract       $entity
     * @param ParameterBagContract $parameters
     *
     * @return Collection
     */
    public function remove(EntityContract $entity)
    {
        $entity->getStorage()->delete($entity->path);
    }

}
