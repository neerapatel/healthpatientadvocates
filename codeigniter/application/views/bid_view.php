<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcomeProfessional/addSessDescBusiness",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>welcomeProfessional/contactBusiness";
						   }
                        }
                    });
                });
            });
</script>

<link type="text/css" rel="stylesheet" href="<?php echo base_url_css?>css/easy-responsive-tabs.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url_css?>css/messenger_m_b2ca3b6d751138a5afee63f7b11faaf30395e3a2.css" />
    <!--<script src="<?php echo base_url_css?>js/jquery-1.6.3.min.js"></script>-->
    <script src="<?php echo base_url_css?>js/easyResponsiveTabs.js" type="text/javascript"></script>
    <style type="text/css">
        .demovert {
            width: 980px;
            margin: 0px auto;
			min-height:400px;
        }
        .demovert h1 {
               	font-size:21px;
            }
        .demovert h3 {
                margin: 10px 0; font-size:24px; text-transform:uppercase;
            }
        pre {
            background: #fff;
        }
        @media only screen and (max-width: 780px) {
        .demovert {
                margin: 5%;
                width: 90%;
         }
        .how-use {
                float: left;
                width: 300px;
                display: none;
            }
        }
        #tabInfo {
            display: none;
        }
		.bid-info
		{
		display:block;
		}
.stars, .stars0
{
   background: transparent url("<?php echo base_url_css?>images/stars.png") no-repeat top left;
   width:100px;
   height:20px;
   float:left;
   display:block;
   margin: 5px;
}
.stars1 {background-position:-20px;}
.stars2 {background-position:-40px;}
.stars3 {background-position:-60px;}
.stars4 {background-position:-80px;}
.stars5 {background-position:-100px;}
.bid-estimate,.bid-estimate-detail{ font-size:11px;}
.service-rating-review-count{ font-size:21px;}
.in-button{width: 280px;
	height: 280px;
	border-radius: 10px;
	position: relative;
	cursor: default;
	box-shadow: 
		inset 0 0 0 3px rgba(255,255,255,0.6),
		0 1px 2px rgba(0,0,0,0.1);
		
	-webkit-transition: all 0.4s ease-in-out;
	-moz-transition: all 0.4s ease-in-out;
	-o-transition: all 0.4s ease-in-out;
	-ms-transition: all 0.4s ease-in-out;
	transition: all 0.4s ease-in-out;}
    </style>
	
		<!-- content-section-starts -->
	<div class="content" style="background-color:#f1f1f1;">
			
	<div class="demovert">
			<!--<div id="tabInfo">
				Selected tab: <span class="tabName"></span>
			</div>
	
			<br />
			<br />-->
			
			
		<?php if(count($bidders)>0){   	
		
		/*echo "<pre>";
		print_r($bidders);
		echo "</pre>";
		*/
			$user = count($bidders);
			$ht = 204.5*$user;//407
			?>
		<!--vertical Tabs-->
			<div id="verticalTab">
			   
			   
				<ul class="resp-tabs-list ">
				   <?php for($i=0; $i<count($bidders); $i++){
				   			
							
							$img = base_url_css.'images/profile/'.$bidders[$i]['professional_id'].'.jpg';
							if(!(@checkRemoteFile($img)))
							$img = base_url_css.'images/profile/default.jpg';

				   ?>
				   <li>
					<a>
						<div class="ch-img-profile" style="display:block;background-image: url(<?php echo $img;?>)"> </div>
						<div class="bid-info">
							<h1><?php echo $bidders[$i]['business_name']?></h1>
						
							<span>
							<span class="stars stars3"></span>
							<span class="service-rating-review-count"> (3 reviews)</span>
							</span>
						
							<div class="bid-estimate">
							<span class="bid-estimate-detail">Need more information for price</span>
							</div>
						
						</div>
					</a>
					</li>
					
					<?php } ?>
					
				</ul>
			
				<div class="resp-tabs-container" style="min-height:<?=$ht?>px">
				
				   <?php for($i=0; $i<count($bidders); $i++){?>
					<div>
						<p>
						<h3><?php echo $bidders[$i]['business_name']?></h3>
						<span><?php echo $bidders[$i]['business_desc']?></span> <span><?php echo $bidders[$i]['first_name']." ".$bidders[$i]['last_name']?></span> <span><?php echo $bidders[$i]['contact_no']?></span> <span><?php echo $bidders[$i]['city']." ".$bidders[$i]['state']?></span> <span> <br />
						<br />
						<input type="button" name="button1" value="View Profile" />
						<input type="button" name="button1" value="Website" />
						<input type="button" name="button1" value="Reviews" />
						</span>
						<hr />
						<h3>Bid Details</h3>
						<span>Bid Amount :<?php echo $bidders[$i]['bid_amount']?></span>
						<span>Completion days :<?php echo $bidders[$i]['completion_days']?></span>
						<span>Work type :<?php echo $bidders[$i]['worktype']?></span>
						<span>Proposal Datetime :<?php echo $bidders[$i]['status_datetime']?></span>
						<hr />
						<?php
							$messaging = $bidders[$i]['msgs'];
							
							if($messaging!='' && count($messaging)>0)
							{
							?>
								<h3>Proposal</h3>
						
								<div>
	
							
							<?php
								for($j=0; $j<count($messaging); $j++)
								{
								
								$img = base_url_css.'images/profile/'.$messaging[$j]['user_id'].'.jpg';
								if(!(@getimagesize($img)))
								$img = base_url_css.'images/profile/default.jpg';
								
								?>
								<div><?php echo $messaging[$j]['message_datetime']?></div>
								<div><div class="ch-img-profile" style="float:left;display:block;background-image: url(<?php echo $img;?>);"> </div></div>
								<div><?php echo $messaging[$j]['message']?></div>
								<?php
								echo "------------------------------------------------<br><br>";	
								}
							
							?><br /><br />
								
								
								
								
								
							</div>
							<?php }?>								
							
							<input type="hidden" id="project_id<?=$i?>" value="<?php echo rtrim(base64_encode($bidders[$i]['project_id']),'=')?>" />
							<input type="hidden" id="professional_id<?=$i?>" value="<?php echo rtrim(base64_encode($bidders[$i]['professional_id']),'=')?>" />


							<?php if($bidders[$i]['is_owner'] == "is_owner")
							{
							?>
							<div id="buttons_state<?=$i?>">
								
								
								
								<?php if($bidders[$i]['status']=="Submitted"){?>
								
								<input type="button" name="Reply" value="Reply">
								<input type="button" name="Hire" value="Hire" onclick="callAjaxHired('<?=$i?>','hire')" >
								<input type="button" name="Decline" value="Decline" onclick="callAjaxDecline('<?=$i?>','show')">
								
								<?php } elseif($bidders[$i]['status']=="Hired"){?>
								<input type="button" name="Reply" value="Reply">
								<input type="button" name="Review" value="Leave a Review">
								<a href="<?php echo base_url()?>update_status/index/<?php echo $project_id?>">Update Status</a>
	
								<?php }?>
								</div>
							<?php } ?>
						
						</p>
					</div>
				<?php } ?>
					
				</div>
			</div>
			
			<?php }?>
			
	</div>
	
	<div style="clear:both"></div>

