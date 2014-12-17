
		<div class="menu-bar">
			<div class="container">
				<div align="center"><h2><span style="color:#0D77AE">FIND YOUR VOICE</span> <span style="color:#F48D3D">FOR BETTER HEALTH</span></h2></div> 
				<div style=" border-bottom-style:inset; border-bottom:double; border-bottom-color:#000066; width:100%; ">&nbsp;</div>
				<div align="center"><BR/><strong>POST TO MyDocHub</strong> AND GET PAIRED WITH <BR/>A TRUSTED HEALTH OR PATEINT ADVOCATE<BR/><BR/></div>
				
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="banner" >
		<!--<div class="container">-->
		
		<div class="carousel slide" data-ride="carousel" id="carousel-spotlight">


<div class="matcher">

<div class="matcher-line">
<p>I need someone to help me with</p>
<script language="javascript">
 $(function() {
                $("#form1").on("submit", function(event) {
                    event.preventDefault();
 
                    $.ajax({
                        url: "<?php echo base_url()?>welcome/getdata",
                        type: "post",
                        data: $(this).serialize(),
                        success: function(d) {
                           if(d==true)
						   window.location.href="<?php echo base_url()?>postproject";
						   else
						   window.location.href="<?php echo base_url()?>login";
                        }
                    });
                });
            });
</script>
<form name="form1" id="form1">
<div class="dropdown">
<!-- Build your select: -->
<select name="services[]" id="example-getting-started" multiple="multiple">
			    <?php 
				//echo "<pre>"; print_r($records);echo "</pre>"; 
				if(isset($records)) : foreach($records['records'] as $row) :?>
                <?php echo '<option value="'.$row->service_id.'">'.$row->service_name.'</option>';?>
				<?php endforeach;?>
                <?php else :
                endif;
                ?>  
</select>
</div>

<div class="dropdown"><input type="text" class="zipcode" name="zipcode" placeholder="ZIPCODE"></div>
<br>
<input type="submit" class="button button-default" value="Get Matched" />
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
	<!-- content-section-starts -->
	<div class="content">
		<div class="ordering-section" id="Order">
			<div class="container">
				<div class="ordering-section-head text-center wow bounceInRight" data-wow-delay="0.4s">
					<h3>Getting help was never so easy</h3>
					<div class="dotted-line">
						<h4>Just 3 steps to follow </h4>
					</div>
				</div>
				<div class="ordering-section-grids">
				
				<div class="col-md-3 ordering-section-grid">
						<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s">
							<i class="four"></i><br>
							<i class="three-icon"></i>
							<p>Steps <span>to Follow</span></p>
							<label></label>
						</div>
					</div>
					<div class="col-md-3 ordering-section-grid">
						<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s">
							<i class="one"></i><br>
							<i class="one-icon"></i>
							<p>Post <span>Your Need for Help</span></p>
							<label></label>
						</div>
					</div>
					<div class="col-md-3 ordering-section-grid">
						<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s">
							<i class="two"></i><br>
							<i class="three-icon"></i>
							<p>Receive <span>Quotes</span></p>
							<label></label>
						</div>
					</div>
					<div class="col-md-3 ordering-section-grid">
						<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s">
							<i class="three"></i><br>
							<i class="four-icon"></i>
							<p>Get <span>Your Job Done</span></p>
							
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		