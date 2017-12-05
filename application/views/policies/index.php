<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="header">
                        <h3>Policies</h3>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Policy</th>
                            <th>Plan Reference</th>
                            <th>Member Name</th>
                            <th>Investment House</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($policies as $policy): ?>
                            <tr>
                                <td><?= '<a href="'.base_url('Policies/details/').$policy->idPolicy.'">' . $policy->code . '</a>' ?></td>
                                <td><?= '<a href="'.base_url('Policies/details/').$policy->idPolicy.'">' . $policy->plan_reference . '</a>' ?></td>
                                <td><?= '<a href="'.base_url('Policies/details/').$policy->idPolicy.'">' . $policy->last_name . ', ' . $policy->first_name . '</a>' ?></td>
                                <td><?= '<a href="'.base_url('Policies/details/').$policy->idPolicy.'">' .  $policy->investment_house . '</a>' ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->
</div>
