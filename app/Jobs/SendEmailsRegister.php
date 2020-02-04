<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Components\BeforeRegisterActions;
use Log;

class SendEmailsRegister implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var User $user */
    public $user;
    public $emailManager;
    public $actions;
    public const LOG_CHANNEL = 'auth';

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $email = env('APP_MANAGER_EMAILS');

        if ($email) {
            $this->emailManager = explode(',', $email);
        }


        $this->actions = new BeforeRegisterActions($user);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $toEmails = $this->emailManager;
        $this->actions->log('[Email]: ' . print_r($toEmails, true));
        foreach ($toEmails as $email) {
            $this->actions->sendEmailManager($email);
        }

        $this->actions->sendUserEmail();
    }


}
