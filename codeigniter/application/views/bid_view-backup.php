<link type="text/css" rel="stylesheet" href="<?php echo base_url_css?>css/easy-responsive-tabs.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url_css?>css/messenger_m_b2ca3b6d751138a5afee63f7b11faaf30395e3a2.css" />
    <!--<script src="<?php echo base_url_css?>js/jquery-1.6.3.min.js"></script>-->
    <script src="<?php echo base_url_css?>js/easyResponsiveTabs.js" type="text/javascript"></script>
    <style type="text/css">
        .demo {
            width: 980px;
            margin: 0px auto;
			min-height:400px;
        }
        .demo h1 {
                margin:33px 0 25px;
            }
        .demo h3 {
                margin: 10px 0; font-size:10px;
            }
        pre {
            background: #fff;
        }
        @media only screen and (max-width: 780px) {
        .demo {
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
    </style>
	
		<!-- content-section-starts -->
	<div class="content" style="background-color:#f1f1f1;">
			
<div class="demo">
        <div id="tabInfo">
            Selected tab: <span class="tabName"></span>
        </div>

        <br />
        <br />
		
		<?php  $user = 2;
		$ht = 165.5*$user;
		?>
        <!--vertical Tabs-->
        <div id="verticalTab">
            <ul class="resp-tabs-list ">
               
			   <li>
				<a id="2" href="#" onclick="load_ajax(this.id,1,1)">
					<img class="profile-picture" src="<?php echo base_url_css?>images/profile/0nmqbdg4bm6hf1_50.jpg">
					<div class="bid-info nav-info">
						<h3>Matthew Spiegel Real Estate Brokerage, Design, and Staging....</h3>
					
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
                
				
				
				
				<li>
				<a id="3" href="#" onclick="load_ajax(this.id,1,2)">
					<img class="profile-picture" src="<?php echo base_url_css?>images/profile/0nmqbdg4bm6hf1_50.jpg">
					<div class="bid-info nav-info">
						<h3>Matthew Spiegel Real Estate Brokerage, Design, and Staging....</h3>
					
						<span>
						<span class="stars stars5"></span>
						<span class="service-rating-review-count"> (3 reviews)</span>
						</span>
					
						<div class="bid-estimate">
						<span class="bid-estimate-detail">Need more information for price</span>
						</div>
					
					</div>
				</a>
				</li>
                
            </ul>
		
            <div class="resp-tabs-container" style="min-height:<?php echo $ht;?>px">
                <div>
                    <p id="content-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
                </div>
                <div>
                    <p id="content-3">This tab has icon in it.</p>
                </div>
                
            </div>
        </div>
        <br />
        

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
	
	
	function load_ajax(id,user,project)
	{
		if(id)
        {
        
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>bids/getQuoteInfo/"+user+"/"+project,
				success: function(msg){
					if(msg)
					{
						var populate = "#content-"+id;
						alert(populate);
						$(populate).innerHTML = msg;
					}
				}
			});
			 
		}
	}
</script>			
			



