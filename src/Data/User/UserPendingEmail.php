<?php

namespace Railken\Laravel\Core\Data\User;

use Illuminate\Database\Eloquent\Model;

class UserPendingEmail extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_pending_emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token', 'user_id', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = [
        'notified_at',
    ];

    /**
     * Retrieve user
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
