<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\User;

class FriendRequest extends Mailable
{
    use Queueable, SerializesModels;

public $user;

/*public function envelope()
{
   return new Envelope(
       from: new Address('Auth::user()->emai', 'Auth::user()->name'),
       subject: 'Invitation to Tournament',
   );
}*/

    public function __construct(User $user)
    {
        $this->user =$user;
    }

    public function build()
    {
        return $this->from($this->user->email)
                    ->to('Auth::user()->emai')
                    ->with([
                        'userName' => $this->user->name,
                        'userEmail' => $this->user->email,
                    ]);
                    
    }
}
