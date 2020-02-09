<?php

namespace App\Mail;

use App\User;
use Illuminate\Mail\Mailable;

class UserDeactive extends Mailable
{
    public $user;
    public $subject = 'Вы деактивированы';

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $profile = $this->user->profile;
        return $this->view('mail.DeactiveUser', compact($user, $profile));
    }
}
