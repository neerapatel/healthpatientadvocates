	<!-- content-section-starts -->
	<div class="content">
			
	<div class="register">
		<div class="container">
		 <span style="color:#CC0000"> <?php //echo validation_errors(); ?></span>
		  <br/><br/>
			  <?php echo form_open("account_edit/updateUser"); 
			  $name = explode(" ",$msg['fullname']);
			  $firstname = $name[0];
			  $lastname = $name[1];
			  $email = $msg['user_email'];
			  ?>
			  <script language="javascript">
			  //if(document.getElementById('firstname').value =="")
			  //document.getElementById('firstname').value = '<?php //echo $firstname?>';
			  </script>
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>First Name<label>*</label></span><?php echo form_error('firstname'); ?></span>
						<input type="text"  id="firstname" name="firstname" class="validate['required','alpha']" value="<?php if(set_value('firstname')){echo set_value('firstname'); }else{ echo $firstname;}?>" >
						<span id="firstname_verify" class="verify"></span>
					 </div>
					 
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Last Name<label>*</label><?php echo form_error('lastname'); ?></span>
						<input type="text" id="lastname" name="lastname"  class="validate['required','alpha']" value="<?php if(set_value('lastname')){ echo set_value('lastname'); } else{ echo $lastname;}?>" > 
						<span id="lastname_verify" class="verify"></span>
					 </div>
					 
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						 <span>Email Address<label>*</label></span><?php  echo form_error('email'); ?></span>
						<input type="text" id="email_address" name="email" value="<?php if(form_error('email')){echo set_value('email');} else {echo $email;} ?>" > 
						 <span id="email_verify" class="verify"></span>
					 </div>
					 
				    <div class="wow fadeInLeft" data-wow-delay="0.4s">
						 <span>Time zone<label>*</label></span><?php echo form_error('timezone'); ?></span><br />
						 <select name="timezone" id="timezone" style="margin-top:10px;">
						 	<option value="" >Choose Timezone</option>
						  	<option value="(UTC-4)" <?php echo set_select("timezone","(UTC-4)")?>>Atlantic Standard Time (AST) [Current Time : <?php echo gettime('-',4)?>] </option>
						 	<option value="(UTC-5)" <?php echo set_select("timezone","(UTC-5)")?>>Eastern Standard Time (EST) [Current Time : <?php echo gettime('-',5)?>]</option> 
						 	<option value="(UTC-6)" <?php echo set_select("timezone","(UTC-6)")?>>Central Standard Time (CST) [Current Time : <?php echo gettime('-',6)?>]</option> 
						 	<option value="(UTC-7)" <?php echo set_select("timezone","(UTC-7)")?>>Mountain Standard Time (MST) [Current Time : <?php echo gettime('-',7)?>]</option>
						 	<option value="(UTC-8)" <?php echo set_select("timezone","(UTC-8)")?>>Pacific Standard Time (PST) [Current Time : <?php echo gettime('-',8)?>]</option> 
						 	<option value="(UTC-9)" <?php echo set_select("timezone","(UTC-9)")?>>Alaskan Standard Time (AKST) [Current Time : <?php echo gettime('-',9)?>]</option> 
						 	<option value="(UTC-10)" <?php echo set_select("timezone","(UTC-10)")?>>Hawaii-Aleutian Standard Time (HST) [Current Time : <?php echo gettime('-',10)?>]</option>
						 	<option value="(UTC-11)" <?php echo set_select("timezone","(UTC-114)")?>>Samoa standard time (UTC-11) [Current Time : <?php echo gettime('-',11)?>]</option>
						 	<option value="(UTC+10)" <?php echo set_select("timezone","(UTC+10)")?>>Chamorro Standard Time (UTC+10) [Current Time : <?php echo gettime('+',10)?>]</option>
						 </select> 
						 <span id="timezone_verify" class="verify"></span>
					 </div> 
				
				<div class="clearfix"> </div>
				<div class="register-but">	
				<input type="hidden" name="user_id" value="<?php echo $msg['user_id']?>"/>  
				<input type="hidden" name="user_type" value="<?php echo $msg['user_type']?>"/>  
					   <input type="submit" value="submit"></div>
					   <div class="clearfix"> </div>
				  
				</div>
				<?php echo form_close(); ?>
		   </div>
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
	
	$("#password").keyup(function(){});
    
});

$("#timezone").change(function(){
       
		var timezone = $('input[name="timezone"]').val();
       
		//var timezone = $("#timezone").val();
        
		if(timezone=='')
                $("#timezone_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
                $("#timezone_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
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