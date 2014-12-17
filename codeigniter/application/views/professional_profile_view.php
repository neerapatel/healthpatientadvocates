<script language="javascript">
$(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcomeProfessional/addServicesIndex",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d=='true'){
						   window.location.href="<?php echo base_url()?>welcomeProfessional/addLocation";
						   }
                        }
                    });
                });
            });
</script>
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
			
		<form name="form1" id="form1">

			<div class="ordering-form"  style="background:#fff">
			<div class="container" id="populate_form">
				<div class="order-form-head text-left wow bounceInLeft" data-wow-delay="0.4s">
					<h3>We will introduce you to advocates ready to help you out</h3>
				</div>
				
				<div class="col-md-6 order-form-grids">
				<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s">
					<div class="ques">Which of these services do you provide ?<span id="services_verify" class="verify"></span></div>
								
					<div class="dropdown-button extend">           			
            		
					  <!-- Build your select: -->
						<?php 
						if(isset($records)) : foreach($records['records'] as $row) :?>
						<?php 
						$check ='';
						if(isset($postdata) && is_array($postdata['services']))
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
						?>
						<?php echo form_error('services'); ?>
   						<input type="submit" name="submit" value="Submit" />
					</div>
				</div>
				</div>
				
				<div class="col-md-6  wow bounceIn" data-wow-delay="0.4s"></div>
				
		</div>
		</div>
			</div>
		</form>
