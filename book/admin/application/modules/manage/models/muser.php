<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Muser extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }
    

	
	public function getUserInfo($id){
		return $this->db->query('SELECT * FROM nguoidung WHERE maNguoiDung = '.$id)->row_object();
	}
	
	public function updateUserDb($hoTen,$soDienThoai,$diaChi,$coin,$id,$matKhau){
		$arr = array(
			'hoTen' => $hoTen,
			'soDienThoai' => $soDienThoai,
			'diaChi' => $diaChi,
			'coin' => $coin
			);
		if( !in_array($matKhau,array('',null)) ){
			$arr['matKhau'] = $matKhau;
		}
		$this->db->update('nguoidung',$arr,'maNguoiDung = '.$id);
		return 200;
	}
	
    public function getUserDB($number,$offset,$txtsearch)
    {
        $limit = $offset ? intval($offset) : '0';
        $sql = "SELECT * FROM nguoidung WHERE 1=1 ";
        if( !in_array($txtsearch,array('',null)) ){
            $sql .= "AND ( tendangnhap LIKE '%".$txtsearch."%' OR hoten LIKE '%".$txtsearch."%' OR sodienthoai LIKE '%".$txtsearch."%' ) ";
        }
        $sql_limit = " ORDER BY maNguoiDung DESC LIMIT ".$limit.",".$number."";
        $data = $this->db->query($sql.$sql_limit)->result_object();
        $count = $this->db->query($sql)->num_rows();
        $array = array();
        $array['count'] = $count;
        $array['data'] = $data;
        return $array;
    }
    
	public function deleteUserDb($id){
		$this->db->query('DELETE FROM nguoidung WHERE maNguoiDung = '.$id);
	}
	////////////////////
	
	public function getUserid($id)
    {
        return $this->db->query('SELECT * FROM nguoiquanly WHERE maQuanLy = '.$id)->row_object();
    }
	
    public function getUser($number,$offset,$year,$month)
    {
        $limit = $offset ? intval($offset) : '0';
        $sql = "SELECT id,username,fullname,email,mobile,active,created,address FROM user WHERE 1=1 ";
		//return $sql;
        $keyword = addslashes($this->input->post('keyword'));
        if(!in_array($keyword, array(null, '', '0')))
        {
            $sql .= "AND username like '%%".strtolower(trim($keyword))."%%' OR ";
            $sql .= " fullname like '%%".strtolower(trim($keyword))."%%' OR ";
            $sql .= " email like '%%".strtolower(trim($keyword))."%%' OR ";
            $sql .= " mobile like '%%".strtolower(trim($keyword))."%%' ";
        }
        if(!in_array($year, array(null, '', '0')))
        {
            $sql .= " AND (DATE_FORMAT(created,'%Y') = '".$year."') ";
        }
        if(!in_array($month, array(null, '', '0')))
        {
            $sql .= " AND (DATE_FORMAT(created,'%m') = '".$month."') ";
        }
		
        $sql_limit = " ORDER BY id DESC LIMIT ".$limit.",".$number."";
        $data = $this->db->query($sql.$sql_limit)->result_object();
        $count = $this->db->query($sql)->num_rows();
        $array = array();
        $array['count'] = $count;
        $array['data'] = $data;
        return $array;
    }
    
   
    
    public function deleteAcc($id)
    {
        //die("DELETE FROM user WHERE id IN ('" . (is_array($id) ? implode("','", $id) : $id) . "')");
        $run = $this->db->query("DELETE FROM user WHERE id IN ('" . (is_array($id) ? implode("','", $id) : $id) . "')");
        if ($this->db->affected_rows() > 0)
        {
            return 200;  
        }
        return 201;
    }
    
    public function AddUserDb($tenDangNhap,$matKhau,$diaChiEmail,$hoTen,$soDienThoai,$diaChi,$coin,$kichHoat)
    {
        $arr = array(
                'tenDangNhap' => $tenDangNhap,
                'matKhau' => $matKhau,
                'diaChiEmail' => $diaChiEmail,
                'hoTen' => $hoTen,
                'soDienThoai' => $soDienThoai,
                'diaChi' => $diaChi,
                'coin' => $coin,
                'ngayTao' => date('Y-m-d H:i:s'),
				'kichHoat' => $kichHoat
            );
		//echo '<pre>';die(print_r($arr));
        $this->db->insert('nguoidung', $arr);
        return 200;
    }
    
    public function editUserDb($id,$email,$fullname,$mobile,$address,$active,$expired,$pword,$pword2)
    {
		$arr = array(
                'email' => $email,
                'fullname' => $fullname,
                'mobile' => $mobile,
                'address' => $address,
                'active' => $active,
				
            );
		 if(!in_array($expired, array(null, '', '0'))){  
			$exp = time() + $expired*86400; 
			$arr['expired'] = $exp;
		 }
		 
        

        if(!in_array($pword, array(null, '', '0')) && ( $pword == $pword2 ) )
        {
            $username = $this->db->query('SELECT username FROM user WHERE id = '.$id)->row_object()->username;
            $arr['password'] = $pword = md5(md5($username).md5($pass_new));
        }
        $this->db->update('user', $arr, 'id = '.$id);
        return 200;
    }

    
    public function updateInfo($id)
    {
        $p = $this->getParamString('pword');
        $r_p = $this->getParamString('repword');
        if($p != $r_p)
        {
            return 203;
        }
        $data = array(
                    "fullname"      => $this->getParamString('fullname'),
                    "email"         => $this->getParamString('email'),
                    "mobile"        => $this->getParamString('mobile'),
                );
                
        if(!in_array($this->getParamString('pword'), array(null, '', '0')))
        {
            $salt           = $this->generateCode(5);
            $encode_pass    = md5($p);
            $encode_salt    = md5($encode_pass.$salt);
            $data['salt']   = $salt;
            $data['password']  = $encode_salt;
            
        }
        try{$this->db->update('user', $data, "id = '".$id."'"); return 200;} catch(exception $e) {}
    }
    
    public function getData($id)
    {
        $sql = "SELECT username,fullname,email,mobile,img,level,active,coin,subscriber,start_subscriber,end_subscriber,total_amount,codeConfirm FROM user WHERE id = '".$id."'";
        return $this->db->query($sql)->row_object();  
    }
    
    public function getUserExport()
    {
        return $this->db->query('SELECT username,fullname,email,mobile,DATE_FORMAT(created,"%H:%i:%s %d/%m/%Y") AS time FROM user ORDER BY id ASC LIMIT 4000')->result_object();
    }
    
    public function updateProfileDb($hoTen,$soDienThoai,$diaChi){
        $data = array ( 'hoTen' => $hoTen, 'soDienThoai' => $soDienThoai, 'diaChi' => $diaChi );
        $this->db->update('nguoiquanly', $data, "maQuanLy = '".$this->session->userdata('maQuanLy')."'");
		$this->session->set_userdata(array( 'hoTen' => $hoTen));
        return 200;
    }
    
    public function updateChangepwDb($pword,$pword1,$pword2){
       $query = $this->db->query('SELECT * FROM nguoiquanly WHERE maQuanLy = '.$this->session->userdata('maQuanLy').' AND matKhau = "'.$pword.'"');
        if ($query->num_rows() > 0)
        {
            if( $pword1 == $pword2 ){
                $data = array ('matKhau' => $pword1);
                $this->db->update('nguoiquanly', $data, "maQuanLy = '".$this->session->userdata('maQuanLy')."'");
                return 200;
            }else{
                return 201;
            }
        }else{
            return 201;
        }
    }
}