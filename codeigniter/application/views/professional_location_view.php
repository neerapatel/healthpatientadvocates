<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcomeProfessional/addSessLocation",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>welcomeProfessional/addWhereBusiness";
						   }
                        }
                    });
                });
            });
</script>
<style type="text/css">
.spaninput {
border:none;
cursor:pointer; display:block;

}
.extend { width:100%;
border: 1px solid #999999;
  -moz-border-radius: 0.4em / 0.4em;
  -webkit-border-radius: 0.4em 0.4em;
  border-radius: 0.4em / 0.4em;
}
.input-sm{ font-size:12px;
line-height:1.2em;
min-height:40px;
background-image:url(<?php echo base_url_css?>/images/new.jpg); background-position:top; background-repeat:repeat-x;
}
@media (max-width: 767px){
.input-sm{ font-size:8.5px;}
}

.input-sm text{ display: block;  margin-left: 20px;
    margin-top: -16px;}
	
	.ques{padding-top:20px; padding-bottom:20px; height:50px; font-weight:bold;}
	.note {font-size:9px; color:#999999;line-height:2em;}
</style>
	<!-- content-section-starts -->
	<div class="content">
			
		<form name="form1" id="form1">

			<div class="ordering-form"  style="background:#fff">
			<div class="container" id="populate_form">
				<div class="order-form-head text-left wow bounceInLeft" data-wow-delay="0.4s">
					<h3>We will introduce you to advocates ready to help you out</h3>
				</div>
				
				<div class="col-md-6 order-form-grids">
				<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s">
					<div class="ques">Where are you located (Home/Business)?<span id="services_verify" class="verify"></span></div>
								
					<div class="dropdown-button extend">           			
            		
						
						<div class="input-sm" style="height:450px;">
						
							<div class="ques">Street Address</div>
							<div class="dropdown-button wow"><input type="text" name="street" value="" /></div>
							
							<div class="ques">Suite/apt</div>
							<div class="dropdown-button wow"><input type="text" name="suite" value="" /></div>
							
							<div class="ques">City</div>
							<div class="dropdown-button wow"><input type="text" name="city" value="" /></div>
							
							<div class="ques">State</div>
							<div class="dropdown-button wow"><input type="text" name="state" value="" /></div>
							
							<div class="ques">Zipcode</div>
							<div class="dropdown-button wow"><input type="text" name="zipcode" value="" /></div>
							
							<div class="ques">Privacy </div>
							<div class="dropdown-button wow">
							<input type="radio" name="privacy" value="restricted" />show only my city and state to customers<br />
							<input type="radio" name="privacy" value="full" />show my full address to customers
							</div>
							</div>
   
					</div>
				  <input type="submit" name="submit" value="Submit" />
   				<input type="button" name="Back" value="Back" onclick='window.location.href="<?php echo base_url()?>professionalProfile"' />
					
				</div>
				</div>

				<div class="col-md-6  wow bounceIn" data-wow-delay="0.4s"></div>
				
		</div>
		</div>
			</div>
		</form>
