<?php
class User_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//Müəyyən bir verilənlər bazasını qeyd varsa və onu tapıb mənə gətirəcək bir funksiyaya ehtiyacım var.
	public function get($where = array()){
		//burada ki kod yeni get mene loginden girdiyim adi ve sifreni getir
		return $this->db->where($where)->get("users")->row();//birden fazla sart koşacağım için burada array yapisina ihtiyacim var $where = array()
	}
}