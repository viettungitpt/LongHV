<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Article extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'article';
        $this->load->model('Marticle');
    }
    
    public function index(){
        $this->data['getDanhSachTinTuc'] = $this->Marticle->getDanhSachTinTuc();
        $this->data['action'] = 'index';
		$this->load->view('template/layout', $this->data);
    }
    
	public function detail()
    {   
		$idBaiViet = $this->getParamUri(2,1);
		if( in_array($idBaiViet,array('',null)) ){
			redirect('');
		}
		$this->data['data'] = $this->Marticle->getDetailDb($idBaiViet);
		$this->data['action'] = 'detail';
		$this->load->view('template/layout', $this->data);
	}
	
}
