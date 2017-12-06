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
                <?php
                $attributes = array('method' => 'POST');
                echo form_open ('Staff/verifyStaff',$attributes);
                ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user[0]->username ?>" placeholder="Username" aria-label="Code" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="<?= $user[0]->firstname ?>" placeholder="First Name" aria-label="Reference" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="<?= $user[0]->lastname ?>" placeholder="Last Name" aria-label="Name" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $user[0]->email ?>" placeholder="Email" aria-label="Investment House" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input required type="password" name="password" class="form-control" value="" placeholder="Password" aria-label="Last Operation" aria-describedby="basic-addon1">
                    </div>
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                <?= form_close() ?>
            </div>
        </div>

    </div>
</div>

