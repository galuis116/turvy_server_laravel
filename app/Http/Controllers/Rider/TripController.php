<?php

namespace App\Http\Controllers\Rider;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use App\Mail\RiderEmailRecepit;


class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {

        $Appointment = new Appointment;


        $upcommingRides = $Appointment->getRides(1, Auth::guard('rider')->user()->id, $page = 1, $noLimit = 'no');

        //print_r($upcommingRides);

        $completedRides = $Appointment->getRides(2, Auth::guard('rider')->user()->id, $page = 1, $noLimit = 'no');

        $cancelledRides = $Appointment->getRides(3, Auth::guard('rider')->user()->id, $page = 1, $noLimit = 'no');




        return view('rider.trips')->with('cancelledRides', $cancelledRides)
            ->with('upcommingRides', $upcommingRides)
            ->with('completedRides', $completedRides);
    }


    public function myrecepits($page_id)
    {
        $rider_id = Auth::guard('rider')->user()->id;
        $Appointment = new Appointment;
        $ridesFormat =   $Appointment->getRides(3, $rider_id, $page_id);
        /* print"<pre>";
        print_r($ridesFormat);
        */
        return view('rider.myrecepits')->with('rides', $ridesFormat);
    }

    public function receipt($book_id)
    {
        $rider_id = Auth::guard('rider')->user()->id;

        $Appointment = new Appointment();

        $ridesFormat =   $Appointment->getRidesRecepit($rider_id, $book_id);
        $item = $ridesFormat[0];
        $surchagreinfo = $ridesFormat[0]['surgeinfo'];
        $surchagrearr = array();
        if ($surchagreinfo != '') {
            $surchagrearr = json_decode(stripslashes($surchagreinfo));
        }

        $html2pdf_path = base_path() . '/public/html2pdf/vendor/autoload.php';
        require_once($html2pdf_path);

        $content = '
            <page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
                <div style="width: 100%; height: 80px; border-bottom: solid 1px #000">
                    <img src="' . asset('images/receipt-header-logo.jpg') . '" width="114" height="74" >
                </div>
                <table cellpadding="0" cellspacing="0"  >
                    <tr>
                        <td colspan="2" style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">
                            <h5>Here\'s your receipt for your ride, ' . $ridesFormat[0]['first_name'] . '  ' . $ridesFormat[0]['last_name'] . '</h5>
                        </td>
                    </tr>
                    <tr >
                        <td style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;"><strong>Total</strong></td>
                        <td style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">A$' . $ridesFormat[0]['total'] . '</td>
                    </tr>
                    <tr bgcolor="#c6daff">
                        <td colspan="2" style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">
                            Due to unanticipated tolls or surcharges on this trip , we have adjusted your upfront fare to reflect the actually incurred charges. please see receipt breakdown for details.
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Trip fare</td>
                        <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $ridesFormat[0]['subtotal'] . '</td>
                    </tr>';
        $surchagreinfo = $ridesFormat[0]['surgeinfo'];
        $surchagrearr = array();
        if ($surchagreinfo != '') {
            $surchagrearr = json_decode(stripslashes($surchagreinfo));
        }
        if (isset($surchagrearr) > 0) {
            $content .= '
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>SubTotal</strong></td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $ridesFormat[0]['subtotal'] . '</td>
            </tr>
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Booking Fee</td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $surchagrearr->booking_charge . '</td>
            </tr>
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">NSW CTP Charges</td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $surchagrearr->nsw_ctp_charge . '</td>
            </tr>
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">NSW Government Passenger Service Levy</td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $surchagrearr->nsw_gtl_charge . '</td>
            </tr>
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">GST</td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $surchagrearr->gst_charge . '</td>
            </tr>
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Fuel SurCharge</td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $surchagrearr->fuel_surge_charge . '</td>
            </tr>
            <tr>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Total surge</td>
              <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $ridesFormat[0]['surge'] . '</td>
                </tr>';
        } else {
            $content .= '
                    <tr>
                        <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Total surge</td>
                        <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $ridesFormat[0]['surge'] . '</td>
                    </tr>';
        }

        $content .= '
                <tr>
                    <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Amount Charged</strong></td>
                    <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"></td>
                </tr>
                <tr>
                    <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">' . $ridesFormat[0]['paymenthod'] . '</td>
                    <td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$' . $ridesFormat[0]['total'] . '</td>
                </tr>
            </table>
            <div style="width: 80%; height: 10px; margin: 110px auto 0 auto; border-bottom: solid 1px #000;"></div>
            <div style="width: 100%; height: 225px; margin-top: 50px; background-color: #216da9;">
                <img src="' . asset('images/email-footer-logo.jpg') . '" width="114" height="79" style="margin-left: 20px; margin-top: 15px">
            </div>
            <div style="width: 100%; height: 28px; background-color: #000000; text-align: center; color: #ffffff;  font-size: 12px; padding-top: 10px">
                Copyright 2010 by Turvy Pty Ltd. All rights Reserved
            </div>
        </page>';

        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(0, 0, 0, 0));
        $html2pdf->WriteHTML($content);
        $html2pdf->Output(base_path() . '/public/uploads/receipts/report_' . $book_id . '.pdf', 'F');
        $file = url('/') . '/uploads/receipts/report_' . $book_id . '.pdf';
        $data['file'] = $file;

        return view('rider.receipt')->with([
            'recepit_data' => $item,
            'surchagrearr' => $surchagrearr,
            'PDFfileName' => $file
        ]);
    }

    /*   public function emailtripreceipt($book_id)
    {
       $id = Auth::guard('rider')->user()->id;
       $rider = Auth::guard('rider')->user()->id;
       $book = Appointment::find($book_id);
       $email = $book->rider_email;




       try {
            Mail::to($email)->send(new \RiderEmailRecepit($book));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }

        //RiderLocation::where('riderId', $book_id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Email sent.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }
*/
}
