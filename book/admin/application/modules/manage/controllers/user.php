<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'user';   
        $this->load->model('Muser');
        $this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function changepw(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pword', 'Mật khẩu cũ', 'required');
        $this->form_validation->set_rules('pword1', 'Mật khẩu mới', 'required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('pword2', 'Nhập lại mật khẩu mới', 'required|min_length[6]|max_length[32]|matches[pword1]');
        if($this->form_validation->run() === TRUE)
        {
			$pword = $this->getParamString("pword");
			$pword1 = $this->getParamString("pword1");
            $pword2 = $this->getParamString("pword2");
            $run = $this->Muser->updateChangepwDb($pword,$pword1,$pword2);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Cập nhật thành công");window.location.href="'.$this->data['baseurl'].'doi-mat-khau";</script>');
            }else{
				die('<meta charset="utf-8"><script>alert("Mật khẩu cũ không đúng");window.location.href="'.$this->data['baseurl'].'doi-mat-khau";</script>');
			}
        }
        $this->data['action'] = 'changepw';
        $this->load->view('template/layout', $this->data);
    }
	
	public function profile(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hoTen', 'Họ và tên', 'required');
        $this->form_validation->set_rules('soDienThoai', 'Số điện thoại', 'required');
		$this->form_validation->set_rules('diaChi', 'Địa chỉ', 'required');
        $this->data['data'] = $this->Muser->getUserid($this->session->userdata('maQuanLy'));
        if($this->form_validation->run() === TRUE)
        {
			$hoTen = $this->getParamString("hoTen");
			$soDienThoai = $this->getParamString("soDienThoai");
			$diaChi = $this->getParamString("diaChi");
            $run = $this->Muser->updateProfileDb($hoTen,$soDienThoai,$diaChi);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Lưu thành công");window.location.href="'.$this->data['baseurl'].'cap-nhat-thong-tin";</script>');
            }
        }
        $this->data['action'] = 'profile';
        $this->load->view('template/layout', $this->data);
    }
    public function index(){
		$this->data['id_active'] = $this->getParamUri(2,3);
        $this->data['txtsearch'] = $this->getParamString('txtsearch');
		$this->load->library('pagination');
		$config['per_page'] = 100;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Muser->getUserDB($config['per_page'],$offset,$this->data['txtsearch']); 
		//echo '<pre>';die(print_r($data));
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
		$this->Muser->deleteUserDb($id);
		redirect('nguoi-dung');
	}
	
	public function add(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tenDangNhap', 'Tên đăng nhập', 'required');
        $this->form_validation->set_rules('matKhau', 'Mật khẩu', 'required');
		$this->form_validation->set_rules('hoTen', 'Họ và tên', 'required');
		$this->form_validation->set_rules('diaChiEmail', 'Địa chỉ email', 'required');
        $this->form_validation->set_rules('soDienThoai', 'Số điện thoại', 'required');
		$this->form_validation->set_rules('diaChi', 'Địa chỉ', 'required');
		$this->form_validation->set_rules('coin', 'Số tiền', 'required');
        if($this->form_validation->run() === TRUE)
        {
			$tenDangNhap = $this->getParamString("tenDangNhap");
			$matKhau = $this->getParamString("matKhau");
			$diaChiEmail = $this->getParamString("diaChiEmail");
			$hoTen = $this->getParamString("hoTen");
			$soDienThoai = $this->getParamString("soDienThoai");
			$diaChi = $this->getParamString("diaChi");
			$coin = $this->getParamInt('coin');
			$kichHoat = $this->getParamInt('kichHoat');
            $run = $this->Muser->AddUserDb($tenDangNhap,$matKhau,$diaChiEmail,$hoTen,$soDienThoai,$diaChi,$coin,$kichHoat);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Lưu thành công");window.location.href="'.$this->data['baseurl'].'nguoi-dung";</script>');
            }
        }
        $this->data['action'] = 'add';
        $this->load->view('template/layout', $this->data);
	}
	
	public function edit(){
		$id = $this->getParamUri(3,1);
		$this->load->library('form_validation');
        $this->form_validation->set_rules('hoTen', 'Họ và tên', 'required');
        $this->form_validation->set_rules('soDienThoai', 'Số điện thoại', 'required');
		$this->form_validation->set_rules('diaChi', 'Địa chỉ', 'required');
		$this->form_validation->set_rules('coin', 'Số tiền', 'required');
		
		
        $this->data['data'] = $this->Muser->getUserInfo($id); //echo '<pre>';die(print_r($this->data['data']));
        if($this->form_validation->run() === TRUE)
        {
			$hoTen = $this->getParamString("hoTen");
			$soDienThoai = $this->getParamString("soDienThoai");
			$diaChi = $this->getParamString("diaChi");
			$coin = $this->getParamInt('coin');
			$matKhau = $this->getParamString('matKhau');
            $run = $this->Muser->updateUserDb($hoTen,$soDienThoai,$diaChi,$coin,$id,$matKhau);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Lưu thành công");window.location.href="'.$this->data['baseurl'].'nguoi-dung";</script>');
            }
        }
        $this->data['action'] = 'edit';
        $this->load->view('template/layout', $this->data);
	}
}
