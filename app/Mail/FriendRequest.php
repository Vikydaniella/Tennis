<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class FriendRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user =$user;
    }

    public function build()
    {
        return $this->from($this->user->email)
                    ->to('Auth::user()->emai')
                    ->view('mail.blade.php');
                    
    }
}
