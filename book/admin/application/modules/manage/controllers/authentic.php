<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Authentic extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
       //$this->checkAdmin($this->session->userdata('maQuanLy'));
        $this->data['controller'] = 'user';   
        $this->load->model('Mauthentic');
    }
    
    public function login()
    {
		if( !in_array($this->session->userdata('maQuanLy'),array('',null)) ){
			redirect('index');
		}
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Tên tài khoản', 'required');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
        if($this->form_validation->run() === TRUE)
        {
            $run = $this->Mauthentic->loginAdmin();            
            if($run == 200)
            {
                redirect('index');
            }else if($run == 203){
                $this->data['result'] = 'Tài khoản chưa kích hoạt';
            }else{
                $this->data['result'] = 'Tài khoản hoặc mật khẩu không hợp lệ';
            }
        }
        $this->data['action'] = __FUNCTION__;
		$this->load->view('template/login/index',$this->data);
    }
    
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dang-nhap');
    }
    
	
	
}
