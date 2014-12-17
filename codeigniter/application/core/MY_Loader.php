<?php
// config:
//$autoload['libraries'] = array('database','form_validation','session','email','language');

/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader {
 public function __construct() {
    parent::__construct();
  }
 
  
    public function template($template_name, $vars = array(), $return = FALSE)
    {
      //load the session library
		//$this->session->get();
		$this->CI = &get_instance();
		
		if (!$this->CI->session->userdata('validEntry')) {
		//echo "in";
	    $content  = $this->view('templates/header', $vars, $return);
		}
		else{
		//echo "dashboard";
	    $content  = $this->view('templates/header-sess', $vars, $return);
		}
		
        $content .= $this->view($template_name, $vars, $return);
 		
		if (!$this->CI->session->userdata('validEntry')) {
       	$content .= $this->view('templates/footer', $vars, $return);
		}
		else
		{
	    $content  .= $this->view('templates/footer-sess', $vars, $return);
		}

        if ($return)
        {
            return $content;
        }
    }
	
	
	public function templatepro($template_name, $vars = array(), $return = FALSE)
    {
	
      //load the session library
		//$this->session->get();
		$this->CI = &get_instance();
		
		if (!$this->CI->session->userdata('validEntry')) {
		echo "in";
	    $content  = $this->view('templates/header-pro', $vars, $return);
		}
		else{
		echo "dashboard";
	    $content  = $this->view('templates/header-sess', $vars, $return);
		}
		
        $content .= $this->view($template_name, $vars, $return);
 		
		if (!$this->CI->session->userdata('validEntry')) {
       	$content .= $this->view('templates/footer-pro', $vars, $return);
		}
		else
		{
	    $content  .= $this->view('templates/footer-sess-pro', $vars, $return);
		}

        if ($return)
        {
            return $content;
        }
    }

}
?>