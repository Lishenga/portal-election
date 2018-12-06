

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
                            <div class="dropdown-menu dropdown-menu-right">
                                 <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/customers/delete')}}?id={{$customer->id}}" onclick="alert('Are you sure you want to block {{@$customer->fname }} {{@$customer->lname }}?')">Delete</a>
                            </div>

                        </div>
                        <h4 class="page-title">User</h4>
                    </div>
                </div>

                @include('layouts.alerts')
                <div class="row">
  
                    <div class="col-md-9">
                        <form method="POST" action="{{ url('/users/update') }}">
                            <div class="row">
                            
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="{{$customer->fname}}">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>
                                <input type="hidden" name="id" value="{{$customer->id}}">
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Other Names</label>
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="{{$customer->lname}}">
                                        <small class="text-muted">
                                            
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" placeholder="First Name" value="{{$customer->email}}">
                                        <small class="text-muted">
                                        
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Phone number</label>
                                        <input type="number" class="form-control" placeholder="Enter Phone Number" name="msisdn" value="{{$customer->msisdn}}">
                                        <small class="text-muted"> 
                                        </small>
                                    </fieldset>
                                </div>
                                
                                <button type="submit" class="btn btn-block  btn-custom waves-effect waves-light active">Save</button>
                                
                            
                            </div>
                        </form>

                    </div>
                </div>
                <div class="row">
                    @if($token == null)
                        <div class="col-md-12">
                            <a href="{{url('user/createtoken')}}?id={{$customer->id}}"class="btn btn-block ">Create Token for user</button>
                        </div>
                    @else
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">User Token</label>
                                @foreach($token as $tokens)
                                <input type="number" class="form-control" placeholder="{{$tokens->token}}" name="token" value="{{$tokens->token}}" disabled>
                                @endforeach
                                <small class="text-muted"> 
                                </small>
                            </fieldset>
                        </div>
                    @endif
                </div>
            </div> <!-- container -->
@stop