@extends('partner.layouts.app')



@section('title', 'Invite Friend')



@section('styles')

    <link rel="stylesheet" href="{{ asset('partner-panel/plugins/multiple-emails/multiple-emails.css') }}">

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.2/semantic.min.css" />

    <style>

        h3{

            margin-top: 0px;

        }

    </style>

@endsection

@php
    $partner = Auth::guard('partner')->user();
@endphp

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">

                <h3>Invite Friend</h3>

            </div>

        </div>

        <div class="row">

            <div class="box">

                <div class="box-body">

                  <form method="POST" class="form-horizontal" action="{{route('partner.invite')}}">
                    @csrf
                    <div class="form-group">

                      

                        <div class="col-sm-6">

                            <table class="table table-bordered" id="dynamic_field">

                                <tr>

                                    <td><input type="text" name="email1" id="name" placeholder="Enter Email Address" class="form-control name-list"></td>

                                    <td><a name="add" id="add" class="btn btn-success"><i class="fa fa-plus" style="padding: 0px;"></i></a></td>

                                </tr>

                            </table>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <button type="submit" class="btn btn-dark">Send Invitation</button>

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

