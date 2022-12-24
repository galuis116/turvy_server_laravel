<?php

namespace App\Mail;

use App\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RiderEmailRecepit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	 $Appointment = new Appointment;
    	// print"<pre>";
    	// print_r($this->appointment);
       $ridesFormat =   $Appointment->getRidesRecepit($this->appointment->rider_id,$this->appointment->id);
       $item = $ridesFormat[0];
       $surchagreinfo = $ridesFormat[0]['surgeinfo'];
      $surchagrearr = array();
      if($surchagreinfo != ''){
      	$surchagrearr = json_decode(stripslashes($surchagreinfo));
      }
        return $this->view('emails.receipt-rider-email')
            ->with([
                'recepit_data' => $item,
                'surchagrearr' => $surchagrearr,
            ]);
    }
}
