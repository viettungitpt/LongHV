<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mindex extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getProductHomeDb(){
        $moinhat = $this->db->query('SELECT s.*, t.tenTacGia FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacgia  WHERE s.kichHoat = 1 ORDER BY s.ngayTao DESC LIMIT 8 ')->result_object();
        $khuyenmai = $this->db->query('SELECT s.*, t.tenTacGia FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacgia  WHERE s.kichHoat = 1 AND s.khuyenmai = 1 ORDER BY s.ngayTao DESC LIMIT 8 ')->result_object();
        $dacbiet = $this->db->query('SELECT s.*, t.tenTacGia FROM `sanpham` as s inner join tacgia as t on t.maTacGia = s.id_MaTacgia  WHERE s.kichHoat = 1 AND dacbiet = 1 ORDER BY s.ngayTao DESC LIMIT 8 ')->result_object();        
        return array('moinhat' => $moinhat, 'khuyenmai' => $khuyenmai, 'dacbiet' => $dacbiet);  
	}	
    
    public function saveFeedbackDb($HoTen,$DienThoai,$Email,$DiaChi,$TieuDe,$NoiDungLienHe){
		//die('222');
        $data = array(
			'HoTen' => $HoTen,
            'diaChiEmail' => $Email,
			'soDienThoai' => $DienThoai,
			'diaChi' => $DiaChi,
			'tieuDe' => $TieuDe,
			'noiDung' => $NoiDungLienHe,
            'kichHoat' => 1,
            'ngayTao' => date('Y-m-d H:i:s')
				);
		$this->db->insert('phanhoi',$data);
        return '200';
	}
    
	public function getCategories(){
		$data = $this->db->query('select * from `categories` where active = 1 AND parent_id = 0 AND `type_organization_content` = "categories_product" ORDER BY `order` ASC  ')->result_object();
		foreach ($data AS $el=>$le){
			$datax = $this->db->query('select * from `categories` where active = 1 AND parent_id = '.$le->id.' ORDER BY `order` ASC')->result_object();
			$data[$el]->cat_child = $datax;
		}
		return $data;
	}	
	
	/*
    public function getSlide(){
		return $this->db->query('SELECT * from `option` where active = 1 AND type = "slide_show" ORDER BY `order` ASC LIMIT 3')->result_object();
	}
	
	public function getNewArticle(){
		return $this->db->query('SELECT `article`.id as id, `article`.title as title, `article`.created as created FROM `article` JOIN `categories_relationship` WHERE `article`.active = 1 AND  `categories_relationship`.categories_id = 126 AND `article`.id = `categories_relationship`.item_id ORDER BY `article`.created DESC LIMIT 2')->result_object();
	}
	
	public function getNewArticle2(){
		return $this->db->query('SELECT `article`.id as id, `article`.title as title, `article`.created as created FROM `article` JOIN `categories_relationship` WHERE `article`.active = 1 AND  `categories_relationship`.categories_id <> 126 AND `article`.id = `categories_relationship`.item_id ORDER BY `article`.created DESC LIMIT 4')->result_object();
	}
	
	public function getListProductLeft(){
	   return $this->db->query('SELECT * FROM `categories` WHERE active = 1 AND ( `type_organization_content` = "categories_product" OR `type_organization_content` = "categories_product2" ) ORDER BY `order_home` ASC LIMIT 6  ')->result_object();
	}
    
    public function getListProductCenter(){
        return $this->db->query('SELECT * FROM `categories` WHERE active = 1 AND ( `type_organization_content` = "categories_product" OR `type_organization_content` = "categories_product2" ) ORDER BY `id` ASC LIMIT 6')->result_object();
    }
    */

    public function selectPer($id)
    {
        $sql = "SELECT 
                    pg.name_pm, pg.id
                FROM
                    permission_account AS pa
                INNER JOIN permission_group AS pg ON pa.id_gr = pg.id
                WHERE pa.id_user = '".$id."'
                ";
        $q = $this->db->query($sql);
        if($q->num_rows() < 1)
        {
            return 201;
        }
        $html = '';
        $data = $q->result_object();
        foreach($data AS $le=>$el)
        {
            $html .= "<option value=".$el->id.">".$el->name_pm."</option>";
        }
        return $html;
    }
    
    public function getProductHome(){
        $data = $this->db->query('SELECT id, name FROM categories WHERE active = 1 AND parent_id = 0 AND type = 1 ORDER BY id ASC ')->result_object();
        foreach ( $data AS $el=>$le ){
            $pdata = $this->db->query('SELECT p.* FROM relationship AS r INNER JOIN product AS p ON r.product_id = p.id WHERE r.categories_id =  '.$le->id.'  ORDER BY created DESC LIMIT 16')->result_object();
            $data[$el]->product = $pdata;
        }      
        return $data;
    }
    
}
