<?php
//birds.php
class Birds extends CI_Controller{
  function index(){
      $this->load->view('header');
    $this->load->view('bir');
    $this->load->view('footer');
  }
 
 /* function get_birds(){
      $this->load->library('javascript');
    $this->load->model('Birds_model');
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->birds_model->get_bird($q);
    }
  }*/
    
    
    
    public function get_birds() {
        //echo "Si";
        if (!isset($_GET['term'])){
        exit;
        }

        $this->load->model('Birds_model');
        $q = strtolower($_GET['term']);
        $this->Birds_model->get_bird($q);
        
    }
    
     public function get_Libro() 
        {
          //  echo "<alert>Si</alert>";
      /*      if (!isset($_GET['term'])){
        exit;
        }

        $this->load->model('Birds_model');
        $q = strtolower($_GET['term']);
        $this->Birds_model->get_Lib($q);
        }*/
            
    $this->load->model('Birds_model');
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->Birds_model->get_Lib($q);
    }
        }
}
?>