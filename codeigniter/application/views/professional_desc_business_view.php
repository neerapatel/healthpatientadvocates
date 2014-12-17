<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcomeProfessional/addSessDescBusiness",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>welcomeProfessional/contactBusiness";
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
						
						
							<div class="ques">Business Name</div>
							<div class="dropdown-button wow"><input type="text" name="business_name" value="" /><span>Business name or tiltle </span></div>
							
							<div class="ques">Website</div>
							<div class="dropdown-button wow"><input type="text" name="website" value="" /><span>optional</span></div>
							
							<div class="ques">Business Description</div>
							<div class="dropdown-button wow"><input type="text" name="desciption" value="" /><span>Tell customers what you do that makes you best</span></div>
							
						
						
					</div>
					

				  <input type="submit" name="submit" value="Submit" />
   				<input type="button" name="Back" value="Back" onclick='window.location.href="<?php echo base_url()?>welcomeProfessional/addWhereBusiness"' />

				<div class="col-md-6  wow bounceIn" data-wow-delay="0.4s"></div>
				
		</div>
		</div>
			</div>
		</form>
