

@extends('layouts.master')
@section('title')
    Customers
@stop
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        $("form").ready(function(){
            //localStorage.removeItem("page");
            var page = 1
            var checkStorage = localStorage.getItem('page');
            if (checkStorage == undefined || checkStorage == "") { 
                var setstorage = localStorage.setItem("page", page);
                var getStorage = localStorage.getItem('page');
                $("#storage").val(getStorage);
                console.log(page);
            }
            else if(checkStorage != undefined || checkStorage != "") {
                var setstorage = localStorage.setItem("page", parseInt(checkStorage)+1);
                var getStorage = localStorage.getItem('page');
                $("#storage").val(getStorage);
                console.log(getStorage);
            }
        });
        
    });</script>
            <div class="container">
                
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">More<span class="m-l-5"><i
                                    class="fa fa-list"></i></span></button>

                        </div>
                        <h4 class="page-title">Position</h4>
                    </div>
                </div>

                @include('layouts.alerts')
                <div class="row">
  
                    <div class="col-md-9">
                        <form method="POST" action="{{ url('/position/update') }}">
                            <div class="row">
                            
                                {{ csrf_field() }}
                                @foreach($customer as $customers)
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="name" value="{{$customers->name}}">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>
                                <input type="hidden" name="id" value="{{$customers->id}}">
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" name="lname" placeholder="decription" value="{{$customers->description}}">
                                        <small class="text-muted">
                                            
                                        </small>
                                    </fieldset>
                                </div>
                                @endforeach

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Election Name</label>
                                        <select class="selectpicker" multiple data-max-options="10" name="election_id" data-live-search="true">
                                            @foreach($election as $elections)
                                            <option value="{{$elections->id}}">{{$elections->name}}</option>
                                            @endforeach
                                            
                                        </select>
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
@stop