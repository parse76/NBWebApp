@extends('layout/default')

{{-- Page title --}}
@section('title')
    Reports
    @parent
@stop

@section('header_styles')
    <!--page level css -->
    <!--end of page level css-->
@stop


@section('content')
<div id="page-wrapper" style="min-height: 414px;">
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Announcement
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ URL::to('dashboard') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Announcement
                </li>
            </ol>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
        <h4>Recently Announced</h4>
        <a href="{{ URL::to('addAnnouncement') }}" class="btn btn-xs btn-success">Create New Announcement</a>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>Created At</th>
                    <th>Title</th>
                    <th>Descriotion</th>
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

            <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                    <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>



<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

</div>

@stop

    {{-- page level scripts --}}
    @section('footer_scripts')

@stop