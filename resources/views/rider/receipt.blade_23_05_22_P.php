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

    
   <div class="car_type_full_dlts" style="border: 1px; padding:10px;">

	  <div style=" width: 70%;" >
	       
 <div class="row  style="margin: 10px!important; background-color:#7bb9ff;">
 <div class="col-md-12" style="padding:10px; border: 1px solid green;">


	       <div class="row" style="border: 1px solid red;">
	          
	           <div class="col-md-4" style=" border: 1px solid yellow;">
 					<img src="https://www.turvy.net/images/icon-small.png" > <br /> TURVY
 				</div>


				<div class="col-md-4" style=" border: 1px solid yellow;">
					<h3>Receipt</h3> 
				</div>

				<div class="col-md-4" style=" border: 1px solid yellow;">
					Date : {{$recepit_data['booking_date']}}
				</div>

			</div>

<!-- First row finihs -->



    <div class="row" style="border: 1px solid red;">
	          
	           <div class="col-md-6" style=" border: 1px solid yellow;">
 					<h6>Here's your receipt for your ride, <br />{{$recepit_data['first_name']}} {{$recepit_data['last_name']}}</h6>
 				</div>


				<div class="col-md-6" style=" border: 1px solid yellow;">
					<h6>Pickup:  {{$recepit_data['origin']}} <br />  {{$recepit_data['start_time']}} 
					</h6>
					<h6>Drop Off:  {{$recepit_data['destination']}} <br />  {{$recepit_data['end_time']}} </h6>
				</div>

			</div>


			<!-- second ROW finish -->


    <div class="row" style="border: 1px solid red; padding: 5px;">
	          
	           <div class="col-md-3" style=" border: 1px solid yellow;">
 					<h6>Ride Type  <br / >  {{$recepit_data['servicename']}}</h6>
 				</div>


				<div class="col-md-3" style=" border: 1px solid yellow;">
					<h6>Vehicle <br/> {{$recepit_data['servicename']}} </h6>
				</div>

				<div class="col-md-2" style=" border: 1px solid yellow;">
					<h6>Driver  <br / >  {{$recepit_data['first_name']}} {{$recepit_data['last_name']}}</h6> 
				</div>


				<div class="col-md-2" style=" border: 1px solid yellow;">
					<h6>Duration <br / >  {{$recepit_data['trip_duration']}} </h6> 
				</div>


				<div class="col-md-2" style=" border: 1px solid yellow;">
					<h6>Distance <br / >  {{number_format($recepit_data['trip_distance'], 2) }} </h6>
				</div>


				

			</div>


			<!-- THIRD ROW finish -->





					</div>

			<!--  ROW  ENDS -->

				</div>
			<br />
			<div class="row" style="margin: 10px!important;">
	           <div class="col-md-5 float-left">
					<h4 style="font-weight: bolder;">Total</h4>
	           </div>

	            <div class="col-md-5">
					<h4 style="font-weight: bolder; text-align: right;">A${{$recepit_data['total']}}</h4> 
	           	</div>
	       </div>

<br />
			<div class="row" style="margin: 10px!important;">
	           <div class="col-md-9"  style="border:2px solid #c6daff; border-left: 8px solid #c6daff; padding:15px;">
			    		Due to unanticipated tolls or surcharges on this trip , we have adjusted your upfront fare to reflect the actually incurred charges. please see receipt breakdown for details.

			    		
			    	</div>
			    </div>




			<div class="row" style=" border-bottom: 1px solid steelblue; border-top: 1px solid steelblue; ">
				<div class="col-md-5" style="text-align: left; height: 60px; padding-top: 20px;">Trip fare</div>
				<div class="col-md-5" style="text-align: right; height: 60px; padding-top: 20px;">A${{$recepit_data['subtotal']}}</div>
			</div>



<div class="row" style=" margin: 10px!important; border: 1px solid greenyellow; ">
	<div class="col-md-10"  >
			    		

			<div class="row" style=" border: 0px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;"><strong>SubTotal</strong></div>
				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;"><strong>A${{$recepit_data['subtotal']}}</strong></div>
			</div>





			<div class="row" style=" border: 0px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;">Booking Fee</div>
				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;">A${{ number_format($surchagrearr->booking_charge, 2) }}</div>
			</div>




			<div class="row" style=" border: 1px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;">NSW CTP Charges
				</div>
				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;">A${{ number_format($surchagrearr->nsw_ctp_charge, 2) }}</div>
			</div>



			<div class="row" style=" border: 1px solid steelblue;">
				<div class="col-md-7" style="text-align: left; height: 60px; padding-top: 20px;">NSW Government Passenger Service Levy</div>
				<div class="col-md-3" style="text-align: right; height: 60px; padding-top: 20px;">A${{ number_format($surchagrearr->nsw_gtl_charge, 2) }}</div>
			</div>



			<div class="row" style=" border: 0px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;">Fuel SurCharge</div>
				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;">A${{ number_format($surchagrearr->fuel_surge_charge, 2) }}</div>
			</div>



			<div class="row" style=" border-bottom: 1px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;">GST</div>
				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;">
					{{$surchagrearr->gst_charge}}</div>
			</div>




			<div class="row" style=" border-bottom: 0px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;"><strong>Amount Charged</strong></div>
				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;"></div>
			</div>


			<div class="row" style=" border-bottom: 0px solid steelblue;">
				<div class="col-md-6" style="text-align: left; height: 60px; padding-top: 20px;">{{$recepit_data['paymenthod']}}</div>

				<div class="col-md-6" style="text-align: right; height: 60px; padding-top: 20px;">A${{$recepit_data['total']}}</div>
			</div>


			    		
	</div>
</div>





	<div class="row" >
			<div class="col-md-12" ><i class="fa fa-cloud-download" aria-hidden="true"></i>
				&nbsp;&nbsp;<a href="{{$PDFfileName}}" target="_blank"> Download PDF</a>
			</div>
	</div>


	<div class="row" >
			<div class="col-md-12" ><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;
				<!-- a href="{{ route('rider.emialReceipt', $recepit_data['id']) }}" target="_blank"> Resend Email</a-->
			</div>
	</div>

 <div class="row  style="margin: 10px!important; background-color:#7bb9ff;">
 <div class="col-md-12" style="padding:10px; border: 1px solid green;">
@include('partials.receipt_footer')

 	</div></div>
<!-- outer container ENDS -->
			</div>




</div>




	</div>

@endsection