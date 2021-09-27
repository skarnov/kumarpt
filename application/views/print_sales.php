<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=250,height=780');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
<div id="divToPrint">
    <div style="font-family: Times New Roman; width: 260px; height: 780px; margin-left:-2px; font-size: 10px;">
        <div id="logo"><img src="<?php echo base_url() ?>img/print.jpg" width="250" height="50" alt="lop"></div>
        <table>
            <tr>
                <td  width="116" height="20"><h6>Fatura No: </h6></td>
                <td  width="34" ><h4>#<?php echo $print_info->sales_id; ?></h4></td>
                <td  width="10" align="left">&nbsp;</td>
                <td  width="83"><h6>&nbsp; <?php echo $print_info->sales_date; ?></h6></td>
            </tr>
        </table>
        <table style="border-collapse: collapse; width: 250px; font-size: 12px;">
            <tr>
                <td >Coust. Nome:</td>
                <td width="160"><?php echo $print_info->customer_name; ?>
            </tr>
            <tr>
                <td>Contaco: </td>
                <td><?php echo $print_info->customer_mobile; ?>
            </tr>
        </table>
        <table style="border-collapse: collapse; border: 1px solid black; width: 250px; font-size: 12px;">
            <tr>
                <th width="153" style="border: 1px solid black;">Descricao</th>
                <th width="40" style="border: 1px solid black;">Qtde</th>
                <th width="61" style="border: 1px solid black;">Preco</th>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><?php echo $print_info->first_item; ?></td>
                <td style="border: 1px solid black;">1</td>
                <td style="border: 1px solid black;"><?php echo $print_info->first_price; ?></td>
            </tr>
            <tr class="alt">
                <td style="border: 1px solid black;"><?php echo $print_info->second_item; ?>&nbsp;</td>
                <td style="border: 1px solid black;">1</td>
                <td style="border: 1px solid black;"><?php echo $print_info->second_price; ?>&nbsp;</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><?php echo $print_info->third_item; ?>&nbsp;</td>
                <td style="border: 1px solid black;">1</td>
                <td style="border: 1px solid black;"><?php echo $print_info->third_price; ?>&nbsp;&nbsp;</td>
            </tr>
            <tr class="alt">
                <td colspan="2" align="right" style="border: 1px solid black;"><strong>Sub Total Inc. IVA:</strong></td>
                <td style="border: 1px solid black;"><strong><?php echo $print_info->total_price; ?>&nbsp;&nbsp;Euros</strong></td>
            </tr>
            <tr>
                <td colspan="2" align="right" style="border: 1px solid black;">Pay Preco :</td>
                <td style="border: 1px solid black;"><?php echo $print_info->paid_amount; ?>&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="right" style="border: 1px solid black;">Sinal : </td>
                <td style="border: 1px solid black;"><?php echo $print_info->balance_amount; ?>&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="right" style="border: 1px solid black;">Data do grantiya:</td>
                <td style="border: 1px solid black;"><?php echo $print_info->warranty_end_date; ?></td>
            </tr>
        </table>
        <table width="250px" border="0">
            <tr>
                <td width="250px"><h5>&nbsp; </h5></td>
            </tr>
        </table> 
        <p>&nbsp;</p>
        </p>
        <table width="270" border="0" id='divToPrint3'>
            <tr>

            </tr>
            <input type="hidden" name="id2" value="<?php echo $print_info->sales_id; ?>" />
        </table>
        <table width="260" border="0">
            <tr>
                <td width="112" height="73"><input type="button"  value="Print" class="btn btn-info" onClick="PrintDiv();" /></td>
                <td width="138"><a href="<?php echo base_url(); ?>evis_shop/manage_sales"><input type="button" value="Back" class="btn btn-info" /></td>
            </tr>
        </table>
        <p>&nbsp;</p>
    </div>
</div>