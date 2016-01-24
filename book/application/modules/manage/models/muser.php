<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Muser extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function loginDb($tenDangNhap,$matKhau){
		$sql = $this->db->query('SELECT * FROM nguoidung WHERE tendangnhap = "'.$tenDangNhap.'" AND matKhau = "'.$matKhau.'" AND kichHoat = 1');
		if($sql->num_rows() > 0)
        {
            $data = $sql->row();
            $data = array(
                'maNguoiDung' => $data->maNguoiDung,
                'tenDangNhap' => $data->tenDangNhap,
                'hoTen' => $data->hoTen,
                'diaChiEmail' => $data->diaChiEmail,
				'soDienThoai' => $data->soDienThoai,
				'coin' => $data->coin
            );
            $this->session->set_userdata($data);
            return '200';
        }else{
			return '201';
		}
	}
	
	public function registerDb($tenDangNhap,$matKhau,$diaChiEmail,$soDienThoai,$tenCongTy,$diaChi){
	   $check = $this->db->query('SELECT * FROM nguoidung WHERE tenDangNhap = "'.$tenDangNhap.'" OR diaChiEmail = "'.$diaChiEmail.'" LIMIT 1 ');
       if( $check->num_rows() == 0 ){
        $arr = array(
                'tenDangNhap' => $tenDangNhap,
                'matKhau' => $matKhau,
                'diaChiEmail' => $diaChiEmail,
                'soDienThoai' => $soDienThoai,
                'kichHoat' => 1,
                'tenCongTy' => $tenCongTy,
                'diaChi' => $diaChi,
                'ngayTao' => date('Y-m-d H:i:s'),
                'quyen' => 0,
				'coin' => 0
            );
        $this->db->insert('nguoidung',$arr);
        return '200';
       }else{
        return '201';
       }
	}
	
	public function getOrder(){
		return $this->db->query('SELECT * FROM dathang WHERE id_MaNguoiDung = '.$this->session->userdata('maNguoiDung'))->result_object();
	}
	
	public function profileDb($id){
		return $this->db->query('SELECT * FROM nguoidung WHERE maNguoiDung = '.$id.' ')->row_object();
	}
	
	public function updateProfileDb($matKhau,$soDienThoai,$tenCongTy,$diaChi){
		$data = array( 'soDienThoai' => $soDienThoai, 'tenCongTy' => $tenCongTy, 'diaChi' => $diaChi  );
		if( !in_array($matKhau,array('',null)) ){
			$data['matKhau'] = $matKhau;
		}
		$this->db->update('nguoidung',$data);
		return 200;
	}
	
}
