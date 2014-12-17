<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcomeProfessional/addSessContactBusiness",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>dashboardProfessional";
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
				<div class="ques">How can we contact you?<span id="services_verify" class="verify"></span></div>

					<div class="dropdown-button extend">           			
						
						
							<div class="ques">First Name</div>
							<div class="dropdown-button wow"><input type="text" name="first_name" value="" /></div>
							
							<div class="ques">Last Name</div>
							<div class="dropdown-button wow"><input type="text" name="last_name" value="" /></div>
							
							<div class="ques">Email</div>
							<div class="dropdown-button wow"><input type="text" name="email" value="" /></div>
							
							<div class="ques">Phone No</div>
							<div class="dropdown-button wow"><input type="text" name="phone_no" value="" />
							
							<span><input type="checkbox" name="notify" value="Yes" />Notify me by text message of new customer requests and messages</span></div>
								
								
							<div class="ques"><strong>Account protection</strong></div>
							<div class="dropdown-button wow">
							<span><input type="checkbox" name="create_password" value="Yes" onclick="document.getElementById('passwd').style.display='block'"/>Create a password to protect my account.(Optional)</span></div>
							
							<div id="passwd" style="display:none">
								<div class="ques">Password</div>
								<input type="text" name="password" value="" />
								</div>
							</div>
							
							</div>
						
						
					</div>
					

				  <input type="submit" name="submit" value="SignUp" />
   				<input type="button" name="Back" value="Back" onclick='window.location.href="<?php echo base_url()?>welcomeProfessional/descBusiness"' />
				<span>By clicking 'Sign Up', you are indicating that you have read and agreed to the terms of use.<br />
				Your carrier's message and data rates may apply to text messages. You are not required to agreed to  recieve text messages as a condition of using mydochub services.
				</span>
				<div class="col-md-6  wow bounceIn" data-wow-delay="0.4s"></div>
				
		</div>
		</div>
			</div>
		</form>
