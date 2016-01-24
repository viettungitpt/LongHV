<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Order extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['controller'] = 'order';   
        $this->load->model('Morder');
        $this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function index(){
		$this->data['id_active'] = $this->getParamUri(2,3);
        $this->data['txtsearch'] = $this->getParamString('txtsearch');
		$this->load->library('pagination');
		$config['per_page'] = 190;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Morder->getOrderDB($config['per_page'],$offset,$this->data['txtsearch']); ////////
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
    
	public function deleteorder()
    {	
        $id = $this->getParamUri(3,1);
        $run = $this->Morder->deleteOrderDb($id);
        if(intval($run) == 200)
        {
            die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script>alert("Xóa thành công");window.location="'.$this->data['baseurl'].'danh-sach-dat-hang";</script>');
        }
    }
	
    
    	public function deleteorderdetail()
    {
        $id = $this->getParamUri(3,1);
        $run = $this->Morder->deleteOrderDetailDb($id);
        if(intval($run) == 200)
        {
            die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script>alert("Xóa thành công");window.location="'.$this->data['baseurl'].'danh-sach-dat-hang";</script>');
        }
    }
    
    
	public function editorder()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Họ tên', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mobile', 'số điện thoại', 'required');
		$this->form_validation->set_rules('address', 'Địa chỉ', 'required');
		$this->form_validation->set_rules('active', 'Trạng thái', 'required');
		$id = $this->getParamUri(3,1);
		$data = $this->Morder->getOrderInfo($id); //echo '<pre>'; die(''.print_r($data));
		$this->data['data_order'] = $data['order'];
        $this->data['data_orderdetail'] = $data['order_detail'];
        if($this->form_validation->run() === TRUE)
        {
            $name = $this->getParamString('name');
			$email = $this->getParamString('email');		
			$mobile = $this->getParamString('mobile');
			$address = $this->getParamString('address');
			$active = $this->getParamInt('active');
			$run = $this->Morder->editOrderDb($name,$email,$mobile,$address,$active,$id);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Sửa thành công");window.location.href="'.$this->data['baseurl'].'danh-sach-dat-hang/sua-don-hang/'.$id.'";</script>');
            }
        }
        $this->data['action'] = 'editorder';
        $this->load->view('template/layout', $this->data);
    }
    
}
