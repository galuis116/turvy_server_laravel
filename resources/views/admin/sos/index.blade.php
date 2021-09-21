@extends('admin.layouts.app')

@section('title', 'SOS Contact List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SOS Contact List</h2>
                <a href="{{route('admin.sos.contact.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New SOS Contact</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SOS Contact List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $index => $contact)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->number}}</td>
                                    <td>
                                        @if($contact->status)
                                            <span class="badge bg-blue">Active</span>
                                        @else
                                            <span class="badge bg-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.sos.contact.edit', $contact->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.sos.contact.active', $contact->id)}}" class="btn {{$contact->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$contact->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                        <a href="{{route('admin.sos.contact.delete', $contact->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection
