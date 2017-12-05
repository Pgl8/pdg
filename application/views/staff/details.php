<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12" style="padding-bottom: 20px;">

            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="header">
                        <h3>Edit Staff</h3>
                    </div>

                    <form class="col-12 padded padded-bottom padded-la">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label>Name</label>
                                <input type="text" name="firstname" class="form-control" value="Client Name" required/>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="example@email.com" disabled/>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label>Status</label><br/>
                                <span class="label label-info">Invitation Sent</span>
                            </div>
                        </div>
                    </form>

                    <div class="col-12 header">
                        <h3>Policies <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#addProducts"><i class="fa fa-plus"></i> Add Policy</button></h3>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Policy</th>
                                    <th>Plan Reference</th>
                                    <th>Member Name</th>
                                    <th>Investment House</th>
                                    <th>Last Operation</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12345678</td>
                                    <td>The Calpe RBS No. 247</td>
                                    <td>Withrod, Martin Terence</td>
                                    <td>Old Mutual International</td>
                                    <td>27/07/2017</td>
                                    <td>
                                        <a href="#" title="Remove" class="text-danger">Remove</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row padded">
                            <div class="col-6">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>

                            </div>
                            <div class="col-6 text-right padded padded-top">
                                <a href="#" title="Remove User" class="text-danger"><i class="fa fa-trash"></i> Remove Staff</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Available Policies</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-xs-12 col-lg-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Policy</th>
                                                <th>Plan Reference</th>
                                                <th>Member Name</th>
                                                <th>Investment House</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12345678</td>
                                                <td>The Calpe RBS No. 247</td>
                                                <td>Withrod, Martin Terence</td>
                                                <td>Old Mutual International</td>
                                                <td><a title="Add Client" class="text-site1"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 padded padded-top">
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Done</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->


    </div> <!-- container -->