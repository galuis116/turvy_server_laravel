<?php

namespace App\Mail;

use App\Driver;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DriverEmailVerificationByAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Driver $user)
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
        return $this->view('emails.register-driver-email-by-admin')
            ->with([
                'link' => url("/admin/user/driver/list"),
                'user_name' => $this->user->name,
            ]);
    }
}
