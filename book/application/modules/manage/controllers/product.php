<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'product';
        $this->load->model('Mproduct');
        $this->load->model('Mindex');
        $this->load->library('cart');
    }
    
    public function index(){
        $this->data['getSanPhamTrangChu'] = $this->Mindex->getSanPhamTrangChu(); 
        $this->data['action'] = 'index';
		$this->load->view('template/layout', $this->data);
    }
    
	public function newss()
    {   
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = $this->data['per_page'] = 12;
		$this->data['page'] = $this->getParamUri(2,3);
		$data = $this->Mproduct->getProductNewssDb($config['per_page'],(($this->getParamUri(2,3) - 1) * $config['per_page'] > 0 ? ($this->getParamUri(2,3) - 1) * $config['per_page'] : 0));
		$config['base_url'] = base_url($this->uri->segment(1));
		$config['total_rows'] = $data['count'];
		$config['uri_segment'] = 2;
		$config['uri_segment_page'] = $this->getParamUri(2,3);
		$config['suffix'] = '.html';
		$this->pagination->initialize($config);
		$this->data['pageg'] = $this->data['page'] - 1 > 0 ? $this->data['page'] - 1 : 0;
        //die(''.$this->data['pageg']);
		$this->data['data'] = $data;
        $this->data['action'] = 'newss';
		$this->load->view('template/layout', $this->data); 
    }
	
	public function promotion()
    {   
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = $this->data['per_page'] = 12;
		$this->data['page'] = $this->getParamUri(2,3);
		$data = $this->Mproduct->getProductPromotionDb($config['per_page'],(($this->getParamUri(2,3) - 1) * $config['per_page'] > 0 ? ($this->getParamUri(2,3) - 1) * $config['per_page'] : 0));
		$config['base_url'] = base_url($this->uri->segment(1));
		$config['total_rows'] = $data['count'];
		$config['uri_segment'] = 2;
		$config['uri_segment_page'] = $this->getParamUri(2,3);
		$config['suffix'] = '.html';
		$this->pagination->initialize($config);
		$this->data['pageg'] = $this->data['page'] - 1 > 0 ? $this->data['page'] - 1 : 0;
        //die(''.$this->data['pageg']);
		$this->data['data'] = $data;
        $this->data['action'] = 'promotion';
		$this->load->view('template/layout', $this->data); 
    }
	
    public function special()
    {   
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = $this->data['per_page'] = 12;
		$this->data['page'] = $this->getParamUri(2,3);
		$data = $this->Mproduct->getProductSpecialDb($config['per_page'],(($this->getParamUri(2,3) - 1) * $config['per_page'] > 0 ? ($this->getParamUri(2,3) - 1) * $config['per_page'] : 0));
		$config['base_url'] = base_url($this->uri->segment(1));
		$config['total_rows'] = $data['count'];
		$config['uri_segment'] = 2;
		$config['uri_segment_page'] = $this->getParamUri(2,3);
		$config['suffix'] = '.html';
		$this->pagination->initialize($config);
		$this->data['pageg'] = $this->data['page'] - 1 > 0 ? $this->data['page'] - 1 : 0;
        //die(''.$this->data['pageg']);
		$this->data['data'] = $data;
        $this->data['action'] = 'special';
		$this->load->view('template/layout', $this->data); 
    }
    
    
    public function categories()
    {
        $id_DanhMuc = $this->getParamUri(2,1);
        if( in_array($id_DanhMuc,array('',null)) ){
        redirect('');
        }
        $this->data['id_active'] = $this->getParamUri(3,3);
        $this->load->library('pagination');
        $config['per_page'] = $this->data['per_page'] = 12;
        $this->data['page'] = $this->getParamUri(3,3);
        $data = $this->Mproduct->getCategoriesDb($config['per_page'],(($this->getParamUri(3,3) - 1) * $config['per_page'] > 0 ? ($this->getParamUri(3,3) - 1) * $config['per_page'] : 0),$id_DanhMuc);
        $config['base_url'] = base_url($this->uri->segment(1).'/'.$this->uri->segment(2));
        
       // die(''.$config['base_url']);
        
        $config['total_rows'] = $data['count'];
        $config['uri_segment'] = 3;
        $config['uri_segment_page'] = $this->getParamUri(3,3); //die(''.$config['uri_segment_page']);
        $config['suffix'] = '.html';
        $this->pagination->initialize($config);
        $this->data['pageg'] = $this->data['page'] - 1 > 0 ? $this->data['page'] - 1 : 0;
        $this->data['data'] = $data;
        $this->data['action'] = 'categories';
        $this->load->view('template/layout', $this->data);
    }
    
     public function categoriesauthor()
    {
        $id_DanhMuc = $this->getParamUri(2,1);
        if( in_array($id_DanhMuc,array('',null)) ){
        redirect('');
        }
        $this->data['id_active'] = $this->getParamUri(3,3);
        $this->load->library('pagination');
        $config['per_page'] = $this->data['per_page'] = 20;
        $this->data['page'] = $this->getParamUri(3,3);
        $data = $this->Mproduct->getCategoriesAuthorDb($config['per_page'],(($this->getParamUri(3,3) - 1) * $config['per_page'] > 0 ? ($this->getParamUri(3,3) - 1) * $config['per_page'] : 0),$id_DanhMuc);
        $config['base_url'] = base_url($this->uri->segment(1).'/'.$this->uri->segment(2));
        
       // die(''.$config['base_url']);
        
        $config['total_rows'] = $data['count'];
        $config['uri_segment'] = 3;
        $config['uri_segment_page'] = $this->getParamUri(3,3); //die(''.$config['uri_segment_page']);
        $config['suffix'] = '.html';
        $this->pagination->initialize($config);
        $this->data['pageg'] = $this->data['page'] - 1 > 0 ? $this->data['page'] - 1 : 0;
        $this->data['data'] = $data;
        $this->data['action'] = 'categoriesauthor';
        $this->load->view('template/layout', $this->data);
    }
    
	public function cart(){
	   //unset($_SESSION['gio_hang']);die('');
      //echo '<pre>'; die(print_r($_SESSION['gio_hang']));
       
		$this->load->library('form_validation');
        $this->form_validation->set_rules('tenKH', 'Họ tên', 'required');
		$this->form_validation->set_rules('soDienThoai', 'Điện thoại', 'required');
		$this->form_validation->set_rules('emailKH', 'Email', 'required');
        $this->form_validation->set_rules('diaChi', 'Địa chỉ nhận hàng', 'required');
        $this->form_validation->set_rules('Cart', 'Nội dung giỏ hàng', 'required');
        if($this->form_validation->run() === TRUE)
        {
            $tenKH = $this->getParamString('tenKH');	
			$soDienThoai = $this->getParamString('soDienThoai');
			$emailKH = $this->getParamString('emailKH');
			$diaChi = $this->getParamString('diaChi');
			$ghiChu = $this->getParamString('ghiChu');
            $Cart = $this->getParamString('Cart');
			$type = $this->getParamInt('type');
			$run = $this->Mproduct->saveOrderDb($tenKH,$soDienThoai,$emailKH,$diaChi,$ghiChu,$Cart,$type);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Gửi đơn hàng thành công");window.location.href="'.$this->data['baseurl'].'";</script>');
            }else{
				die('<meta charset="utf-8"><script>alert("Bạn thiếu tiền");window.location.href="'.$this->data['baseurl'].'gio-hang.html";</script>');
			}
        }
		$this->data['action'] = 'cart';
		$this->load->view('template/layout', $this->data);
	}
	
	public function search(){
		$txtsearch = $this->getParamString('txtSearch');
		if( in_array($txtsearch,array('',null)) ){
			redirect('');
		}
		$this->data['txtsearch'] = $txtsearch;
		$this->data['data'] = $this->Mproduct->searchDb($txtsearch);
        //echo '<pre>'; die(print_r($this->data['data']));
		$this->data['action'] = 'search';
		$this->load->view('template/layout', $this->data);
	}
	
	public function detail()
    {   
		$idSanPham = $this->getParamUri(2,1);
		if( in_array($idSanPham,array('',null)) ){
			redirect('');
		}
		$this->data['data'] = $this->Mproduct->getProductDetailDb($idSanPham);
		//echo '<pre>';die(print_r($this->data['data']));
        $this->data['getSoLuongDaBan'] = $this->Mproduct->getSoLuongDaBan($idSanPham);
		$this->data['sachLienQuan'] = $this->Mproduct->sachLienQuan($idSanPham);
		$this->data['soSao'] = $this->Mproduct->soSao($idSanPham);
		$this->data['checkvote'] = $this->Mproduct->checkvote($idSanPham);
		$this->data['namecategories'] = $this->Mproduct->namecategories($idSanPham);
        //die(''.$this->data['checkvote']);
		$this->load->library('form_validation');
        $this->form_validation->set_rules('vote', 'số sao', 'required');
		$this->form_validation->set_rules('pid', 'Pid', 'required');
        if($this->form_validation->run() === TRUE)
        {
            $vote = $this->getParamString('vote');	
			$pid = $this->getParamString('pid');
			$run = $this->Mproduct->saveVoteDb($vote,$pid);
            if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Bình chọn thành công");window.location.href="'.$this->data['baseurl'].'san-pham/'.$pid.'.html";</script>');
            }
        }
		$this->data['action'] = 'detail';
		$this->load->view('template/layout', $this->data);
	}
	
	///////
    public function ajaxaddcart(){
        $product_id = $this->getParamInt('product_id');
        $quantity = $this->getParamInt('quantity');
        if( isset($_SESSION['gio_hang'][$product_id]) ){
            $qty = $_SESSION['gio_hang'][$product_id]['qty'] + $quantity;
    	}else{
            $qty = $quantity;
    	}
        $datap = $this->db->query('SELECT tenSanPham AS name, giaSanPham AS  price, hinhAnh AS image FROM sanpham WHERE maSanPham = '.$product_id)->row_object();
        $_SESSION['gio_hang'][$product_id] = array ( 
                    'product_id' => $product_id,
                    'name' => $datap->name,
                    'image' => $datap->image,
                    'price' => $datap->price, 
                    'qty' => $qty 
               );
       echo '200';
    }
    
    public function ajaxupdatecart(){
        $product_id = $this->getParamInt('product_id');
        $quantity = $this->getParamInt('quantity');
        $datap = $this->db->query('SELECT name, price FROM product WHERE id = '.$product_id)->row_object();
        if( $quantity == 0 ){
            unset ($_SESSION['gio_hang'][$product_id]);
        }else{
            $_SESSION['gio_hang'][$product_id] = array ( 
                    'product_id' => $product_id, 
                    'name' => $_SESSION['gio_hang'][$product_id]['name'], 
                    'price' => $_SESSION['gio_hang'][$product_id]['price'],
                    'image' => $_SESSION['gio_hang'][$product_id]['image'],  
                    'qty' => $quantity 
                );
        }
       echo '200';
    }
    
    public function ajaxdeletecartitem(){
        $product_id = $this->getParamInt('product_id');
        unset ($_SESSION['gio_hang'][$product_id]);
        echo '200';
    }
    
    public function ajaxdeletecartall(){
        unset ($_SESSION['gio_hang']);
        echo '200';
    }
    
	public function deleteorder(){
		$order_id = $this->getParamInt('don_hang_id');
		if( in_array($order_id,array('',null)) || in_array($this->session->userdata('maNguoiDung'),array('',null)) ){
			redirect('tai-khoan');
		}else{
			$this->Mproduct->deleteorder($order_id);
			redirect('tai-khoan');
		}
	}
	
}
