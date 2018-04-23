<?php

namespace Railken\Laravel\Core\Action\Notification;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Notification extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'action_notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'created_at', 'updated_at', 'description', 'targets', 'message', 'template', 'mock_data'];

    /**
     * Set the the email targets
     *
     * @param mixed $value
     *
     * @return void
     */
    public function setTargetsAttribute($value)
    {
        $this->attributes['targets'] = json_encode(is_array($value) ? $value : explode(",", str_replace(" ", "", $value)));
    }


    /**
     * Get the the email targets
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function getTargetsAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Resolve event
     *
     * @param $event
     */
    public function resolve($event)
    {
        (new NotificationManager())->resolve($this, $event);
    }
}
