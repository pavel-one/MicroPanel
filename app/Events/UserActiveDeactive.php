<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserActiveDeactive
{
    use SerializesModels;

    public $user;
    public $active;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->active = $user->active;
    }

}
