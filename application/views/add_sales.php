<script type="text/javascript">
    function startCalc() {
        interval = setInterval("calc()", 1);
    }
    function calc() {
        first_price = document.myForm.first_price.value;
        second_price = document.myForm.second_price.value;
        third_price = document.myForm.third_price.value;
        
        total_price = document.myForm.total_price.value;
        paid_amount = document.myForm.paid_amount.value;
        
        document.myForm.total_price.value = (first_price * 1) + (second_price * 1) + (third_price * 1);
        document.myForm.balance_amount.value = (total_price * 1) - (paid_amount * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Sales
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
                    New Sales
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('message');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_shop/save_sales" name="myForm" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Sales ID</label>
                            <input type="text" class="form-control" value="<?php echo $last_id->sales_id+1;?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name">
                        </div>
                        <div class="form-group">
                            <label>First Item</label>
                            <input type="text" name="first_item" class="form-control" placeholder="Enter First Item">
                        </div>
                        <div class="form-group">
                            <label>Second Item</label>
                            <input type="text" name="second_item" class="form-control" placeholder="Enter Second Item">
                        </div>
                        <div class="form-group">
                            <label>Third Item</label>
                            <input type="text" name="third_item" class="form-control" placeholder="Enter Third Item">
                        </div>
                        <div class="form-group">
                            <label>Total Price</label>
                            <input type="text" name="total_price" id="total_price" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Total Price">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" name="paid_amount" id="paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Paid Amount">
                        </div>
                        <div class="form-group">
                            <label>Warranty End Date</label>
                            <input type="text" name="warranty_end_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Sales Date</label>
                            <input type="text" name="sales_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                        </div>
                         <div class="form-group">
                            <label>Customer Mobile</label>
                            <input type="text" name="customer_mobile" class="form-control" placeholder="Enter Customer Name">
                        </div>
                        <div class="form-group">
                            <label>First Price</label>
                            <input type="text" name="first_price" id="first_price" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter First Price">
                        </div>
                        <div class="form-group">
                            <label>Second Price</label>
                            <input type="text" name="second_price" id="second_price" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Second Price">
                        </div>
                        <div class="form-group">
                            <label>Third Price</label>
                            <input type="text" name="third_price" id="third_price" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Third Price">
                        </div>
                        <div class="form-group">
                            <label>Balance Amount</label>
                            <input type="text" name="balance_amount" id="balance_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <input type="text" name="remark" class="form-control" placeholder="Enter Remark">
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>