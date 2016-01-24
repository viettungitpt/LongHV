<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Article extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['controller'] = 'article';   
        $this->load->model('Marticle');
        $this->checkAdmin($this->session->userdata('maQuanLy'));
    }
    
	public function index(){
		$this->data['id_active'] = $this->getParamUri(2,3);
		$this->load->library('pagination');
		$config['per_page'] = 100;
		$this->data['page'] = $this->data['pageCurrent'] = $this->getParamUri(2,3);
		$offset = (($this->getParamUri(2,3) - 1) * $config['per_page']) > 0 ? (($this->getParamUri(2,3) - 1) * $config['per_page']) : 0;
		$data = $this->Marticle->getArticleDB($config['per_page'],$offset); ////////
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
    
	public function addarticle()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'required');
		//$this->form_validation->set_rules('categories_id', 'Chuyên mục', 'required');
		$this->form_validation->set_rules('img_incens_hd_', 'Ảnh đại diện', 'required');
        $this->form_validation->set_rules('summary', 'Tóm tắt', 'required');
		$this->form_validation->set_rules('content', 'Nội dung', 'required');
		$this->form_validation->set_rules('active', 'Trạng thái', 'required');
        //$this->data['getCatParent'] = $this->Marticle->getCatParent();
        if($this->form_validation->run() === TRUE)
        {
            $title = $this->getParamString('title');	
			//$categories_id = $this->getParamInt('categories_id');
			$summary = $this->getParamString('summary');
			$content = $this->getParamString('content');
			$active = $this->getParamInt('active');
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
	
			$run = $this->Marticle->addArticleDb($title,$summary,$content,$active,$img);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Thêm thành công");window.location.href="'.$this->data['baseurl'].'danh-sach-bai-viet";</script>');
            }
        }
        $this->data['action'] = 'addarticle';
        $this->load->view('template/layout', $this->data);
    }
	
	
	public function deletearticle()
    {
	
        $id = $this->getParamUri(3,1);
        $run = $this->Marticle->deleteArticleDb($id);
        if(intval($run) == 200)
        {
            die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script>alert("Xóa thành công");window.location="'.$this->data['baseurl'].'danh-sach-bai-viet";</script>');
        }
    }
	
	public function editarticle()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'required');
		//$this->form_validation->set_rules('categories_id', 'Chuyên mục', 'required');
        $this->form_validation->set_rules('summary', 'Tóm tắt', 'required');
		$this->form_validation->set_rules('content', 'Nội dung', 'required');
		$this->form_validation->set_rules('active', 'Trạng thái', 'required');
		$id = $this->getParamUri(3,1);
		$this->data['getArticleInfo'] = $this->Marticle->getArticleInfo($id);	
        if($this->form_validation->run() === TRUE)
        {
            $title = $this->getParamString('title');
			//$title_old = $this->getParamString('title_old');
			//$categories_id = $this->getParamInt('categories_id');
			$summary = $this->getParamString('summary');
			$content = $this->getParamString('content');
			$active = $this->getParamInt('active');
			$dataimage = $this->getParamString('img_incens_hd_');
            
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
		
		
			$run = $this->Marticle->editArticleDb($title,$summary,$content,$active,$img,$id);
			if($run == 200)
            {
                die('<meta charset="utf-8"><script>alert("Sửa thành công");window.location.href="'.$this->data['baseurl'].'danh-sach-bai-viet";</script>');
            }
        }
        $this->data['action'] = 'editarticle';
        $this->load->view('template/layout', $this->data);
    }
    
}
