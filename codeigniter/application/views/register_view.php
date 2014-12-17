	<!-- content-section-starts -->
	<div class="content">
	<div class="main">
	   <div class="container">
		  <div class="register">
		 <span style="color:#CC0000"> <?php //echo validation_errors(); ?></span>
		  <br/><br/>
			  <?php echo form_open("register/registerUser"); ?>
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>First Name<label>*</label></span><?php echo form_error('firstname'); ?></span>
						<input type="text"  id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" >
						<span id="firstname_verify" class="verify"></span>
					 </div>
					 
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Last Name<label>*</label><?php echo form_error('lastname'); ?></span>
						<input type="text" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" > 
						<span id="lastname_verify" class="verify"></span>
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Email Address<label>*</label></span><?php echo form_error('email'); ?></span>
						 <input type="text" id="email_address" name="email" value="<?php echo set_value('email'); ?>" > 
						 <span id="email_verify" class="verify"></span>
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="newsletter" checked="" value="1" <?php echo set_checkbox('newsletter', '1'); ?>><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password<label>*</label><?php echo form_error('password'); ?></span>
								<input id="password" name="password" type="password"><span id="password_verify" class="verify"></span>
							 </div>
							 <div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Confirm Password<label>*</label><?php echo form_error('passconf'); ?></span>
								<input name="passconf" type="password" id="con_password"><span id="confrimpwd_verify" class="verify"></span>
							 </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">	
				<input type="text" name="user_type" value="C" />	  
					   <input type="submit" value="submit"></div>
					   <div class="clearfix"> </div>
				  
				</div>
				<?php echo form_close(); ?>
		   </div>
	     </div>
	    </div>

<div class="clearfix"></div>
		
	</div>
	<!-- content-section-ends -->
	<script type="text/javascript">
$(document).ready(function(){
	$("#email_address").keyup(function(){
		var email = $("#email_address").val();
		
        if(isValidEmailAddress(email))
        {
        
		$.ajax({
            type: "POST",
            url: "<?php echo base_url();?>register/check_email",
            data: "email="+$("#email_address").val(),
            success: function(msg){
                if(msg=="true")
                {
                    $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
                }
                else
			    {
                    $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
                }
            }
        });
		 
		}
        else 
		{
            $("#email_verify").css({ "background-image": "none" });
        }
    });
	
	$("#email_address").keyup(function(){
        var email = $("#email_address").val();
        
        if(email != 0)
        {
         
            if(isValidEmailAddress(email))
            {
               $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
               email_con=true;
               //register_show();
            } else {
               
                $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
            }
 
        }
        else {
            $("#email_verify").css({ "background-image": "none" });
        }

    });
	
	$("#firstname").keyup(function(){
        
		var lname = $("#firstname").val();
        
		if(!isAlphabaetical(lname))
		{
                $("#firstname_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		}
		else
		{
                $("#firstname_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		}
	});
	
	$("#lastname").keyup(function(){
        
		var lname = $("#lastname").val();
        
		if(!isAlphabaetical(lname))
		{
                $("#lastname_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		}
		else
		{
                $("#lastname_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		}
	});
	
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
function isValidEmailAddress(emailAddress) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(emailAddress);
	}
	
function isAlphabaetical(str)
{
 	var pattern = new RegExp( /^[a-z]+$/i);
	return pattern.test(str);
}	
</script>