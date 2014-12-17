	<script src="<?php echo base_url_css;?>js/pwstrength.js"></script>
	<script type="text/javascript">
	jQury = jQuery.noConflict();
        jQury(document).ready(function () {
            "use strict";
            var options = {
                onKeyUp: function (evt) {
                    jQury(evt.target).pwstrength("outputErrorList");
                }
            };
            jQury(':password').pwstrength(options);
        });
    </script>

	<!-- content-section-starts -->
	<div class="content">
			
	<div class="register">
		<div class="container">
		 <span style="color:#CC0000"> <?php //echo validation_errors(); ?></span>
		  <br/><br/>
			  	<?php echo form_open("password/updatePass"); ?>

				 <div class="register-top-grid">
					<h3>EDIT PASSWORD <?php if(isset($error)){print_r($error); } ?></h3>
					 
					 <?php  if(isset($old_pass) && ($old_pass == false)){?>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Current Password 
						<label>*</label></span><?php echo form_error('old_password'); ?></span>
						<input type="text"  id="old_password" name="old_password" value="<?php echo set_value('old_password'); ?>" >
						<span id="old_password_verify" class="verify"></span>
					 </div>
					 <?php } ?>
					 
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>New Password
						<label>*</label><?php echo form_error('password'); ?></span>
						<input type="password" id="password" class="form-control"><span class="password-verdict"></span>

						<!--<input type="text" id="password" name="password" placeholder="New password" value="<?php//echo set_value('password');?>" > 
						<span id="password_verify" class="verify"></span>
					 
					 	<label for="exampleInputPassword1">Password</label>
						<input type="password" id="exampleInputPassword1" class="form-control" placeholder="Password">-->
						

					 </div>
					 
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						 <span>
						 <br /><br />
						 Confirm New Password 
					   <label>*</label></span><?php  echo form_error('conf_password'); ?></span>
						<input type="text" id="con_password" name="con_password" placeholder="Confirm password" value="<?php echo set_value('con_password');?>" > 
						 <span id="confrimpwd_verify" class="verify"></span>
				   </div>
					 
				    <div class="wow fadeInLeft" data-wow-delay="0.4s"></div> 
				
				<div class="clearfix"> </div>
				<div class="register-but">
				  <input type="hidden" name="user_id" value="<?php echo $msg['user_id']?>"/>  
					   <input type="submit" value="submit"></div>
					   <div class="clearfix"> </div>
				  
				</div>
				<?php echo form_close(); ?>
		   </div>
	     </div>
	   

		
<!-- content-section-ends -->
<script type="text/javascript">
$(document).ready(function(){
	
	$("#password").keyup(function(){
        
        if($("#con_password").val().length >= 0)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
                pwd=false;
                //register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
            }
        }
    });
    
    $("#con_password").keyup(function(){
        
        if($("#password").val().length >=0)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
                pwd=false;
                //register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });

            }
        }
    });
});

	
</script>

