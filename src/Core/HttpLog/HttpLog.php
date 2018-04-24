<?php

namespace Railken\LaraOre\Core\HttpLog;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class HttpLog extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ore_http_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'url',
        'type',
        'method',
        'category',
        'request',
        'response',
        'ip',
    ];
}
