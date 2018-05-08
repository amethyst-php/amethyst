<?php

namespace Railken\LaraOre\Report\Pdf;

use Railken\Laravel\Manager\ModelRepository;

class PdfRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Pdf::class;
}
