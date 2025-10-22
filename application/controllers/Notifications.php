<?php

//session_start(); //we need to start session in order to access it through CI

Class Notifications extends MY_Controller {

public function __construct() {
parent::__construct();
if(!$this->session->userdata['logged_in']['id']){
    redirect('User_authentication/index');
}
/*require_once APPPATH.'third_party/PHPExcel.php';
$this->excel = new PHPExcel(); */
$this->load->library('template');
// Load form helper library
$this->load->helper('form');
$this->load->helper('url');
$this->load->helper('custom');
// new security feature
$this->load->helper('security');
$this->load->helper('MY_array');
// Load form validation library
$this->load->library('form_validation');

//$this->load->library('encryption');

// Load session library
$this->load->library('session');




// Load database
//$this->load->model('notifications_model');
$this->load->model('notifications_model');
//$this->load->library('excel');
}

// Show login page
public function add($id = NULL) {
	$data = array();
	
	$data['title']='Create New Notification';
	//$data['suppliers']=$this->notifications_model->getSuppliers();
	$data['grids']=$this->notifications_model->getGrids();
	$data['raw_materials']=$this->notifications_model->getCategories();
	$data['categories']=$this->notifications_model->getSupplierCategories();
	//$data['states']=$this->notifications_model->getStates();
	$this->template->load('template','notification_master',$data);

	//$this->load->view('footer');
	
	}
public function edit($id = NULL) {
	$data = array();
	$result = $this->notifications_model->getById($id);
	//print_r($result);exit;
	if (isset($result['id']) && $result['id']) :
        $data['id'] = $result['id'];
    else:
        $data['id'] = '';
    endif;

    if (isset($result['supplier_id']) && $result['supplier_id']) :
        $data['supplier_id'] = $result['supplier_id'];
    else:
        $data['supplier_id'] = '';
    endif; 
     if (isset($result['categories_id']) && $result['categories_id']) :
        $data['categories_id'] = $result['categories_id'];
    else:
        $data['categories_id'] = '';
    endif;

    if (isset($result['grid_number']) && $result['grid_number']) :
        $data['grid_number'] = $result['grid_number'];
    else:
        $data['grid_number'] = '';
    endif;

    if (isset($result['rm_name']) && $result['rm_name']) :
        $data['rm_name'] = $result['rm_name'];
    else:
        $data['rm_name'] = '';
    endif;
    if (isset($result['grade']) && $result['grade']) :
        $data['grade'] = $result['grade'];
    else:
        $data['grade'] = '';
    endif;

    if (isset($result['rm_code']) && $result['rm_code']) :
        $data['rm_code'] = $result['rm_code'];
    else:
        $data['rm_code'] = '';
    endif;

	$data['title']='Edit RM Code';
	$data['grids']=$this->notifications_model->getGrids();
	$data['suppliers']=$this->notifications_model->getSuppliers($data['categories_id']);
	$data['raw_materials']=$this->notifications_model->getCategories();
	$data['categories']=$this->notifications_model->getSupplierCategories();
	//$data['states']=$this->notifications_model->getStates();
	$this->template->load('template','rm_code_edit',$data);

	//$this->load->view('footer');
	
	}
// 	public function index(){
// 			 $data['title'] = 'All Notifications';

//     // load model with alias (so $this->notifications_model is available)
//     $this->load->model('Notifications_Model', 'notifications_model');
// 	// $this->load->model('Notifications_Model', 'getEmployees');

//     // get session safely (if available)
//     $session = $this->session->userdata('logged_in') ?? [];
//     $login_id = $session['id'] ?? null;
//     $role_id  = $session['role_id'] ?? null;

//     // Fetch notifications based on role (adjust as you need)
//     if ((int)$role_id == 1) {
//     $data['allnotifications'] = $this->notifications_model->allnotification();
// } else {
//     $data['allnotifications'] = $this->notifications_model->allnotification_emp($login_id);
// }
// 	//  echo "<pre>";
//     // print_r($data['allnotifications']);
//     // exit;

//     // do NOT set $data['message'] or $data['datetime'] here
//     $this->template->load('layout/template', 'notification_master', $data);
// 		}

public function index()
{
    $data['title'] = 'All Notifications';

    // Load model
    $this->load->model('Notifications_Model', 'notifications_model');

    // Get session
    $session = $this->session->userdata('logged_in') ?? [];
    $login_id = $session['id'] ?? null;
    $role_id  = $session['role_id'] ?? null;

    // Get filter input (from GET request)
    $from_date = $this->input->get('from_date');
    $upto_date = $this->input->get('upto_date');

    // If filter applied
    if (!empty($from_date) && !empty($upto_date)) {

        // Convert to SQL datetime format
        $from_sql = DateTime::createFromFormat('d-m-Y', $from_date)->format('Y-m-d 00:00:00');
        $upto_sql = DateTime::createFromFormat('d-m-Y', $upto_date)->format('Y-m-d 23:59:59');

        // Admin vs Employee logic
        if ((int)$role_id === 1) {
            $data['allnotifications'] = $this->notifications_model->getNotificationsByDateRange($from_sql, $upto_sql, null, true);
        } else {
            $data['allnotifications'] = $this->notifications_model->getNotificationsByDateRange($from_sql, $upto_sql, $login_id, false);
        }

        $data['filter_applied'] = true;
    } else {
        // Default: show all notifications
        if ((int)$role_id === 1) {
            $data['allnotifications'] = $this->notifications_model->allnotification();
        } else {
            $data['allnotifications'] = $this->notifications_model->allnotification_emp($login_id);
        }

        $data['filter_applied'] = false;
    }

    // Pass form values back to view
    $data['from_date'] = $from_date;
    $data['upto_date'] = $upto_date;

    // Load the view
    $this->template->load('layout/template', 'notification_master', $data);
}



    public function allreminder(){
        $data['title']=' All Reminders';
        $this->template->load('layout/template','reminder_master',$data);
    }
	public function report() 
	{
		$data['title'] = 'Suppliers Report';
		$data['suppliers'] = $this->notifications_model->supplier_list();
		//echo var_dump($data['students']);
		$this->template->load('template','supplier_report',$data);
	}

	public function add_notification() {
    $login_id  = $this->session->userdata['logged_in']['id'];  
    $assign_to = $this->input->post('assign_to'); 
    $lead_id   = $this->input->post('lead_id');

    if (empty($lead_id)) {
        $this->session->set_flashdata('failed', 'Lead ID is missing. Notification not created.');
        redirect('Notifications/index');
        return;
    }

    $assigned_by_data = $this->employee->getById($login_id);
    $assigned_to_data = $this->employee->getById($assign_to);

    $assigned_by_pic = !empty($assigned_by_data['photo']) 
        ? base_url($assigned_by_data['photo']) 
        : base_url('assets/images/avatar/default.png');

    $assigned_to_pic = !empty($assigned_to_data['photo']) 
        ? base_url($assigned_to_data['photo']) 
        : base_url('assets/images/avatar/default.png');

    $assigned_by     = $this->session->userdata['logged_in']['name'];
    $lead_title      = $this->input->post('title');
    $work_description = $this->input->post('Description');
    $assigned_to_name = $assigned_to_data['name'];

    // ✅ Get lead data by ID
    $lead_data = $this->Leads_model->getLeadById($lead_id);
    $lead_code = $lead_data['lead_code'] ?? '';

    $data = array(
        'type'         => 'lead-assign',
        'subject'      => 'New Lead Assigned',
        'message'      => $assigned_by . ' assigned new lead "' . $lead_title . '" to ' . $assigned_to_name,
        'page_url'     => 'Leads/view/' . $lead_id,
        'employee_id'  => $assign_to,
        'status'       => 0,
        'lead_id'      => $lead_id, // ✅ only store lead_id
        'datetime'     => date('Y-m-d H:i:s'),
        'assigner_pic' => $assigned_by_pic,
        'assignee_pic' => $assigned_to_pic,
        'created_by'   => $login_id,
    );

    $result = $this->notifications_model->add_notification($data);

    if ($result) {
        $this->session->set_flashdata('success', 'Notification created successfully!');
    } else {
        $this->session->set_flashdata('failed', 'Failed to create notification.');
    }

    redirect('Notifications/index');
}

public function mark_read($id) {
    if (!empty($id)) {
        $data = array('status' => 1);
        $this->notifications_model->clear_notification($data, $id);
        $this->session->set_flashdata('success', 'Notification marked as read.');
    }
    redirect('Notifications');
}

public function count() {
    $login_id = $this->session->userdata['logged_in']['id'];
    $count = $this->notifications_model->totalCount($login_id);
    echo $count;
}

	public function add_new_rmcode() {
		$this->form_validation->set_rules('grid_number', 'Supplier Name', 'required');
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'required');
		$this->form_validation->set_rules('rm_name', 'Raw Material', 'required');
		

		
		if ($this->form_validation->run() == FALSE) 
		{
			
			if(isset($this->session->userdata['logged_in'])){
				$this->add();
			//$this->load->view('admin_page');
			}else{
			$this->load->view('login_form');
			}
			//$this->template->load('template','supplier_add');
		} 
		else 
		{
			$login_id=$this->session->userdata['logged_in']['id'];
			$data = array(
			'grid_number' => $this->input->post('grid_number'),
			'supplier_id' => $this->input->post('supplier_id'),
			'rm_name' => $this->input->post('rm_name'),
			'grade' => $this->input->post('grade'),
			'rm_code' => $this->input->post('rm_code'),
			'categories_id' => $this->input->post('categories_id'),
			'created_by' => $login_id
			);
			//print_r($data);exit;
			$result = $this->notifications_model->rm_insert($data);
			if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Data inserted Successfully !');
			redirect('/Notifications/index', 'refresh');
			//$this->fetchSuppliers();
			} else {
			$this->session->set_flashdata('success', 'Insertion Failed ! Data already exists');
			redirect('/Notifications/index', 'refresh');
			}
		}
	}

	public function edit_rmcode($id){
		$this->form_validation->set_rules('grid_number', 'Supplier Name', 'required');
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'required');
		$this->form_validation->set_rules('rm_name', 'Raw Material', 'required');
	

		if ($this->form_validation->run() == FALSE) 
		{
			if(isset($this->session->userdata['logged_in'])){
					$this->add($id);
			//$this->load->view('admin_page');
			}else{
			$this->load->view('login_form');
			}
			//$this->template->load('template','supplier_edit');
		} 
		else 
		{
			$login_id=$this->session->userdata['logged_in']['id'];
			$data = array(
			'grid_number' => $this->input->post('grid_number'),
			'supplier_id' => $this->input->post('supplier_id'),
			'rm_name' => $this->input->post('rm_name'),
			'grade' => $this->input->post('grade'),
			'rm_code' => $this->input->post('rm_code'),
			'categories_id' => $this->input->post('categories_id'),
			'edited_by' => $login_id
			);
			$old_id = $this->input->post('rm_id_old'); 
			//print_r($data);exit;
			$result = $this->notifications_model->editRMcode($data,$old_id);
			if ($result == TRUE) {

			$this->session->set_flashdata('success', 'Data Updated Successfully !');
			redirect('/Notifications/index', 'refresh');
			//$this->template->load('template','supplier_view');
			} else {
			$this->session->set_flashdata('failed', 'No changes in RM Code details!');
			redirect('/Notifications/index', 'refresh');
			//$this->template->load('template','supplier_view');
			}
		}
	}

