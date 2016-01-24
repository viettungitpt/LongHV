<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'index';
        $this->load->model('Mindex'); 
    }
    
    public function index()
    {   
		$data = $this->Mindex->getProductHomeDb();
        $this->data['data'] = $data;
        ///echo '<pre>'; die(print_r($data));
        $this->data['action'] = 'index';
		$this->load->view('template/layout', $this->data); 
    }
    
	public function contact(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('HoTen', 'Họ tên', 'required');
		$this->form_validation->set_rules('DienThoai', 'Điện thoại', 'required');
		$this->form_validation->set_rules('Email', 'Email', 'required');
        $this->form_validation->set_rules('DiaChi', 'Địa chỉ', 'required');
		$this->form_validation->set_rules('TieuDe', 'Tiêu đề', 'required');
		$this->form_validation->set_rules('NoiDungLienHe', 'Nội dung', 'required');
        if($this->form_validation->run() === TRUE)
        {
            $HoTen = $this->getParamString('HoTen');	
			$DienThoai = $this->getParamString('DienThoai');
			$Email = $this->getParamString('Email');
			$DiaChi = $this->getParamString('DiaChi');
			$TieuDe = $this->getParamString('TieuDe');
			$NoiDungLienHe = $this->getParamString('NoiDungLienHe');
			$run = $this->Mindex->saveFeedbackDb($HoTen,$DienThoai,$Email,$DiaChi,$TieuDe,$NoiDungLienHe);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Gửi phản hồi thành công");window.location.href="'.$this->data['baseurl'].'lien-he.html";</script>');
            }
        }
		$this->data['action'] = 'contact';
		$this->load->view('template/layout', $this->data); 
	}
	
	public function intro(){
		$this->data['action'] = 'intro';
		$this->load->view('template/layout', $this->data); 
	}
	
}
