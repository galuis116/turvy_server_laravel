@extends('rider.layouts.app')

@section('style')

<style>

    body {

        position: relative;

        overflow-x: hidden;

    }

    body,

    html { height: 100%;}

    .nav .open > a,

    .nav .open > a:hover,

    .nav .open > a:focus {background-color: transparent;}



    /*-------------------------------*/

    /*           Wrappers            */

    /*-------------------------------*/





    .clear{clear:both !important;}

    .ola-booking {

        padding: 10px;

    }



</style>



<style>

    table {

        border-collapse: collapse;

        border-spacing: 0;

        width: 100%;

        border: 1px solid #ddd;

    }



    th, td {

        border: none;

        text-align: left;

        padding: 8px;

    }



    tr:nth-child(even){background-color: #f2f2f2}



</style>



@endsection



@section('content')



    <div class="ola-booking">

        <div class="tab-content">

            <div class="tab-pane fade in active" id="tab1">

                <form name="myForm" action="" method="post">



                    <div class="bnr_input_group1">



                        <select class='slct_input' name="state_id" id="state" required>

                            <option value=""> Select State </option>

                            @foreach($states as $state)

                                <option value="{{$state->id}}">{{$state->name}}</option>

                            @endforeach

                        </select>

                        <select class='slct_input' name="servicetype_id" id="servicetype">

                            <option value=""> Select service type </option>

                        </select>

                    </div>

                    <div class="clear"></div>

                    <div id="result"></div>

                </form>

            </div>

            <div class="clear"></div>

        </div>

    </div>



@endsection

@section('script')

<script>
    $(document).ready(function(){
        $('#state').change(function(){
            $.ajax({
                url: "{{route('getServiceTypeByState')}}",
                data: "state_id=" + $(this).val(),
                success: function(data){
                    $('#servicetype').html(data);
                }
            });
        });
        $('#servicetype').change(function(){
            $.ajax({
                url: "{{route('getFarecardByServicetype')}}",
                data: "servicetype_id=" + $(this).val(),
                data: {
                    servicetype_id : $(this).val(),
                    state_id : $('#state').val(),
                },
                success: function(data){
                    $('#result').html(data);
                }
            });
        });
    });
</script>

<script>



    $(document).ready(function () {

        var trigger = $('.hamburger'),

            overlay1 = $('.overlay1'),

            isClosed = false;



        trigger.click(function () {

            hamburger_cross();

        });



        function hamburger_cross() {



            if (isClosed == true) {

                overlay1.hide();

                trigger.removeClass('is-open');

                trigger.addClass('is-closed');

                isClosed = false;

            } else {

                overlay1.show();

                trigger.removeClass('is-closed');

                trigger.addClass('is-open');

                isClosed = true;

            }

        }



        $('[data-toggle="offcanvas"]').click(function () {

            $('#wrapper1').toggleClass('toggled');

        });

    });

</script>

@endsection
