 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Template extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        @session_start();
    }
    
    public function sample_template($data = NULL){
       $this->load->view('Template/sample_template_v',$data);
    }
    
    public function admin_template($data = NULL){
       $this->load->view('Template/admin_template_v',$data);
    }
    
}