<div id="buttons_state_normal" style="display:none">
<input type="button" name="Reply" value="Reply">
<input type="button" name="Hire" value="Hire" onclick="callAjaxHired('<?=$i?>','hire')" >
<input type="button" name="Decline" value="Decline" onclick="callAjaxDecline('<?=$i?>','show')">
</div>
			
<div id="buttons_state_hired" style="display:none">
<input type="button" name="Reply" value="Reply">
<input type="button" name="Review" value="Leave a Review">
<a href="<?php echo base_url()?>update_status/index/<?php echo $project_id?>">Update Status</a>
</div>	

<div id="buttons_state_decline"  style="display:none">

<h1> The Quote has been declined</h1>
<h3 class="body-text">Please tell us why you declined this quote.</h3>
<p>Your responses here are just between you and MyDochub.</p>


<form id="form1">
<ul class="bid-decline-reasons" style="list-style:none">
	<li class="item"><input type="checkbox" name="decline_reason[]" value="I have decided on someone else"/>&nbsp;I've decided on someone else</li>
	<li class="item"><input type="checkbox" name="decline_reason[]" value="I think the price is too high">&nbsp;I think the price is too high</li>
	<li class="item"><input type="checkbox" name="decline_reason[]" value="The pro is too far away">&nbsp;The pro is too far away</li>
	<li class="item"><input type="checkbox" name="decline_reason[]" value="This is not what I need">&nbsp;This is not what I need</li>
	<li class="item"><input type="checkbox" name="decline_reason[]" value="close_project" onclick="document.getElementById('nra').style.display='block';">&nbsp;I don't need this work done anymore<div id="nra" style="display:none">In that case, we will decline all your open quotes and close this request to new quotes.</div></li>
	<li class="item"><input type="checkbox" name="decline_reason[]" value="project_comments"  onclick="document.getElementById('comnts').style.display='block';">&nbsp;Other <div id="comnts" style="display:none"><textarea name="comments" placeholder="Please explain.Your reason will be kept private."></textarea></div></li>
</ul>
<input type="text" name="get_project_id" id="get_project_id" value="" />
<input type="text" name="get_prof_id" id="get_prof_id" value="" />

<input type="text" name="get_i" id="get_i" value="" />
<input type="button" name="Submit" value="Submit" onclick="callAjaxDecline(document.getElementById('get_i').value ,'decline')">
<input type="button" name="Skip" value="Skip" onclick='document.getElementById("buttons_state<?=$i?>").innerHTML = document.getElementById("buttons_state_normal").innerHTML;'>

</form>
</div>	
		
<script type="text/javascript">
    jqs = jQuery.noConflict();
	
	jqs(document).ready(function () {
        
        jqs('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
	
	function callAjaxDecline(i,status)
	{
		var populate = "buttons_state"+i;
		if(status == 'show')
		{
 			var proj = "project_id"+i;
			var prof = "professional_id"+i;
			
			document.getElementById(populate).innerHTML = document.getElementById("buttons_state_decline").innerHTML;
			document.getElementById('get_project_id').value = document.getElementById(proj).value;
			document.getElementById('get_prof_id').value = document.getElementById(prof).value;
			document.getElementById('get_i').value = 1;
		}
		else
		{
                    $.ajax({
                        url: "<?php echo base_url()?>bids/decline",
                        type: "post",
                        data: $('#form1').serialize(),
                        success: function(d) {
                           if(d=='true'){
						   	var populate = "buttons_state"+i;
							document.getElementById(populate).innerHTML = "The quote has been declined";
						   }
                        }
                    });
               
		}
	}
	
	
	function callAjaxHired(i,func)
	{
		if(i)
        {
			var pid = 'project_id'+i;
			var pro_id = 'professional_id'+i;
			
			var project = document.getElementById(pid).value;
			var prof = document.getElementById(pro_id).value;
			
			
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>bids/"+func+"/"+project+"/"+prof,
				success: function(msg){
					if(msg)
					{ 
						var populate = "buttons_state"+i;
						if(func == "hire")
						document.getElementById(populate).innerHTML = document.getElementById("buttons_state_hired").innerHTML;
					}
				}
			});
			 
		}
	}
</script>			
			



