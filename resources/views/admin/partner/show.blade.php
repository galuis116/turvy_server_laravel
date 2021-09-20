@extends('admin.layouts.app')

@section('title', $partner->name.' | Partner')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>Partner details</h2>
                <a href="{{route('admin.user.partner.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="d-flex justify-content-start text-center">
                                    <div class="image-container">
                                        <img src="{{isset($partner->avatar) ? asset($partner->avatar) : asset('images/no-person.png')}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{$partner->name}}</h2>
                                        <p>{{$partner->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#private" data-toggle="tab">PRIVATE INFO</a></li>
                                        <li role="presentation"><a href="#contacts" data-toggle="tab">CONTACTS</a></li>
                                        <li role="presentation"><a href="#banks" data-toggle="tab">BANKS</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="private">
                                            <li class="list-group-item clearfix">
                                                Name <label class="control-label pull-right">{{$partner->name}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Gender <label class="control-label pull-right">{{getGender($partner->gender)}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email <label class="control-label pull-right">{{$partner->email}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile <label class="control-label pull-right">{{$partner->mobile}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Organization <label class="control-label pull-right">{{$partner->organization}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                URL <label class="control-label pull-right">{{$partner->url}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Location <label class="control-label pull-right">{{$partner->city->name}}, {{$partner->state->name}}, {{$partner->country->name}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Approved <label class="control-label pull-right">{{$partner->is_approved == 0 ? 'No' : 'Yes'}}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="contacts">
                                            <li class="list-group-item clearfix">
                                                Skype <label class="control-label pull-right">{{isset($partner_contact->skype) ? $partner_contact->skype : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Facebook <label class="control-label pull-right">{{isset($partner_contact->facebook) ? $partner_contact->facebook : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Twitter <label class="control-label pull-right">{{isset($partner_contact->twitter) ? $partner_contact->twitter : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Google+ <label class="control-label pull-right">{{isset($partner_contact->google) ? $partner_contact->google : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Instagram <label class="control-label pull-right">{{isset($partner_contact->instagram) ? $partner_contact->instagram : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Dribble <label class="control-label pull-right">{{isset($partner_contact->dribble) ? $partner_contact->dribble : 'Not set'}}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="banks">
                                            <li class="list-group-item clearfix">
                                                Account name <label class="control-label pull-right">{{isset($partner_contact->account_name) ? $partner_contact->account_name : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Bank name <label class="control-label pull-right">{{isset($partner_contact->bank_name) ? $partner_contact->bank_name : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                BSB <label class="control-label pull-right">{{isset($partner_contact->bsb) ? $partner_contact->bsb : 'Not set'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Account number <label class="control-label pull-right">{{isset($partner_contact->account_number) ? $partner_contact->account_number : 'Not set'}}</label>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection