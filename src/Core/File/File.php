<?php

namespace Railken\LaraOre\Core\File;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

/**
 * @property public $storage
 * @property public $status
 * @property public $type
 * @property public $disk
 * @property public $checksum
 * @property public $access
 * @property public $expire_at
 * @property public $disk
 * @property public $ext
 * @property public $content_type
 * @property public $content
 */
class File extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ore_files';

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
        'expire_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\Railken\LaraOre\Core\User\User::class, 'user_id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disk()
    {
        return $this->belongsTo(\Railken\LaraOre\Core\Disk\Disk::class, 'disk_id')->latest();
    }

    public function getStorage()
    {
        return $this->disk->getStorage();
    }
}
