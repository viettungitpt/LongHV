<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Feedback extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['controller'] = 'feedback';   
        $this->load->model('Mfeedback');
		$this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function index(){
       
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = 10;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Mfeedback->getFeedbackDB($config['per_page'],$offset);
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
    
	public function deletefeedback()
    {	
        $id = $this->getParamUri(3,1);
        $run = $this->Mfeedback->deleteFeedbackID($id);
        if(intval($run) == 200)
        {
            die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script>/*alert("Xóa thành công");*/window.location="'.$this->data['baseurl'].'danh-sach-phan-hoi";</script>');
        }
    }
	
	public function editfeedback()
    {	
        $this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Họ tên', 'required');
		$this->form_validation->set_rules('mobile', 'Số điện thoại', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('address', 'Địa chỉ', 'required');
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
		$this->form_validation->set_rules('content', 'Nội dung', 'required');
		$this->form_validation->set_rules('active', 'Trạng thái', 'required');
        $id = $this->getParamUri(3,1);
		$this->data['getFeedbackInfo'] = $this->Mfeedback->getFeedbackInfo($id);
        if($this->form_validation->run() === TRUE)
        {
            $name = $this->getParamString('name');	
			$mobile = $this->getParamString('mobile');
			$email = $this->getParamString('email');
			$address = $this->getParamString('address');
            $title = $this->getParamString('title');
			$content = $this->getParamString('content');
            $active = $this->getParamInt('active');
			
			$run = $this->Mfeedback->editFeedbackDb($name,$mobile,$email,$address,$title,$content,$active,$id);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Lưu thành công");window.location.href="'.$this->data['baseurl'].'danh-sach-phan-hoi";</script>');
            }
        }
		
        $this->data['action'] = 'editfeedback';
        $this->load->view('template/layout', $this->data);
    }
    
}
