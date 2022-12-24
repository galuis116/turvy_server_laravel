@extends('rider.layouts.app')

@section('style')

    <style>

        .clear{clear:both !important;}



        .tab-content a{ color:#222; font-style:normal;}

        .tab-content a:hover{ text-decoration:none; color:#222;}



        @media screen and (max-height: 450px) {

            .sidenav {padding-top: 15px;}

            .sidenav a {font-size: 18px;}

        }
        .table {

        	border-bottom: 0px!important;

        }

    </style>

@endsection



@section('content')

    <div class="car_type_full_dlts" style="border: 0px;">

        <div class="" style="border: 0px;">

     
         <table  class="table" style="background-color:#c6daff; border: 0px; font-weight: bold;" >

			    <tr style="background-color:#c6daff;" >
			    <td colspan="2" >

 			
 			<table  class="table" style="background-color:#c6daff; border: 0px; margin: 0px;" >
			    <tr >
			    <td><img src="https://www.turvy.net/images/icon-small.png" > <br /> <span style="color: white; font-size:18px; font-weight:bolder;">TURVY</span></td>
			    <td style="vertical-align: text-top; text-align: center;"> <h3>Receipt</h3> </td>
			    <td style="vertical-align: middle; text-align: right;"> Date : {{$recepit_data['booking_date']}}</td>
			    </tr>
			</table>


			<table  class="table" style="background-color:#c6daff; margin: 0px; ">
			    <tr>
			    <td>  <span><h5>Here's your receipt for your ride, </h5></span> <h5 />{{$recepit_data['first_name']}} {{$recepit_data['last_name']}}</h5>
			     </td>
					<td>

					<div>Pickup :   {{$recepit_data['origin']}} <br />  {{$recepit_data['start_time']}} </div>
					<div> &nbsp;</div>
					<div> Drop Off:   {{$recepit_data['destination']}} <br />  {{$recepit_data['end_time']}}     </div>

					</td>

			    </tr>
			</table>



				<table  class="table" style="background-color:#c6daff; margin: 0px;">
			    <tr>
			    <td> Ride Type  <br / >  {{$recepit_data['servicename']}}
			     </td>

			      <td> Vehicle <br/> {{$recepit_data['servicename']}} 
			     </td>

			      <td  >Driver  <br / >  {{$recepit_data['first_name']}} {{$recepit_data['last_name']}}
			     </td>

			      <td> Duration <br / >  {{$recepit_data['trip_duration']}} 	
			     </td>

			      <td> Distance <br / >  {{$recepit_data['trip_distance']}} 
			     </td>

			    </tr>
			</table>


			    
			    </td>
			    </tr>
			 </table>




 <div  style="padding-left: 70px; padding-top: 20px">
         <table  class="table" >
			   
			    	<tr >
			    		<td style="padding-top:25px; padding-bottom:25px;"><strong>Total</strong><br /></td>
			    		<td style="padding-top:25px; padding-bottom:25px; text-align: right;"><strong>A${{$recepit_data['total']}}</strong> <br /></td>
			    	</tr>

			    


			    	<tr >
			    		<td colspan="2" style="border:2px solid #c6daff; border-left: 8px solid #c6daff;">
			    		Due to unanticipated tolls or surcharges on this trip , we have adjusted your upfront fare to reflect the actually incurred charges. please see receipt breakdown for details.

			    		
			    	</td>

			      	</td>
			      </tr>
			      <tr>
			    		<td style="padding-top:25px; padding-bottom:25px;">Trip fare</td>
			    		<td style="padding-top:25px; padding-bottom:25px; text-align: right;">A${{$recepit_data['subtotal']}}</td>
			    	</tr>
</table>


         <table  class="table table-bordered " >

			    	<tr>
			    		<td ><strong>SubTotal</strong></td>
			    		<td style="text-align: right;"><strong>A${{$recepit_data['subtotal']}}</strong></td>
			    	</tr>
			    	<tr>
			    		<td ><strong>Booking Fee</strong></td>
			    		<td style="text-align: right;">A${{$surchagrearr->booking_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>NSW CTP Charges</strong></td>
			    		<td style="text-align: right;">A${{$surchagrearr->nsw_ctp_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td ><strong>NSW Government Passenger Service Levy</strong></td>
			    		<td style="text-align: right;">A${{$surchagrearr->nsw_gtl_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td ><strong>GST</strong></td>
			    		<td style="text-align: right;">{{$surchagrearr->gst_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td ><strong>Fuel SurCharge</strong></td>
			    		<td style="text-align: right;">A${{$surchagrearr->fuel_surge_charge}}</td>
			    	</tr>
			    	<tr>
			    		<td style="padding-top:25px; padding-bottom:25px;"><strong>Total surge</strong></td>
			    		<td style="padding-top:25px; padding-bottom:25px; text-align: right;">A${{$recepit_data['surge']}}</td>
			    	</tr>
			    	<tr style="border-bottom: solid 0px #000;" class="border-bottom-0">
			    		<td style="padding-top:25px; padding-bottom:25px;"><strong>Amount Charged</strong><br/>
{{$recepit_data['paymenthod']}}
			    		</td>
			    		<td style="text-align: right; padding-top:25px; padding-bottom:25px;">A${{$recepit_data['total']}}</td>
			    	</tr>
			    	 
			    </table>


			    <div class="p-5 border-bottom-1"><i class="fa fa-cloud-download" aria-hidden="true"></i>&nbsp;&nbsp;<a href="{{$PDFfileName}}" target="_blank"> Download PDF</a></div>
			    <div>&nbsp;</div>
				<div class="p-5"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;
				<!-- a href="{{ route('rider.emialReceipt', $recepit_data['id']) }}" target="_blank"> Resend Email</a--></div>


    </div>
    </div>
    <div style="width: 100%; height: 225px; margin-top: 50px; background-color: #216da9;">
        <img src="{{asset('images/email-footer-logo.jpg')}}" style="margin-left: 20px; margin-top: 15px">
    </div>
    <div style="width: 100%; height: 28px; background-color: #000000; text-align: center; color: #ffffff; font-family: 'Times New Roman'; font-size: 12px; padding-top: 10px">
        Copyright 2010 by Turvy Pty Ltd. All rights Reserved
    </div>



       
	
    </div>

@endsection