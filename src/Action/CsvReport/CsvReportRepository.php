<?php

namespace Railken\Laravel\Core\Action\CsvReport;

use Railken\Laravel\Manager\ModelRepository;

class CsvReportRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = CsvReport::class;
}
