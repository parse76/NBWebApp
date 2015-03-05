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
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User Details
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ URL::to('dashboard') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> User Details
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">User Profile</a></li>
                        <li><a href="#activity" data-toggle="tab">User Activities</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile">
                            <div class="col-md-6">
                                <div class="form-group clearfix">
                                    <label class="col-md-3 control-label">Name :</label>
                                    <div class="col-md-9">
                                        {{$user->get('firstname') . " " . $user->get('lastname')}}
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-md-3 control-label">Profile Photo :</label>
                                    <div class="col-md-9">
                                        {{--<img src="{{{ ($user->get('profileImage') != null) ? $user->get('profileImage')->getURL() : asset('assets/img/bottle.png')}}}" alt="logo" style="width: auto; height:90px;"/>--}}
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-md-3 control-label">User Description :</label>
                                    <div class="col-md-9">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consectetur, debitis delectus dolore dolores ea earum eius, incidunt natus odit optio perspiciatis quisquam quo quos repellendus sapiente sed ut vel.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group clearfix">
                                    <label class="col-md-4 control-label">DOB :</label>
                                    <div class="col-md-8">
                                        {{--{{ date("Y/m/d", $user->get('firstname')) }}--}}
                                       {{$user->get('firstname')}}

                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-md-4 control-label">State :</label>
                                    <div class="col-md-8">
                                       {{$user->get('firstname')}}
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-md-4 control-label">Gender :</label>
                                    <div class="col-md-8">
                                        {{$user->get('firstname')}}
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-md-4 control-label">Email :</label>
                                    <div class="col-md-8">
                                        {{$user->get('firstname')}}
{{--                                        {{count($userPostHistory)}}--}}
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-md-4 control-label">Reset Password :</label>
                                    <div class="col-md-8">
                                        {{--<a href="" class="btn btn-round btn-default">Reset</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="activity">
                            <table class="table table-striped table-hover" id="post_item">
                                <thead>
                                <tr>
                                    <th class="col-md-1"><input type="checkbox" id="postSelect" name="postSelect" class="flat-red"/></th>
                                    <th class="col-md-2">Create At</th>
                                    <th class="col-md-2">Post</th>
                                    <th class="col-md-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            TEST
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

    {{-- page level scripts --}}
    @section('footer_scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

@stop