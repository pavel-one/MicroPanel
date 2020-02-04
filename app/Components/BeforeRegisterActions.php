<?php


namespace App\Components;
use App\User;
use Mail;
use Log;

class BeforeRegisterActions
{
    public $user;
    public const LOG_CHANNEL = 'auth';

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Отправка менеджерам уведомления о новой регистрации
     * @param $to
     */
    public function sendEmailManager($to): void
    {
        Mail::html(view('mail.SendManagerRegister', ['user' => $this->user->toArray()]), static function ($email) use ($to) {
            /** @var \Illuminate\Mail\Message $email */
            $email->subject('Новая регистрация');
            $email->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $email->to($to);
        });
    }

    /**
     * Отправка пользователю уведомления на email
     */
    public function sendUserEmail(): void
    {
        $to = $this->user->email;
        Mail::html(view('mail.SendUserRegister', ['user' => $this->user->toArray()]), static function ($email) use ($to) {
            /** @var \Illuminate\Mail\Message $email */
            $email->subject('Спасибо за регистрацию');
            $email->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $email->to($to);
        });
    }

    /**
     * Логирование в канал
     * @param $msg
     */
    public function log($msg) {
        $logger = Log::stack([self::LOG_CHANNEL]);
        $logger->info($msg);
    }
}
