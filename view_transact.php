<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
include_once 'includes/header.php';
include_once './includes/footer.php';
//Get Input data from query string

if(strlen(filter_input(INPUT_POST, 'view_id'))> 0)
{
$invoicenum = filter_input(INPUT_POST, 'view_id');
}
elseif (strlen(filter_input(INPUT_POST, 'view_id'))== 0)
{
    $invoicenum = base64_decode(filter_input(INPUT_GET, 'view_id'));
}

$route = filter_input(INPUT_GET, 'route');
if($route!=""){

$router =$route;
}
else
{
    $router ="view";
}


$db = getDbInstance();

	$db->where("invoicenum", $invoicenum);

	$row = $db->get('vw_tithe_payment');

    if ($db->count >= 1) {
        $ReceiptNumber = $row[0]['invoicenum'];
        $TranID = $row[0]['trans_id'];
        $PayerID = $row[0]['memid'];
        $Payer = $row[0]['Name_member'];
        $Branch = $row[0]['branch_name'];
        $Band = $row[0]['band_name'];
        $PayDescription = $row[0]['payment_description'];
        $PayMode = $row[0]['payment_mode'];
        $PayAmount = $row[0]['Amount_Paid'];
        $Cashier = $row[0]['recusername'];
        $Dem1000 =  $row[0]['Dem1000'];
        $Dem500 =  $row[0]['Dem500'];
        $Dem200 =  $row[0]['Dem200'];
        $Dem100 =  $row[0]['Dem100'];
        $Dem50 =  $row[0]['Dem50'];
        $Dem20 =  $row[0]['Dem20'];
        $Dem10 =  $row[0]['Dem10'];
        $Dem5 =  $row[0]['Dem5'];
        $CardNumber = $row[0]['TransactionCardNumber'];


   

// get columns for order filter


?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Transaction View</h1>
        </div>
    </div> 
        <div class="well text-left filter-form">
        <table class="table table-striped table-bordered table-condensed">
    <tbody>
        <tr>
          <th>Receipt Number</th>
            <td> <? echo htmlspecialchars($row[0]['invoicenum']);?> </td>
          	
        </tr>
        <tr>
          <th>TransactionID</th>
            <td><? echo htmlspecialchars($row[0]['trans_id']);?></td>
           
        </tr>
        <tr>
          <th>PayeeID</th>
            <td><? echo htmlspecialchars($row[0]['memid']);?></td>
            
        </tr>
        <tr>
          <th>Payee Name</th>
            <td><? echo htmlspecialchars($row[0]['Name_member']);?></td>
            
        </tr>
      <tr>
          <th>Payee Branch</th>
          	<td><? echo htmlspecialchars($row[0]['branch_name']);?></td>
            
        </tr>

        <tr>
          <th>Payee Band</th>
          	<td><? echo htmlspecialchars($row[0]['band_name']);?></td>
            
        </tr>
        <tr>
          <th>Payment Description</th>
          	<td><? echo htmlspecialchars($row[0]['payment_description']);?></td>
            
        </tr>

        <tr>
          <th>Payment Mode</th>
          	<td><? echo htmlspecialchars($row[0]['payment_mode']);?></td>
            
        </tr>

        <tr>
          <th>Amount Paid</th>
          	<td><? echo htmlspecialchars($row[0]['Amount_Paid']);?></td>
            
        </tr>
        <tr>
          <th>Cashier</th>
          	<td><? echo htmlspecialchars($row[0]['recusername']);?></td>
            
        </tr>

    </tbody>
</table>
<table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
               
                <th>1000</th>
                <th>500</th>
                <th>200</th>
                <th>100</th>
                <th>50</th>
                <th>20</th>
                <th>10</th>
                <th>5</th>
                <th>Card Number</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
	               
	                <td><?php echo htmlspecialchars($row[0]['Dem1000']); ?></td>
	                <td><?php echo htmlspecialchars($row[0]['Dem500']); ?></td>
	                <td><?php echo htmlspecialchars($row[0]['Dem200']); ?> </td>
                    <td><?php echo htmlspecialchars($row[0]['Dem100']); ?></td>
	                <td><?php echo htmlspecialchars($row[0]['Dem50']); ?></td>
	                <td><?php echo htmlspecialchars($row[0]['Dem20']); ?> </td>
                    <td><?php echo htmlspecialchars($row[0]['Dem10']); ?> </td>
                    <td><?php echo htmlspecialchars($row[0]['Dem5']); ?> </td>
                    <td><?php echo htmlspecialchars($row[0]['TransactionCardNumber']); ?> </td>
				
				</tr>

					
        </tbody>
    </table>
        </div>
    
        <a href="#" class="btn btn-primary" style="margin-right: 8px;" onclick="print()">Send to Printer <span class="glyphicon glyphicon-print"></span>
        <a href="tithe_receipt.php?intv=<?php echo base64_encode($row[0]['invoicenum']) ?>&route=<?php echo $router ?>" class="btn btn-primary" style="margin-right: 8px;">Send to POS <span class="glyphicon glyphicon-print"></span>
   
   

   


</div>

<?php  } ?>



