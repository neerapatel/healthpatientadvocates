
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Forms Complete Example</title>
	<style type="text/css">
body {
	margin: 2em 5em;
	font-family:Georgia, "Times New Roman", Times, serif;
}
h1, legend {
	font-family:Arial, Helvetica, sans-serif;
}
label, input, select {
	display:block;
}
input, select {
	margin-bottom: 1em;
}
fieldset {
	margin-bottom: 2em;
	padding: 1em;
}
fieldset fieldset {
	margin-top: 1em;
	margin-bottom: 1em;
}
input[type="checkbox"] {
	display:inline;
}
.range {
	margin-bottom:1em;
}	
.card-type input, .card-type label {
	display:inline-block;
}
	</style>	
</head>
<body>
<?php echo form_open("dashboardProfessional/submitQuote"); ?>
<h1>Send your Quote</h1>
  <fieldset>
   <div align="right">Credit Availabel:<?=$creditBal;?></div>
   <div align="right"><a href="dashboardProfessional/creditPurchase">Purchase Credit</a></div>
   <div> 
        <label>Price </label> 
        	<select name="workType" id="workType">
				<option value="FIXED">FIXED</option> 
				<option value="HOURLY">HOURLY</option>
			</select> 
			<label> $</label>
       		 <input id="bidamount" name="bidamount" type="text" required>
			<label> Days</label>
			 <input id="days" name="days" type="text" required>
			 <input id="project_id" name="project_id" type="hidden" value="<?=$project_id?>"/>
			
			 </div>
  </fieldset>
 	 <div> 
        <label>Message </label>
      <textarea id="message" name="message" rows=5 cols=50></textarea>
	</div> 

  <fieldset> 
  	<input type="submit" value="Submit Quote">
  </fieldset> 
 <?php echo form_close(); ?>
</body>
</html>