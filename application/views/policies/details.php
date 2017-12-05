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
                <div class="form-group">
                    <label>Policy Code</label>
                    <input readonly type="text" class="form-control" value="<?= $policy['code'] ?>" placeholder="Code" aria-label="Code" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label>Plan Reference</label>
                    <input readonly type="text" class="form-control" value="<?= $policy['plan_reference'] ?>" placeholder="Reference" aria-label="Reference" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input readonly type="text" class="form-control" value="<?= $policy['last_name'] . ', ' . $policy['first_name'] ;?>" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label>Investment House</label>
                    <input readonly type="text" class="form-control" value="<?= $policy['investment_house'] ?>" placeholder="INvestment House" aria-label="Investment House" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label>Last Operation</label>
                    <input readonly type="text" class="form-control" value="<?= date ("d-m-Y", strtotime($policy['last_operation'])) ?>" placeholder="Last Operation" aria-label="Last Operation" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

    </div>
</div>

