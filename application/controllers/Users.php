<?php 
/**
 
 */
class Users extends CI_Controller
     {
	public function __construct() {
		parent::__construct();//burada (CI_Controller) içindeki (construct) metodu bura çağırıram
		$this->load->model("user_model");	
	}



	public function index(){
		//eger sessionda user data veya verilenler varsa yeni user_list avrsa
		$user_list = $this->session->userdata("user_list");


		  if ($user_list) {
		  	//eyer burada istifadeci baska user acmamishsa o zaman bu listenin bashindaki userin formun ac
		  	//yeni buraya getir
		  	$user = reset($user_list);
		  	//yeni anasehifeye getir
		  	redirect(base_url("anasehife/".md5($user->email)));/*burada yeni ana sehifeye emailn shifreli formasini getir*/ 

		  }else {//eyer user_list yoxsa get buraya redirect(daxil_ol);
		  	redirect(base_url("daxil_ol"));
		  }
	}






	public function login(){
        
         $this->load->library("form_validation");//Bu kod Formdan gelen məlumatları yoxlamaq üçün
       
                           // bu forumda name="eposta"  //comment  //kurallar yeni bu bir email adresi dir
      $this->form_validation->set_rules("eposta","E-posta","required|trim|valid_email");//üç parametrə alir
                           // bu forumda name="sifre"  //comment  //kurallar yeni bu bir sifre  dir
      $this->form_validation->set_rules("sifre","Sifre","required|trim");
         
//burad forumda her hansi bir xanani bos biraxilarsa bu zaman bize biir xeta mesaji gosterilsin
            $this->form_validation->set_message(array(
                     "required"    => "<strong>{field}</strong> Sahəni boş qoyma!!",
                     "valid_email" => "Zəhmət olmasa e-poçt ünvanı daxil edin"
            ));

 //forma təsdiqləmə qaydalarında  hər hansi bir səhv olarsa login_v  yönləndirməliyik           
            if($this->form_validation->run() === FALSE){


/*=============================================//===============================================*/
           //burada ki, Kod eyer bir xeta varsa mesaji login_v sehifesine yonlendir 	
            $viewData = new stdClass();
            $viewData->form_error = true;
         	$this->load->view("login_v",$viewData);
           //burada ki, Kod eyer bir xeta varsa mesaji login_v sehifesine yonlendir 
/*=============================================//===============================================*/


         }else{
/*========================================/SESSION/==========================================*/
/*buradaki kod eyer menim verilenler bazasindaki qeydlernen forum daki qeyid duz gelirse o zaman 
meni profil sehifeme yonlendir*/
         	$user = $this->user_model->get(
                 array(
                   "email" => $this->input->post("eposta"),
                   "password" => md5($this->input->post("sifre"))
                 )
         	);
/*=======================================/SESSION/==========================================*/





/*=======================================/SESSION/=======================================*/         	
         	if($user){//buradaki ko eyer user varsa

         		//buradaki ko yeni yeni bur user olsada kohne user silinmeyecek   eksine eleve olunacag
         		if($this->session->userdata("user_list")){
         			$user_list = $this->session->userdata("user_list");
         		}else{
                    $user_list = []; 
         		}
         		$user_list[md5($user->email)] = $user;/*if($user) burada  $user_list array yarat($user->email) ve index olarak login olunan email adresi bu qeyd ele
         		ve deyerlerid verilenler bazasindaki deyerlerle de eyni olsun*/      

         		$this->session->set_userdata("user_list", $user_list);//sessiona çatdırmak

         		//print_r($user_list);


         		//eyer sessiona çatdırilmishsa o zaman bunu anashifeye yonlendir
         		redirect(base_url("anasehife/" .md5($user->email)));//bu kod sessionnan al .md5($user->email) ve yonlendir home controllere 
         	}else{

         		//bu kod eyer olmayan bir user'le girilerse o zama bizi login sehifesine yonlendir
                $this->load->view("login_v"); //giriş səhifəsi cagi
         	}
      }
}
/*======================================/SESSION/==========================================*/




	public function login_form(){
		$this->load->view("login_v");
	}

//===================================SESSIONNA CIXIS===============================================//
     public function logout($id){
        $user_list = $this->session->userdata("user_list");
    	unset($user_list[$id]);
    	$this->session->set_userdata("user_list", $user_list);
    	redirect(base_url("daxil_ol"));
     }
 
//===================================SESSIONNA CIXIS===============================================//




/*======================================/SESSION DELETE/==========================================*/

    //bu kod session daki userleri sil
	public function delete(){
		$this->session->unset_userdata("user_list");
	}
/*======================================/SESSION DELETE/==========================================*/





   public function listt(){
		print_r($this->session->userdata("user_list"));
	}

}


?>