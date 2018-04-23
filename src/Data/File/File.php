<?php

namespace Railken\Laravel\Core\Data\File;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class File extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'storage',
        'type',
        'path',
        'status',
        'checksum',
        'permission',
        'access',
        'expire_at',
        'disk',
        'disk_id',
        'ext',
        'content_type',
        'content',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expire_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\Railken\Laravel\Core\Data\User\User::class, 'user_id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disk()
    {
        return $this->belongsTo(\Railken\Laravel\Core\Data\Disk\Disk::class, 'disk_id')->latest();
    }

    public function getStorage()
    {
        return $this->disk->getStorage();
    }
}
