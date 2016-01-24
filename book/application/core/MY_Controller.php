<?php if ( ! defined('BASEPATH')) exit('skype: duongdung13');
class MY_Controller extends CI_Controller
{
    public $_data; 

    public function __construct(){
        parent::__construct();      
        $this->load->helper(array('url','text', 'form'));
        $this->load->library('session');
        $this->data['baseurl']      = site_url();
        $this->data['imgbase']      = site_url().'upload/';
        $this->data['fview']        = new Ultility;
        $this->data['page']         = 0;
        $this->data['key_encrypt']  = '5709b36ecbf62b748b422a47809121fa';
		$this->data['getDanhMucSanPham'] = $this->getDanhMucSanPham();
        $this->data['getDanhSachTacGia'] = $this->getDanhSachTacGia();
        $this->data['getSachKhuyenMai'] = $this->getSachKhuyenMai();
        $this->data['GioHangSoSanPham'] = $this->GioHangSoSanPham();
        $this->data['GioHangTongSoTien'] = $this->GioHangTongSoTien();
    }
	
    public function GioHangSoSanPham(){
        if ( @in_array(!$_SESSION['gio_hang'],array('',null)) ){
		  return count($_SESSION['gio_hang']);
		}else{
		  return '0';
		}
    }
    
    public function GioHangTongSoTien(){
        $i = 1 ;
		$tongtien = 0;
	    foreach( @$_SESSION['gio_hang'] AS $el=>$le ){
            $tongtien += ($le['price']*$le['qty']); 
        }
      return $tongtien ? number_format($tongtien) : '0'; 
    }
    
	public function rplUriCtl($var)
    {
		$vowels = array("-"," -","- ","“","”","   ","  ","    "," ", "/",'\"',"\'", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $rc = strtolower(str_replace($vowels, '-', rtrim(ltrim(str_replace(array('?','quot'), '', $var)))));
        return preg_replace('/--+/', '-', $rc);
    }
    
    public function checkAdmin($id,$permisson_verify = '')
    {
        if(in_array($id, array(null, '', '0'))){redirect('login');}
        $db = $this->db->query('SELECT id,username FROM user WHERE id = '.$id.' AND (level = 1 OR level = 2 OR level = 3) AND active = 1');
        $check = $db->num_rows();
        $username = $db->row_object()->username;
        if($check == 0 || $permisson_verify != $username)
        {
            redirect('login');
        }
    }

   
   public function checkPerMission($admin, $per, $module, $user)
    {
        if($admin == 1)
        {
            return (object)array('read' => 1, 'add' => 2, 'edit' => 3, 'del' => 4, 'res' => 5);
        }else if($admin ==2)
        {
            $data = $this->__checkPermission($per, $module, $user);
            $arr = array();
            foreach($data AS $el=>$le)
            {
                @$arr['read'] = @$le->read_pm ? $le->read_pm : 0;
                @$arr['add'] = @$le->save_pm ? $le->save_pm : 0;
                @$arr['edit'] = @$le->eidt_pm ? $le->eidt_pm : 0;
                @$arr['del'] = @$le->del_pm ? $le->del_pm : 0;
                @$arr['res'] = @$le->restore_pm ? $le->restore_pm : 0;
            }
            return (object)$arr;
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
    
    /*
	param 1 - get số 
	param 2 - get string
	param 3 - get phân trang
	$id thứ tự /
	*/
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
    
	public function detect_mobile(){
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
			return 1; // mobile
		}else{
			return 2; // desktop
		}
	}
	
    public function getDataConfig(){
		$getTitle = $this->db->query('SELECT content FROM `option` WHERE name = "site_title" ')->row_object()->content;
		$getDescription = $this->db->query('SELECT content FROM `option` WHERE name = "site_description" ')->row_object()->content;
		$getKeyword = $this->db->query('SELECT content FROM `option` WHERE name = "site_keyword" ')->row_object()->content;
		
		$getSiteBanner = $this->db->query('SELECT content FROM `option` WHERE name = "site_banner" ')->row_object()->content;
		$getSiteLogo = $this->db->query('SELECT content FROM `option` WHERE name = "site_logo" ')->row_object()->content;
		$getTextHeader = $this->db->query('SELECT content FROM `option` WHERE name = "text_header" ')->row_object()->content;
        $getTextFooter1 = $this->db->query('SELECT content FROM `option` WHERE name = "text_footer1" ')->row_object()->content;
		$getFooter = $this->db->query('SELECT content FROM `option` WHERE name = "footer" ')->row_object()->content;
		$getHtmlContact = $this->db->query('SELECT content FROM `option` WHERE name = "contact" ')->row_object()->content;
		$getUrlSocial = $this->db->query('SELECT content FROM `option` WHERE name = "urlsocial" ')->row_object()->content;
 		return array(
			'getTitle' => $getTitle,
			'getDescription' => $getDescription,
			'getKeyword' => $getKeyword,
			'getSiteBanner' => $getSiteBanner,
			'getSiteLogo' => $getSiteLogo,
			'getTextHeader' => $getTextHeader,
			'getTextFooter1' => $getTextFooter1,
			'getFooter' => $getFooter,
			'getHtmlContact' => $getHtmlContact,
			'getUrlSocial' => $getUrlSocial
		);
	}
	
	public function getMenuDb(){
		$data = $this->db->query('SELECT * FROM `categories` WHERE active = 1 AND type = 1 AND parent_id = 0 ORDER BY `order` ASC')->result_object();
		foreach ( $data AS $el=>$le ){
			$parent = $this->db->query('SELECT * FROM `categories` WHERE active = 1 AND parent_id = '.$le->id.' AND type = 1 ORDER BY `order` ASC ')->result_object();
			$data[$el]->parents = $parent;
		}
		return $data;
	}
	
	public function getPageDb(){
		$data = $this->db->query('SELECT * FROM `article` WHERE active = 1 AND type = 2 ORDER BY `created` DESC')->result_object();
		return $data;
	}
	
    public function getDanhMucSanPham(){
        return $this->db->query('SELECT * FROM danhMuc WHERE kichHoat = 1 ')->result_object();
    }
    
    public function getDanhSachTacGia(){
        return $this->db->query('SELECT * FROM tacgia WHERE 1 = 1 ')->result_object();
    }
    
    public function getSachKhuyenMai(){
        return $this->db->query('SELECT * FROM sanpham WHERE khuyenMai = 1 AND kichHoat = 1 LIMIT 5 ')->result_object();
    }
    
}