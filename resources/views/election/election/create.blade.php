<!-- Add User Modal -->

<div class="modal fade" id="myUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h5 class="modal-title" id="myModalLabel" style="margin-right: 200px">New Election</h4>

        </div>

        <div class="modal-body">

            <form role="form"   method="POST" action="{{ url('/election/create') }}">

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
                            <input type="number" class="form-control" placeholder="Token Expiry Time (Hours)" name="tokentime">
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>
                    
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-info">Create Election</button>

                    </div>
                    
                
                </div>

            </form>

        </div>

    </div>

</div>

</div>

<!-- End Add User Modal -->



<div class="row" style="margin: 10px">

<button class="btn btn-custom" data-toggle="modal" data-target="#myUser"><i class="fa fa-fw fa-plus"></i>New Election</button>

<br>

</div>