<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class NotifyNewUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $passwd;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$passwd)
    {
        $this->user = $user;
        $this->passwd = $passwd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notify_new_user');
    }
}
