<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {
        //load the session library
        $this->load->library('session');

        // load form validation library
        $this->load->library('form_validation');

        $this->load->template("login_view");
    }

    public function welcome() {
        if (!$this->session->userdata('postdata'))
            redirect(base_url() . 'dashboard');
        else
            redirect(base_url() . 'postproject');
    }

    public function welcomeProfessional() {
        redirect(base_url() . 'dashboardProfessional');
    }

    public function showError() {

        $data['error'] = "Incorrect credentials. <br>Either your login email or password is incorrect";

        $this->load->helper('form');

        $this->load->template("login_view", $data);
    }

    public function userLogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $pass = md5($this->input->post('password'));

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $result = $this->login_model->login($email, $pass);

            if ($result) {
                $userType = $this->session->userdata['validEntry']['user_type'];

                if ($result) {
                    if ($userType == 'P') {
                        $this->welcomeProfessional();
                    } else {
                        $this->welcome();
                    }
                } else {
                    $this->index();
                }
            } else {
                $this->showError();
            }
        }
    }

    public function forget() {
        $this->load->library('session');
        if (isset($_GET['info'])) {
            $data['info'] = $_GET['info'];
        }
        if (isset($_GET['error'])) {
            $data['error'] = $_GET['error'];
        }
        
        if(isset($_REQUEST['id']))
           $this->load->template('password-send-success', $data);
        else
            $this->load->template('login-forget');
    }

    public function doforget() {
        $this->load->helper('url');
        $email = $_POST['email'];
        $q = $this->db->query("select * from user where email='" . $email . "'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user = $r[0];
            $this->resetpassword($user);
            $info = "Password has been reset and has been sent to email id: " . $email;
            redirect('/index.php/login/forget?info=' . $info."&&id=2", 'refresh');
        }
        $error = "The email id you entered not found on our database ";
        redirect('<?=base_url()?>login/forget?error=' . $error, 'refresh');
    }

    private function resetpassword($user) {
        date_default_timezone_set('GMT');
        $this->load->helper('string');
        $password = random_string('alnum', 16);
        $this->db->where('user_id', $user->user_id);
        $this->db->update('user', array('password' => MD5($password)));
        $this->load->library('email');
        $this->email->from('neeraj@healthpatientadvocates.com', 'healthpatientadvocates admin');
        //$this->email->to($user->email);
        $this->email->to("neerajkumar.patel@gmail.com");
        $this->email->subject('Password reset');
        $this->email->message('You have requested the new password, Here is you new password:' . $password);
        $this->email->send();
    }

}

?>