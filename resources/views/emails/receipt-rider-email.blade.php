<html>
<body>
    <div style="width: 100%; height: 80px; border-bottom: solid 1px #000">
        <img src="{{asset('images/receipt-header-logo.jpg')}}" >
    </div>
    <div style="padding-left: 70px; padding-top: 20px">
         <table cellpadding="0" cellspacing="0"  >
			    <tr>
			    <td colspan="2" style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">
			     <h5>Here's your receipt for your ride, {{$recepit_data['first_name']}} {{$recepit_data['last_name']}}</h5>
			    </td>
			    </tr>
			    	<tr >
			    		<td style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;"><strong>Total</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">A${{$recepit_data['total']}}</td>
			    	</tr>
			    	<tr bgcolor="#c6daff">
			    		<td colspan="2" style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">
			    		Due to unanticipated tolls or surcharges on this trip , we have adjusted your upfront fare to reflect the actually incurred charges. please see receipt breakdown for details.
			      	</td>
			      </tr>
			      <tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Trip fare</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$recepit_data['subtotal']}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>SubTotal</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$recepit_data['subtotal']}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Booking Fee</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$surchagrearr->booking_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>NSW CTP Charges</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$surchagrearr->nsw_ctp_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>NSW Government Passenger Service Levy</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$surchagrearr->nsw_gtl_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>GST</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">{{$surchagrearr->gst_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Fuel SurCharge</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$surchagrearr->fuel_surge_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Total surge</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$recepit_data['surge']}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Amount Charged</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$recepit_data['total']}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">{{$recepit_data['paymenthod']}}</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A${{$recepit_data['total']}}</td>
			    	</tr>
			    </table>
    </div>
    <div style="width: 80%; height: 10px; margin: 110px auto 0 auto; border-bottom: solid 1px #000;">
    </div>
    <div style="width: 100%; height: 225px; margin-top: 50px; background-color: #216da9;">
        <img src="{{asset('images/email-footer-logo.jpg')}}" style="margin-left: 20px; margin-top: 15px">
    </div>
    <div style="width: 100%; height: 28px; background-color: #000000; text-align: center; color: #ffffff; font-family: 'Times New Roman'; font-size: 12px; padding-top: 10px">
        Copyright 2010 by Turvy Pty Ltd. All rights Reserved
    </div>
</body>
</html>
