<?php

namespace Railken\Laravel\Core\Data\Address\Exceptions;

abstract class AddressAttributeException extends AddressException
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
    protected $code = 'ADDRESS_ATTRIBUTE_NOT_VALID';

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

    /**
     * Set the code
     *
     * @param string $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set the label
     *
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}
