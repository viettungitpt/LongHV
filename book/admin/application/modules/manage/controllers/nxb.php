<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Nxb extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'nxb';   
        $this->load->model('Mnxb');
        $this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function index(){
		$this->data['id_active'] = $this->getParamUri(2,3);
        $this->data['txtsearch'] = $this->getParamString('txtsearch');
		$this->load->library('pagination');
		$config['per_page'] = 100;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Mnxb->getNhaxuatbanDB($config['per_page'],$offset,$this->data['txtsearch']); 
		$config['base_url'] = base_url($this->uri->segment(1));
		$config['total_rows'] = $data['count'];
		$config['uri_segment'] = 2;
		$config['uri_segment_page'] = $this->getParamUri(2,3);
		$config['suffix'] = '.html';
		$this->pagination->initialize($config);
		$this->data['pageg'] = $this->data['page'] - 1 > 0 ? $this->data['page'] - 1 : 0;
		$this->data['data'] = $data;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('check-delete', 'Mục cần xóa', 'required');
		$this->data['action'] = 'index';
		$this->load->view('template/layout', $this->data);
	}
	
	public function delete(){
		$id = $this->getParamUri(3,1);
		$this->Mnxb->deleteNhaXuatBanDb($id);
		redirect('nha-xuat-ban');
	}
	
	public function add(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('tenNhaXuatBan', 'Tên nhà xuất bản', 'required');
        if($this->form_validation->run() === TRUE)
        {
			$tenNhaXuatBan = $this->getParamString("tenNhaXuatBan");
            $run = $this->Mnxb->addNhaXuatBanDb($tenNhaXuatBan);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Lưu thành công");window.location.href="'.$this->data['baseurl'].'nha-xuat-ban";</script>');
            }
        }
        $this->data['action'] = 'add';
        $this->load->view('template/layout', $this->data);
	}
	
	
	public function edit(){
		$id = $this->getParamUri(3,1);
		$this->load->library('form_validation');
        $this->form_validation->set_rules('tenNhaXuatBan', 'Tên nhà xuất bản', 'required');
        $this->data['data'] = $this->Mnxb->getNhaxuatbanInfo($id); 
        if($this->form_validation->run() === TRUE)
        {
			$tenNhaXuatBan = $this->getParamString("tenNhaXuatBan");
            $run = $this->Mnxb->updateNhaXuatBanDb($tenNhaXuatBan,$id);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Lưu thành công");window.location.href="'.$this->data['baseurl'].'nha-xuat-ban";</script>');
            }
        }
        $this->data['action'] = 'edit';
        $this->load->view('template/layout', $this->data);
	}
}
