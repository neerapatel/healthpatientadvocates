<?php //if(!isset($msg) && $msg['logged_in']!=true){ redirect(base_url());}//else {print_r($msg);}

		//load the session library
		$this->load->library('session');
		
		//if there is no session
		//if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
			 //redirect(base_url());
		//} else {
		
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			//print_r($userinput);
			$msg = $userinput;
			//print_r($msg);
		//}
		
		if($msg['user_type']=="P")
		$dloc = base_url().'dashboardProfessional';
		else
		$dloc = base_url().'dashboard';
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="<?php echo base_url_css; ?>images/mydochub-logo.png" />
<meta charset="UTF-8">
<title>MyDocHub::HealthCare Advocate Sevices</title>

<link href="<?php echo base_url_css; ?>css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="C:/wamp/www/mydochub/js/jquery.min.js"></script> -->
<script src="<?php echo base_url_css; ?>js/jquery.min.js">

</script>
<!-- Custom Theme files -->
<link href="<?php echo base_url_css; ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
--><!--Animation-->
<script src="<?php echo base_url_css; ?>js/wow.min.js"></script>
<link href="<?php echo base_url_css; ?>css/animate.css" rel='stylesheet' type='text/css' />
		<!--[if (gt IE 8) | (IEMobile)]><!-->
<link href="<?php echo base_url_css; ?>css/app.css" media="screen" rel="stylesheet" type="text/css">
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
<link href="/assets/app-ie-43ca0a0541eab2c4b603f539d2c3e8d9.css" media="screen" rel="stylesheet" type="text/css" />
<![endif]-->
  <link rel='stylesheet prefetch' href='<?php echo base_url_css; ?>css/font-awesome.min.css'>
  <link rel='stylesheet prefetch' href='<?php echo base_url_css; ?>css/right-menu.css'>
        
		<link rel="stylesheet" type="text/css" href="<?php echo base_url_css; ?>css/img/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url_css; ?>css/img/common.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url_css; ?>css/img/style.css" />
		<script type="text/javascript" src="<?php echo base_url_css; ?>js/img/modernizr.custom.79639.js"></script> 
		<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->


<div class="support-note"><!-- let's check browser support with modernizr -->
					<!--span class="no-cssanimations">CSS animations are not supported in your browser</span-->
					<span class="no-csstransforms">CSS transforms are not supported in your browser</span>
					<!--span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span-->
					<span class="no-csstransitions">CSS transitions are not supported in your browser</span>
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="<?php echo base_url_css; ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url_css; ?>js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		
<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="<?php echo base_url_css; ?>js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url_css; ?>css/bootstrap-multiselect.css" type="text/css"/>
<script src="<?php echo base_url_css; ?>js/jquery.easydropdown.js"></script>
	<style type="text/css">
.roundedImage {
    background: url(http://placehold.it/30x30);
    background-repeat: no-repeat;
    background-size: cover;

    overflow:hidden;
    -webkit-border-radius:50px;
    -moz-border-radius:50px;
    border-radius:50px;
    width:30px;
    height:30px;
}
</style>	
</head>
<body>
    <!-- header-section-starts -->
	<div class="header">
		
			<div class="menu-bar" style="background-color:#fff">
			<div class="container">
			<div class="logo">
			
					<a href="<?php echo base_url_css; ?>"><img src="<?php echo base_url_css; ?>images/mydochub-logo.png" class="img-responsive" alt="" /></a>
				</div>
				
				
				
				<div style="float:right;">
					<nav>
						<ul>
							<li class="drop">
				
								<div class="user-avatar">
									<?php
											$img = base_url_css.'images/profile/'.$msg['user_id'].'.jpg';
											if(!(@checkRemoteFile($img)))
											$img = base_url_css.'images/profile/default.jpg';
											?>
											
								<img src="<?=$img?>" class="roundedImage">
								</div>
								
								<a href="#"><?php echo $msg['fullname']?></a>
				
								<span aria-hidden="true" class="icon-reorder orange-txt"></span>
								<div class="triangle"></div>
				
								<div class="dropdownContain">
									<div class="dropOut">
										<ul>
											<li onClick="window.location.href='<?php echo $dloc?>'"><span aria-hidden="true" class="icon-user"></span>Dashboard</li>
											<li><span aria-hidden="true" class="icon-envelope-alt"></span>Projects</li>
											<li onClick="window.location.href='<?php echo base_url()?>settings'"><span aria-hidden="true" class="icon-cog"></span>Settings</li>
											<li onClick="window.location.href='<?php echo base_url()?>logout'"><span aria-hidden="true" class="icon-off"></span>Log Out</li>
										</ul>
									</div>
								</div>
				
							</li>
						</ul>
				</nav>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
				<!--</div>-->
		
	
	<div class="menu-bar">
			<div class="container">
				
				<div class="top-menu" style="color:#000">
				
					<!--<ul>
						<li><a href="index.html">Projects</a></li>
						<li><a href="popular-restaurents.html">Popular Restaurants</a></li>|
						<li><a href="Order.html">Order</a></li>|
						<li><a href="contact.html">contact</a></li>
						<div class="clearfix"></div>
					</ul>-->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
		
		</div>
	<!-- header-section-ends -->
