<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12" style="padding-bottom: 20px;">
                <div class="btn-group m-t-15">

                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="header">
                        <h3>Staff <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#sendInvitation"><i class="fa fa-plus"></i> Create Account</button></h3>
                    </div>

                    <table id="staffTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last Operation</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
<!--                        <tr>-->
<!--                            <td>Tiger Nixon</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Garrett Winters</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Airi Satou</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Brielle Williamson</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Herrod Chandler</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>-</td>-->
<!--                            <td><span class="label label-info">Invitation Sent</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Rhona Davidson</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Colleen Hurst</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>-</td>-->
<!--                            <td><span class="label label-info">Invitation Sent</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Sonya Frost</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Jena Gaines</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Quinn Flynn</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Charde Marshall</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Haley Kennedy</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>-</td>-->
<!--                            <td><span class="label label-info">Invitation Sent</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Tatyana Fitzpatrick</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Michael Silva</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Paul Byrd</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Gloria Little</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Bradley Greer</td>-->
<!--                            <td>email@example.com</td>-->
<!--                            <td>27/09/2017</td>-->
<!--                            <td><span class="label label-success">Active</span></td>-->
<!--                        </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="sendInvitation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send Invitation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <fieldset class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required/>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label>Email</label>
                                    <input type="email"  name="email" class="form-control" required/>
                                </fieldset>

                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane-o"></i> Send</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->
