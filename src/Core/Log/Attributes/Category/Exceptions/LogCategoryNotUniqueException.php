<?php

namespace Railken\LaraOre\Core\Log\Attributes\Category\Exceptions;

use Railken\LaraOre\Core\Log\Exceptions\LogAttributeException;

class LogCategoryNotUniqueException extends LogAttributeException
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
    protected $code = 'LOG_CATEGORY_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
