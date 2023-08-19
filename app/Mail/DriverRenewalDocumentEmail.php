<?php

namespace App\Mail;

use App\Driver;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverRenewalDocumentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($document, $document_expiredate)
    {
        $this->document = $document;
        $this->document_expiredate = $document_expiredate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.renewal-driver-document-email')
            ->with(['document' => $this->document,
                'document_expiredate' => $this->document_expiredate]);
    }
}
