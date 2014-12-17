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
						<h3>Change Project Status</h3>
				</div>
				<div class="col-md-6 order-form-grids">
					<img src="<?php echo base_url_css; ?>images/Profile/abc.jpg" class="img-responsive" alt="" />
				</div>
				
			<?php echo form_open("update_status/updateStatus"); ?>

				<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
					<div style="border-bottom:1px solid #333333; padding:25px;">
					<h4>What is the status of your "Project" project? </h4>
					
				<?php 
				if(isset($reasons)) : foreach($reasons['records'] as $row) :?>
                <?php echo '<input type="radio" name="status" value="'.$row->id.'">'.$row->reason.'<br />';?>
				<?php endforeach;?>
                <?php else :
                endif;
                ?>
					Note : your update will be communicated to pros who sent you quotes.
					<input type="text" name="project_id" value="<?php if(isset($project_id)) echo $project_id;?>" />
					<input type="Submit" value="Update project status" />
					<input type="button" value="Back to my projects" onclick="window.location.href='<?php echo base_url()?>dashboard'"/>
					</div>
					
				</div>
				
			<?php echo form_close(); ?>

			</div>
		</div>
			
			
