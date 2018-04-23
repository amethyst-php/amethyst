<?php

namespace Railken\Laravel\Core\Data\Disk;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Disk extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'disks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'enabled', 'config', 'driver'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'config' => 'array',
    ];

    public function getConfigName()
    {
        return "disk-" . $this->id;
    }

    public function getStorage()
    {
        return \Illuminate\Support\Facades\Storage::disk($this->getConfigName());
    }
}
