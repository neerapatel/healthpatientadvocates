
<style type="text/css">
.carousel-inner > .item {height:630px;}
.button { width: 150px; padding: 10px; background-color: #FF8C00; box-shadow: -8px 8px 10px 3px rgba(0,0,0,0.2); font-weight:bold; text-decoration:none; } 
#cover{ position:fixed; top:0; left:0; background:rgba(0,0,0,0.6); z-index:5; width:100%; height:100%; display:none; } 
#loginScreen { height:380px; width:340px; margin:0 auto; position:relative; z-index:10; display:none; background: url(login.png) no-repeat; border:5px solid #cccccc; border-radius:10px; } 
#loginScreen:target, #loginScreen:target + #cover{ display:block; opacity:2; } 
.cancel { display:block; position:absolute; top:3px; right:2px; background:rgb(245,245,245); color:black; height:30px; width:35px; font-size:30px; text-decoration:none; text-align:center; font-weight:bold; } 

</style>
 <div id="loginScreen"> <a href="#" class="cancel">&times;</a> </div> 
 <div id="cover" > </div>		
		<div class="carousel slide" data-ride="carousel" id="carousel-spotlight" style="height:600px;">

<form name="form1" id="form1">

<div class="matcher">

<div class="matcher-line">
<p style="text-transform:none; width:100%;">Meet new customers</p><br />
<p style="text-transform:none; font-size:18px;width:100%;">Thumbtack sends pros like you requests from customers. <br />You decide who to respond to and send a quote.
<br /><br />
What do you do?
<br />
</p>
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
						   window.location.href="<?php echo base_url()?>professionalProfile";
						   }
						  
                        }
                    });
                });
            });
</script>
<div class="dropdown">

<?php 
				//echo "<pre>"; print_r($records);echo "</pre>"; ?>
<!-- Build your select: -->
<select name="services[]" id="example-getting-started" multiple="multiple">
			    <?php
				if(isset($records)) : foreach($records['records'] as $row) :?>
                <?php echo '<option value="'.$row->service_id.'">'.$row->service_name.'</option>';?>
				<?php endforeach;?>
                <?php else :
                endif;
                ?>  
</select>
</div>

<br>
<input type="submit" class="button button-default" value="Continue"/>
</div>
</form>
<div class="carousel-inner">
<div class="item" style="background: url(<?php echo base_url_css; ?>images/find-patient-advocates.jpg) center center;">


<div class="carousel-overlay">
<div class="carousel-info">
<a href="http://blog.sweeten.com/2014/05/29/erica-donnas-sweetened-brooklyn-interior/" class="carousel-project">Read the story</a><p>Erica &amp; Donna’s Sweetened Brooklyn Schoolhouse Apartment</p>
</div>
</div>
</div>
<div class="item" style="background: url(<?php echo base_url_css; ?>images/health-advocate-patient-doctor-office.jpg) center center;">
<div class="carousel-overlay">
<div class="carousel-info">
<a href="http://blog.sweeten.com/2013/10/31/katie-elliots-williamsburg-townhouse-renovation/" class="carousel-project">Visit project</a><p>Katie &amp; Elliot’s Williamsburg Townhouse Renovation</p>
</div>
</div>
</div>
<div class="item active" style="background: url(<?php echo base_url_css; ?>images/patient-advocate-for-family-member.jpg) center center;">
<div class="carousel-overlay">
<div class="carousel-info">
<a href="http://blog.sweeten.com/2014/02/20/sanayas-sweetened-clinton-hill-kitchen/" class="carousel-project">Visit project</a><p>Sanaya's Clinton Hill Kitchen Renovation</p>
</div>
</div>
</div>
<div class="item" style="background: url(<?php echo base_url_css; ?>images/patient-advocates.jpg) center center;">
<div class="carousel-overlay">
<div class="carousel-info">
<a href="http://blog.sweeten.com/2013/10/31/katie-elliots-williamsburg-townhouse-renovation/" class="carousel-project">Visit project</a><p>Katie &amp; Elliot’s Williamsburg Townhouse Renovation</p>
</div>
</div>
</div>
</div>
</div>
<div class="carousel-controls">
<a href="#carousel-spotlight" class="carousel-control left" data-slide="prev" role="button"><span class="icon icon-arrow-sans-left"><img src="<?php echo base_url_css; ?>images/arrow_left_16.png" style="margin-top:-60px;margin-left:-17px;"></span></a><a href="#carousel-spotlight" class="carousel-control right" data-slide="next" role="button"><span class="icon icon-arrow-sans-right"><img src="<?php echo base_url_css; ?>images/arrow_right_16.png" style="margin-top:-60px;"></span>
</a></div>
</div>
		</div>
		<!--</div>-->
		
	</div>
	<!-- header-section-ends -->
