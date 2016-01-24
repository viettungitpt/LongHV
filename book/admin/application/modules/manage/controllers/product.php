<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Product extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['controller'] = 'product';   
        $this->load->model('Mproduct');
		$this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function index(){
		$this->data['txtsearch'] = $this->getParamString('txtsearch');
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = 100;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Mproduct->getProductDB($config['per_page'],$offset,$this->data['txtsearch']); ////////
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

	public function addproduct()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tenSanPham', 'Tên sản phẩm', 'required');
		$this->form_validation->set_rules('id_MaDanhMuc', 'Danh mục', 'required');
		$this->form_validation->set_rules('img_incens_hd_', 'Ảnh đại diện', 'required');
        $this->form_validation->set_rules('noiDungNgan', 'Tóm tắt', 'required');
		$this->form_validation->set_rules('giaSanPham', 'Giá', 'required');

		$this->form_validation->set_rules('noiDung', 'Nội dung', 'required');
		$this->form_validation->set_rules('kichHoat', 'Trạng thái', 'required');
		$this->form_validation->set_rules('khuyenMai', 'sách khuyến mại', 'required');
        $this->form_validation->set_rules('dacBiet', 'Sách đặc biệt', 'required');
		$this->form_validation->set_rules('id_MaTacGia', 'Tác giả', 'required');
		$this->form_validation->set_rules('id_MaNhaXuatBan', 'Nhà xuất bản', 'required');
		
        $this->data['getListCatParent'] = $this->Mproduct->getListCatParent();
		$this->data['getListCategoriesItem'] = $this->Mproduct->getListCategoriesItem();
		if($this->form_validation->run() === TRUE)
        {
            $tenSanPham = $this->getParamString('tenSanPham');	
			$id_MaDanhMuc = $this->getParamInt('id_MaDanhMuc');
			$noiDungNgan = $this->getParamString('noiDungNgan');
			$giaSanPham = $this->getParamInt('giaSanPham');
			$soLuong = $this->getParamInt('soLuong');
			$noiDung = $this->getParamString('noiDung');
			$kichHoat = $this->getParamInt('kichHoat');
			$khuyenMai = $this->getParamInt('khuyenMai');
            $dacBiet = $this->getParamInt('dacBiet');
			$id_MaTacGia = $this->getParamInt('id_MaTacGia');
			
			$id_MaNhaXuatBan = $this->getParamInt('id_MaNhaXuatBan');
			
			$dataimage = $this->getParamString('img_incens_hd_');
			$path1 = '';
			@mkdir(PROJECT_PATH.'/upload/'.$path1, 0301);
			$config['upload_path'] = '../upload/'.$path1;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$config['encrypt_name'] =  TRUE;// TRUE/FALSE (boolean)
			$this->load->library('upload', $config);
			if( !$this->upload->do_upload('fileupload')){
				$img = '';
			}else{
				$data_img = $this->upload->data();
				$img = $path1.$data_img['file_name'];
			}
	 
			//die('link ảnh: '.$img);
			$run = $this->Mproduct->addProductDb($tenSanPham,$id_MaDanhMuc,$noiDungNgan,$giaSanPham,$soLuong,$noiDung,$kichHoat,$img,$id_MaTacGia,$id_MaNhaXuatBan,$khuyenMai,$dacBiet);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Thêm thành công");window.location.href="'.$this->data['baseurl'].'danh-sach-san-pham";</script>');
            }
        }
        $this->data['action'] = 'addproduct';
        $this->load->view('template/layout', $this->data);
    }
	
	
	public function deleteproduct()
    {
		
        $id = $this->getParamUri(3,1);
        $run = $this->Mproduct->deleteProductDb($id);
        if(intval($run) == 200)
        {
            die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script>alert("Xóa thành công");window.location="'.$this->data['baseurl'].'manage/product/index";</script>');
        }
    }
	
	public function editproduct()
    {
		$id = $this->getParamUri(3,1);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tenSanPham', 'Tên sản phẩm', 'required');
		$this->form_validation->set_rules('id_MaDanhMuc', 'Danh mục', 'required');
        $this->form_validation->set_rules('noiDungNgan', 'Tóm tắt', 'required');
		$this->form_validation->set_rules('giaSanPham', 'Giá', 'required');
		$this->form_validation->set_rules('soLuong', 'Số lượng', 'required');
		$this->form_validation->set_rules('noiDung', 'Nội dung', 'required');
		$this->form_validation->set_rules('kichHoat', 'Trạng thái', 'required');
		$this->form_validation->set_rules('khuyenMai', 'sách khuyến mại', 'required');
        $this->form_validation->set_rules('dacBiet', 'Sách đặc biệt', 'required');
		$this->form_validation->set_rules('id_MaTacGia', 'Tác giả', 'required');
		$this->form_validation->set_rules('id_MaNhaXuatBan', 'Nhà xuất bản', 'required');
        
        
		$this->data['getProductInfo'] = $this->Mproduct->getProductInfo($id); //echo '<pre>';die(print_r($this->data['getProductInfo']));
        $this->data['getListCatParent'] = $this->Mproduct->getListCatParent();
        $this->data['getListCategoriesItem'] = $this->Mproduct->getListCategoriesItem();
        if($this->form_validation->run() === TRUE)
        {
			$tenSanPham = $this->getParamString('tenSanPham');	
			$id_MaDanhMuc = $this->getParamInt('id_MaDanhMuc');
			$noiDungNgan = $this->getParamString('noiDungNgan');
			$giaSanPham = $this->getParamInt('giaSanPham');
			$soLuong = $this->getParamInt('soLuong');
			$noiDung = $this->getParamString('noiDung');
			$kichHoat = $this->getParamInt('kichHoat');
			//$dataimage = $this->getParamString('img_incens_hd_');
            $khuyenMai = $this->getParamInt('khuyenMai');
            $dacBiet = $this->getParamInt('dacBiet');
			$id_MaTacGia = $this->getParamInt('id_MaTacGia');
			$id_MaNhaXuatBan = $this->getParamInt('id_MaNhaXuatBan');
			

            $dataimage_check = $this->getParamString('img_check');
            $verify_image = $this->getParamString('img_incens_verify');
            if(!in_array($verify_image, array(null, '')))
            {
                if($verify_image != $dataimage_check)
                {
                    @unlink(PROJECT_PATH.'/upload/'.$verify_image);
                }
            }
            $path1 = '';
			@mkdir(PROJECT_PATH.'/upload/'.$path1, 0301);
			$config['upload_path'] = '../upload/'.$path1;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$config['encrypt_name'] =  TRUE;// TRUE/FALSE (boolean)
			$this->load->library('upload', $config);
			if( !$this->upload->do_upload('fileupload')){
				$img = $dataimage_check;
			}else{
				$data_img = $this->upload->data();
				$img = $path1.$data_img['file_name'];
			}
			//die(''.$img);
			
			$run = $this->Mproduct->editproductDb($tenSanPham,$id_MaDanhMuc,$noiDungNgan,$giaSanPham,$soLuong,$noiDung,$kichHoat,$img,$id,$khuyenMai,$dacBiet,$id_MaTacGia,$id_MaNhaXuatBan);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Sửa thành công");window.location.href="'.$this->data['baseurl'].'danh-sach-san-pham";</script>');
            }
        }
        $this->data['action'] = 'editproduct';
        $this->load->view('template/layout', $this->data);
    }
    
}
