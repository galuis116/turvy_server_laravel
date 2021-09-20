@extends('partner.layouts.app')

@section('title', 'Comment')

@php
    $partner = Auth::guard('partner')->user();
@endphp

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">

                <h3>Comment</h3>

            </div>

        </div>

        <div class="row">

            <div class="box">

                <div class="box-body">

                  <form method="POST" class="form-horizontal" action="{{route('partner.comment')}}">
                    @csrf
                    <div class="form-group">

                        <div class="col-sm-6">

                            <textarea name="content" id="cotnent" cols="30" rows="10" class="form-control"></textarea>
                            
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <button type="submit" class="btn btn-dark">Save</button>

                        </div>

                    </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection



@section('scripts')

    <script srv="{{asset('partner-panel/plugins/multiple-emails/multiple-emails.js')}}"></script>

    <script>

        $(document).ready(function(){

            var i = 1;

            var cou = 1;

            $('#add').click(function(){

               i++;

               if(cou <10){

                   $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="email'+i+'" id="name" placeholder="Enter Email Address" class="form-control name-list"/></td><td><a name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</a></td></tr>');

                   cou++;

               }

               $(document).on('click', '.btn_remove', function() {

                   var button_id = $(this).attr("id");

                   $("#row" + button_id + '').remove();

                   cou--;

               });

            });

        });

    </script>

    });

@endsection

