@extends('layouts.master')
@section('styles')
     <!-- DataTables -->
    <link href="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
    <link href="{{asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('title')
    Election
@stop
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    
    $( document ).ready(function() {
        $("#first").click(function(){
            var page = 1
            var setstorage = localStorage.setItem("page", page);
            $("#storage1").val(page);
            console.log(page);
        });
    });

    $( document ).ready(function() {
        $("#next").click(function(){
            //localStorage.removeItem("page");
            var checkStorage = localStorage.getItem('page');
            var setstorage = localStorage.setItem("page", parseInt(checkStorage)+1);
            var getStorage = localStorage.getItem('page');
            $("#storage3").val(getStorage);
            console.log(getStorage);
        });
    });
    $( document ).ready(function() {
        $("#prev").click(function(){
            //localStorage.removeItem("page");
            var checkStorage = localStorage.getItem('page');
            var setstorage = localStorage.setItem("page", parseInt(checkStorage)-1);
            var getStorage = localStorage.getItem('page');
            $("#storage2").val(getStorage);
            console.log(getStorage);
        });
    });</script>

            <div class="container-fluid">
                
                <!-- Page-Title -->
                <div class="row">
                
                    <div class="col-sm-3">

                         @include('position.position.create')

                    </div>

                    <div class="col-sm-3" style="margin-left: -200px;">

                        <form role="form" method="POST" action="{{url('/position/')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="q" value="1">

                            <input  id="storage2" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="prev" type="submit" class="btn btn-info btn-small">Previous Page</button>

                            </div>

                        </form>

                    </div>

                    <div class="col-sm-3" style="margin-left: 50px;">

                        <form role="form"  method="POST" action="{{url('/position')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="q" value="1">

                            <input  id="storage1" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="first" type="submit" class="btn btn-info btn-small">First Page</button>

                            </div>

                        </form>

                        </div>

                    <div class="col-sm-3">

                        <form role="form" method="POST" action="{{url('/position/')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="q" value="1">

                            <input  id="storage3" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="next" type="submit" class="btn btn-info">Next Page</button>

                            </div>

                        </form>
                    </div>

                </div>
               
               @include('layouts.alerts')


                <div class="row">
                  
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                          
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Position Name</th>
                                    <th>Position Description</th>
                                    <th>Election Name</th>
                                    <th>Election Description</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($customers as $customer)  
                                
                                    <tr>
                                        <td>{{@$customer->name }}</td>
                                        <td>{{@$customer->description }}</td>
                                        <td> {{@$customer->delection_name }}</td>
                                        <td> {{@$customer->delection_description }}</td>
                                        @if(@$customer->status == 1)
                                            <td>Active</td>
                                        @else
                                            <td>Inactive</td>
                                        @endif
                                        <td>{{@$customer->created_at }}</td>
                                        <td>
                                            <a class="btn waves-effect waves-light btn-primary" href="{{url('position/view/details')}}?id={{$customer->id}}"> <i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>            

        </div> <!-- container -->
@stop
@section('scripts')
     <!-- Required datatable js -->
    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
           //Buttons examples
            var table = $('#datatable').DataTable({
            
               
            });

            table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
    </script>
@stop
