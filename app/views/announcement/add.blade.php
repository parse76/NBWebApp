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
            {{ Form::open(array('action' => array('AnnouncementController@submitAnnounce'), 'files' => true, 'class'=>'form-horizontal', 'id'=>'submitAnnounce')) }}
            <fieldset>

            <!-- Form Name -->
            <legend>Create New Announcement</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="title">Announce Title</label>
              <div class="col-md-4">
              <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required="">

              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="desc">Announce Description</label>
              <div class="col-md-4">
                <textarea class="form-control" id="desc" name="desc">Description</textarea>
              </div>
            </div>

            <!-- File Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="file">Attach image</label>
              <div class="col-md-4">
                <input id="file" name="file" class="input-file" type="file">
              </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="cancelbtn"></label>
              <div class="col-md-8">
                <button id="cancelbtn" name="cancelbtn" class="btn btn-danger">Cancel</button>
                <button id="announcebtn" name="announcebtn" class="btn btn-success">Announce</button>
              </div>
            </div>

            </fieldset>
            {{ Form::close() }}
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