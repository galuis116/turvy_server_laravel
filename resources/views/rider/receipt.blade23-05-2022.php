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
	       
 <div class="row align-items-center" style="margin: 10px!important; background-color:#7bb9ff;">
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




			<div class="row h-75" style=" border: 1px solid steelblue;">
				<div class="col-md-5 h-75" style="text-align: left;">Trip fare</div>
				<div class="col-md-5 h-75" style="text-align: right;">A${{$recepit_data['subtotal']}}</div>
			</div>



<div class="row" style=" margin: 10px!important;">
	<div class="col-md-10"  >
			    		

			<div class="row" style=" border: 1px solid steelblue;">
				<div class="col-md-5" style="text-align: left;"><strong>SubTotal</strong></div>
				<div class="col-md-5" style="text-align: right;"><strong>A${{$recepit_data['subtotal']}}</strong></div>
			</div>




			    		
	</div>
</div>


<!-- outer container ENDS -->
			</div>




</div>




	</div>

@endsection