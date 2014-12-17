<script src="<?php echo base_url_css; ?>js/ajaxfileupload.js"></script>
<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
				/*alert("called");
                    event.preventDefault();
			 var file_data = $('#userfile').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('image', file_data)
				alert(form_data); */
	                      
                    $.ajax({
                        url: "<?php echo base_url()?>settings/upload",
						type: "POST",             // Type of request to be send, called as method
						data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,     
                       // data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>settings";
						   }
                        }
                    });
                });
            });
</script>
<style type="text/css">
div.wrapper{  
    float:left; /* important */  
    position:relative; /* important(so we can absolutely position the description div */  
}  
div.description{  
    position:absolute; /* absolute position (so we can position it where we want)*/  
    bottombottom:0px; /* position will be on bottom */  
    left:0px;  
         width:100%;  
    background-color:black;  

}  
p.description_content{  
    padding:10px;  
    margin:0px;
	    font-size:15px;  
     font-family: 'tahoma';  
   color:white;  
  
}  
</style>

<?php if(isset($this->session->userdata["paypal_msg"]) && ($this->session->userdata["paypal_msg"]=='uploaded') ) 

{		//echo $this->session->userdata["paypal_msg"];
		//$this->session->set_userdata('paypal_msg', '');
		?>
	<!--<script type="text/javascript" src="<?php //echo base_url_css?>js/jquery-pack.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url_css?>js/jquery.imgareaselect.min.js"></script>
	<div id="dialogue" style="display:none">
<div class="plainmodal-close"></div>
<p class="sample-head">jQuery.plainModal</p>
<p><img src="<?php echo base_url_css; ?>images/GitHub-Mark-120px-plus.png" alt="" height="120" width="120">Lorem
 ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
veniam, quis nostrud exercitation.</p>
</div>	
		
<?php } ?>
	<!-- content-section-starts -->
	<div class="content">
			
		
		<div class="ordering-form">
			<div class="container">
				<div class="order-form-head text-left wow bounceInLeft" data-wow-delay="0.4s">
						<h3>Settings</h3>
				</div>
				<div class="col-md-6 order-form-grids" >
				 <div class="wrapper">
					<img src="<?php echo base_url_css; ?>images/Profile/<?php echo $msg['user_id']?>.jpg" class="img-responsive" alt="" />
					<div class='description'> 
						<!-- description content -->  
						<form name="form1" id="form1" enctype="multipart/form-data" action="<?php echo base_url();?>settings/upload" method="post">
						<input type="text" name="test" value="gfgfhgjj" />
						<input type="file" id="userfile" name="userfile" style="visibility: hidden; width: 1px; height: 1px" onchange="$('form#form1').submit();"/>
						</form>
						<p class='description_content'  onclick="document.getElementById('userfile').click(); return false;">Change Profile Picture</p>  
						<!-- end description content -->  
					</div>  
					</div>
					
					
				

<div id="upload" style="display:none">
<?php
		//Display error message if there are any
		if(strlen($error)>0){
			echo "<ul><li><strong>Error!</strong></li><li>".$error."</li></ul>";
		}

		if(($msg['large_photo_exists'])>0){?>
		<h2>Create Thumbnail</h2>
		<div align="center">
			<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext'];?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />
			<div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext'];?>" style="position: relative;" alt="Thumbnail Preview" />
			</div>
			<br style="clear:both;"/>
			<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
				<input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" />
			</form>
		</div>
	<hr />
	<?php 	} ?>
	<h2>Upload Photo</h2>
	
	
</div>
				
				<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
					<div style="border-bottom:1px solid #333333; padding:25px;">
					<h4>Account</h4>
					1. <?php echo $msg['fullname']?>&nbsp;&nbsp;<a href="<?php echo base_url()?>account_edit">edit</a><br />
					2. <?php echo $msg['user_email']?>&nbsp;&nbsp;<a href="">edit</a><br />
					3. Password&nbsp;&nbsp;<a href="<?php echo base_url()?>password">edit</a><br />
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
