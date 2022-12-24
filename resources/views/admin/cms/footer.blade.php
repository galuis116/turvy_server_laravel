@extends('admin.layouts.app')
@section('title', 'footer info')

@php
    $caption = isset($content->footer_caption) ? $content->footer_caption : '';
    $email = isset($content->footer_email) ? $content->footer_email : '';
    $address = isset($content->footer_address) ? $content->footer_address : '';
@endphp
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

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Footer Information</h2>
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
                            <h2>Footer Information</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="caption">Caption</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="caption" name="caption" class="form-control" placeholder="Enter Footer Caption" value="{{$caption}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Footer Email" value="{{$email}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="address" name="address" class="form-control" placeholder="Enter Footer Address" value="{{$address}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Footer 1 Block 1</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer.section1')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="caption">Heading Text</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="heading_text" name="heading_text" class="form-control" placeholder="Heading Text" value="{{isset($footer1->heading1) ? $footer1->heading1 : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >Sub Text</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            		<textarea name="subheading" rows="5" cols="60" class="form-control">{{isset($footer1->subheading) ? $footer1->subheading : '' }}</textarea>
                                                <!-- <input type="text" id="email" name="email" class="form-control" placeholder="Enter Footer Email" value="{{$email}}"/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value="{{isset($footer1->label_link) ? $footer1->label_link : '' }}"/>
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
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link Label" value="{{isset($footer1->link) ? $footer1->link : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="footer_1_section_1" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF FOOTER 1 SECTION 1 -->
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Footer 1 Block 2</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer.section1')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="caption">Heading Text</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="heading_text" name="heading_text" class="form-control" placeholder="Heading Text" value="{{isset($footerb2->heading1) ? $footerb2->heading1 : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >Sub Text</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            		<textarea name="subheading" rows="5" cols="60" class="form-control">{{isset($footerb2->subheading) ? $footerb2->subheading : '' }}</textarea>
                                                <!-- <input type="text" id="email" name="email" class="form-control" placeholder="Enter Footer Email" value="{{$email}}"/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value="{{isset($footerb2->label_link) ? $footerb2->label_link : '' }}"/>
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
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link Label" value="{{isset($footerb2->link) ? $footerb2->link : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="footer_1_section_2" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF FOOTER 2 SECTION 1 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Footer 2 Block 1</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer.section2')}}">
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
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link Label" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="footer_2_section_1" />
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
			                		@foreach($footer2b1list as $itm)
			                		<tr>
			                			<td>{{$itm->label_link}}</td>
			                		   <td>{{$itm->link}}</td>
			                		   <td><a href="{{route('admin.cms.foooter2.delete', $itm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a></td>
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
                            <h2>Footer 2 Block 2</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer.section2')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value="{{isset($footer2b2->label_link) ? $footer2b2->label_link : '' }}"/>
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
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link Label" value="{{isset($footer2b2->link) ? $footer2b2->link : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="footer_2_section_2" />
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
			                		@foreach($footer2b2list as $itm)
			                		<tr>
			                			<td>{{$itm->label_link}}</td>
			                		   <td>{{$itm->link}}</td>
			                		   <td><a href="{{route('admin.cms.foooter2.delete', $itm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a></td>
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
                            <h2>Footer 2 Block 3 (Driver Application Requirements by State)</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer.section2')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Link Label</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="label_link" name="label_link" class="form-control" placeholder="Enter Link Label" value="{{isset($footer2b2->label_link) ? $footer2b2->label_link : '' }}"/>
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
                                                <input type="text" id="link" name="link" class="form-control" placeholder="Enter Link Label" value="{{isset($footer2b2->link) ? $footer2b2->link : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                                <input type="hidden" name="section_name" value="footer_2_section_3" />
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
			                		@foreach($footer2b3list as $itm)
			                		<tr>
			                			<td>{{$itm->label_link}}</td>
			                		   <td>{{$itm->link}}</td>
			                		   <td><a href="{{route('admin.cms.foooter2.delete', $itm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a></td>
			                		</tr>
			                		@endforeach
		                		 </tbody>
		                	</table>
                    </div>
                </div>
            </div>
            <!-- END OF FOOTER 2 SECTION 1 -->
                        
            <!-- App Links -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>App links / Images</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.cms.footer.applink')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Andriod App Link</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="andriod_app_link" name="andriod_app_link" class="form-control" placeholder="Enter Andriod App Link" value="{{isset($content->andriod_app_link) ? $content->andriod_app_link : ''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">IOS App Link</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="ios_app_link" name="ios_app_link" class="form-control" placeholder="Enter IOS App Link" value="{{isset($content->ios_app_link) ? $content->ios_app_link : ''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address"> CDN Andriod App image url</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cdn_andriod_app_image" name="cdn_andriod_app_image" class="form-control" placeholder="Enter CDN Andriod App image url" value="{{isset($content->cdn_andriod_app_image) ? $content->cdn_andriod_app_image : ''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address"> CDN IOS App image url</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cdn_ios_app_image" name="cdn_ios_app_image" class="form-control" placeholder="Enter CDN IOS App image url" value="{{isset($content->cdn_ios_app_image) ? $content->cdn_ios_app_image : ''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                  
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF App Links -->
            
                        
        </div>
    </section>

@endsection
