@extends('rider.layouts.app')

@section('style')

    <style>

        .clear{clear:both !important;}

			.car_type_full_dlts{
				border:0px !important;
			}

        .tab-content a{ color:#222; font-style:normal;}

        .tab-content a:hover{ text-decoration:none; color:#222;}



        @media screen and (max-height: 450px) {

            .sidenav {padding-top: 15px;}

            .sidenav a {font-size: 18px;}

        }
        .table {

        	border-bottom: 0px!important;

        }
        
        .receipt-text-bottom{
        	font-size: 16px;
			line-height: 22px;
			margin: 0;
			color: #444;
			font-weight: bold;
        }
        
        .receipt-text{
        	font-size: 14px;
			line-height: 22px;
			margin: 0;
			color: #444;
			font-weight: bold;
        }
		 .align-left{
			text-align: left;
		 }
		 .recepit-text-msg{
		 	font-size: 20px;
			line-height: 26px;
			margin: 0;
			color: #444;
			font-weight: bold;
		 }
		 .recepit-text-label{
		 	font-size: 16px;
			line-height: 22px;
			margin: 0;
			color: #444;
			font-weight: bold;
		 }
		 .row-box{
		   display: flex;
		   text-align: left;
		   padding-top:10px;
		   padding-bottom:10px
		 }
    </style>

@endsection
@section('content')

   <div class="car_type_full_dlts" style="padding:10px;" align="center">
	  <div class="container-fluid" style="width:86%;padding:0px;border:1px solid #ccc;" >     
 		<div class="row centered"  style="margin: 0px!important; background-color:#7bb9ff;">
 			<div class="col-md-12" style="padding:10px; ">
	       <div class="row" style="display: flex;">
	           <div class="col-md-4" style="text-align:left;color: #fff;">
 					<img src="https://www.turvy.net/images/icon-small.png" > <br /> 
 					TURVY
 				</div>
				<div class="col-md-4" style="align-self:center;">
					<div style="font-weight: bold;font-size: 26px;">Receipt</div> 
				</div>

				<div class="col-md-4"style="align-self:center;">
					<p class="receipt-text">Date : {{$recepit_data['booking_date']}}</p>
				</div>

			</div>

<!-- First row finihs -->



    <div class="row row-box" >
	          
	           <div class="col-md-6" style=" ">
 					<p class="recepit-text-msg">Here's your receipt for your ride, <br />{{$recepit_data['first_name']}} {{$recepit_data['last_name']}}</p>
 				</div>

				<div class="col-md-6 receipt-text" style="">
					<p class="receipt-text">Pickup:  {{$recepit_data['origin']}} <br />  {{$recepit_data['start_time']}} 
					</p>
					<p class="receipt-text">Drop Off:  {{$recepit_data['destination']}} <br />  {{$recepit_data['end_time']}} </p>
				</div>

			</div>


			<!-- second ROW finish -->


    <div class="row row-box" >
	          
	           <div class="col-md-3" style=" ">
	           	<p class="recepit-text-label">Ride Type</p>
 					<p class="receipt-text">{{$recepit_data['servicename']}}</p>
 				</div>


				<div class="col-md-3" style=" ">
				  <p class="recepit-text-label">Vehicle</p>
					<p class="receipt-text">{{$recepit_data['servicename']}} </p>
				</div>

				<div class="col-md-2" style="">
					 <p class="recepit-text-label">Driver</p>
					<p class="receipt-text">{{$recepit_data['first_name']}} {{$recepit_data['last_name']}}</p> 
				</div>


				<div class="col-md-2" style=" ">
				 <p class="recepit-text-label">Duration</p>
					<p class="receipt-text">{{$recepit_data['trip_duration']}} min</p> 
				</div>
				<div class="col-md-2" style="">
					<p class="recepit-text-label">Distance</p>
					<p class="receipt-text">{{number_format($recepit_data['trip_distance'], 2) }} Km</p>
				</div>
			</div>


			<!-- THIRD ROW finish -->





					</div>

			<!--  ROW  ENDS -->

				</div>
			<br />
			<div class="row row-box" >
					<div class="col-md-2"></div>
	           <div class="col-md-4">
					<p style=" font-size: 32px;font-weight: 700;">Total</p>
	           </div>

	            <div class="col-md-4">
					<p style="  text-align: right;
  font-size: 32px;
  font-weight: 700;
}">A${{$recepit_data['total']}}</p> 
	           	</div>
	           	<div class="col-md-2"></div>
	       </div>

			<div class="row row-box" >
				  <div class="col-md-2"></div>
	           <div class="col-md-8"  style="border:2px solid #c6daff; border-left: 15px solid #c6daff; padding:15px;">
			    		<p style=" font-size: 15px;font-weight: 600;padding: 10px;">Due to unanticipated tolls or surcharges on this trip , we have adjusted your upfront fare to reflect the actually incurred charges. please see receipt breakdown for details.
                   </p>
			    		
			    	</div>
			     <div class="col-md-2"></div>
			    </div>
			<div class="row row-box" >
			<div class="col-md-2"></div>
				<div class="col-md-8" >
					<div class="row row-box" style=" border-bottom: 1px solid #c6daff; border-top: 1px solid #c6daff;padding-top: 30px;padding-bottom: 30px;">
						<div class="col-md-6" class="receipt-text" ><p class="receipt-text-bottom">Trip fare</p></div>
						<div class="col-md-6" ><p class="receipt-text-bottom" style="text-align:right;">A${{$recepit_data['subtotal']}}</p></div>
					</div>
					
						<div class="row-box" style="">
			<div class="col-md-12"  >
			<div class="row row-box" style="">
				<div class="col-md-6" style="text-align: left; height: 40px; padding-top: 20px;padding-left: 0px;"><strong>SubTotal</strong></div>
				<div class="col-md-6" style="text-align: right; height: 40px; padding-top: 20px;padding-right: 0px;"><strong>A${{$recepit_data['subtotal']}}</strong></div>
			</div>
			<div class="row row-box" style="">
				<div class="col-md-6" style="text-align: left;  padding-top: 20px;padding-left: 0px;font-weight: 500;">Booking Fee</div>
				<div class="col-md-6" style="text-align: right; padding-top: 20px;padding-right: 0px;font-weight: 600;">A${{ number_format($surchagrearr->booking_charge, 2) }}</div>
			</div>

			<div class="row row-box" style="">
				<div class="col-md-6" style="text-align: left; padding-top: 20px;padding-left: 0px;font-weight: 500;">NSW CTP Charges
				</div>
				<div class="col-md-6" style="text-align: right; padding-top: 20px;padding-right: 0px;font-weight: 600;">A${{ number_format($surchagrearr->nsw_ctp_charge, 2) }}</div>
			</div>



			<div class="row row-box" style="">
				<div class="col-md-8" style="text-align: left;padding-top: 20px;padding-left: 0px;font-weight: 500;">NSW Government Passenger Service Levy</div>
				<div class="col-md-4" style="text-align: right; padding-top: 20px;padding-right: 0px;font-weight: 600;">A${{ number_format($surchagrearr->nsw_gtl_charge, 2) }}</div>
			</div>



			<div class="row row-box" style="">
				<div class="col-md-6" style="text-align: left;  padding-top: 20px;padding-left: 0px;font-weight: 500;">Fuel SurCharge</div>
				<div class="col-md-6" style="text-align: right; padding-top: 20px;padding-right: 0px;font-weight: 600;">A${{ number_format($surchagrearr->fuel_surge_charge, 2) }}</div>
			</div>



			<div class="row row-box" style="padding-bottom: 30px;">
				<div class="col-md-6" style="text-align: left; padding-top: 20px;padding-left: 0px;font-weight: 500;">GST</div>
				<div class="col-md-6" style="text-align: right;  padding-top: 20px;padding-right: 0px;font-weight: 600;">
					A${{number_format($surchagrearr->gst_amt,2)}}</div>
			</div>




			<div class="row row-box" style=" border-top: 1px solid #c6daff;padding-bottom: 20px;padding-top: 25px;">
				<div class="col-md-6" style="text-align: left;padding-top: 20px;padding-left: 0px;"><strong>Amount Charged</strong></div>
				<div class="col-md-6" style="text-align: right;padding-top: 20px;padding-right: 0px;"></div>
			</div>


			<div class="row row-box" style=" border-bottom: 0px solid steelblue;">
				<div class="col-md-6" style="text-align: left;padding-top: 20px;padding-left: 0px;"><p class="receipt-text">{{$recepit_data['paymenthod']}}</p></div>

				<div class="col-md-6" style="text-align: right; padding-top: 20px;padding-right: 0px;"><p class="receipt-text">A${{$recepit_data['total']}}</p></div>
			</div>


			    		
	</div>
</div>					
				<div class="row row-box" style="border-top: 1px solid #c6daff;" >
			<div class="col-md-12" class="receipt-text" ><i class="fa fa-cloud-download" aria-hidden="true"></i>
				&nbsp;&nbsp;<a href="{{$PDFfileName}}" target="_blank"> Download PDF</a>
			</div>
	</div>


	<div class="row row-box" style="border-top: 1px solid #c6daff;" >
			<div class="col-md-12" class="receipt-text" ><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;
				<!-- a href="{{ route('rider.emialReceipt', $recepit_data['id']) }}" target="_blank"> Resend Email</a-->
			</div>
	</div>	
				</div>
				<div class="col-md-2"></div>
				
			</div>
		





	

 <div class="row  style="margin: 10px!important; background-color:#7bb9ff;">
 <div class="col-md-12" >
@include('partials.receipt_footer')

 	</div></div>
<!-- outer container ENDS -->
			</div>




</div>




	</div>

@endsection