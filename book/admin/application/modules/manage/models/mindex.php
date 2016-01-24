<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Mindex extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
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
	
	public function tongsospdaban(){
		return $this->db->query('SELECT SUM(soLuong) as sl FROM dathangchitiet WHERE 1=1 ')->row_object()->sl;
	}

	
}
