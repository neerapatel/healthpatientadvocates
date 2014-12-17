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
			
		
			<div class="ordering-form">
			<div class="container">
			<div class="order-form-head text-left wow bounceInLeft" data-wow-delay="0.4s">
				<h3>We will introduce you to advocates ready to help you out</h3>
						
				</div>
				<?php echo form_open("postproject/addProject"); ?>
				<div class="col-md-6 order-form-grids"  style="background:#fff">
					
					<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s">
						<h5>Tell us about your request for help</h5>
		              <div class="ques">What services you are interestd in ?<span id="services_verify" class="verify"></span></div>
								
					  <div class="dropdown-button extend">           			
            		
					  <!-- Build your select: -->
				<?php 
				//echo "<pre>"; print_r($postdata);echo "</pre>"; 
				if(isset($records)) : foreach($records['records'] as $row) :?>
                <?php 
				$check ='';
				if(isset($postdata) && count($postdata['services'])>0)
				{
					if(in_array($row->service_id,$postdata['services']))
					$check = "checked";
				}
				echo '<div class="input-sm">';
				echo '<input type="checkbox" id="services" name="services[]" value="'.$row->service_id.'" '.$check.'>';
				echo '<text>'.$row->service_name.'</text>';
				echo '</div>';?>
				<?php endforeach;?>
                <?php else :
                endif;
                ?><?php echo form_error('services'); ?>

   
					</div>
		              <div class="ques">The patient's gender is ?<span id="gender_verify" class="verify"></span></div>
					  
					   <div class="dropdown-button wow">           			
            			<input type="radio" name="gender" id="gender" value="Male" <?php echo set_radio('gender','Male')?>/>Male
						<input type="radio" name="gender" id="gender" value="Female" <?php echo set_radio('gender','Female')?>/>Female
						<?php echo form_error('gender'); ?> 
					</div>
					
					 <div class="ques">The patient's age is ?<span id="age_verify" class="verify"></span> </div>
					   <div class="dropdown-button wow">
					   <input type="text" name="age" id="age" value="<?php echo set_value('age'); ?>" /> 
					   <?php echo form_error('age'); ?>         			
					   </div>
					
					 <div class="ques">Please describe the problem you need to help to solve <span id="problem_desc_verify" class="verify"></span></div>
					   <div class="dropdown-button wow">
					   <textarea type="text" name="problem_desc" id="problem_desc" value="<?php echo set_value('problem_desc'); ?>" /></textarea>
					   <?php echo form_error('problem_desc'); ?>
					  <br /> Limit 250 words           			
					   </div>
					
					<div class="ques">How can an advocate help you solve this problem? <span id="advocate_help_desc_verify" class="verify"></span></div>
					   <div class="dropdown-button wow">
					   <textarea type="text" name="advocate_help_desc" id="advocate_help_desc" value="<?php echo set_value('advocate_help_desc'); ?>" /></textarea>
					   <span id="limit_words_adv"><?php echo form_error('advocate_help_desc'); ?></span>
					  <br /> Limit 250 words           			
					   </div>
					
					<div class="ques">When would you like the advocate to help you with this request. <span id="timings_verify" class="verify"></span></div>
					   <div class="dropdown-button wow">
					   <select name="timings" id="timings">
						   <option value="I am flexible" <?php echo set_select("timings","I am flexible")?>>I'm flexible</option>
						   <option value="In the next few days" <?php echo set_select("timings","In the next few days")?>>In the next few days</option>
						   <option value="As soon as possible" <?php echo set_select("timings","As soon as possible")?>>As soon as possible</option>
					   </select>
					   <?php echo form_error('timings'); ?>
					  </div>
					   
					   
					 <div class="ques">Patient's zip code? <span id="zipcode_verify" class="verify"></span></div>
					   <div class="dropdown-button wow">
					   <input type="text" name="zipcode" id="zipcode" value="<?php if(isset($postdata) && $postdata['zipcode']!=''){echo $postdata['zipcode'];} else echo set_value('zipcode')?>" />
					   <?php echo form_error('zipcode'); ?>          			
					   </div>

					 <div class="ques" style="height:85px;">Shortly you'll be introducted to interested and availble advoactes who will send you custom quotes based on your answers to the previous questions. <span id="notification_mode_verify" class="verify"></span></div>
					   
					   <div class="dropdown-button wow">
					   <input type="radio" name="notification_mode" id="notification_mode"  value="both"  onchange="called1();" <?php echo set_radio('notification_mode','both')?>/>I want quotes by email and text message <br />    
					    <input type="radio" name="notification_mode" id="notification_mode"  value="email" onchange="called();" <?php echo set_radio('notification_mode','email')?>/>I want quotes by email only <br /><br />
						
						<div id="email_div" style="display:none"><span id="email_verify" class="verify"></span>
						 Email Address<br /><input type="text" name="email" id="notification_mode_email" value="<?php if(isset($msg['user_email'])) echo $msg['user_email']; else echo set_value('email');?>" /><br /> 
						<?php echo form_error('notification_mode_email'); ?> 
						</div>
						<div id="phone_div" style="display:none"><span id="phone_verify" class="verify"></span>
						 Phone Number<br /><input type="text" name="phone" id="notification_mode_phone" value="<?php echo set_value('phone');?>" /> <br />
						 <?php echo form_error('notification_mode_phone'); ?> 
						</div>
					  </div>
						
					  <div class="dropdown-button wow"><span id="call_directly_verify" class="verify"></span>
						<input type="checkbox" name="call_directly" id="call_directly" value="Yes" <?php echo set_checkbox('call_directly', 'yes'); ?>/>Advocates can call me directly with	
						<?php echo form_error('call_directly'); ?>
					   </div>
					
					 <div class="ques">Full Name <span id="full_name_verify" class="verify"></span></div>
					   <div class="dropdown-button wow">
					   <input type="text" name="full_name"  id="full_name" value="<?php if(isset($msg['fullname'])) echo $msg['fullname']; else echo set_value('email');?>" />
					   <?php echo form_error('full_name'); ?>			
					   </div>
					
					<div class="wow swing animated" data-wow-delay= "0.4s">
					<input type="text" name="customer_id" value="<?php if(isset($msg['user_id'])) echo $msg['user_id']; else echo set_value('customer_id');?>">
					<input type="Submit" name="Submit" value="Send My Request">
					</div>
					
					<div class="note"><br /><br />I have read and agreed to the terms of use.<br />Your carriers messages and data rates may apply to text messages. You are not required to agree to recieve text message as a condition of using MyDocHub's service. <br />Call us at 407-555-1112 if you have any questions or concerns.<br /><br /></div>
					</div>
				</div>
				 <?php echo form_close(); ?>
				<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
					<img src="<?php echo base_url_css; ?>images/order.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#services").click(function(){
		  var fields = $("input[name='services[]']").serializeArray(); 
		  if (fields.length == 0) 
			$("#services_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		  else 
			$("#services_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		});

	$("#gender").change(function(){
		  var fields = $("input[name='gender']").serializeArray(); 
		  if (fields.length == 0) 
			$("#gender_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		  else 
			$("#gender_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		});

	$("#age").keyup(function(){
        
		var age = $("#age").val();
        
		if((age=='') || isNaN(age))
                $("#age_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
                $("#age_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
	});
	
	$("#problem_desc").keyup(function(){
        
		var problem_desc = $("#problem_desc").val();
        
		if(problem_desc=='')
                $("#problem_desc_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
                $("#problem_desc_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
	});

	$("#advocate_help_desc").keyup(function(){
        
		var problem_desc = $("#advocate_help_desc").val();
        
		if(problem_desc=='')
                $("#advocate_help_desc_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
                $("#advocate_help_desc_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
	});

	$("#timings").keyup(function(){
        
		var timings = $("#timings").val();
        
		if(timings=='')
                $("#timings_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
                $("#timings_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
	});
	
	$("#zipcode").keyup(function(){
        
		var zipcode = $("#zipcode").val();
        
		if(zipcode=='')
                $("#zipcode_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
                $("#zipcode_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
	});
	
	$("#notification_mode_both").keyup(function(){
        
		var notification_mode_verify = $("#notification_mode").val();
        
		if(notification_mode_verify =='')
            $("#notification_mode_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		else
		{
            $("#notification_mode_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		
			if(notification_mode_verify == 'email')
			{
					// email validation
					$("#notification_mode_email").keyup(function(){
						var email = $("#notification_mode_email").val();
						
						if(email != 0)
						{
							if(isValidEmailAddress(email))
							   $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
							else
							   $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
						}
						else 
						{
							  $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
						}
				
					});
				
				
				
			}
			else
			{
				// email+phone validation
				
					$("#notification_mode_email").keyup(function(){
						var email = $("#notification_mode_email").val();
						
						if(email != 0)
						{
							if(isValidEmailAddress(email))
							   $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" });
							else
							   $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
						}
						else 
						{
							  $("#email_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" });
						}
				
					});
						
				//phone validation
				
					$("#notification_mode_phone").keyup(function(){
        
							var phone = $("#notification_mode_phone").val();
							
							if((phone=='') || isNaN(phone))
									$("#phone_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
							else
									$("#phone_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
						});

			}		
		}
	});
	
	$("#full_name").keyup(function(){
        
		var full_name = $("#full_name").val();
        
		if(full_name=='')
		{
                $("#full_name_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		}
		else
		{
                $("#full_name_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		}
	});


});


function isValidEmailAddress(emailAddress) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(emailAddress);
	}
	


function called1()
{
document.getElementById('email_div').style.display = 'block';
document.getElementById('phone_div').style.display = 'block';
}


function called()
{
document.getElementById('email_div').style.display = 'block';
document.getElementById('phone_div').style.display = 'none';
}

</script>