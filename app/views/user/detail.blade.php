@extends('layout/default')

{{-- Page title --}}
@section('title')
    User's details
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
                                        {{count($userPostHistory)}}
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
                                    {{--<th class="col-md-2">Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop for postArray -->
                                     <?php
                                     for($numCount = 0; $numCount<count($userPostHistory); $numCount++)
                                     {
                                     ?>
                                     <tr>
                                         <td><input type="checkbox" id="postSelect" name="postSelect" class="flat-red"/></td>
                                         <td>
                                             <div class="col-lg-1">
                                                 <span data-localtime-format="yyyy/MM/dd HH:mm">{{date("Y-m-d H:i",$userPostHistory[$numCount]['timestamp'])}}</span>
                                             </div>
                                         </td>
                                         <td>
                                             <?php
                                             if ($userPostHistory[$numCount]['isPostWithImage']  == true)
                                             {
                                             ?>
                                             <div class="col-lg-12">
                                                 <div class="col-lg-6">
                                                     <br/>
                                                     <div class="row">
                                                         <img src="{{$userPostHistory[$numCount]['postImage']['postImage']->getURL('image')}}" alt="postImage" style="width: auto; height: auto;"/>
                                                     </div>
                                                     <br/>
                                                     <div class="row">
                                                         <div class="col-lg-4">
{{--                                                             <img src="{{$user->get('profileImage')->getURL()}}" alt="logo" style="width: 100px; height: 100px;"/>--}}
                                                         </div>
                                                         <div class="col-lg-8">
                                                             <label for="" style="display: inline-block;">{{$userPostHistory[$numCount]['postDescription']}}</label>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <br/>
                                             </div>
                                             <?php
                                             }
                                             else
                                             {
                                             ?>
                                             <div class="col-lg-12">
                                                 <div class="col-lg-8 nopadding">
                                                     <br/>
                                                     <div class="box-info">
                                                         <h4 class="nopadding" class="label label-default">{{$userPostHistory[$numCount]['postBy']}}</h4><br>
                                                         <label for="">{{$userPostHistory[$numCount]['postDescription']}}</label>
                                                     </div>
                                                 </div>
                                                 <div class="col-lg-4"></div>
                                             </div>
                                             <?php
                                             }
                                             ?>
                                         </td>
                                         {{--<td style="vertical-align: top;">--}}
                                             {{--<div class="btn-group btn-group-xs" style="margin-top: 20px;">--}}
                                                 {{--<button class="btn btn-responsive button-alignment btn-warning various deletePost" rel="{{url('post/delete', $userPostHistory[$numCount]['postId'])}}" style="background-color: #a1d600; border: 0px;">--}}
                                                     {{--Remove--}}
                                                 {{--</button>--}}
                                             {{--</div>--}}
                                         {{--</td>--}}
                                     </tr>
                                     <?php
                                     }
                                     ?>
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