	<!-- content-section-starts -->
	<div class="content">
			
		
			<div class="ordering-form">
			<div class="container">
			<div class="order-form-head text-left wow bounceInLeft" data-wow-delay="0.4s">
						<h3>We will introduce you to advocates ready to help you out</h3>
						
					</div>
					<?php echo form_open("postproject/addProject"); ?>
				<div class="col-md-6 order-form-grids" >
					
					<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s">
						<h5>Tell us about your request for help</h5>
		              <div class="ques">What services you are interested in ?<span id="services_verify" class="verify"></span></div>
								
								 <div class="dropdown-button extend">           			
            		
					  <!-- Build your select: -->
				<?php 
				//echo "<pre>"; print_r($records);echo "</pre>"; 
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
		              <div class="ques">The patient's gender is ?</div>
					  
					   <div class="dropdown-button wow">           			
            			<input type="radio" name="gender" id="gender" value="Male"  <?php echo set_radio('gender','Male')?>/>&nbsp;Male
						<input type="radio" name="gender" id="gender" value="Female"  <?php echo set_radio('gender','Female')?>/>&nbsp;Female&nbsp;&nbsp;<span id="gender_verify" class="verify"></span>
						<?php echo form_error('gender'); ?> 
					</div>
					
					 <div class="ques">The patient's age is ?</div>
					   <div class="dropdown-button wow age-class">
					   <input type="text" name="age" id="age" value="<?php echo set_value('age'); ?>" /> <span id="age_verify" class="verify"></span>
					   <?php echo form_error('age'); ?>          			
					   </div>
					
					 <div class="ques">Please describe the problem you need to help to solve</div>
					   <div class="dropdown-button wow age-class">
					   <textarea type="text" name="problem_desc" id="problem_desc" value="<?php echo set_value('problem_desc'); ?>" /></textarea><span id="problem_desc_verify" class="verify"></span>
					   <?php echo form_error('problem_desc'); ?>
					  <br /> Limit 250 words           			
					   </div>
					
					<div class="ques">How can an advocate help you solve this problem?</div>
					   <div class="dropdown-button wow age-class">
					   <textarea type="text" name="advocate_help_desc" id="advocate_help_desc" value="<?php echo set_value('advocate_help_desc'); ?>" /></textarea><span id="advocate_help_desc_verify" class="verify"></span>
					   <span id="limit_words_adv"><?php echo form_error('advocate_help_desc'); ?></span>
					  <br /> Limit 250 words           			
					   </div>
					
					<div class="ques">When would you like the advocate to help you with this request.</div>
					   <div class="dropdown-button wow age-class">
					   <select name="timings" id="timings">
						   <option value="I am flexible" <?php echo set_select("timings","I am flexible")?>>I'm flexible</option>
						   <option value="In the next few days" <?php echo set_select("timings","In the next few days")?>>In the next few days</option>
						   <option value="As soon as possible" <?php echo set_select("timings","As soon as possible")?>>As soon as possible</option>
					   </select><span id="timings_verify" class="verify"></span>
					   <?php echo form_error('timings'); ?>
					  </div>
					   
					   
					 <div class="ques">Patient's zip code? </div>
					   <div class="dropdown-button wow age-class">
					   <input type="text" name="zipcode" id="zipcode" value="<?php if(isset($postdata) && $postdata['zipcode']!=''){echo $postdata['zipcode'];} else echo set_value('zipcode')?>" /><span id="zipcode_verify" class="verify"></span>
					   <?php echo form_error('zipcode'); ?>         			
					   </div>

					   
					 <div class="ques" style="height:85px;">Shortly you'll be introducted to interested and available advoactes who will send you custom quotes based on your answers to the previous questions. <span id="notification_mode_verify" class="verify"></span></div>
					   
					   <div class="dropdown-button wow age-class">
					   <input type="radio" name="notification_mode" id="notification_mode"  value="both"  onchange="called1();" <?php echo set_radio('notification_mode','both')?>/>I want quotes by email and text message <br />    
					    <input type="radio" name="notification_mode" id="notification_mode"  value="email" onchange="called();" <?php echo set_radio('notification_mode','email')?>/>I want quotes by email only <br /><br />
						
						<div id="email_div" style="display:none">
						 Email Address<br /><input type="text" name="email" id="notification_mode_email" value="<?php if(isset($msg['user_email'])) echo $msg['user_email']; else echo set_value('email');?>" /><span id="email_verify" class="verify"></span><br /> 
						<?php echo form_error('notification_mode_email'); ?> 
						</div>
						<div id="phone_div" style="display:none">
						 Phone Number<br /><input type="text" name="phone" id="notification_mode_phone" value="<?php echo set_value('phone');?>" /><span id="phone_verify" class="verify"></span> <br />
						 <?php echo form_error('notification_mode_phone'); ?> 
						</div>
					  </div>
						
						
					  <div class="dropdown-button wow age-class">
						<input type="checkbox" name="call_directly" id="call_directly" value="Yes"  <?php echo set_checkbox('call_directly', 'yes'); ?>/> 
						&nbsp;Advocates can call me directly with	
						<?php echo form_error('call_directly'); ?>
					   </div>
					
					 <div class="ques">Full Name  </div>
					   <div class="dropdown-button wow age-class">
					   <input type="text" name="full_name"  id="full_name" value="<?php if(isset($msg['fullname'])) echo $msg['fullname']; else echo set_value('email');?>" /><span id="full_name_verify" class="verify"></span>
					   <?php echo form_error('full_name'); ?>  			
					   </div>
					
					<div class="wow swing animated age-class" data-wow-delay= "0.4s">
					<input type="hidden" name="customer_id" value="<?php if(isset($msg['user_id'])) echo $msg['user_id']; else echo set_value('customer_id');?>">
					<input type="Submit" name="Submit" value="Send My Request">
					</div>
					
					<div class="note"><br /><br />I have read and agreed to the terms of use.<br />Your carriers messages and data rates may apply to text messages. You are not required to agree to recieve text message as a condition of using MyDocHub's service. <br />Call us at 407-555-1112 if you have any questions or concerns.<br /><br /></div>
					</div>
				</div>
				 <?php echo form_close(); ?>
				<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
					<h3>How does MyDocHub work?</h3>
					Shortly we'll introduce you to several interested advocatesnear oriando(city with that zipcode).You will be able to compare quotes, messages, reviews and profiles. When you are ready, hire the right professional health or patient advocate.
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


	$('input[name="gender"]').click(function() {
		  var fields = $("input[name='gender']").serializeArray(); 
		  if (fields.length == 0)
		  { 
			$("#gender_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
			$("#gender_verify").css({ "margin-top": "4px" }); 
		  }
		  else 
		  {
			$("#gender_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
			$("#gender_verify").css({ "margin-top": "4px" }); 
		  }
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

	$("#timings").change(function(){
        
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
	
	
	//$("#notification_mode_both").keyup(function(){
 	$('input[name="notification_mode"]').click(function() {
       
		var notification_mode_verify = $('input[name="notification_mode"]').val();
		
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