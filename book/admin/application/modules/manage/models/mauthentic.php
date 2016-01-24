<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mauthentic extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function loginAdmin()
    {
        $uname = $this->getParamString('username');
        $upass = $this->getParamString('password');
        $sql = $this->db->query("SELECT * FROM nguoiquanly WHERE tenDangNhap = '".$uname."' AND matKhau = '".$upass."' AND kichHoat = 1 ");
        if($sql->num_rows() > 0)
        {
            $data = $sql->row();
            $data = array(
                'maQuanLy' => $data->maQuanLy,
                'tenDangNhap' => $data->tenDangNhap,
                'soDienThoai' => $data->soDienThoai,
                'diaChiEmail' => $data->diaChiEmail,
				'hoTen' => $data->hoTen
            );
			//echo '<pre>';die(print_r($data));
            $this->session->set_userdata($data);
            return '200';
        }
        return '202';
    }
}