<?php

namespace Railken\LaraOre\Action\Email;

use Railken\Laravel\Manager\ModelRepository;

class EmailRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Email::class;
}
