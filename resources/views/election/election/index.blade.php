@extends('layouts.master')
@section('styles')
     <!-- DataTables -->
    <link href="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
    <link href="{{asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('title')
    Customers
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
            <div class="container" style="margin-top: 50px">

                @include('layouts.alerts')
                <div class="row">

                    <div class="col-sm-6" style='margin-bottom: 40px'>

                        <h4 class="page-title">Update {{$election->name}}</h4>

                    </div>

                    <div class="col-sm-6"  style='margin-bottom: 40px;'>

                        <form role="form" method="POST" action="{{ url('/election/check') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$election->id}}">

                            <input  id="storage2" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="prev" type="submit" class="btn btn-info btn-small">Check Election Results</button>

                            </div>

                        </form>

                    </div>
  
                    <div class="col-md-12">
                        <form method="POST" action="{{ url('/election/update') }}">
                            <div class="row">
                            
                                {{ csrf_field() }}
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$election->name}}">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>
                                <input type="hidden" name="id" value="{{$election->id}}">
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea rows="4" cols="40" name="description" placeholder="Description">
                                            {{$election->description}}
                                        </textarea>
                                        <small class="text-muted">
                                            
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Start Date</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="Date (27)" name="startdate" placeholder="Start Date">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">Start Month</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="Month (12)" name="startmonth" placeholder="Start Month">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">Start Year</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="Year (2018)" name="startyear" placeholder="Start Year">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">End Date</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="Date (27)" name="enddate" placeholder="End Date">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">End Month</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="Month (12)" name="endmonth" placeholder="End Month">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">End Year</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="Year (2018)" name="endyear" placeholder="End Year">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label for="exampleInputtext1">Token Expiry Time (Hours)</label>
                                        <input type="number" class="form-control" placeholder="Token Expiry Time (Hours)" name="tokentime" value="{{$election->tokentime}}">
                                        <small class="text-muted"> 
                                        </small>
                                    </fieldset>
                                </div>
                                
                                <button type="submit" class="btn btn-block  btn-custom waves-effect waves-light active">Save</button>
                                
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- container -->

            <div class="container-fluid" style="margin-top: 100px">
                
                <!-- Page-Title -->
                <div class="row">
                
                    <div class="col-sm-3">

                         <h4 class="page-title">{{$election->name}} Positions</h4>

                    </div>

                    <div class="col-sm-3" style="margin-left: -200px;">

                        <form role="form" method="POST" action="{{url('/election/view/details/')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="q" value="1">

                            <input  id="storage2" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="prev" type="submit" class="btn btn-info btn-small">Previous Page</button>

                            </div>

                        </form>

                    </div>

                    <div class="col-sm-3" style="margin-left: 50px;">

                        <form role="form"  method="POST" action="{{url('/election/view/details/')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="q" value="1">

                            <input  id="storage1" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="first" type="submit" class="btn btn-info btn-small">First Page</button>

                            </div>

                        </form>

                        </div>

                    <div class="col-sm-3">

                        <form role="form" method="POST" action="{{url('/election/view/details/')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="q" value="1">

                            <input  id="storage3" type="hidden" name="page">

                            <div class="modal-footer form-group">

                                <button id="next" type="submit" class="btn btn-info">Next Page</button>

                            </div>

                        </form>
                    </div>

                </div>

                <div class="row">
                  
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                          
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($customers as $customer)  
                                
                                    <tr>
                                        <td>{{@$customer->name }}</td>
                                        <td>{{@$customer->description }}</td>

                                        @if(@$customer->status == 1)
                                            <td>Active</td>
                                        @else
                                            <td>Inactive</td>
                                        @endif
                                        <td>{{@$customer->created_at }}</td>
                                        <td>
                                            <a class="btn waves-effect waves-light btn-primary" href="{{url('customers/view/details')}}?id={{$customer->id}}"> <i class="fa fa-pencil"></i></a>
                                            <a href="{{url('/customers/delete')}}?id={{$customer->id}}" onclick="alert('Are you sure you want to block {{@$customer->name }}?')" class="btn waves-effect waves-light btn-danger"> <i class="fa fa-remove"></i> </a>
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
