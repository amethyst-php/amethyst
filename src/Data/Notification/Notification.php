<?php

namespace Railken\Laravel\Core\Data\Notification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Notification extends \Illuminate\Notifications\DatabaseNotification implements EntityContract
{
}
