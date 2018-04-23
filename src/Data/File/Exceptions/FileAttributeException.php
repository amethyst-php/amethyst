<?php

namespace Railken\Laravel\Core\Data\File\Exceptions;

abstract class FileAttributeException extends FileException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute;

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_ATTRIBUTE_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is invalid";

    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->label = $this->attribute;

        parent::__construct($value);
    }
}
