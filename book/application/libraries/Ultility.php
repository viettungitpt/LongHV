<?php
Class Ultility
{
    public function rplUri($var)
    {
		$vowels = array("-"," -","- ","“","”","   ","  ","    "," ", "/",'\"',"\'", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $rc = strtolower(str_replace($vowels, '-', rtrim(ltrim(str_replace(array('?','quot'), '', $var)))));
        return preg_replace('/--+/', '-', $rc);
    }
    
    public function replacetitleurlpost($var)
    {
        return str_replace('.html', '', $var);
    }
    public function get_ascii($st){
		
        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            //Translate vi
            'à' => 'a', 'á' => 'a', 'ạ' => 'a', 'ả' => 'a', 'ã' => 'a', 'â' => 'a', 'ầ' => 'a', 'ấ' => 'a',
            'ậ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ặ' => 'a', 'ẳ' => 'a',
            'ẵ' => 'a', 'è' => 'e', 'é' => 'e', 'ẹ' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ê' => 'e', 'ề' => 'e',
            'ế' => 'e', 'ệ' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ì' => 'i', 'í' => 'i', 'ị' => 'i', 'ỉ' => 'i',
            'ĩ' => 'i', 'ò' => 'o', 'ó' => 'o', 'ọ' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ô' => 'o', 'ồ' => 'o',
            'ố' => 'o', 'ộ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ợ' => 'o',
            'ở' => 'o', 'ỡ' => 'o', 'ù' => 'u', 'ú' => 'u', 'ụ' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ư' => 'u',
            'ừ' => 'u', 'ứ' => 'u', 'ự' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ỳ' => 'y', 'ý' => 'y', 'ỵ' => 'y',
            'ỷ' => 'y', 'ỹ' => 'y', 'đ' => 'd', 'À' => 'A', 'Á' => 'A', 'Ạ' => 'A', 'Ả' => 'A', 'Ã' => 'A',
            'Â' => 'A', 'Ầ' => 'A', 'Ấ' => 'A', 'Ậ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ă' => 'A', 'Ằ' => 'A',
            'Ắ' => 'A', 'Ặ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'È' => 'E', 'É' => 'E', 'Ẹ' => 'E', 'Ẻ' => 'E',
            'Ẽ' => 'E', 'Ê' => 'E', 'Ề' => 'E', 'Ế' => 'E', 'Ệ' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ì' => 'I',
            'Í' => 'I', 'Ị' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ò' => 'O', 'Ó' => 'O', 'Ọ' => 'O', 'Ỏ' => 'O',
            'Õ' => 'O', 'Ô' => 'O', 'Ồ' => 'O', 'Ố' => 'O', 'Ộ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ơ' => 'O',
            'Ờ' => 'O', 'Ớ' => 'O', 'Ợ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Ụ' => 'U',
            'Ủ' => 'U', 'Ũ' => 'U', 'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ự' => 'U', 'Ử' => 'U', 'Ữ' => 'U',
            'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỵ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Đ' => 'D',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );

        $str = strtolower(str_replace(array_keys($char_map), $char_map, $st));
        
        $vowels = array("-"," -","- "," ", "/", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $dtr = str_replace($vowels, ' ', $str);
        
        $vowels_ = array('\"');
        return $this->get_slug(str_replace($vowels_, ' ', $dtr));
	}
    
	 public function get_rewrite_url($st){
		
        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            //Translate vi
            'à' => 'a', 'á' => 'a', 'ạ' => 'a', 'ả' => 'a', 'ã' => 'a', 'â' => 'a', 'ầ' => 'a', 'ấ' => 'a',
            'ậ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ặ' => 'a', 'ẳ' => 'a',
            'ẵ' => 'a', 'è' => 'e', 'é' => 'e', 'ẹ' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ê' => 'e', 'ề' => 'e',
            'ế' => 'e', 'ệ' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ì' => 'i', 'í' => 'i', 'ị' => 'i', 'ỉ' => 'i',
            'ĩ' => 'i', 'ò' => 'o', 'ó' => 'o', 'ọ' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ô' => 'o', 'ồ' => 'o',
            'ố' => 'o', 'ộ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ợ' => 'o',
            'ở' => 'o', 'ỡ' => 'o', 'ù' => 'u', 'ú' => 'u', 'ụ' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ư' => 'u',
            'ừ' => 'u', 'ứ' => 'u', 'ự' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ỳ' => 'y', 'ý' => 'y', 'ỵ' => 'y',
            'ỷ' => 'y', 'ỹ' => 'y', 'đ' => 'd', 'À' => 'A', 'Á' => 'A', 'Ạ' => 'A', 'Ả' => 'A', 'Ã' => 'A',
            'Â' => 'A', 'Ầ' => 'A', 'Ấ' => 'A', 'Ậ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ă' => 'A', 'Ằ' => 'A',
            'Ắ' => 'A', 'Ặ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'È' => 'E', 'É' => 'E', 'Ẹ' => 'E', 'Ẻ' => 'E',
            'Ẽ' => 'E', 'Ê' => 'E', 'Ề' => 'E', 'Ế' => 'E', 'Ệ' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ì' => 'I',
            'Í' => 'I', 'Ị' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ò' => 'O', 'Ó' => 'O', 'Ọ' => 'O', 'Ỏ' => 'O',
            'Õ' => 'O', 'Ô' => 'O', 'Ồ' => 'O', 'Ố' => 'O', 'Ộ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ơ' => 'O',
            'Ờ' => 'O', 'Ớ' => 'O', 'Ợ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Ụ' => 'U',
            'Ủ' => 'U', 'Ũ' => 'U', 'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ự' => 'U', 'Ử' => 'U', 'Ữ' => 'U',
            'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỵ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Đ' => 'D',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );

        $str = strtolower(str_replace(array_keys($char_map), $char_map, $st));
        
        $vowels = array("-","--","---"," -","- "," ", "/", "+", "=", "{", "}", ")", "(", "!", "`", "'", "~", "@", "#", "$", "%", "^", "&", "*", "_", "!", "!", ".", ",", ";", ":", "]", "[","/");
        $dtr = str_replace($vowels, '-', $str);
        
        $vowels_ = array('\"');
        return $this->get_slug(str_replace($vowels_, '-', $dtr));
	}
	
    private function get_slug($st){
		$Char 	= '̀|̣|̉|́|̃|:|.|,|?|!|"|&quot;|;|{|}|(|)|《 | 》|《|》';
		$explChar 	= explode("|", $Char);
		return strtolower(str_replace($explChar, '', $st));
	}
    
    public function nofollowhref($var)
    {
        return str_replace('href', 'rel="nofollow" href', $var);
    }
	public function decodeAddslashe($valueToEncode)
            {
            $chars = array(
            '%26' => '&',
            '%3D' => '=',
            '%22' => '"',
            '\"' => '"',
            "\'" => "'" ) ;
            return strtr( $valueToEncode, $chars ) ;
    }
    public function decodeAddslashe2($valueToEncode)
            {
            $chars = array(
            "\'" => "'" ) ;
            return strtr( $valueToEncode, $chars ) ;
    }
    public function bad_words($str) {
    	$chars = array('địt','Địt','ĐỊT','dit','đéo','Đéo','ĐÉO','lồn','Lồn','LỒN','lon','Buồi','buồi','buồi.','BUỒI','bUồi','buỒi','buồI','buoi','cặc','Cặc','CẶC','dái','Dái','DÁI','Cứt','cứt','CỨT','ỉa','Ỉa','đái','Đái','ỈA','vl','vkl','loz','lin','liz','vll','me');
      	foreach ($chars as $key => $arr)
    		$str = preg_replace( "/(^|\b)".$arr."(\b|!|\?|\.|,|$)/i", "***", $str ); 
    		//$str = wordwrap($str, 23, " ", true);
    	return $str;
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
    		
    	return $return.$detail;
    }
    
    public function addLinkAuto($str,$str2,$link)
    {
        $str_ = explode(',',$str);
        
        $sount = sizeOf($str_);
        for($i = 0;$i < $sount; $i++)
        {
            $key = $str_[$i];
            //$key = '"'.$str_[$i].'"';
            $replace_words[ltrim(rtrim($key, ' '), ' ')] = '<a target="_blank" title="'.$str_[$i].'" href="'.$link.'tags/'.Ultility::rplUri(ltrim(rtrim($str_[$i], ' '), ' ')).'.html"> '.$str_[$i].'</a>';
        }
        $text = str_replace(array_keys($replace_words), array_values($replace_words), $str2);
        return $text;

    }
    
    public function getParamUri($id,$param)
    {
        $CI = & get_instance();
        if($param == '1')
        {
            return intval($CI->security->xss_clean($CI->uri->segment($id)));
        }else{
            return addslashes($CI->security->xss_clean($CI->uri->segment($id)));
        }
        
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
    
    public function selectType($arr, $id = 0, $name)
    {
        $html = '<select name="'.$name.'" id="'.$name.'">';
        foreach($arr AS $el=>$le)
        {
            if($el == $id)
            {
                $selected = 'selected="selected"';
            }else{
                $selected = '';
            }
            $html .= '<option value="'.$el.'" '.$selected.'>'.$le.'</option>';
        }
        $html .= '</select>';
        return $html;
        
    } 
    
    public function advancedSelectType($arr, $id = 0, $name, $place_holder)
    {
        $html = '<select name="'.$name.'" id="'.$name.'" data-placeholder="'.$place_holder.'" class="chzn-select" style="width:350px;"><option value="">'.$place_holder.'</option>';
        foreach($arr AS $el=>$le)
        {
            if($le['id'] == $id)
            {
                $selected = 'selected="selected"';
            }else{
                $selected = '';
            }
            $html .= '<option value="'.$le['id'].'" '.$selected.'>'.$le['name'].'</option>';
        }
        $html .= '</select>';
        return $html;
        
    }
    public function multiSelectType($arr, $id = 0, $name, $place_holder)
    {
        $html = '<select name="'.$name.'[]" id="'.$name.'" data-placeholder="'.$place_holder.'" class="chzn-select" multiple="multiple" style="width:350px;"><option value=""></option>';
        foreach($arr AS $el=>$le)
        {
            if(is_array($id))
			{   
				$selected = '';
				foreach($id AS $key=>$value)
				{
					if($value['id'] == $le['id'])
					{
						$selected = 'selected="selected"';
					}
				}
			}
            elseif($id == $le['id'])
            {
                $selected = 'selected="selected"';
            }else{
                $selected = '';
            }
            $html .= '<option value="'.$le['id'].'" '.$selected.'>'.$le['name'].'</option>';
        }
        $html .= '</select>';
        return $html;
        
    }
    public function conVertTimeStamp($time, $type = '-')
    {
        $date = new DateTime('@'.$time);
        return $date->format('d'.$type.'m'.$type.'Y'); 
    }
    public function inputRadio($arr, $value = 0, $name)
    {
        $html = '';
        foreach($arr AS $el=>$le)
        {
            if($value == $le['value'])
            {
                $checked = 'checked="checked"';
            }else{
                $checked = '';
            }
            $html .= '<input id="'.$le['id'].'" name="'.$name.'" type="radio" value="'.$le['value'].'" '.$checked.'/>'. $le['label'];
        }
        return $html;
    }
    
    public function selectTypesx($arr, $id = 0, $name, $option)
    {
        $html = '<select name="'.$name.'" id="'.$name.'">';
        if(in_array($option, array(null, '', '0', 0))){
            $html .= '<option value="">'.$option.'</option>';
        }
        foreach($arr AS $el=>$le)
        {
            if($le['id'] == $id)
            {
                $selected = 'selected="selected"';
            }else{
                $selected = '';
            }
            $html .= '<option value="'.$le['id'].'" '.$selected.'>'.$le['name'].'</option>';
        }
        $html .= '</select>';
        return $html;
    }
	
	public function rewrite_url($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|A',
            'd'=>'đ|Đ|D',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|E',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị|I',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ờ|Ở|Ỡ|Ợ|O',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|U',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Y',
			''=>'-',
            '-'=>' ',
			'c'=>'C',
			'h'=>'H',
			'v'=>'V',
			's'=>'S',
			'n'=>'N',
			'g'=>'G',
			't'=>'T',
			'l'=>'L',
			'r'=>'R',
			'k'=>'K',
			'p'=>'P',
			'b'=>'B',
			'm'=>'M',
			'q'=>'Q',
            'w'=>'W',
            'f'=>'F',
            'x'=>'X',
            'z'=>'Z',
			'j'=>'J',
			''=>'!',
			''=>'@',
			''=>'#',
			''=>'!',
			''=>'$',
			''=>'%',
			''=>'^',
			'va'=>'&',
			''=>'*',
			''=>'(',
			''=>')',
			''=>'_',
			''=>'+',
			''=>'/',
			''=>',',	
			''=>':',
			''=>',',
			''=>';',
			''=>':',
			''=>'<',
        );
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
            $str = str_replace("",'“',$str);
             $str = str_replace("",'”',$str); 
             $str = str_replace(" - ","-",$str);
             $str = str_replace(" !","",$str);
             $str = str_replace("!","",$str);
             $str = str_replace(" @","",$str);
             $str = str_replace("@","",$str);
             $str = str_replace(" #","",$str);
             $str = str_replace("#","",$str);
             $str = str_replace(" $","",$str);
             $str = str_replace("$","",$str);
             $str = str_replace(" %","",$str);
             $str = str_replace("%","",$str);
             $str = str_replace(" ^","",$str);
             $str = str_replace("^","",$str);
             $str = str_replace(" *","",$str);
             $str = str_replace("*","",$str);
             $str = str_replace(" (","",$str);
             $str = str_replace("(","",$str);
             $str = str_replace(" )","",$str);
             $str = str_replace(")","",$str);
             $str = str_replace(" _","",$str);
             $str = str_replace("_","",$str);
             $str = str_replace(" +","",$str);
             $str = str_replace("+","",$str);
             $str = str_replace(" =","",$str);
             $str = str_replace("=","",$str);
			 $str = str_replace(">","",$str);
             $str = str_replace(" .","",$str);
             $str = str_replace(".","",$str);
             $str = str_replace(" ?","",$str);
			 $str = str_replace("-?","",$str);
             $str = str_replace("?","",$str);
             $str = str_replace(" ~","",$str);
             $str = str_replace("~","",$str);
             $str = str_replace(",","",$str);
             $str = str_replace("`","",$str);
             $str = str_replace(" /","",$str);
             $str = str_replace("/","",$str);
             $str = str_replace(" ^","",$str);
             $str = str_replace("^","",$str);
             $str = str_replace(" ","-",$str);
			 $str = str_replace("{","",$str);
			 $str = str_replace("}","",$str);
			 $str = str_replace("[","",$str);
			 $str = str_replace("]","",$str);
			  $str = str_replace(";","",$str);
			 $str = str_replace(" `","",$str);
			 $str = str_replace("|","",$str);
			 $str = str_replace(":","",$str);
			 $str = str_replace("'","",$str);
			 $str = str_replace(" ","",$str);
             $str = str_replace("----","",$str);
             $str = str_replace("---","",$str);
             $str = str_replace("--","",$str);
			 $str = str_replace("\'","",$str);      
       }
		return $str;
 }
	public function cutstr($str,$len){  
		$arrstr = explode(" ",$str);
		$detail = "";
		if(count($arrstr) <= $len)
		$len = count($arrstr);
		else
		$detail  = " ...";
		for($i=0;$i<$len;$i++)
		return $arrstr[$i]." ".$detail;
	}
	
	function timestampToDatetime($ts){
		$date = new DateTime("@$ts");
		return $date->format('H:i:s d/m/Y ');
	} 
    
	function getInventor($status){
		if( $status ==1  ){
			return 'Còn hàng';
		} else{
				if( $status ==2  ){
				return 'Hết hàng';
			}else{
				if( $status ==3  ){
				return 'Hàng mới về';
			}
			} 
		}
	}
	
	function getStatusOrder($status){
		if( $status ==0  ){
			return 'Đang xử lý';
		} else{
				if( $status ==1  ){
				return 'Đã hoàn thành';
			}else{
				if( $status ==2  ){
				return 'Đã hủy';
			}
			} 
		}
	}
	
}