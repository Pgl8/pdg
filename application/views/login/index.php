<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <?php echo isset($error) ? $error : ''; ?>
        <div class="account-bg">
            <div class="card-box mb-0">
                <div class="m-t-10 p-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h4>
                        </div>
                    </div>
                    <form class="m-t-20" action="<?= base_url(); ?>login/auth" method="post" data-parsley-validate>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" name="username" placeholder="Username" class="form-control" parsley-trigger="change" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" name="password" placeholder="Password" class="form-control" parsley-trigger="change" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</body>