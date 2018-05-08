<?php

namespace Railken\LaraOre\Report\Pdf;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class PdfAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'pdf.create',
        Tokens::PERMISSION_UPDATE => 'pdf.update',
        Tokens::PERMISSION_SHOW   => 'pdf.show',
        Tokens::PERMISSION_REMOVE => 'pdf.remove',
    ];
}
