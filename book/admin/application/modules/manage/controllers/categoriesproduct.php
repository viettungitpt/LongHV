<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Categoriesproduct extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['controller'] = 'categoriesproduct';   
        $this->load->model('Mcategoriesproduct');
        $this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function index(){  
 
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = 100;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Mcategoriesproduct->getCategoriesProductDB($config['per_page'],$offset);
		//echo '<pre>';die(print_r($data));
		$config['base_url'] = base_url($this->uri->segment(1));
		$config['total_rows'] = $data['count'];
		$config['uri_segment'] = 4;
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
    
	public function addcategories()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tenDanhMuc', 'Tên danh mục', 'required');
        $this->form_validation->set_rules('thuTu', 'Thứ tự', 'required|numeric');
		$this->form_validation->set_rules('kichHoat', 'Trạng thái', 'required');
        if($this->form_validation->run() === TRUE)
        {
            $tenDanhMuc = $this->getParamString('tenDanhMuc');	
			$thuTu = $this->getParamInt('thuTu');
			$kichHoat = $this->getParamInt('kichHoat');
			$run = $this->Mcategoriesproduct->addCategoriesDb($tenDanhMuc,$thuTu,$kichHoat);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Thêm thành công");window.location.href="'.$this->data['baseurl'].'danh-muc-san-pham";</script>');
            }
        }
		
        $this->data['action'] = 'addcategories';
        $this->load->view('template/layout', $this->data);
    }
	
	
	public function deletecategories()
    {
        $id = $this->getParamUri(3,1);
        $run = $this->Mcategoriesproduct->deleteCategoriesDb($id);
        if(intval($run) == 200)
        {
            die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script>/*alert("Xóa thành công");*/window.location="'.$this->data['baseurl'].'danh-muc-san-pham";</script>');
        }
    }
	
	public function editcategories()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tenDanhMuc', 'Tên danh mục', 'required');
        $this->form_validation->set_rules('thuTu', 'Thứ tự', 'required');
		$this->form_validation->set_rules('kichHoat', 'Trạng thái', 'required');
        $id = $this->getParamUri(3,1);
		$this->data['getInfoCategories'] = $this->Mcategoriesproduct->getInfoCategories($id);
		$this->data['id'] = $id;
        if($this->form_validation->run() === TRUE)
        {
            $tenDanhMuc = $this->getParamString('tenDanhMuc');
			$thuTu = $this->getParamString('thuTu');	
			$kichHoat = $this->getParamInt('kichHoat');
			$run = $this->Mcategoriesproduct->editCategoriesDb($id,$tenDanhMuc,$thuTu,$kichHoat);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Sửa thành công");window.location.href="'.$this->data['baseurl'].'danh-muc-san-pham/sua-danh-muc/'.$id.'";</script>');
            }
        }
        $this->data['action'] = 'editcategories';
        $this->load->view('template/layout', $this->data);
    }
    
}
