<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\User;

class FriendRequest extends Mailable
{
    use Queueable, SerializesModels;

public $user;

public function envelope()
{
   return new Envelope(
       from: new Address('example@example.com', 'Test Sender'),
       subject: 'Test Email',
   );
}

    public function __construct(User $user)
    {
        $this->user =$user;
    }

    
    public function build()
    {
        return $this->from('user{id}')
                    ->with([
                        'email' => $this->user->email,
                    ]);
    }
}
