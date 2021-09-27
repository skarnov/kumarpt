<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Manage Repair
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
                    Repair
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <form action="<?php echo base_url() ?>evis_shop/repair_search" method="POST">
                            <div class="input-group" style="margin-top: 4%;">
                                <input class="form-control" id="system-search" name="text" placeholder="Find Repair" required>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Balance</th>
                            <th>Delivery</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($search_repair as $v_repair)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_repair->repair_id;?></td>
                                <td><?php echo $v_repair->customer_name;?></td>
                                <td><?php echo $v_repair->customer_mobile;?></td>
                                <td><?php echo $v_repair->item_name. $v_repair->model_no;?></td>
                                <td><?php echo $v_repair->total_price;?></td>
                                <td><?php echo $v_repair->paid_amount;?></td>
                                <td><?php echo $v_repair->balance_amount;?></td>
                                <td><?php echo $v_repair->delivery_date;?></td>
                                <td>
                                    <div style="color:green;">
                                        <?php
                                            if($v_repair->delivery_status=='1') {
                                                echo 'Delivered';
                                            }
                                        ?> 
                                        <div style="color:red;">    
                                            <?php
                                                if($v_repair->delivery_status==0) {
                                                    echo 'NOT';
                                                }
                                            ?>   
                                        </div>    
                                    </div>
                                </td>                              
                                <td>
                                    <a href="<?php echo base_url();?>evis_shop/print_repair/<?php echo $v_repair->repair_id;?>" class="btn btn-info" data-toggle="tooltip" title="Print Repair"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url();?>evis_shop/edit_repair/<?php echo $v_repair->repair_id;?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Repair"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url();?>evis_shop/delete_repair/<?php echo $v_repair->repair_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Repair" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                              <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>