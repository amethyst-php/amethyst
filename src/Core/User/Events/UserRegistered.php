<?php

namespace Railken\LaraOre\Core\User\Events;

use Railken\LaraOre\Core\User\User;

use Illuminate\Queue\SerializesModels;

class UserRegistered
{
    use SerializesModels;

    public $user;
    public $token;

    /**
     * Create a new event instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->token = $user->pendingEmail->token;
    }
}
