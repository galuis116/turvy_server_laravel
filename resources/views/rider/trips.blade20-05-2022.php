@extends('rider.layouts.app')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@section('style')

    <style>

        .clear{clear:both !important;}



        .tab-content a{ color:#222; font-style:normal;}

        .tab-content a:hover{ text-decoration:none; color:#222;}



        @media screen and (max-height: 450px) {

            .sidenav {padding-top: 15px;}

            .sidenav a {font-size: 18px;}



        }

        .nav-tabs {
         background: #fff;
         color: #000; 
        }




.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
    color: #555;
    cursor: default;
    background-color: #fff;
    border-bottom: 3px solid #000!important;
    border-bottom-color: #135aa8!important;
}
.nav-tabs>li>a, .nav-tabs>li>a:hover, .nav-tabs>li>a:focus {
    background-color: transparent!important;
    color: #000!important;
    font-weight: 500;
}
.nav-tabs>li>a {
    color: #000;
    border: 0;
    margin: 0;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
.left_tab li a {
    padding: 18px 20px!important;
    color: #333;
}
.tab-content a {
    color: #222;
    font-style: normal;
}
a, a:hover, a:focus {
    color: #009688;
}
a {
    color: #337ab7;
    text-decoration: none;
}
a {
    background-color: transparent;
}


    </style>

@endsection



@section('content')


 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#UPCOMMING">UPCOMMING</a></li>
    <li><a data-toggle="tab" href="#COMPLETED">COMPLETED</a></li>
    <li><a data-toggle="tab" href="#CANCELLED">CANCELLED</a></li>
  </ul>

  <div class="tab-content" >
    <div id="UPCOMMING" class="tab-pane fade in active">
      <h3>UPCOMMING</h3>
      <p>



    <div class="panel-group" id="accordionUP">

     @foreach($upcommingRides as $key => $ride)

    <div class="panel panel-default">
      <div class="panel-heading">

        <a data-toggle="collapse" data-parent="#accordionUP" href="#collapse{{$key}}">
        <table  > <tr> 
            <td style="text-align: left;" class="col-md-5">{{$ride['booking_date']}} , {{$ride['booking_time']}} <br /> <br />

<span style="text-align: left; font-weight: bold;"> A{{$ride['total']}}</span>
</td> <td  class="col-md-6">{{trim($ride['origin'])}} <br /><br />
<span style="text-align: left; font-weight: bold; ">{{trim($ride['paymenthod'])}}</span>
</td></tr>

        </table>


</a>
      
</div>
     


      <div id="collapse{{$key}}" class="panel-collapse collapse">
        <div class="panel-body" style="text-align: left; font-weight: bold;">Your {{trim($ride['servicename'])}} Trip </div>
        <div  style="margin-left: 30px; padding: 5px;">
            <i class="fa fa-circle" aria-hidden="true" style="color:135aa8;"></i>
             {{trim($ride['origin'])}}</div>

             <div style="margin-left: 40px; padding: 10px;">{{trim($ride['start_time'])}}</div> 
        


        <div style="margin-left: 30px; padding: 5px;">
            <i class="fa fa-square" aria-hidden="true" style="color:135aa8;"></i> 
            {{trim($ride['destination'])}}  </div>

        <div style="margin-left: 40px; padding: 10px;"> {{trim($ride['end_time'])}}  </div>
       

      </div>



    </div>


 @endforeach




   
  
</div>




</p>






    </div>


    <!--  DIV END UPCOMMING -->
    <!--  DIV END UPCOMMING -->
    <!--  DIV END UPCOMMING -->



    <div id="COMPLETED" class="tab-pane fade">
      <h3>COMPLETED</h3>
      <p>
          

<div class="panel-group" id="accordion1">
   


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapset1">Collapsible tab 2 </a>
        </h4>
      </div>


      <div id="collapset1" class="panel-collapse collapse in">
        <div class="panel-body">Ldfgdfg </div>
      </div>

    </div>


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapset2">Collapsible  tab 2 </a>
        </h4>
      </div>
      <div id="collapset2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  
</div>




      </p>
    </div>

    <!--  DIV END COMPLETED -->
    <!--  DIV END COMPLETED -->
    <!--  DIV END COMPLETED -->

    <div id="CANCELLED" class="tab-pane fade">
      <h3>CANCELLED</h3>
      <p>


<div class="panel-group" id="accordion2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion2" href="#collapset3">Collapsible tab 3 </a>
        </h4>
      </div>
      <div id="collapset3" class="panel-collapse collapse in">
        <div class="panel-body">L
        sdfsdf
    sdfsdfsd
sdfsdfdf
nsequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion2" href="#collapset4">Collapsible  tab 3 </a>
        </h4>
      </div>
      <div id="collapset4" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  
</div>

      </p>
    </div>
 

    <!--  DIV END CANCELLED -->
    <!--  DIV END CANCELLED -->
    <!--  DIV END CANCELLED -->


  </div>





@endsection