
	<!-- content-section-starts -->
	<div class="content">
    <div class="main">
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 
                
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			    <div class="col-md-6login login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>Welcome back to MyDocHub</h3>
				<p>If you have an account with us, please log in.</p>
				<p style="color:#FF0000"><?php if(isset($error)){ echo $error;} ?></p>
				<?php echo form_open("login/userLogin"); ?>
				  <div>
					<span>Email Address<label>*</label></span>
					<input type="text" name="email" id="email_address"> <?php echo form_error('email'); ?><span id="email_verify" class="verify">
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="text" name="password" id="password"> <?php echo form_error('password'); ?><span id="password_verify" class="verify">
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" value="Login">
			    <?php echo form_close(); ?>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>
		</div>
	<!-- content-section-ends -->
<script type="text/javascript">
$(document).ready(function(){
	$("#email_address").blur(function(){
		var email = $("#email_address").val();
		
        if(isValidEmailAddress(email))
        {
		        $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
		}
		else
		{
                $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
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
            } 
			else {
                $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
            }
 
        }
        else 
		{
            $("#email_verify").css({ "background-image": "none" });
        }

    });
	
	$("#password").keyup(function(){
			if($("#password").val().length == 0)
			{
                $("#password_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
                pwd=false;
            }
            else
			{
                $("#password_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
            }
    });
	
});
	
function isValidEmailAddress(emailAddress) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(emailAddress);
	}
	</script>	