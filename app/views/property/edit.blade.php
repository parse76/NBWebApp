@extends('layout/default')

{{-- Page title --}}
@section('title')
    Add New Property
    @parent
@stop

@section('header_styles')
    <!--page level css -->
    <!--end of page level css-->
    <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('assets/js/qrcode.min.js') }}" type="text/javascript"></script>
@stop


@section('content')

<div id="page-wrapper">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Property
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ URL::to('dashboard') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Property Detail
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {{ Form::open(array('action' => array('PropertyController@submitEditProperty'), 'files' => true, 'class'=>'form-horizontal', 'id'=>'editProperty')) }}
                {{ Form::hidden('id', $propertyObj[0]->getobjectId()) }}
                <fieldset>
                    <!-- Form Name -->
                    <legend>Property Details</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Property Name</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Property Name" class="form-control" name="property_name" value="{{$propertyObj[0]->get('name')}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Construction By</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Construction By" class="form-control" name="constuction_by" value="{{$propertyObj[0]->get('ownBy')}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Contact</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Contact" class="form-control" name="contact" value="{{$propertyObj[0]->get('contact')}}">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Email</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Email" class="form-control" name="email" value="{{$propertyObj[0]->get('email')}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Address</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Address" class="form-control" name="address" value="{{$propertyObj[0]->get('address')}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Province</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Province" class="form-control" name="province" value="{{$propertyObj[0]->get('province')}}">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Post Code" class="form-control" name="postcode" value="{{$propertyObj[0]->get('postcode')}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Country</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Country" class="form-control" name="country" value="{{$propertyObj[0]->get('country')}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Latitude</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Latitude" class="form-control" name="latitude" value="{{$propertyObj[0]->get('latitude')}}">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Longitude</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Longitude" class="form-control" name="logitude" value="{{$propertyObj[0]->get('logitude')}}">
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="textinput">QR Code</label>
                        <div class="col-sm-4">
                            <div id="qrcode"></div>
                            <script type="text/javascript">
                                    new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
                                </script>
                        </div>

                        <div>
                            <a class="btn btn-success" data-title="Edit" href="{{ url('properties') }}">Print QR Code</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="pull-right">
                                <a class="btn btn-danger" data-title="Edit" href="{{ url('properties') }}">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            {{ Form::close() }}
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div>

@stop

    {{-- page level scripts --}}
    @section('footer_scripts')



@stop