<?php

/**
 * 
 */
class User_product_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all($where = array()){
		//burada ki kod yeni get mene loginden girdiyim adi ve sifreni getir
		return $this->db->where($where)->get("user_products")->result();
	}
}