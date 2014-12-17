<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('settings_model');
	}

	
	 
	public function index()
	{
		//load the session library
		$this->load->library('session');
		//if there is no session
		if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
 			redirect(base_url());		
		
		} else {
		
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			$data["msg"] = $userinput;
			
						
			$this->load->template("settings_view",$data);
			
		}
	}
	
	public function upload()
	{
	
echo "heeloo";

echo $_FILES["file"]["type"];
if(isset($_FILES["file"]["type"]))  
{
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]); 
    $file_extension = end($temporary);

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) 
	{

        if ($_FILES["file"]["error"] > 0)
		{
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } 
		else 
		{ 
		echo "here";
				if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . "<span id='invalid'><b>already exists.</b></span> ";
				} 
				else 
				{					
					$sourcePath = $_FILES['file']['tmp_name'];   // Storing source path of the file in a variable
					$targetPath = "upload/".$_FILES['file']['name'];  // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; //  Moving Uploaded file						
					
					echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
					echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
					echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
						
				}				       
        }        
    }   
	else 
	{
        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
    }
}
}
	
	

}
?>