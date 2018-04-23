<?php

namespace Railken\Laravel\Core\Data\Log\Attributes\Category\Exceptions;

use Railken\Laravel\Core\Data\Log\Exceptions\LogAttributeException;

class LogCategoryNotValidException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'category';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_CATEGORY_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
