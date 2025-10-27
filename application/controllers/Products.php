<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    public function __construct() {
    parent::__construct();
    if(!$this->session->userdata['logged_in']['id']){
        redirect('User_authentication/index');
    }
    $this->load->model('Product_model');
    $this->load->helper(['form', 'url','text']);   
    $this->load->library('template');

    }
    public function index() {
        $data['products'] = $this->Product_model->getProductList();
        // echo "<pre>";print_r( $data['products']);exit;
        $this->template->load('layout/template','products/index',$data);
    }

    public function add() {
        
        if ($this->input->post()) {
            // echo "<pre>";print_r($_POST);print_r($_FILES);exit;

             
            $data = [
                'category_id' => $this->input->post('category_id'),
                'name' => $this->input->post('product_name'),
                'slug' => url_title($this->input->post('product_name'), 'dash', TRUE),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                ];

            // Handle Image Upload
            if (!empty($_FILES['featured_photo']['name'])) {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('featured_photo')) {
                    $uploadData = $this->upload->data();
                    $data['feature_img'] = $uploadData['file_name'];
                }
            }

            $this->Product_model->insert($data);
            redirect('products');
        } else {
            $data['categories'] = $this->Product_model->getCategories();
            $this->template->load('layout/template','products/add',$data);
        }
    }

    public function edit($product_id) {
        $data['id'] = $product_id;
        $data['product'] = $this->Product_model->get_by_id($product_id);
        if ($this->input->post()) {
            $updateData = [
                'category_id' => $this->input->post('category_id'),
                'name' => $this->input->post('product_name'),
                'slug' => url_title($this->input->post('product_name'), 'dash', TRUE),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                ];
                 // Handle Image Upload
            if (!empty($_FILES['featured_photo']['name'])) {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('featured_photo')) {
                    $uploadData = $this->upload->data();
                    $updateData['feature_img'] = $uploadData['file_name'];
                }
            }else{
                 $updateData['feature_img'] = $this->input->post('old_image');
            }
            $this->Product_model->update($product_id, $updateData);
            redirect('products');
        } else {
            $data['categories'] = $this->Product_model->getCategories();
             $this->template->load('layout/template','products/add', $data);
        }
    }

    public function delete($id) {
        $this->Product_model->delete($id);
        redirect('products');
    }
}
