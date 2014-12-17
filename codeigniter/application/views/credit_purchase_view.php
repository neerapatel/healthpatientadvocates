        <script language="javascript">
            function sum() {
                var txtFirstNumberValue = document.getElementById('creditCount').value;
                var result = parseInt(txtFirstNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('amountPaid').value = result * 1.75;
                } else {
                    document.getElementById('amountPaid').value = 0;
                }
				document.getElementById('itemnumber').value = result;
            }

            function packageCal(fieldname,amt) {
                document.getElementById(fieldname).value = amt;
            }

</script>

<style type="text/css">
.pack-top {     -webkit-border-radius:6px;
    -moz-border-radius:6px;
	border-top-left-radius:6px;
	border-top-right-radius:6px;
	background-color:#5BBD50; height:30px; 
	}

.offer { height:250px; width:250px}
</style>

	<!-- content-section-starts -->
	<div class="content">
			
<div class="special-offers-section">
			<div class="container">
				<div class="special-offers-section-head text-center dotted-line">
					<h4>Credit Packages</h4>
				</div>
				<div class="special-offers-section-grids">
				 <div class="m_3"><span class="middle-dotted-line"> </span> </div>
				   <div class="container">
					  <ul class="ch-grid" style="margin-left:15px;">
						<li><div class="pack-top"></div>
							<div class="offer">
								<div class="offer-image"><input type="radio" name="package" value="3_credit" style="margin-top:10px;" checked="checked"  /></div>
								<div class="offer-text">
									<h2>3 Credits ($5.25) </h2>
									<p>$1.75/lead</p>
									<?php echo form_open("dashboardProfessional/payAmount"); ?>
									<input type="hidden" name="itemname" id="itemname" value="3 Credits ($5.25) @ $1.75/lead" /> 
									<input type="hidden" name="itemnumber" value="3" /> 
									<input type="hidden" name="itemdesc" value="3 Credits Package for ($5.25) @ $1.75/lead." /> 
									<input type="hidden" name="itemprice" value="5.25" />
									 
									<input type="Submit" name="Submit" value="Buy Now">
									<?php echo form_close(); ?>

								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li><div class="pack-top"></div>
							<div class="offer">
								<div class="offer-image"><input type="radio" name="package" value="12_credit" style="margin-top:10px;" /></div>
								<div class="offer-text">
									<h2>12 Credits ($19.99)</h2>
									<p>$1.67/lead</p>
									<?php echo form_open("dashboardProfessional/payAmount"); ?>

									<input type="hidden" name="itemname" id="itemname" value="12 Credits ($19.99) @ $1.67/lead" /> 
									<input type="hidden" name="itemnumber" value="12" /> 
									<input type="hidden" name="itemdesc" value="12 Credits Package for ($19.99) @ $1.67/lead." /> 
									<input type="hidden" id="itemprice" name="itemprice" value="19.99" />

									<input type="Submit" name="Submit" value="Buy Now">
									<?php echo form_close(); ?>

								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li><div class="pack-top"></div>
							<div class="offer">
								<div class="offer-image"><input type="radio" name="package" value="24_credit" style="margin-top:10px;" /></div>
								<div class="offer-text">
									<h2>24 Credits ($35.99)</h2>
									<p>$1.50/lead</p>
									<?php echo form_open("dashboardProfessional/payAmount"); ?>

									<input type="hidden" name="itemname" id="itemname" value="24 Credits ($35.99) @ $1.50/lead" /> 
									<input type="hidden" name="itemnumber" value="24" /> 
									<input type="hidden" name="itemdesc" value="24 Credits Package for ($35.99) @ $1.50/lead." /> 
									<input type="hidden" id="itemprice" name="itemprice" value="35.99" />

									<input type="Submit" name="Submit" value="Buy Now">
									<?php echo form_close(); ?>

								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li><div class="pack-top"></div>
							<div class="offer">
								<div class="offer-image"><input type="radio" name="package" value="24_credit" style="margin-top:10px;" /></div>
								<div class="offer-text-buy">
									<?php echo form_open("dashboardProfessional/payAmount"); ?>
									<h2>Custom</h2>
									<p>$1.75/lead</p>
									Enter Credit Count to Purchase(@1.75/credit)
									

									<input id="creditCount" name="creditCount" type="text" onKeyUp="sum()" size="5"  required>
									
									<input type="hidden" name="itemname" id="itemname" value="Custom Credits @ $1.75/lead" /> 
									<input type="hidden" name="itemnumber" id="itemnumber" value="" /> 
									<input type="hidden" name="itemdesc" value="Custom Credits @ $1.75/lead" /> 
									
									<br /><br />Amount to be paid(in USD)
									<input type="text" id="amountPaid" name="itemprice" size="5" value="" />$
									<br />
									<input type="submit" name="submit" value="Buy Now">
									<?php echo form_close(); ?>
									
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						
					 </ul>
				</div>
			</div>
		</div>
		</div>		
			
