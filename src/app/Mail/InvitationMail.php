<?php

// app/Mail/InvitationMail.php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public Invitation $invitation;
    public string $inviteUrl;

    public function __construct(Invitation $invitation, string $inviteUrl)
    {
        $this->invitation = $invitation;
        $this->inviteUrl = $inviteUrl;
    }

    public function build(): self
    {
        return $this->subject('You have been invited')
            ->view('emails.invitation');
    }
}