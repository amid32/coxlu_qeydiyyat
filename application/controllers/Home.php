<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();	 
}

	public function homepage($id){
		$user_list = $this->session->userdata("user_list");
		$active_user = $user_list[$id];//buradaki $user_list icindeki id mene getir


//=========/bu kod yeni kontrolerdeki user datani view deki hompage.php konder/==================//
	    $viewData = new stdClass();
	    $viewData->user = $active_user;
        $viewData->user_list = $user_list;
        
//=========/bu kod yeni kontrolerdeki user datani view deki hompage.php konder/==================//



//========================//istifadecinin datalarini hompage ye getirmek//=======================//
	    $this->load->model("user_product_model");
	    $viewData->products = $this
	    ->user_product_model
	    ->get_all(array(
	    	"user_id" => $active_user->id
	    	 ));
		$this->load->view("homepage_v",$viewData);
	}
}
//========================//istifadecinin datalarini hompage ye getirmek//=======================//
