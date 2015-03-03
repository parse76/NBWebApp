@extends('layout/default')

{{-- Page title --}}
@section('title')
    Add New Property
    @parent
@stop

@section('header_styles')
    <!--page level css -->
    <!--end of page level css-->
@stop


@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {{ Form::open(array('action' => array('PropertyController@submitNewProperty'), 'files' => true, 'class'=>'form-horizontal', 'id'=>'addNewProperty')) }}
                <fieldset>
                    <!-- Form Name -->
                    <legend>Property Details</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Property Name</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Property Name" class="form-control" name="property_name">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Construction By</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Construction By" class="form-control" name="constuction_by">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Address</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Address" class="form-control" name="address">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Province</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Province" class="form-control" name="province">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Post Code" class="form-control" name="postcode">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Country</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Country" class="form-control" name="country">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Latitude</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Latitude" class="form-control" name="latitude">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Longitude</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Longitude" class="form-control" name="logitude">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="pull-right">
                                <button type="button" class="btn btn-danger">Cancel</button>
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