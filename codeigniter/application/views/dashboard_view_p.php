<style type="text/css">
    .offer { height:400px; width:300px}
</style>
<style>

    /*.plainmodal-close {
    cursor: pointer;
    }
    .sample-window .plainmodal-close {
    display: inline-block;
    padding: 1px 3px;
    color: #fff;
    background-color: #224388;
    }
    .sample-window .plainmodal-close:hover {
    background-color: #1f99e2;
    }*/
    #demo {
        width: 450px;
        padding: 20px 40px;
        color: #fff;
        background-color: #00aa6a;
        border-radius: 10px;
        display: none;
        font-family: 'Georgia', serif;
    }
    #demo:after { /* clearfix */
        content: "";
        clear: both;
        display: block;
    }
    #demo p {
        font-size: 18px;
    }
    #demo .sample-head {
        margin: 0 0 15px;
        font-size: 36px;
        font-weight: bold;
    }
    #demo img {
        float: left;
        margin-right: 10px;
        box-shadow: none;
    }
    #demo .plainmodal-close {
        position: absolute;
        width: 45px;
        height: 45px;
        right: -15px;
        top: -15px;
        background: url('<?php echo base_url_css ?>/images/plainmodal-close.png') no-repeat;
    }
    #demo .plainmodal-close:hover {
        background-position: -45px 0;
    }
</style>



<!-- content-section-starts -->
<div class="content" style="background-color:#f1f1f1;">

<?php if(isset($this->session->userdata["paypal_msg"]) && ($this->session->userdata["paypal_msg"]!='') ) 

		echo $this->session->userdata["paypal_msg"];
		$this->session->set_userdata('paypal_msg', '');
		?>

    <div align="right">Credit Availabel:<?= $creditBal; ?></div>

    <div align="right"><a href="<?php echo base_url()?>dashboardProfessional/creditPurchase">Purchase Credit</a></div>

    <div class="special-offers-section" style="padding-top:150px;">

        <div class="container">
            <div>
                  <h4><?php if(isset($insufficientBal)) echo $insufficientBal;?></h4>
            </div>
            <?php if(isset($projects) &&(count($projects) > 0)) { ?>
                <div class="special-offers-section-grids">
                    <div class="container" align="center">
                        <ul style="list-style:none; ">
                            <?php for ($i = 0; $i < count($projects); $i++) { ?>
                                <li style="float:left; margin-left:30px;">
                                    <div class="offer">
                                        <div class="offer-text" style="width:100%; height:100%">
                                            <h2 align="center">Project</h2>
                                            <div align="center" style="margin-top:20px;"></div>
                                            <p style="height:80px;"></p>
                                            <p><div  id="toggle-button" style="color:#0000FF" onclick="calldialogue();">Introductions are on the way. </div>
                                            <p style="vertical-align:baseline;">We have reached out to Advocates who can help you with '<i> You will hear from interested professionals soon.</i></p>

                                            <?php $p_id = $projects[$i]['project_id'] ?>
                                            <div style="float:right; margin:20px; padding-left:60px; padding-right:60px;">
                                                <?php
												
												/*echo "<pre>";
												print_r($fomatResult);
												echo "</pre>";*/
												
                                                if (isset($fomatResult) && $p_id == $fomatResult[$i]['project_id'] && $fomatResult[$i]['project_id'] != "Open") {}else{
                                                    ?>					   
                                                    <input type="button" name="Start" value="Send Quote" onclick="window.location.href = '<?php echo base_url() ?>dashboardProfessional/sendQuoteView/<?= $p_id ?>'"/> 
                                                   <?php }?>
                                                </div>
                                                <?php
                                                if (isset($fomatResult) && ($p_id == $fomatResult[$i]['project_id'])) {
                                                    ?>
                                                    <div>
                                                        <input type="button" name="Start" value="<?= $fomatResult[$i]['project_status'] ?>" onclick="window.location.href = '<?php echo base_url() ?>dashboardProfessional/sendQuoteView?id=<?=$p_id ?>'" disabled="disabled"/> 
                                                        <input type="button" name="view_bid_details" value="View Bid Details" onclick="window.location.href = '<?php echo base_url() ?>dashboardProfessional/bid_details/<?=$p_id ?>/<?=$professional_id?>'"> 
                                                   </div>
                                                <?php } else { ?>
                                                    <div>
                                                        <input type="button" name="Start" value="Open" onclick="window.location.href = '<?php echo base_url() ?>dashboardProfessional/sendQuoteView?id=<?= $p_id ?>'" disabled="disabled"/> 
                                                    </div>
                                                <?php } ?>

                                            </div>

                                        </div>
                                    </li>
								 <?php } ?>
                                    </ui>
                            </div>
                        </div>

                    <?php }
           				 else echo "No project invitations"; ?>


        </div>
    </div>


