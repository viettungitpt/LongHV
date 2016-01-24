<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mproduct extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function getCategoriesDb($number,$offset,$id_DanhMuc){
		$danhMucInfo = $this->db->query('SELECT * FROM danhmuc WHERE maDanhMuc = '.$id_DanhMuc)->row_object();
        $limit = $offset ? intval($offset) : '0';
		$sql .= " SELECT * FROM `sanpham` WHERE kichHoat = 1 AND id_MaDanhMuc = ".$id_DanhMuc." ORDER BY ngayTao DESC ";
        $xdata = " LIMIT ".$limit.",".$number." ";
        $xs = $this->db->query($sql.$xdata)->result_object(); 
        $count = $this->db->query($sql)->num_rows();
        return array('data' => $xs, 'count' => $count, 'catinfo' => $danhMucInfo);  
	}	
	
    
    	public function getCategoriesAuthorDb($number,$offset,$id_DanhMuc){
		$danhMucInfo = $this->db->query('SELECT * FROM tacgia WHERE maTacGia = '.$id_DanhMuc)->row_object();
        $limit = $offset ? intval($offset) : '0';
		$sql .= " SELECT * FROM `sanpham` WHERE kichHoat = 1 AND id_MaTacGia = ".$id_DanhMuc." ORDER BY ngayTao DESC ";
        $xdata = " LIMIT ".$limit.",".$number." ";
        $xs = $this->db->query($sql.$xdata)->result_object(); 
        $count = $this->db->query($sql)->num_rows();
        return array('data' => $xs, 'count' => $count, 'catinfo' => $danhMucInfo);  
	}
    
    public function getProductNewssDb($number,$offset){
        $limit = $offset ? intval($offset) : '0';
		$sql .= " SELECT s.*, t.tenTacGia FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacgia  WHERE s.kichHoat = 1 ORDER BY s.ngayTao DESC ";
        $xdata = " LIMIT ".$limit.",".$number." ";
        $xs = $this->db->query($sql.$xdata)->result_object(); 
        $count = $this->db->query($sql)->num_rows();
        return array('data' => $xs, 'count' => $count, 'catinfo' => $danhMucInfo);  
	}
    
	public function getProductPromotionDb($number,$offset){
        $limit = $offset ? intval($offset) : '0';
		$sql .= " SELECT s.*, t.tenTacGia FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacgia  WHERE s.kichHoat = 1 AND s.khuyenMai = 1 ORDER BY s.ngayTao DESC ";
        $xdata = " LIMIT ".$limit.",".$number." ";
        $xs = $this->db->query($sql.$xdata)->result_object(); 
        $count = $this->db->query($sql)->num_rows();
        return array('data' => $xs, 'count' => $count, 'catinfo' => $danhMucInfo);  
	}
	
    public function getProductSpecialDb($number,$offset){
        $limit = $offset ? intval($offset) : '0';
		$sql .= " SELECT s.*, t.tenTacGia FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacgia  WHERE s.kichHoat = 1 AND s.dacBiet = 1 ORDER BY s.ngayTao DESC ";
        $xdata = " LIMIT ".$limit.",".$number." ";
        $xs = $this->db->query($sql.$xdata)->result_object(); 
        $count = $this->db->query($sql)->num_rows();
        return array('data' => $xs, 'count' => $count, 'catinfo' => $danhMucInfo);  
	}
	
	public function categoriesInfo($permalink){
		return $this->db->query('SELECT * FROM categories WHERE permalink = "'.$permalink.'" LIMIT 1')->row_object();
	}
	
		
	public function searchDb($txtsearch){
		//die(''.'SELECT * FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacGia WHERE s.`tensanpham` LIKE "%'.$txtsearch.'%" OR  t.tenTacGia LIKE "%'.$txtsearch.'%" ');
		$data = $this->db->query('SELECT * FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacGia WHERE s.`tensanpham` LIKE "%'.$txtsearch.'%" OR  t.tenTacGia LIKE "%'.$txtsearch.'%" ')->result_object();
		return $data;
	}
	
	public function listCategories(){
		$data = $this->db->query('select * from `categories` where active = 1 AND parent_id = 0 AND `type_organization_content` = "categories_product" ORDER BY `order` ASC ')->result_object();
		foreach ( $data AS $el=>$le ){
			$parent = $this->db->query('select * from `categories` where active = 1 AND parent_id = '.$le->id.' AND `type_organization_content` = "categories_product2" ORDER BY `order` ASC')->result_object();
			$data[$el]->parent = $parent;
		}
		return $data;
	}

	public function getProductDetailDb($idSanPham){
		return $this->db->query('SELECT s.*, t.tenTacGia, n.tenNhaXuatBan FROM sanpham AS s INNER JOIN tacgia AS t ON t.maTacGia = s.id_MaTacGia INNER JOIN nhaxuatban AS n ON n.maNhaXuatBan = s.id_MaNhaXuatBan WHERE s.kichHoat = 1 AND s.maSanPham = '.$idSanPham.' LIMIT 1')->row_object();
	}
	
    public function getSoLuongDaBan($idSanPham){
        return $this->db->query('SELECT sum(soLuong) as soluong FROM dathangchitiet WHERE id_maSanPham = '.$idSanPham.' ')->row_object()->soluong;
	}
    
	public function ajaxAddCart(){
        $id = $this->getParamInt('id');
        $qty = 1;
        $data_item = $this->db->query('SELECT maSanPham AS id, tenSanPham AS name, giaSanPham AS price FROM sanpham WHERE maSanPham = '.$id)->row_array();
        $data_item[qty] = $qty;
        $this->cart->insert($data_item);
        return '200';
	}
    
    public function ajaxUpdateCart(){
        $rowid = $this->getParamString('rowid');
        $qty = $this->getParamInt('qty');
        $this->cart->update(array( 'rowid' => $rowid, 'qty' => $qty )); 
        return '200';
	}
    
    public function saveOrderDb($tenKH,$soDienThoai,$emailKH,$diaChi,$ghiChu,$Cart,$type){
        $data = array( 
            'tenKH' => $tenKH,
            'soDienThoai' => $soDienThoai,
            'emailKH' => $emailKH,
            'diaChi' => $diaChi,
            'noiDung' => $Cart,
            'kichHoat' => 0,
            'ngayTao' => date('Y-m-d H:i:s'),
            'ghiChu' => $ghiChu,
            'id_MaNguoiDung' => $this->session->userdata('maNguoiDung')
            );
		
		$tongtien = 0;
	    foreach( $_SESSION['gio_hang'] AS $el=>$le ){
            $tongtien += ($le['price']*$le['qty']); 
        }
		$data['coin'] = '';
		if( $type == 1 ){
			if( $tongtien >= $this->session->userdata('coin') ){
				return 201; 
			}else{
				$coin_ = $this->session->userdata('coin') - $tongtien;
				$this->db->update('nguoidung',array('coin' => $coin_),'maNguoiDung = '.$this->session->userdata('maNguoiDung'));
				$datas = array(
					'coin' => $coin_
				);
            $this->session->set_userdata($datas);
				$data['coin'] = $tongtien;
			}
		}
		
        $this->db->insert('dathang',$data);
		$id_DatHang = $this->db->insert_id();
		foreach ($_SESSION['gio_hang'] AS $el=>$le) {
		 $arr = array (
			'id_maSanPham' => $le['product_id'],
			'soLuong' => $le['qty'],
			'gia' => $le['price'],
			'id_maDonhang' => $id_DatHang,
            'id_MaNguoiDung' => $this->session->userdata('maNguoiDung')
			);	
		$this->db->insert('dathangchitiet',$arr);	
	   }  
        unset($_SESSION['gio_hang']);
        return '200';
    }
    
	public function sachLienQuan($idSanPham){
		return $this->db->query('SELECT * FROM sanpham WHERE maSanPham != '.$idSanPham.' LIMIT 6')->result_object();
	}
	
	public function soSao($idSanPham){
		$d1 = $this->db->query('SELECT count(maBinhChon) as maBinhChon FROM binhchon WHERE soSao = 1 AND id_MaSanPham = '.$idSanPham.' ')->row_object()->maBinhChon;
		$d2 = $this->db->query('SELECT count(maBinhChon) as maBinhChon FROM binhchon WHERE soSao = 2 AND id_MaSanPham = '.$idSanPham.' ')->row_object()->maBinhChon;
		$d3 = $this->db->query('SELECT count(maBinhChon) as maBinhChon FROM binhchon WHERE soSao = 3 AND id_MaSanPham = '.$idSanPham.' ')->row_object()->maBinhChon;
		$d4 = $this->db->query('SELECT count(maBinhChon) as maBinhChon FROM binhchon WHERE soSao = 4 AND id_MaSanPham = '.$idSanPham.' ')->row_object()->maBinhChon;
		$d5 = $this->db->query('SELECT count(maBinhChon) as maBinhChon FROM binhchon WHERE soSao = 5 AND id_MaSanPham = '.$idSanPham.' ')->row_object()->maBinhChon;
		return array(
			'1sao' => $d1,
			'2sao' => $d2,
			'3sao' => $d3,
			'4sao' => $d4,
			'5sao' => $d5
				);
	}
	
	public function checkvote($idSanPham){
	   if ( !in_array( $this->session->userdata('maNguoiDung'),array('',null) ) ){
	       $check = $this->db->query('SELECT * FROM binhchon WHERE id_manguoidung = '.$this->session->userdata('maNguoiDung').' AND id_masanpham = '.$idSanPham)->num_rows();
            if( $check == 0 ){
                return 0;
            }else{
                return 1;
            }
        }else{
            return 1;
        }
	}
	
	public function saveVoteDb($vote,$pid){
		$arr = array('soSao' => $vote, 'id_MaSanPham' => $pid, 'id_maNguoiDung' => $this->session->userdata('maNguoiDung'));
		$this->db->insert('binhchon',$arr);
		return 200;
	}
	
	public function deleteorder($order_id){
		$check = $this->db->query('SELECT * FROM dathang WHERE maDatHang = '.$order_id.' AND id_maNguoiDung = '.$this->session->userdata('maNguoiDung').' ')->num_rows();
		if( $check == 0 ){
			die('Không tồn tại đơn hàng này');
		}else{
			$this->db->delete('dathang',array('maDatHang' => $order_id));
			$this->db->delete('dathangchitiet',array('id_maDonHang' => $order_id));
		}
	}
	
}
