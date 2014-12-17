<script type="text/javascript" src="<?php echo base_url(); ?>formcheck/core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>formcheck/more.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />   
<script type="text/javascript" src="<?php echo base_url(); ?>formcheck/lang/en.js"></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>formcheck/formcheck.js"></script>
<script type="text/javascript">
	window.addEvent('domready',function() {
				var myCheck = new FormCheck('form_id', {
					tipsClass : 'tips_box',
					display : {
						scrollToFirst : false
					},
					alerts : {
						required : 'This field is ablolutely required! Please enter a value'
					}
				})
			});
		</script>
	<!-- content-section-starts -->
	<div class="content">
	<div class="main">
	   <div class="container">
		  <div class="register">
		  <?php //print_r($data); ?>
		  <?php echo $error."<br>".$error1; ?>
		  	  <form id="form_id" method="post" action="<?php echo base_url_site?>register/registerUser"> 
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>First Name<label>*</label></span>
						<input type="text"  id="firstname" name="firstname" class="validate['required','alpha']" > 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Last Name<label>*</label></span>
						<input type="text" name="lastname"  class="validate['required','alpha']" > 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="newsletter" checked="" value="1"><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password<label>*</label></span>
								<input type="text" name="password">
							 </div>
							 <div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Confirm Password<label>*</label></span>
								<input type="text" name="passconf">
							 </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				  
					   <input type="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
	     </div>
	    </div>

<div class="clearfix"></div>
		
	</div>
	<!-- content-section-ends -->
	