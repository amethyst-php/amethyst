<?php

namespace Railken\LaraOre\Core\Listener;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Listener extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ore_listeners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'event_class',
        'action_id',
        'action_type',
        'enabled'
    ];

    /**
     * Get the actions.
     */
    public function action()
    {
        return $this->morphTo();
    }
}
