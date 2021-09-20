@extends('admin.layouts.app')

@section('title', 'Create New Sub Admin')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Create New Sub Admin</h2>
                <a href="{{route('admin.roles.index')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('admin.partials.message')
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create New Sub Admin</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.roles.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="first_name">First name:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="last_name">Last name:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mobile">Mobile:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Password:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="avatar">Avatar:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="{{asset('images/no-image.png')}}" width="200px" height="200px" alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select image </span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="avatar">
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                            <label class="control-label">&nbsp;(&nbsp;Size: 200&times;200&nbsp;)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="image">Permission</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group demo-checkbox">
                                            <div class="col-md-12">
                                                <input type="checkbox" id="permission" class="filled-in chk-col-light-blue" name="permission[]" value="0">
                                                <label for="permission">Select All</label>
                                            </div>
                                            @foreach($permission as $value)
                                                <div class="{{$value->parent_id == 0 ? 'col-md-12' : 'col-md-3'}}" @if($value->parent_id == 0) style="margin-bottom: 0px;" @endif>
                                                    @if($value->parent_id == 0) <hr style="maring: 0px;"/> @endif
                                                    <input type="checkbox" id="permission-{{$value->id}}" @if($value->parent_id == 0) data-parent-id={{$value->id}} @endif class="filled-in chk-col-light-blue @if($value->parent_id == 0) parent @else child{{$value->parent_id}} @endif" name="permission[]" value="{{$value->id}}">
                                                    <label for="permission-{{$value->id}}">{{$value->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#permission').on('click', function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        });
        $('.parent').on('click', function(){
            var parent_id = $(this).attr('data-parent-id');
            $('.child'+parent_id).prop('checked', $(this).prop('checked'));
        });
    });
</script>
@endsection
