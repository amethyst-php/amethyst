<?php

namespace Railken\LaraOre\Core\Log\Attributes\Category\Exceptions;

use Railken\LaraOre\Core\Log\Exceptions\LogAttributeException;

class LogCategoryNotAuthorizedException extends LogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'category';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LOG_CATEGORY_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
