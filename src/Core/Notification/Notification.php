<?php

namespace Railken\LaraOre\Core\Notification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Notification extends \Illuminate\Notifications\DatabaseNotification implements EntityContract
{
}
