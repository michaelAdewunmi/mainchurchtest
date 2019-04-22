
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

    $dbget = getDbInstance();
    $optionget = $dbget->get("reversal_options");

   
    $invoicenum = filter_input(INPUT_POST, 'reverse_id');
    $db = getDbInstance();
    $db->where('invoicenum', $invoicenum);
    $db->where('recusername', $_SESSION['username']);
    $row = $db->get("tb_payment");
    

    
}
?>
<div class="well text-left filter-form">
    <form class="form form-inline" action="">
    <div class="form-group">
        <label>Reason for reversal *</label>
           
            <select name="reversal_options" id="reversal_options" class="form-control selectpicker" onChange="reversal_option(this.value)" required>
                <option value=" ">Please select reason</option>
                <?php
                
                foreach ($optionget as $optiongetvalue) {
                    echo ' <option value="' . $optiongetvalue['OptionName'] . '">' . $optiongetvalue['OptionName'] . '</option>'; 
                     
                }
           
                ?>
            </select>
    </div>  

    <fieldset>
    <div class="form-group">
        <label for="memb_search">Search Member *</label>
            
          <input type="text" name="typeahead" id="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type your Search Query" onclick="member_split()" autofocus>

    </div> 
    <br>
    <hr class="style13">
    <div class="form-group">
    <label for="memb_id">Member ID:</label>
    <input type="text" class="form-control" id="memb_id" name="memb_id" value="<?php echo htmlspecialchars($row[0]['memid'])?>" readonly>
    </div>
    <div class="form-group">
    <label for="memb_name">Member Name:</label>
    <input type="text" class="form-control" id="memb_name" name="memb_name" value="<?php echo htmlspecialchars($row[0]['Name_member'])?>" readonly>
    </div>
    <div class="form-group">
    <label for="memb_band">Member Band:</label>
    <input type="text" class="form-control" id="memb_band" name="memb_band" value="<?php echo htmlspecialchars($row[0]['band_name'])?>" readonly>
    </div>
    <div class="form-group">
    <label for="memb_band">Member Branch:</label>
    <input type="text" class="form-control" id="memb_branch" name="memb_branch" value="<?php echo htmlspecialchars($row[0]['branch_name'])?>" readonly>
    </div>
    <input type="hidden" name="duration_hid" id = "duration_hid" value="<?php echo substr(htmlspecialchars($row[0]['payment_description']),10) ?>">
    <input type="hidden" name="receiptnum_hid" id = "receiptnum_hid" value="<?php echo htmlspecialchars($row[0]['invoicenum']) ?>">
   
    <input type="hidden" name="reversal_opts" id = "reversal_opts">
    
    <div class="form-group ">
  <label class="control-label " for="calendar">
   Tithe Period
  </label>
  <div class="input-group">
   <div class="input-group-addon">
	<i class="fa fa-calendar"></i> 
   </div>
   <input id ="duration" name="duration" type="text" value="<?php echo substr(htmlspecialchars($row[0]['payment_description']),10)?>"
       class="datepicker-here"
       data-language='en'
       data-min-view="months"
       data-view="months"
       data-date-format="MM yyyy"
       data-multiple-dates="999"
       data-multiple-dates-separator=", "
      required/>
 </div> 

 <div class="form-group">
  <div class="input-group">
  <label class="control-label " for="paymode">
   Mode of Payment
  </label>
  <select class="form-control" id="paymode" name="paymode" onchange="select_mode(this.value)" disabled>
  <option></option>
    <option>Cash</option>
    <option>Card</option>
   </select>
  </div>
 </div> 

 <div id="cashmode">
 


    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="1kchk" name="1kchk" onchange="k1deno()">
      <label class="custom-control-label" for="1kchk">N1,000.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;</label>
      <input class="form-control" id="1kqty" name="1kqty" type="number" value="" onchange="k1convert(this.value)" disabled>
      <input class="form-control" id="1kttl" name="1kttl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">
    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="5hchk" name="5hchk" onchange="h5deno()">
      <label class="custom-control-label" for="1kchk">N500.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="5hqty" name="5hqty" type="number" value="" onchange="h5convert(this.value)" disabled>
      <input class="form-control" id="5httl" name="5httl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="2hchk" name="2hchk" onchange="h2deno()">
      <label class="custom-control-label" for="1kchk">N200.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="2hqty" name="2hqty" type="number" value="" onchange="h2convert(this.value)" disabled>
      <input class="form-control" id="2httl" name="2httl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="1hchk" name="1hchk" onchange="h1deno()">
      <label class="custom-control-label" for="1kchk">N100.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="1hqty" name="1hqty" type="number" value="" onchange="h1convert(this.value)" disabled>
      <input class="form-control" id="1httl" name="1httl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="50chk" name="50chk" onchange="n50deno()">
      <label class="custom-control-label" for="50chk">N50.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="50qty" name="50qty" type="number" value="" onchange="n50convert(this.value)" disabled>
      <input class="form-control" id="50ttl" name="50ttl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="20chk" name="20chk" onchange="n20deno()">
      <label class="custom-control-label" for="50chk">N20.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="20qty" name="20qty" type="number" value="" onchange="n20convert(this.value)" disabled>
      <input class="form-control" id="20ttl" name="20ttl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="10chk" name="10chk" onchange="n10deno()">
      <label class="custom-control-label" for="50chk">N10.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="10qty" name="10qty" type="number" value="" onchange="n10convert(this.value)" disabled>
      <input class="form-control" id="10ttl" name="10ttl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

    <div class="custom-control custom-checkbox mb-3 form-inline">
      <input type="checkbox" class="custom-control-input" id="5chk" name="5chk" onchange="n5deno()">
      <label class="custom-control-label" for="50chk">N5.00</label>
      <label class="mr-sm-3" for="paymode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input class="form-control" id="5qty" name="5qty" type="number" value="" onchange="n5convert(this.value)" disabled>
      <input class="form-control" id="5ttl" name="5ttl" type="text" value="" onfocus="sum_up_values()" readonly>
    </div>
    <hr class="style13">

</div>

<div id="cardmode">

<div class="form-group">
  <label class="control-label " for="cardno">
   Enter Last Four(4) digits of the Card
  </label>
  <div class="input-group">
   <div class="input-group-addon">
	<i class="fa fa-credit-card"></i> 
   </div>
   <input class="form-control" id="cardno" name="cardno" type="text" value="" maxlength="4">
  </div>
 </div> 

</div>



 <div class="form-group">
  <label class="control-label " for="amountpaid">
   Amount Paid
  </label>
  <div class="input-group">
   <div class="input-group-addon">
	<i class="fa fa-money"></i> 
   </div>
   <input class="form-control" id="amountpaid" name="amountpaid" type="text" value="<?php echo htmlspecialchars($row[0]['Amount_Paid'])?>" readonly>
  </div>
 </div> 


 <button type="submit" id="reversalbtn" class="btn btn-primary mb-2"><i class='fa fa-undo'>&nbsp;</i>Reverse Transaction</button>
</fieldset>




 </form>
 </div>



