<?php

namespace Railken\LaraOre\Core\Config;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Config extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ore_configs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'key',
    ];

    protected $encrypted = [
        'key',
        'value',
    ];

    public function resolveKey($key)
    {
        $configs = [
            'mail_host'         => 'mail.host',
            'mail_port'         => 'mail.port',
            'mail_username'     => 'mail.username',
            'mail_password'     => 'mail.password',
            'mail_encryption'   => 'mail.encryption',
            'mail_from_name'    => 'mail.from.name',
            'mail_from_address' => 'mail.from.address',
        ];

        return isset($configs[$key]) ? $configs[$key] : 'void';
    }
}
