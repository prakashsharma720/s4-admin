<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class To_do extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('notifications_model');
		  $this->load->model('employee');
		if(!$this->session->userdata['logged_in']['id']){
			redirect('User_authentication/index');
		}
		require_once APPPATH . "/third_party/PHPExcel.php";
        
        $this->load->model('To_do_model');
        // $this->load->model('employee');
        $this->load->model('Leads_model');
        $this->load->library('session');
        $this->load->library('template');
        $this->load->helper('url');
		// new security feature
		$this->load->helper('security');
		// Load form validation library
		$this->load->library('form_validation');
        $this->load->model('Leads_model');
        $this->load->helper('form');
    }

    public function index() {
        
        $data['title'] = 'To-Do Activity';
		$data['login_id']=$this->session->userdata['logged_in']['id'];
		$data['department_id']=$this->session->userdata['logged_in']['department_id'];
		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		$data['auth_id']=$this->session->userdata['logged_in']['auth_id'];

        $data['to_do_list'] = $this->To_do_model->get_all();

        
        $all_todos = $this->To_do_model->get_all();

        $data['pending_todos'] = array_filter($all_todos, function($todo) {
            return $todo->status !== 'Completed';
        });

        $data['completed_todos'] = array_filter($all_todos, function($todo) {
            return $todo->status === 'Completed';
        });


        
        $data['employees'] = $this->Leads_model->getEmployeeDropdown();

        $this->template->load('layout/template','To_do/index',$data);
    }

    public function add() {
        $title = $this->input->post('title');
        $to_do_description = $this->input->post('to_do_description');
        $assigned_to = $this->input->post('assigned_to');
        $due_date = $this->input->post('due_date');

        $created_by = $this->session->userdata['logged_in']['id'];

        $data = [
            'title' => $title,
            'to_do_description' => $to_do_description,
            'assigned_to' => $assigned_to,
            'due_date' => $due_date,
            'created_by' => $created_by
        ];

        $this->To_do_model->insert($data);
        $this->session->set_flashdata('success', 'To-do added successfully!');
        redirect('to_do');
    }

    public function update_status($id = null) {
        if($this->input->post()) {
            $status = $this->input->post('status');
            // $feedback = $this->input->post('feedback');

            $data = [
                'status' => $status,
                // 'to_do_feedback' => $feedback
            ];

            $this->To_do_model->update_status_feedback($id, $data);
            $this->session->set_flashdata('success', 'To-Do Status updated successfully!');
            redirect('to_do');
        }

        $todo = $this->To_do_model->get_by_id($id);
        $data['todo'] = $todo;
        $this->load->view('to_do/update_status_modal', $data);
    }

    public function save_feedback($id) {
        $feedback = $this->input->post('to_do_feedback');

        $update = [
            'to_do_feedback' => $feedback
        ];

        $result = $this->To_do_model->update_feedback($id, $update);

        if ($result) {
            $this->session->set_flashdata('success', 'Feedback saved successfully!');
            echo json_encode([
                'status' => true,
                'message' => 'Feedback saved successfully!'
            ]);
        } else {
            $this->session->set_flashdata('error', 'Failed to save feedback.');
            echo json_encode([
                'status' => false,
                'message' => 'Failed to save feedback.'
            ]);
        }
    }

    public function update_status_ajax($id) {
        $status = $this->input->post('status');

        if (empty($status)) {
            echo json_encode(['status' => false, 'message' => 'Invalid status']);
            return;
        }

        $update = [
            'status' => $status
        ];

        $result = $this->To_do_model->update_feedback($id, $update);

        if ($result) {
            $this->session->set_flashdata('success', 'Status updated successfully!');
            echo json_encode(['status' => true, 'message' => 'Status updated successfully!']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Failed to update status.']);
        }
    }
}