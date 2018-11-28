<?php
//session_start();
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Database');
    }
    public function index()
    {
        $this->load->view('login');
    }

    public function loggedin()
    {
        $this->load->view('profile');
    }

    public function loginPage()
    {
        $this->load->view('login');
    }

    public function showData()
    {
        $data = $this->input->post();
        $bool = $this->Database->login($data);
        if ($bool) {
            $email = $this->input->post('email');
            $userData = $this->Database->userInformation($email);
            if ($userData !== false) {
                $sessionData = array(
                    'username' => $userData[0]->username,
                    'email' => $userData[0]->email,
                    'mobile' => $userData[0]->mobile
                );
                $this->session->set_userdata('logged_in',$sessionData);
    
            }
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
        exit;

    }

    public function loadReg()
    {
        $this->load->view('registration');
    }

    public function register()
    {
        $data = $this->input->post();
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[user.email]',
            array(
                'is_unique' => 'email is already registered'
            )
        );
        $this->form_validation->set_rules(
            'mobile',
            'Mobile',
            'required|exact_length[10]|is_unique[user.mobile]',
            array(
                'is_unique' => 'number is already registered'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('rpassword', 'Password', 'required|matches[password]');
        $b = $this->form_validation->run();
        if ($b == false) {
            $er = $this->form_validation->error_array();
            echo json_encode($er);
        } else {
            unset($data['rpassword']);
            $this->Database->register($data);
            $abc = json_encode('done');
            echo $abc;
        }
        exit;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo json_encode("yes");
    }
}


?>