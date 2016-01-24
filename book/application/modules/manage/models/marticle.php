<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Marticle extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
    public function getDanhSachTinTuc(){
        return $this->db->query('SELECT * FROM baiviet WHERE kichHoat = 1 ORDER BY ngayTao DESC')->result_object();
    }
    
	public function getDetailDb($idBaiViet){
		return $this->db->query('SELECT * FROM baiviet WHERE kichHoat = 1 AND maBaiViet = '.$idBaiViet.' LIMIT 1')->row_object();
	}
	
}
