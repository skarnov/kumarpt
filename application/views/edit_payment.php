<script type="text/javascript">
    function startCalc() {
        interval = setInterval("calc()", 1);
    }
    function calc() {
        charge = document.myForm.paid.value;
        balance = 100;
        document.myForm.balance.value = (balance * 1) - (charge * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Add Payment
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Payment
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
                    session_destroy();
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_admin/save_payment" name="myForm" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Shop ID</label>
                            <input type="text" name="shop_id" class="form-control" placeholder="Enter Shop ID">
                        </div>
                        <div class="form-group">
                            <label>Service Charge</label>
                            <input type="text" name="charge_per_month" id="charge" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="10">
                        </div>
                        <div class="form-group">
                            <label>Payment Date</label>
                            <input type="text" name="payment_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                        </div>   
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Shop Balance</label>
                            <input type="text" name="shop_balance" id="balance" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" name="paid" id="paid" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Paid Amount">
                        </div>
                        <div class="form-group">
                            <label>Payment of The Month</label>
                            <div class="form-group">
                                <select name="payment_of_the_month" class="form-control" tabindex="1">
                                    <option value="">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Execute</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>