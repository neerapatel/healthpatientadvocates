 	<!-- content-section-starts -->
       <link rel="stylesheet" href="<?php echo base_url_css?>css/style-upload.css" />
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url_css?>js/script-upload.js"></script>

	<div class="content">
	<div class="ordering-form">
			<div class="container" style="height:550px;">
				
				<div class="col-md-4 order-form-grids" >
						<div class="main-upload" style="position:absolute">
						<h1>Upload Image</h1><br/>
						<hr>
							<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
								<div id="image_preview"><img id="previewing" src="<?php echo base_url_css; ?>images/Profile/<?php echo $msg['user_id']?>.jpg" class="img-responsive" alt="" /></div>	
						<hr id="line">    
							<div id="selectImage">
								<label>Select Your Image</label><br/>
								<input type="file" name="file" id="file" required />
								<input type="submit" value="Upload" class="submit" />
							</div>                   
							</form>		
						</div>  
						<h4 id='loading' style="display:none;left:242px;position:absolute;top:352px;font-size:25px;">loading...</h4>
						<div id="message" style="left:182px;position:absolute;top:390px;font-size:14px;">	
						<div style="clear:both"></div>
						</div>
				 </div>
					
					
				<div class="col-md-4 ordering-images ordering-image wow bounceIn imgs-img" data-wow-delay="0.4s">
				
					<div style="border-bottom:1px solid #333333;">
					<h4>Account</h4>
					<ol>
					<li><?php echo $msg['fullname']?>&nbsp;&nbsp;<a href="<?php echo base_url()?>account_edit" class="ani">edit</a></li>
					<li><?php echo $msg['user_email']?>&nbsp;&nbsp;<a href="" class="ani">edit</a></li>
					<li>Password&nbsp;&nbsp;<a href="<?php echo base_url()?>password" class="ani">edit</a></li>
					</ol>
					</div>
					<div style="border-bottom:1px solid #333333">
					<h4>Notifications</h4>
					</div>
					<div>
					<a href="<?php echo base_url()?>delete_account">Delete Account</a>
					</div>
				</div>
			</div>
		</div>
			
</div>			

