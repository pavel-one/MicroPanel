<?php

namespace App\Mail;

use App\User;
use Illuminate\Mail\Mailable;

class UserActive extends Mailable
{
    public $user;
    public $subject = 'Вы успешно активированы';

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
        return $this->view('mail.ActiveUser', compact($user, $profile));
    }
}
