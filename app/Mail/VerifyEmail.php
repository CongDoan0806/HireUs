<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verification_code;  // use a lowercase property name

    public function __construct($user, $verification_code)
    {
        $this->user = $user;  // assign to the correct property
        $this->verification_code = $verification_code;  // assign to the correct property
    }

    public function build()
    {
        return $this->view('services.emails.verification_code')
            ->with([
                'user' => $this->user,  
                'verification_code' => $this->verification_code,  // pass the correct property
            ]);
    }
}
