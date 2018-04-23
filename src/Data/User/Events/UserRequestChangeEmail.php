<?php

namespace Railken\Laravel\Core\Data\User\Events;

use Railken\Laravel\Core\Data\User\User;

use Illuminate\Queue\SerializesModels;

class UserRequestConfirmEmail
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
