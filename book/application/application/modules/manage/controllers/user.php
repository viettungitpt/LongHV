<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'user';
        $this->load->model('Muser');
    }

	public function index()
    {   
        if ( in_array($this->session->userdata('maNguoiDung'),array('',null)) ){
            redirect('dang-nhap');
        }
		$this->data['data'] = $this->Muser->getOrder();
		$this->data['action'] = 'index';
		$this->load->view('template/layout', $this->data);
	}
	
	public function login()
    {   
		if ( !in_array($this->session->userdata('maNguoiDung'),array('',null)) ){
            redirect('tai-khoan');
        }
		$this->load->library('form_validation');
        $this->form_validation->set_rules('tenDangNhap', 'Tên đăng nhập', 'required');
        $this->form_validation->set_rules('matKhau', 'Mật khẩu', 'required');
        if($this->form_validation->run() === TRUE)
        {
            $tenDangNhap = $this->getParamString('tenDangNhap');
            $matKhau = $this->getParamString('matKhau');
            $run = $this->Muser->loginDb($tenDangNhap,$matKhau);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Đăng nhập thành công");window.location.href="'.$this->data['baseurl'].'tai-khoan.html";</script>');
            }else{
				die('<meta charset="utf-8"><script>alert("Sai tài khoản hoặc mật khẩu");window.location.href="'.$this->data['baseurl'].'tai-khoan.html";</script>');
			}
        }
		$this->data['action'] = 'login';
		$this->load->view('template/layout', $this->data);
	}
	
	public function register()
    { 
		$this->load->library('form_validation');
        $this->form_validation->set_rules('tenDangNhap', 'Tên đăng nhập', 'required');
        $this->form_validation->set_rules('matKhau', 'Mật khẩu', 'required');
        $this->form_validation->set_rules('diaChiEmail', 'Địa chỉ email', 'required');
        $this->form_validation->set_rules('soDienThoai', 'Số điện thoại', 'required');
        $this->form_validation->set_rules('tenCongTy', 'Tên công ty', 'required');
        $this->form_validation->set_rules('diaChi', 'Địa chỉ', 'required');
		$this->form_validation->set_rules('terms', 'Bạn cần chấp nhận quy định của website', 'required');
		
        
        if($this->form_validation->run() === TRUE)
        {
            $tenDangNhap = $this->getParamString('tenDangNhap');
            $matKhau = $this->getParamString('matKhau');
            $diaChiEmail = $this->getParamString('diaChiEmail'); 
            $soDienThoai = $this->getParamString('soDienThoai');
            $tenCongTy = $this->getParamString('tenCongTy');
            $diaChi = $this->getParamString('diaChi');
            $run = $this->Muser->registerDb($tenDangNhap,$matKhau,$diaChiEmail,$soDienThoai,$tenCongTy,$diaChi);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Đăng kí thành công");window.location.href="'.$this->data['baseurl'].'dang-nhap";</script>');
            }else{
                die('<meta charset="utf-8"><script>alert("Tên đăng nhập/email đã tồn tại");window.location.href="'.$this->data['baseurl'].'dang-ki";</script>');
            }
        }
        
		$this->data['action'] = 'register';
		$this->load->view('template/layout', $this->data);
	}
	
    public function logout(){
        $this->session->sess_destroy();
        redirect('');
    }
    
	public function profile(){
		if ( in_array($this->session->userdata('maNguoiDung'),array('',null)) ){
            redirect('dang-nhap');
        }
		$this->data['data'] = $this->Muser->profileDb($this->session->userdata('maNguoiDung'));
		$this->load->library('form_validation');
        $this->form_validation->set_rules('soDienThoai', 'Số điện thoại', 'required');
        $this->form_validation->set_rules('tenCongTy', 'Tên công ty', 'required');
        $this->form_validation->set_rules('diaChi', 'Địa chỉ', 'required');
		if($this->form_validation->run() === TRUE)
        {
            $matKhau = $this->getParamString('matKhau');
            $soDienThoai = $this->getParamString('soDienThoai');
            $tenCongTy = $this->getParamString('tenCongTy');
            $diaChi = $this->getParamString('diaChi');
            $run = $this->Muser->updateProfileDb($matKhau,$soDienThoai,$tenCongTy,$diaChi);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Cập nhật thành công");window.location.href="'.$this->data['baseurl'].'thong-tin-tai-khoan";</script>');
            }else{
                die('<meta charset="utf-8"><script>alert("Lỗi không thể cập nhật");window.location.href="'.$this->data['baseurl'].'thong-tin-tai-khoan";</script>');
            }
        }
		$this->data['action'] = 'profile';
		$this->load->view('template/layout', $this->data);
	}
	
}
