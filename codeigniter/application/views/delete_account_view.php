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
	a{ color:#0000CC;}
</style>		
	<!-- content-section-starts -->
	<div class="content">
			
		
		<div class="ordering-form">
			<div class="container">
				<div class="order-form-head text-left wow bounceInLeft" data-wow-delay="0.4s">
						<h3>Delete Your Account</h3>
				</div>
				<div class="col-md-6 order-form-grids">
					Are you sure you want to delete <?php echo $msg['fullname']?>'s account? We'd really hate to see you go.<br /><br />
					If you are receiving too many emails from us, then you can change your notification settings. <br /><br />
					
					If there is anything we can do to make your mydochub experience better,<br />
					please email us at support@mydochub.com or call us at  407-555-1112 
					
					
					Reason for deleting your account(optional)
			  	<?php echo form_open("delete_account/deleteAccount"); ?>
					<input name="deactivation_reason" value="" type="text" /><br />
					<input type="checkbox" name="delaccount" id="delaccount" value="Inactive" />I confirm I want to delete this account <?php echo form_error('delaccount'); ?><span id="delaccount_verify" class="verify"></span>
					<br />
					<input type="submit" name="submit" value="Delete Account" />
					<input type="button" name="cancel" value="Cancel" onClick="window.location.href='settings';" />
					
				<?php echo form_close(); ?>
				</div>
				<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
					
				</div>
			</div>
		</div>
	<script language="javascript">
	$(document).ready(function(){
		if($("#delaccount").prop('checked') != true){
			$("#delaccount_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/no.png')" }); 
		}
		else
		{
			$("#delaccount_verify").css({ "background-image": "url('<?php echo base_url_css;?>images/yes.png')" }); 
		});
	});       
	</script>		
			
