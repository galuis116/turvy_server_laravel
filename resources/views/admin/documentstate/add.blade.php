@extends('admin.layouts.app')

@php
    $title = isset($documentstate) ? 'Edit document state' : 'Add document state';
    $action = isset($documentstate) ? route('admin.document.documentstate.update', $documentstate->id) : route('admin.document.documentstate.store');
    $state_id = isset($documentstate) ? $documentstate->state_id : 0;
    $document_ids = isset($documentstate) ? $documentstate->document_ids : '';
    $btnName = isset($documentstate) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.document.documentstate.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <h2>
                                {{$title}}
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{$action}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="state_id" id="state" required>
                                                    <option value="0">Default</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}" @if($state_id != 0) @if($state_id == $state->id) selected @endif @endif>{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="documents">Document List</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select id="optgroup" name="document_ids[]" class="ms" multiple="multiple">
                                                @foreach($documents as $document)
                                                    <option value="{{$document->id}}" @if($document_ids == '') @if(in_array($document->id, explode(',', $document_ids))) selected @endif @endif>{{$document->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{$btnName}}</button>
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

