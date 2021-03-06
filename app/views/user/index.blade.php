@extends('layout/default')

{{-- Page title --}}
@section('title')
    Users
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
                User
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ URL::to('dashboard') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> User
                </li>
            </ol>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
        <h4>Bootstrap Snipp for Datatable</h4>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th><input type="checkbox" id="checkall" /></th>
                    <th>User Avatar</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Details</th>
                </thead>
                <tbody>
                    @foreach($userArray as $obj)
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>
                                <div class="circle user-circle"><img src="{{$obj->get("avatar")->getURL()}}" style="width: inherit; height: inherit;"></div>
                            </td>
                            <td>{{$obj->get('firstname')}}</td>
                            <td>{{$obj->get('lastname')}}</td>
                            <td>{{$obj->get('email')}}, {{$obj->get('email')}}, {{$obj->get('email')}}</td>
                            <td>{{$obj->get('email')}}</td>
                            <td>{{$obj->get('email')}}</td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a class="btn btn-outline btn-primary btn-xs" data-title="Edit" data-target="#edit" href="{{ url('user/detail', $obj->getObjectId()) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                </p>
                            </td>
                            {{--<td>--}}
                                {{--<p data-placement="top" data-toggle="tooltip" title="Delete">--}}
                                    {{--<a class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" href="">--}}
                                        {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                    {{--</a>--}}
                                {{--</p>--}}
                            {{--</td>--}}
                        </tr>
                        @endforeach
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