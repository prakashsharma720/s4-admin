<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    public function __construct() {
    parent::__construct();
    if(!$this->session->userdata['logged_in']['id']){
        redirect('User_authentication/index');
    }
    $this->load->model('Product_model');
    $this->load->helper(['form', 'url']);   
    $this->load->library('template');

    }
    public function index() {
        $data['products'] = $this->Product_model->get_all();
        $this->template->load('layout/template','products/index',$data);
    }

    public function add() {
        
        if ($this->input->post()) {
            // echo "<pre>";print_r($_POST);exit;
            
            $data = [
                'product_name' => $this->input->post('product_name'),
                'sku' => $this->input->post('sku'),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'stock' => $this->input->post('stock'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            ];

            // Handle Image Upload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $uploadData = $this->upload->data();
                    $data['image'] = $uploadData['file_name'];
                }
            }

            $this->Product_model->insert($data);
            redirect('products');
        } else {
            $data['categories'] = $this->Product_model->getCategories();
            $this->template->load('layout/template','products/add',$data);
        }
    }

    public function edit($id) {
        $data['product'] = $this->Product_model->get_by_id($id);
        if ($this->input->post()) {
            $updateData = [
                'product_name' => $this->input->post('product_name'),
                'sku' => $this->input->post('sku'),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'stock' => $this->input->post('stock'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            ];
            $this->Product_model->update($id, $updateData);
            redirect('products');
        } else {
            $this->load->view('products/edit', $data);
        }
    }

    public function delete($id) {
        $this->Product_model->delete($id);
        redirect('products');
    }
}
