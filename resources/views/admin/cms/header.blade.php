@extends('admin.layouts.app')
@section('title', 'Header info')

@php
    $caption = isset($content->footer_caption) ? $content->footer_caption : '';
    $email = isset($content->footer_email) ? $content->footer_email : '';
    $address = isset($content->footer_address) ? $content->footer_address : '';
@endphp


@section('content')
<link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
<style>
.table-hd{
	 background: #000;
	 color: #fff;
	 font-weight: bold;
}
.table{
	padding: 10px;
}
</style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Header Information</h2>
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
                            <h2>Header Top Links</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.header.headerTop')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="header_top" />
                            </form>
                        </div>
                         <table class="table">
		                     <thead class="table-hd" >
		                		<tr>
			                		<td>Label</td>
			                		<td>Link</td>
			                		<td>Action</td>
		                		</tr>
		                		</thead>
		                		 <tbody>
			                		@foreach($topHeaderLink as $itm)
			                		<tr>
			                			<td>{{$itm->label_link}}</td>
			                		   <td>{{$itm->link}}</td>
			                		   <td><a href="{{route('admin.cms.header.delete', $itm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a></td>
			                		</tr>
			                		@endforeach
		                		 </tbody>
		                	</table>
                    </div>
                    
                   
                	
                </div>
                	
            </div>
            <!-- END OF FOOTER 2 SECTION 1 -->
            
             <!-- END OF FOOTER 2 SECTION 2 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Header 2 Left Links</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.header.headerLeft')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Icon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter icon Class" value=""/>
                                            </div>
                                            <em>For icon <a href="https://fontawesome.com/v5/search" target="_blank">https://fontawesome.com/v5/search</a></em>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="header_left" />
                            </form>
                        </div>
                        
                         <table class="table">
		                     <thead class="table-hd" >
		                		<tr>
			                		<td>Label</td>
			                		<td>Link</td>
                                    <td>Icon</td>
			                		<td>Action</td>
		                		</tr>
		                		</thead>
		                		 <tbody>
			                		@foreach($header2Left as $itm)
			                		<tr>
			                		    <td>{{$itm->label_link}}</td>
			                		   <td>{{$itm->link}}</td>
                                       <td><i class="{{$itm->iconClass}}"></i><br>{{$itm->iconClass}}</td>
			                		   <td><a href="{{route('admin.cms.header.delete', $itm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a></td>
			                		</tr>
			                		@endforeach
		                		 </tbody>
		                	</table>
                    </div>
                </div>
            </div>
            <!-- END OF FOOTER 2 SECTION 1 -->
                        
             <!-- END OF FOOTER 2 SECTION 2 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Header 2 Right Links</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.header.headerRight')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="header_right" />
                            </form>
                        </div>
                         <table class="table">
		                     <thead class="table-hd" >
		                		<tr>
			                		<td>Label</td>
			                		<td>Link</td>
			                		<td>Action</td>
		                		</tr>
		                		</thead>
		                		 <tbody>
			                		@foreach($header2Right as $itm)
			                		<tr>
			                			<td>{{$itm->label_link}}</td>
			                		   <td>{{$itm->link}}</td>
			                		   <td><a href="{{route('admin.cms.header.delete', $itm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a></td>
			                		</tr>
			                		@endforeach
		                		 </tbody>
		                	</table>
                    </div>
                </div>
            </div>
            <!-- END OF FOOTER 2 SECTION 1 -->
        </div>
    </section>

@endsection
