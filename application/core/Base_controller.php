<?php
class Base_controller extends CI_Controller {
 
    protected $db_b;
 
    public function __construct() 
       {
        parent::__construct();
 
        // Este metodo conecta a nuestra segunda conexión
        // y asigna a nuestra propiedad $this->db_b; los recursos de la misma.
        $this->db_b = $this->load->database('elektra', true);
    }
}
