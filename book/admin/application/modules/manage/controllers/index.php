<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(in_array($this->session->userdata('maQuanLy'), array(null,'')))
        {
            redirect('dang-xuat');
        }
        $this->data['controller'] = 'index';
        $this->load->model('Mindex');
    }
    
    public function index()
    {
        $this->data['action'] = 'index';
        $this->load->view('template/layout', $this->data);
    }
    
	public function report(){
		$this->data['tongsospdaban'] = $this->Mindex->tongsospdaban();
		
		$this->data['action'] = 'report';
        $this->load->view('template/layout', $this->data);
	}
	
}
