<?php
Class MY_Model extends CI_Model
{
    
    /*
	**
		GET PARAM
	**
	*/
	
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
    
    public function getParamUrl($id)
    {
        return intval(MY_Model::decode_id($this->security->xss_clean($this->uri->segment($id))));
    }
	
	public function getParamGet($param,$type)
	{
		if($type == '1')
        {
            return intval($this->security->xss_clean($_GET[$param]));
        }else{
            return addslashes($this->security->xss_clean($_GET[$param]));
        } 
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
	
	public function get_ascii($st){
		        
        $vietChar 	= 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|í|ì|ỉ|ĩ|ị|ý|ỳ|ỷ|ỹ|ỵ|đ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Í|Ì|Ỉ|Ĩ|Ị|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ';
		$engChar	= 'a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|e|e|e|e|e|e|e|e|e|e|e|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|u|u|u|u|u|u|u|u|u|u|u|i|i|i|i|i|y|y|y|y|y|d|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|E|E|E|E|E|E|E|E|E|E|E|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|U|U|U|U|U|U|U|U|U|U|U|I|I|I|I|I|Y|Y|Y|Y|Y|D';
		
        $arrVietChar 	= explode("|", $vietChar);
		$arrEngChar		= explode("|", $engChar);
        $ftc = strtolower(str_replace($arrVietChar, $arrEngChar, (string)$st));
        $ftc_ = str_replace($arrVietChar, $arrEngChar, $ftc);        
        $vowels = array("-"," -","- ","“","”","   ","  ","    "," ", "/",'\"',"\'", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $dtr = str_replace($vowels, ' ', $ftc_);
        
        $vowels_ = array('\"');
        $cf = preg_replace('!\s+!', ' ', $dtr);
        return $this->get_slug(str_replace($vowels_, ' ', $dtr));
        
	}
    private function get_slug($st){
		$Char 	= '̀|̣|̉|́|̃|:|.|,|?|!|"|&quot;|;|{|}|(|)|《 | 》|《|》';
		$explChar 	= explode("|", $Char);
		return strtolower(str_replace($explChar, '', $st));
	}
    
    public function bad_words($str) {
    	$chars = array('địt','Địt','ĐỊT','dit','đéo','Đéo','ĐÉO','lồn','Lồn','LỒN','lon','Buồi','buồi','buồi.','BUỒI','bUồi','buỒi','buồI','buoi','cặc','Cặc','CẶC','dái','Dái','DÁI','Cứt','cứt','CỨT','ỉa','Ỉa','đái','Đái','ỈA','vl','vkl','loz','lin','liz','vll','me');
      	foreach ($chars as $key => $arr)
    		$str = preg_replace( "/(^|\b)".$arr."(\b|!|\?|\.|,|$)/i", "***", $str ); 
    	return $str;
    }
    
	
	public function replace_url($var)
    {
		$vowels = array("-","- "," -","--","---", "/", "+", "=", "{", "}", ")", "(", "!", "`", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[");
		$var = str_replace($vowels, '', $var);
        return $val = str_replace(' ', '-', $var);
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
	
	
	/*
	**
		Validation url
	**
	*/
	
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
	
	public function nofollowhref($var)
    {
        return str_replace('href', 'rel="nofollow" href', $var);
    }
	
	function time_tmp($times, $datetime) {
        //return time();
        $time = time() - $times;
        //return $time;
        switch ($time) {
            case ($time == 0);
                $time = "Vừa mới đây";
                break;
            case ($time < 60);
                $time = $time . " giây trước";
                break;
            case ($time > 60 && $time < 3600);
                $time = ceil($time / 60) . " phút trước";
                break;
            case ($time > 3600 && $time < 3600 * 24);
                $time = ceil($time / 3600) . " giờ trước";
                break;
            case (ceil($time / (3600 * 24)) > 7);
                $time = $datetime;
                break;
            case ($time > 3600 * 24);
                $time = ceil($time / (3600 * 24)) . " ngày trước";
                break;
        }
        return $time;
    }
    
    /*
	**
		Mã hóa ID
	**
	*/
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
    
    
    public function generateCode($length)
    {
    	//$chars = "0123456789ABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789ABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789STUVWXYZ0123456789ABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$chars = "01234567890123456789012345678901234567890123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        $salt = $code;
        return $salt;
    }
    
}

