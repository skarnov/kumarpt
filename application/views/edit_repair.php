<script type="text/javascript">
    function startCalc() {
        interval = setInterval("calc()", 1);
    }
    function calc() {
        total_price = document.myForm.total_price.value;
        paid_amount = document.myForm.paid_amount.value;
   
        document.myForm.balance_amount.value = (total_price * 1) - (paid_amount * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Update Repair
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
                    Update Repair
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
                <form action="<?php echo base_url() ?>evis_shop/update_repair" name="myForm" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" name="customer_id" class="form-control" value="<?php echo $repair_info->customer_id;?>">
                            <input type="hidden" name="repair_id" class="form-control" value="<?php echo $repair_info->repair_id;?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" value="<?php echo $repair_info->customer_name;?>">
                        </div>
                        <div class="form-group">
                            <label>Item Name</label>
                            <select name="item_name" class="form-control">
                                <option value="No Item">Select Item Name</option>
                                <option value="Nokia">Nokia</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Iphone">Iphone</option>
                                <option value="LG">LG</option>
                                <option value="HTC">HTC</option>
                                <option value="Alcatel">Alcatel</option>
                                <option value="ZTE">ZTE</option>
                                <option value="Motorola">Motorola</option>
                                <option value="Black Berry">Black Berry</option>
                                <option value="Sony">Sony</option>
                                <option value="Huawei">Huawei</option>
                                <option value="Wiko">Wiko</option>
                                <option value="MEO">MEO</option>
                                <option value="Vodaphone">Vodaphone</option>
                                <option value="Toshiba">Toshiba</option>
                                <option value="Asus">Asus</option>
                                <option value="Acer">Acer</option>
                                <option value="HP">HP</option>
                                <option value="Apple">Apple</option>
                                <option value="Siemens">Siemens</option>
                                <option value="Apple Tab">Apple Tab</option>
                                <option value="Dell">Dell</option>
                                <option value="Sony Vaio">Sony Vaio</option>
                                <option value="China Tab">China Tab</option>
                                <option value="14">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Problem</label>
                            <select name="problem" class="form-control">
                                <option value="">Select Problems</option>
                                <option value="Noa Lega">No Lega - Power</option>
                                <option value="agua no interior">Water Damage</option>
                                <option value="Desbloqueio">D. Block- Unlock</option>
                                <option value="Alteracoes Sim Try">Sim Try change</option>
                                <option value="Senha remove">Password remove</option>
                                <option value="Placa Problema ">Mother Board Problem</option>
                                <option value="Alteracoes Visor + ekra">Touch and display change</option>
                                <option value="Alteracoes Visor">Touch change</option>
                                <option value="Alteracoes Ekra">Display Change</option>
                                <option value="Não está carregando">Charging Problem and Port change</option>
                                <option value="Alteracoes do teclado">Keyboard Change </option>
                                <option value="Windows and Software">Windows and Software</option>
                                <option value="No display">No display </option>
                                <option value="Problema com o cartão VGA">VGA Card Problem </option>
                                <option value="mudancas de placas-mãe">Motherboard Change </option>
                                <option value="Alteracoes do coluna">Speaker Change</option>
                                <option value="Alteracoes de porta carregamentos"> Cherging Port</option>
                                <option value="RAM or HDD Problem">RAM or HDD Problem</option>
                                <option value="OtherOther">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>IMEI</label>
                            <input type="text" name="imei" class="form-control" value="<?php echo $repair_info->imei;?>">
                        </div>
                        <div class="form-group">
                            <label>Total Price</label>
                            <input type="text" name="total_price" id="total_price" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="<?php echo $repair_info->total_price;?>">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" name="paid_amount" id="paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="<?php echo $repair_info->paid_amount;?>">
                        </div>
                        <div class="form-group">
                            <label>Balance Amount</label>
                            <input type="text" name="balance_amount" id="balance_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="<?php echo $repair_info->balance_amount;?>">
                        </div>
                        <div class="form-group">
                            <label>From Where</label>
                            <input type="text" name="from_where" class="form-control" value="<?php echo $repair_info->from_where;?>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Receive Date</label>
                            <input type="text" name="receive_date" class="form-control" value="<?php echo $repair_info->receive_date;?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Mobile</label>
                            <input type="text" name="customer_mobile" class="form-control" value="<?php echo $repair_info->customer_mobile;?>">
                        </div>
                          <div class="form-group">
                            <label>Remark</label>
                            <input type="text" name="remark" class="form-control" value="<?php echo $repair_info->remark;?>">
                        </div>
                         <div class="form-group">
                            <label>Model No</label>
                            <input type="text" name="model_no" class="form-control" value="<?php echo $repair_info->model_no;?>">
                        </div>
                        <div class="form-group">
                            <label>Extra Problem</label>
                            <input type="text" name="extra_problem" class="form-control" value="<?php echo $repair_info->extra_problem;?>">
                        </div>
                        <div class="form-group">
                            <label>Battery Provide</label>
                            <select name="battery_provide" class="form-control">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Delivery Date</label>
                            <input type="text" name="delivery_date" class="form-control" value="<?php echo $repair_info->delivery_date;?>">
                        </div>
                        <div class="form-group">
                            <label>Delivery Status</label>
                            <select name="delivery_status" class="form-control">
                                <option value="">Select Problems</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>How Much</label>
                            <input type="text" name="how_much" class="form-control" value="<?php echo $repair_info->how_much;?>">
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['item_name'].value = '<?php echo $repair_info->item_name; ?>';
    document.forms['myForm'].elements['problem'].value = '<?php echo $repair_info->problem; ?>';
    document.forms['myForm'].elements['battery_provide'].value = '<?php echo $repair_info->battery_provide; ?>';
    document.forms['myForm'].elements['delivery_status'].value = '<?php echo $repair_info->delivery_status; ?>';
</script>