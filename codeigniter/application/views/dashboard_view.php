
<style type="text/css">
.offer { height:400px; width:300px}
</style>
	<!-- content-section-starts -->
	<div class="content" style="background-color:#f1f1f1;">
			
		
			<div class="new-project">
			<input type="button" name="Start" value="Start New Project" onclick="window.location.href='<?php echo base_url()?>'" /> 
			</div>
			
			
			<div class="special-offers-section" style="padding-top:20px;">
			<div class="container">
				
				<?php if(count($projects)>0){?>
				<div class="special-offers-section-grids">
				   <div class="container">
					  <ul style="list-style:none; ">
						<?php 
						foreach($projects as $project){
						$flag_bidders=0;
						?>
						<li style="float:left;margin:10px;">
							<div class="offer">
								<div class="ani"><a href="update_status/index/<?php echo ($project['project_id'])?>"> Update Status</a></div>
								<div class="offer-text" style="width:100%;">
									<div  class="project-imgs"></div>
									<h2 align="center">Project</h2>
									<div class="offer-date"><?php echo $project['creation_date']?></div>
									<p>
									<div align="center">
											<ul class="ch-grid" style="margin-left:15px;">
												<?php 
													if(isset($project['bidders']) && $project['bidders']!='')
													{
													$flag_bidders=1;
														$bidders = explode("|",$project['bidders']);
														foreach($bidders as $bidder)
														{
															$bidder_details = explode("*",$bidder);
															$url_proj_id = $bidder_details[0];
															$url_prof_id = $bidder_details[1];
															$prof_id = $bidder_details[2];
															$reviews = $bidder_details[3];
															$sel = $bidder_details[4];
															$flg = $bidder_details[5];
															$business = $bidder_details[6];
															
															//echo '<a href=>'.$prof_id.'('.$reviews.','.$sel.','.$flg.')</a><br>';
															// encrypted project_id*ebcrypted professional_id*professional_id*reviews*selected professional*flag (1=ongoing,0=open)
															 
															?>
															
															<li onclick="window.location.href='bids/index/<?=$url_proj_id?>/<?=$url_prof_id?>'">
															
															<?php
															
															

															
															$img = base_url_css.'images/profile/'.$prof_id.'.jpg';
															if(!(checkRemoteFile($img)))
															$img = base_url_css.'images/profile/default.jpg';
															?>
																<div class="ch-item ch-img-1" style="background-image: url(<?=$img?>);">
																	<div class="ch-info">
																		
																		<p class="triangle-isosceles"><?php echo $business?>&nbsp;[<?php echo $reviews?> Reviews]</span></p>
																	</div>
																</div>
																
															</li>
															
															
															<?php										
														}
													}
													?>
											</ul>
									</div>
									</p>
									<?php 
									echo "......".$flag_bidders.".....";
									//if($flag_bidders!=1){?>
									<p><div class="intro" onclick="calldialogue();">Introductions are on the way. </div>
									<p style="vertical-align:baseline;">We have reached out to Advocates who can help you with '<i><?php echo $project['services']?>'. You will hear from interested professionals soon.</i></p>
									<?php //}?>
									</div>
									
							</div>
						</li>
						<?php } ?>
						
					 </ul>
					 
				</div>
			</div>
				<?php }
				else
				echo "No Projects found!";
				
				?>
				
		</div>
		</div>


<div id="dialogue" style="display:none">
<div class="plainmodal-close"></div>
<p class="sample-head">jQuery.plainModal</p>
<p><img src="<?php echo base_url_css; ?>images/GitHub-Mark-120px-plus.png" alt="" height="120" width="120">Lorem
 ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
veniam, quis nostrud exercitation.</p>
</div>

<?php 
if(isset($success) && ($success!='')) { ?>
<script>calldialogue();</script>
<?php
}?>
