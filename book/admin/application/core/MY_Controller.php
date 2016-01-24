<?php if ( ! defined('BASEPATH')) exit('Vui lòng liên hệ nhatnv');
class MY_Controller extends CI_Controller
{
    public $_data; 
    
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','text', 'form'));
        $this->load->library('session');
        $this->data['baseurl']      = site_url();
		$this->data['imgbase']      = 'http://127.0.0.1/sach/upload/';
		$this->data['urlhome']      = site_url();
        $this->data['fview']        = new Ultility;
        $this->data['page']         = 0;
        $this->data['key_encrypt']  = '5709b36ecbf62b748b422a47809121fa';
		$this->data['adminConfig'] = array(
			'author_name' => 'Duong Dung',
			'author_url' => 'http://domain.com',
			'website_name' => 'Website bán sách trực tuyến',
			'website_url' => 'Website bán sách trực tuyến',
			'title_sidebar' => 'ADMIN',
			'ver_admin' => 'v1.0',
			'hehe' => 'hehe'
			);
    }
	
	public function rplUriCtl($var)
    {
		$vowels = array("-"," -","- ","“","”","   ","  ","    "," ", "/",'\"',"\'", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $rc = strtolower(str_replace($vowels, '-', rtrim(ltrim(str_replace(array('?','quot'), '', $var)))));
        return preg_replace('/--+/', '-', $rc);
    }
    
    public function checkAdmin($id_NguoiQuanLy)
    {
        if(in_array($id_NguoiQuanLy, array(null, '', '0'))){
			redirect('dang-nhap');
		}
        $db = $this->db->query('SELECT * FROM nguoiquanly WHERE maQuanLy = '.$id_NguoiQuanLy.' AND kichHoat =1');
        $check = $db->num_rows();
        if($check == 0 )
        {
            redirect('dang-nhap');
        }
    }

    private function __checkPermission($per, $module, $user)
    {
        $sql = "SELECT read_pm,save_pm,eidt_pm,del_pm,restore_pm FROM permission WHERE id_pg = '".$per."' AND id_module = '".$module."' AND id_user = '".$user."'";//die($sql); 
        return $this->db->query($sql)->result_object();
    }
    
    public function redirect_notification($page,$msg,$action_return,$action,$param = array())
    {
        $_param = '';
        if(!in_array($param, array(null, '', '0')))
        {
            foreach($param AS $el=>$le)
            {
                if($i == 0)
                {
                    $efix = '?';
                }else{
                    $efix = '&';
                }
                $_param .= $efix.$el.'='.$le;
            }
             
        }
        if($page == 0)
        {
            $return_page = ".html";
        }else{
            $return_page = "/".$page.".html";
        }
        if(in_array(@$msg[2], array(null, '', '0')))
        {
            $authentic_ = "|";
        }else{
            $authentic_ = "|".@$msg[2];
        }
        if(in_array(@$msg[3], array(null, '', '0')))
        {
            $vefrify_ = "|";
        }else{
            $vefrify_ = "|".@$msg[3];
        }
        
        $msg_ = @$msg[0].'|'.@$msg[1].'|'.$this->data['baseurl'].$action.$return_page.$_param.$authentic_.$vefrify_;
        
        $encrypted_string = $this->encrypt->encode($msg_, $this->data['key_encrypt']);
        redirect($action_return.'/'.urlencode(base64_encode($encrypted_string)));
        exit();
    }
   
   
    public function get_ascii($st){
		        
        $vietChar 	= 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|í|ì|ỉ|ĩ|ị|ý|ỳ|ỷ|ỹ|ỵ|đ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Í|Ì|Ỉ|Ĩ|Ị|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ';
		$engChar	= 'a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|e|e|e|e|e|e|e|e|e|e|e|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|u|u|u|u|u|u|u|u|u|u|u|i|i|i|i|i|y|y|y|y|y|d|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|E|E|E|E|E|E|E|E|E|E|E|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|U|U|U|U|U|U|U|U|U|U|U|I|I|I|I|I|Y|Y|Y|Y|Y|D';
		
        $arrVietChar 	= explode("|", $vietChar);
		$arrEngChar		= explode("|", $engChar);
        $ftc = strtolower(str_replace($arrVietChar, $arrEngChar, (string)$st));
        $ftc_ = str_replace($arrVietChar, $arrEngChar, $ftc);        
        $vowels = array("-"," -","- "," ", "/", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $dtr = str_replace($vowels, ' ', $ftc_);
        
        $vowels_ = array('\"');
        return $this->get_slug(str_replace($vowels_, ' ', $dtr));
	
    }
    private function get_slug($st){
		$Char 	= '̀|̣|̉|́|̃|:|.|,|?|!|"|&quot;|;|{|}|(|)|《 | 》|《|》';
		$explChar 	= explode("|", $Char);
		return strtolower(str_replace($explChar, '', $st));
	}
    public function get_ascii_upload($st)
    {
        $vietChar 	= 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|í|ì|ỉ|ĩ|ị|ý|ỳ|ỷ|ỹ|ỵ|đ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Í|Ì|Ỉ|Ĩ|Ị|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ';
		$engChar	= 'a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|e|e|e|e|e|e|e|e|e|e|e|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|u|u|u|u|u|u|u|u|u|u|u|i|i|i|i|i|y|y|y|y|y|d|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|E|E|E|E|E|E|E|E|E|E|E|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|U|U|U|U|U|U|U|U|U|U|U|I|I|I|I|I|Y|Y|Y|Y|Y|D';
		$arrVietChar 	= explode("|", $vietChar);
		$arrEngChar		= explode("|", $engChar);
        $ftc = strtolower(str_replace($arrVietChar, $arrEngChar, $st));
        $vowels = array("-"," -","- ","“","”","   ","  ","    "," ", "/",'\"',"\'", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        return str_replace($vowels, '-', $ftc);
    }
    public function savefile($base64_string,$paths,$nameimagess, $url_convert = 'd')
    {
        //die('32423');
        @mkdir($paths.'tmp', 0301);
        $ifp = fopen($paths.'tmp/'.$nameimagess, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp );
        return $this->downloadPicture($paths, $this->data['baseurl'], $url_convert, $nameimagess);
        //return 
    }
    
   private function downloadPicture($imagesource, $base, $url_convert, $nameimagess)
    {
        $img_src = $imagesource.'tmp/'.$nameimagess;
        list($width, $height) = @getimagesize($img_src);
        $new_width = $width;
        $new_height = $height;
        if(in_array(@$width, array(null, '', '0')) || in_array(@$height, array(null, '', '0')))
        {
            @unlink($imagesource.'tmp/'.$nameimagess);
            return '201';
        }
        @$image_p = imagecreatetruecolor($new_width, $new_height);
        @$image = imagecreatefromjpeg($img_src);
        @imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        @imagejpeg($image_p, $imagesource.$nameimagess, 100);
        @unlink($imagesource.'tmp/'.$nameimagess);
        @imagedestroy($image);
        return '200';
    }
    
    public function printstr($str,$len){
    	$arrstr = explode(" ",$str);
    	$detail = "";
        $return = "";
    	if(count($arrstr) <= $len)
    		$len = count($arrstr);
    	else
    		{
    		  $detail  = " ...";
    		}
    	for($i=0;$i<$len;$i++)
        {
            $return .= $arrstr[$i]." ";
        }
    		
    	return $return.'...';
    }
    
	public function saveSession($array = '')
    {
        if(!in_array($array, array(null, '', '0')))
        {
            foreach($array AS $key=>$val)
            {
                $_SESSION[$key] = $val;
            }
            $_SESSION['auth'] = sha1(md5($_SERVER["REMOTE_ADDR"]).md5(md5($_SERVER["HTTP_USER_AGENT"])));
        }
        return $array;
    }
	public function rplUri($var)
    {
		$vowels = array("-"," -","- ","“","”","   ","  ","    "," ", "/",'\"',"\'", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $rc = strtolower(str_replace($vowels, '-', rtrim(ltrim(str_replace(array('?','quot'), '', $var)))));
        return preg_replace('/--+/', '-', $rc);
    }
    private function str_equal($str)
    {
        return str_replace('=', '%3D', $str);
    }
    public function getParamStringAdmin($param)
    {
        return addslashes(isset($_REQUEST[$param]) ?  $this->str_equal(quotes_to_entities($_REQUEST[$param])) : '');
    }
    
	public function getParamString($param)
    {
        return addslashes(isset($_REQUEST[$param]) ?  $this->security->xss_clean($_REQUEST[$param]) : '');
    }
    
	public function getParamStringNoSecure($param){
		return addslashes(isset($_REQUEST[$param]) ?  $_REQUEST[$param] : '');
	}
	
    public function getParamArray($param)
    {
        return isset($_REQUEST[$param]) ?  $this->security->xss_clean($_REQUEST[$param]) : '';
    }
    
    public function getParamInt($param)
    {
        return intval(isset($_REQUEST[$param]) ?  $this->security->xss_clean($_REQUEST[$param]) : '');
    }
    public function generateCode($n){
        $n = rand(10e16, 10e20);
        return base_convert($n, 10, 36);      
    }
    public function getParamUrl($id)
    {
        return intval(MY_Controller::decode_id($this->security->xss_clean($this->uri->segment($id))));
    }
    
    
    public function getParamUri($id,$param)
    {
       if($param == '1')
        {
            return intval($this->security->xss_clean($this->uri->segment($id)));
        }else if($param == '3')
        {
            $param_ = $this->security->xss_clean($this->uri->segment($id));
            if(in_array($param_, array(null, '', '0')))
            {
                return 0;
            }
            $data = explode('-',addslashes($param_));
            return $data[1];
        }else{
            return addslashes($this->security->xss_clean($this->uri->segment($id)));
        } 
        
    }
    
    public function getParamUriNoSecure($id)
    {
        return $this->uri->segment($id);
    }
    
    public function getSslPages($url) {
            $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $output = curl_exec($ch);
       curl_close($ch);
       return $output;
    }
    public function getSslPage($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
   public function encode_id($id) {
        $str = dechex($id + 307843210);
        $str = str_replace("1", "i", $str);
        $str = str_replace("2", "w", $str);
        $str = str_replace("3", "o", $str);
        $str = str_replace("4", "u", $str);
        $str = str_replace("5", "z", $str);
        return $str;
    }

    public function decode_id($str) {
        $str = str_replace("i", "1", $str);
        $str = str_replace("w", "2", $str);
        $str = str_replace("o", "3", $str);
        $str = str_replace("u", "4", $str);
        $str = str_replace("z", "5", $str);
        $str = hexdec($str) - 307843210;
        return $str;
    }
    
    
    /// validate ajax
    public function alpha_dash($str)
	{
		return ( ! preg_match("/^([-a-z0-9_-])+$/i", $str)) ? 1 : 0;
	}
    
    public function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? 1 : 0;
	}
    
    public function min_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) < $val) ? 1 : 0;
		}

		return (strlen($str) < $val) ? 1 : 0;
	}
    public function required($str)
	{
		if ( ! is_array($str))
		{
			return (trim($str) == '') ? 1 : 0;
		}
		else
		{
			return ( ! empty($str));
		}
	}
    
    public function fixImageDbNull($img){
        if( !in_array($img,array('',null)) ){   
        }else{
            $img = 'no-image.png';
        }
        return $img;
    }
    
    
}