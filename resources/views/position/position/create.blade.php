<!-- Add User Modal -->

<div class="modal fade" id="myUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h5 class="modal-title" id="myModalLabel" style="margin-right: 200px">New Position</h4>

        </div>

        <div class="modal-body">

            <form role="form"   method="POST" action="{{ url('/position/create') }}">

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label for="exampleInputtext1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                            <small class="text-muted">
                            
                            </small>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea rows="4" cols="20" name="description" placeholder="Description">
                               
                            </textarea>
                            <small class="text-muted">
                                
                            </small>
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Election</label>
                            <select class="selectpicker" multiple data-max-options="10" name="election_id" data-live-search="true">
                                @foreach($election as $elections)
                                <option value="{{$elections->id}}">{{$elections->name}}</option>
                                @endforeach
                                
                            </select>
                            <small class="text-muted">
                            
                            </small>
                        </fieldset>
                    </div>
                    
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-info">Create Position</button>

                    </div>
                    
                
                </div>

            </form>

        </div>

    </div>

</div>

</div>

<!-- End Add User Modal -->



<div class="row" style="margin: 10px">

<button class="btn btn-custom" data-toggle="modal" data-target="#myUser"><i class="fa fa-fw fa-plus"></i>New Position</button>

<br>

</div>