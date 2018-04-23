<?php

namespace Railken\Laravel\Core\Action\CsvReport;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class CsvReportAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'csv_report.create',
        Tokens::PERMISSION_UPDATE => 'csv_report.update',
        Tokens::PERMISSION_SHOW   => 'csv_report.show',
        Tokens::PERMISSION_REMOVE => 'csv_report.remove',
    ];
}
