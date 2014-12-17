<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcomeProfessional/addSessBusiness",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>welcomeProfessional/descBusiness";
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
				<div class="ques">Where do you do business?<span id="services_verify" class="verify"></span></div>

					<div class="dropdown-button extend">           			
						
						
						<div class="input-sm">
						<input type="checkbox" id="services" name="wbusiness[]" value="I travel" onclick="document.getElementByID('service_radius').style.display='block'">
						<text>I travel to my customers</text>
						</div>
						
						<div class="input-sm">
						<input type="checkbox" id="services" name="wbusiness[]" value="Client Travel" onclick="document.getElementByID('service_radius').style.display='block'">
						<text>My customers travel to me</text>
						</div>
						
						
						<div class="input-sm" id="service_radius">
						<select name="service_radius_miles">
						<option value="1">1 mile</option>
						<option value="2">2 miles</option>
						<option value="3">3 miles</option>
						<option value="4">4 miles</option>
						<option value="5">5 miles</option>
						<option value="10">10 miles</option>
						<option value="20">20 miles</option>
						<option value="30">30 miles</option>
						<option value="40">40 miles</option>
						<option value="50">50 miles</option>
						<option value="100">100 miles</option>
						</select>
						<text>My customers travel to me</text>
						</div>
					
						<div class="input-sm">
						<input type="checkbox" id="services" name="wbusiness[]" value="Electronic" onclick="document.getElementByID('service_radius').style.display='none'">
						<text>Neither (phone or Internet only)</text>
						</div>
						
						
					</div>
					

				  <input type="submit" name="submit" value="Submit" />
   				<input type="button" name="Back" value="Back" onclick='window.location.href="<?php echo base_url()?>welcomeProfessional/addLocation"' />

				<div class="col-md-6  wow bounceIn" data-wow-delay="0.4s"></div>
				
		</div>
		</div>
			</div>
		</form>
