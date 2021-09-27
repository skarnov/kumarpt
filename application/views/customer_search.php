<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Manage Customer
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Dashboard
                </li>
                <li class="active">
                    Manage Customer
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <form action="<?php echo base_url() ?>evis_shop/customer_search" method="POST">
                            <div class="input-group" style="margin-top: 4%;">
                                <input class="form-control" id="system-search" name="text" placeholder="Find Customers" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('message');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Member Since</th>
                        <th>Mobile</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($search_customer as $v_customer) {
                                ?>
                                <tr>
                                    <td><?php echo $v_customer->customer_name; ?></td>
                                    <td><?php echo $v_customer->customer_input_id; ?></td>
                                    <td><?php echo $v_customer->customer_registration_date; ?></td>
                                    <td><?php echo $v_customer->customer_mobile; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_shop/edit_customer/<?php echo $v_customer->customer_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Customer"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_shop/delete_customer/<?php echo $v_customer->customer_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Customer" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>