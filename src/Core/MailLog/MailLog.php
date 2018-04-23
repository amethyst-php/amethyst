<?php

namespace Railken\LaraOre\Core\MailLog;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class MailLog extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ore_mail_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'created_at', 'updated_at', 'deleted_at', 'to', 'body', 'to_name', 'sent', 'subject'];
}
