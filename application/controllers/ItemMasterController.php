<?php

//session_start(); //we need to start session in order to access it through CI

Class ItemMasterController extends MY_Controller {

public function __construct() {
parent::__construct();
if(!$this->session->userdata['logged_in']['id']){
    redirect('User_authentication/index');
}
/*require_once APPPATH.'third_party/PHPExcel.php';
$this->excel = new PHPExcel(); */

// Load form helper library
$this->load->helper('form');
$this->load->helper('url');
// new security feature
$this->load->helper('security');
// Load form validation library
$this->load->library('form_validation');

//$this->load->library('encryption');

// Load session library
$this->load->library('session');

$this->load->model('item_model');


$this->load->library('template');


}


     public function index($id = NULL) 
    {
      $data = array();
      $data['page_title'] = ' Daily Task Master';
      $result = $this->item_model->getByIdTask($id);
    
      if (isset($result['id']) && $result['id']) :
          $data['id'] = $result['id'];
        else:
          $data['id'] = '';
        endif; 
    
      if (isset($result['product_name'])) :
          $data['product_name'] = $result['product_name'];
         else:
          $data['product_name'] = '';
        endif;
  
       
  
      if (isset($result['hsn_code'])) :
          $data['hsn_code'] = $result['hsn_code'];
         else:
          $data['hsn_code'] = '';
        endif;

         if (isset($result['unit'])) :
          $data['unit'] = $result['unit'];
         else:
          $data['unit'] = '';
        endif;
  
        $data['departments'] = $this->item_model->getDepartments();
      $data['projects'] = $this->item_model->projectList();
      // echo "<pre>"; print_r($data); exit;
        
       $this->template->load('layout/template', 'ItemMaster/itemmaster', $data);
    }

    public function add_products()
     {
    
         
            $data['login_id']=$this->session->userdata['logged_in']['id'];
            $data = array(
            'product_name' => $this->input->post('product_name'),
            'hsn_code' => $this->input->post('hsn_code'),
            'unit' => $this->input->post('unit'),
            
        );

            $result = $this->item_model->insert('products',$data);
              
            if ($result == TRUE) {
                
          
                $this->session->set_flashdata('success', 'Product Added Successfully !');
                redirect('/ItemMasterController/index', 'refresh');
                } else {
                $this->session->set_flashdata('failed', 'Already exists Product Could not added !');
                redirect('/ItemMasterController/index', 'refresh');
           }
              
    }
        
    public function editproducts($id)
    {
      
        $login_id=$this->session->userdata['logged_in']['id'];
           $data = array(
            'product_name' => $this->input->post('product_name'),
            'hsn_code' => $this->input->post('hsn_code'),
            'unit' => $this->input->post('unit'),
            
        );
        $result = $this->item_model->product_edit($data,$id);
      //echo $result;exit;

        if ($result == TRUE) {
                
          
                $this->session->set_flashdata('success', 'Product Updated Successfully !');
                redirect('/ItemMasterController/index', 'refresh');
                } else {
                $this->session->set_flashdata('failed', 'something went wrong !');
                redirect('/ItemMasterController/index', 'refresh');
           }

      
      }
        
   
        
        
}