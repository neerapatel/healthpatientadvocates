        <script language="javascript">
            function sum() {
                var txtFirstNumberValue = document.getElementById('creditCount').value;
                var result = parseInt(txtFirstNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('amountPaid').value = result * 1.75;
                } else {
                    document.getElementById('amountPaid').value = 0;
                }
            }

            function packageCal() {
                var selectedValue = document.getElementById("package").value;

                if (selectedValue == 0) {
                    document.getElementById('creditCount').value = 0;
                    document.getElementById('amountPaid').value = 0;
                }
                if (selectedValue == 1) {
                    document.getElementById('creditCount').value = 3;
                    document.getElementById('amountPaid').value = 5.25;
                }
                if (selectedValue == 2) {
                    document.getElementById('creditCount').value = 12;
                    document.getElementById('amountPaid').value = 19.99;
                }
                if (selectedValue == 3) {
                    document.getElementById('creditCount').value = 24;
                    document.getElementById('amountPaid').value = 35.99;
                }
                document.getElementById("itemprice").value = document.getElementById('amountPaid').value;
            }

            function verifySubmit() {
                var selectedValue = document.getElementById("package").value;
                var creditCount = document.getElementById('creditCount').value;
                var amountPaid = document.getElementById('amountPaid').value;
                if (selectedValue == 0) {
                    if (amountPaid != creditCount * 1.75) {
                        document.getElementById('creditCount').value = 0;
                        document.getElementById('amountPaid').value = 0;
                        return false;
                    }

                } else {
                    if (selectedValue == 1) {
                        if (amountPaid != 5.25) {
                            return false;
                        }
                    }
                    if (selectedValue == 2) {
                        if (amountPaid != 19.99) {
                            return false;
                        }
                    }
                    if (selectedValue == 3) {
                        if (amountPaid != 35.99) {
                            return false;
                        }
                    }
                }
                return true;

            }


        </script>
 <style type="text/css">
 .dropdown-button { margin:20px;}
 </style>       
		<!-- content-section-starts -->
	<div class="content" style="background-color:#f1f1f1;">
			
		<div class="ordering-form">
			<div class="container">
			<div class="col-md-6 order-form-grids">

<?php echo form_open("dashboardProfessional/payAmount"); ?>
        <h1>Purchase Credit Balance</h1>
        <div align="right" class="dropdown-button wow">Credit Availabel:<?= $creditBal; ?></div>

        <div class="dropdown-button wow">Please select the package</div> 
         <div class="dropdown-button wow">  
		  <select id="package" name="package" onChange="packageCal()">
                <option value=0>choose packages</option>
                <option value=1>3 Credits ($5.25)</option>
                <option value=2>12 credits ($19.99)</option>
                <option value=3>24 credits ($35.99)</option>
            </select>
        </div> 

        <div class="dropdown-button wow">Please select the package</div> 
         <div class="dropdown-button wow">  
		  <select id="package" name="package" onChange="packageCal()">
                <option value=0>choose packages</option>
                <option value=1>3 Credits ($5.25)</option>
                <option value=2>12 credits ($19.99)</option>
                <option value=3>24 credits ($35.99)</option>
            </select>
        </div> 

        <div class="dropdown-button wow">Enter Credit Count to Purchase(@ @1.75/credit)</div>
		<div class="dropdown-button wow"><input id="creditCount" name="creditCount" type="text" onKeyUp="sum()" required> </div>
            
		<div class="dropdown-button wow">Amout Need to pay:(in USD)</div>
        <div class="dropdown-button wow"><input id="amountPaid" name="amountPaid" type="text" value="12">$</div>
        
		<div class="dropdown-button wow">
        <input type="hidden" name="itemname" value="Nikon COOLPIX" /> 
        <input type="hidden" name="itemnumber" value="20000" /> 
        <input type="hidden" name="itemdesc" value="Nikon Coolpix S9050 26355 digital camera capture vibrant photos up to 12.1 megapixels." /> 
        <input type="hidden" id="itemprice" name="itemprice" value="" />
        <input type="submit" value="Pay Now">
		</div>
		
<?php echo form_close(); ?>
       </div>
	   </div>	   </div>