public function deleteNotification($id = null)
{
	//  echo "ID received: " . $id;
    // exit;
 if (!empty($id)) {
        $this->load->model('notifications_model');
        $this->notifications_model->delete_notification($id);
        $this->session->set_flashdata('success', 'Notification deleted successfully.');
    } else {
        $this->session->set_flashdata('failed', 'Invalid Notification ID.');
    }
    redirect('Notifications');
}

public function deleteByDate()
{
    $this->load->model('Notifications_model'); // ensure model is loaded

    // accept both GET and POST
    $from_date = $this->input->get_post('from_date');
    $upto_date = $this->input->get_post('upto_date');
    $action    = $this->input->get_post('action');

    $login_id = $this->session->userdata['logged_in']['id'] ?? null;
    $role     = $this->session->userdata['logged_in']['role'] ?? '';
    $is_admin = ($role === 'admin' || $role === 'Super Admin');

    // === FILTER ===
    if ($action === 'filter') {
        if (empty($from_date) || empty($upto_date)) {
            $this->session->set_flashdata('failed', 'Please select both dates.');
            redirect('Notifications/index');
            return;
        }

        $from_dt = DateTime::createFromFormat('d-m-Y', $from_date);
        $upto_dt = DateTime::createFromFormat('d-m-Y', $upto_date);
        if (!$from_dt || !$upto_dt) {
            $this->session->set_flashdata('failed', 'Invalid date format.');
            redirect('Notifications/index');
            return;
        }

        $from_date_sql = $from_dt->format('Y-m-d 00:00:00');
        $upto_date_sql = $upto_dt->format('Y-m-d 23:59:59');

        // ✅ Fetch notifications by date range
        $notifications = $this->Notifications_model->getNotificationsByDateRange(
            $from_date_sql,
            $upto_date_sql,
            $login_id,
            $is_admin
        );

        // send filtered notifications to view
        $data['notifications']    = $notifications;
        $data['allnotifications'] = $notifications;
        $data['from_date']        = $from_date;
        $data['upto_date']        = $upto_date;
        $data['title']            = "Notifications (Filtered)";

        $this->template->load('layout/template', 'Notifications/index', $data);
        return;
    }

    // === DELETE ===
    if ($action === 'delete') {
        if (empty($from_date) || empty($upto_date)) {
            $this->session->set_flashdata('failed', 'Please select both dates.');
            redirect('Notifications/index');
            return;
        }

        $from_dt = DateTime::createFromFormat('d-m-Y', $from_date);
        $upto_dt = DateTime::createFromFormat('d-m-Y', $upto_date);
        $from_date_sql = $from_dt->format('Y-m-d 00:00:00');
        $upto_date_sql = $upto_dt->format('Y-m-d 23:59:59');

        // delete logic
        if ($is_admin) {
            $deleted = $this->Notifications_model->deleteByDateRange($from_date_sql, $upto_date_sql);
        } else {
            $deleted = $this->Notifications_model->deleteByDateRangeForUser($from_date_sql, $upto_date_sql, $login_id);
        }

        if ($deleted > 0) {
            $this->session->set_flashdata('success', "$deleted notifications deleted successfully!");
        } else {
            $this->session->set_flashdata('failed', 'No notifications found for that range.');
        }

        redirect('Notifications/index');
        return;
    }

    // Default redirect
    redirect('Notifications/index');
}

public function deleteAll()
{
    $this->load->model('notifications_model');
    $result = $this->notifications_model->delete_all_notifications();

    if ($result) {
        $this->session->set_flashdata('success', 'All notifications deleted successfully.');
    } else {
        $this->session->set_flashdata('failed', 'Failed to delete notifications.');
    }

    redirect('Notifications/index');
}

	   public function deleteReminder($id= null)
	   {
		   $ids=$this->input->post('ids');
		//    print($ids);exit;
		   if(!empty($ids)) 
		   {
			   $Datas=explode(',', $ids);
				  foreach ($Datas as $key => $id) {
					  $this->notifications_model->delete_reminder($id);
				  }
					echo $this->session->set_flashdata('success', ' Reminders has been deleted Successfully !');
		   }
		   else
		   {
				  $id = $this->uri->segment('3');
				  $this->notifications_model->delete_reminder($id);
				  $this->session->set_flashdata('success', 'This Reminder has been deleted !');
				  redirect('/User_authentication/dashboard', 'refresh');
					//$this->fetchSuppliers(); //render the refreshed list.
				}
		  }


          
  	 
}

?>