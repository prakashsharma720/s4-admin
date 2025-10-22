<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start(); //we need to start session in order to access it through CI

Class Leads extends MY_Controller {

	public function __construct() {
		parent::__construct();
		 $this->load->model('notifications_model');
		  $this->load->model('employee');
		if(!$this->session->userdata['logged_in']['id']){
			redirect('User_authentication/index');
		}
		require_once APPPATH . "/third_party/PHPExcel.php";
		// $this->excel = new PHPExcel(); 
		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('url');
		// new security feature
		$this->load->helper('security');
		// Load form validation library
		$this->load->library('form_validation');
		// Load session library
		$this->load->library('session');
		$this->load->library('template');
		// Load database
		$this->load->model('Leads_model');
		$this->load->model('item_model');
			$this->load->model('MO_leads');
	}

	public function index() 
	{
		$data['title'] = ' Lead Data';
		$data['converttitle'] = 'Convert Quotation';
		$data['login_id']=$this->session->userdata['logged_in']['id'];
		$data['department_id']=$this->session->userdata['logged_in']['department_id'];
		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		$data['auth_id']=$this->session->userdata['logged_in']['auth_id'];
		

		
	
		$conditions=[];
		if($this->input->get()) {
			// print_r($conditions);exit;				
		 	$conditions['category_name']  = $this->input->get('category_name');
            $conditions['lead_code'] = $this->input->get('lead_code');
            $conditions['lead_status'] = $this->input->get('lead_status');
			$conditions['employee_id'] 	 = $this->input->get('employee_id');
            $conditions['mobile'] = $this->input->get('mobile');
            $conditions['email'] = $this->input->get('email');
            $conditions['lead_title'] = $this->input->get('lead_title');

			


            if(!empty($this->input->get('upto_date'))) {
				$conditions['upto_date']=date('Y-m-d',strtotime($this->input->get('upto_date')));
			} else {
				$conditions['upto_date']= "";
			}

			if(!empty($this->input->get('from_date'))) {
				$conditions['from_date']=date('Y-m-d',strtotime($this->input->get('from_date')));
			} else {
				$conditions['from_date']= "";
			}
			

			// echo "<pre>";
			// print_r($_GET);
			
			$data['filtered_value']=$conditions;
			$data['leads'] = $this->Leads_model->LeadListCSV($conditions);
		
			$data['leads_id'] = $this->Leads_model->duplicate();
			
		} else {
			
			// $data['filtered_value']='';
			$conditions['category_name']='';
			$conditions['lead_code']='';
			$conditions['lead_status']='';
			$conditions['upto_date']='';
			$conditions['from_date']='';
			$conditions['employee_id'] 	= "";
		
			$data['filtered_value']=$conditions;
			$conditions['mobile'] = $this->input->get('mobile');
            $conditions['email'] = $this->input->get('email');
            $conditions['lead_title'] = $this->input->get('lead_title');
		 	$data['leads'] = $this->Leads_model->LeadListCSV($data);

			 $data['leads_id'] = $this->Leads_model->duplicate($conditions);

			 
		}
        	// echo"<pre>";print_r($data['leads']);exit;
		//echo var_dump($data['students']);
		// echo "<pre>";print_r($data['leads']);exit;
		$data['employees'] = $this->Leads_model->getEmployeeDropdown();
		// $data['employees'] = $this->Leads_model->getEmployees();
		$data['categories'] = $this->Leads_model->getLeadsCategories();

		// $employees_raw = $this->Leads_model->getEmployeeDropdown();
		// $employees = [];
		// foreach ($employees_raw as $emp) {
		// 	$employees[$emp['id']] = $emp['name']; // id => name
		// }
		// $data['employees'] = $employees;

		
		// print_r($data['auth_id']);exit;

		// $data['leads'] = $this->Leads_model->get_all_leads();

    foreach ($data['leads'] as &$lead) {
        $lead['activities'] = $this->Leads_model->get_activities_by_lead($lead['id']);
    }


	
		$this->template->load('layout/template','Lead_Module/Lead_Generation/index',$data);
	}

	public function reports() 
	{
		$data['title'] = ' Lead Data';
		$data['login_id']=$this->session->userdata['logged_in']['id'];
		$data['department_id']=$this->session->userdata['logged_in']['department_id'];
		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		
	
		$conditions=[];
		if($this->input->get()) {			
		 	$conditions['category_name']  = $this->input->get('category_name');
            $conditions['lead_code'] = $this->input->get('lead_code');
            $conditions['lead_status'] = $this->input->get('lead_status');
			$conditions['employee_id'] 	 = $this->input->get('employee_id');
            $conditions['mobile'] = $this->input->get('mobile');
            $conditions['email'] = $this->input->get('email');
            $conditions['lead_title'] = $this->input->get('lead_title');


            if(!empty($this->input->get('upto_date'))) {
				$conditions['upto_date']=date('Y-m-d',strtotime($this->input->get('upto_date')));
			} else {
				$conditions['upto_date']= "";
			}

			if(!empty($this->input->get('from_date'))) {
				$conditions['from_date']=date('Y-m-d',strtotime($this->input->get('from_date')));
			} else {
				$conditions['from_date']= "";
			}
			

			// echo "<pre>";
			// print_r($_GET);
			$data['filtered_value']=$conditions;
			$data['leads'] = $this->Leads_model->LeadListCSV($conditions);
			$data['leads_id'] = $this->Leads_model->duplicate();
			
		} else {
			
			// $data['filtered_value']='';
			$conditions['category_name']='';
			$conditions['lead_code']='';
			$conditions['lead_status']='';
			$conditions['upto_date']='';
			$conditions['from_date']='';
			$conditions['employee_id'] 	= "";
		
			$data['filtered_value']=$conditions;
			$conditions['mobile'] = $this->input->get('mobile');
            $conditions['email'] = $this->input->get('email');
            $conditions['lead_title'] = $this->input->get('lead_title');
		 	$data['leads'] = $this->Leads_model->LeadListCSV($data);
			 $data['leads_id'] = $this->Leads_model->duplicate($conditions);
		}

		//echo var_dump($data['students']);
		// echo "<pre>";print_r($data['leads']);exit;
		$data['employees'] = $this->Leads_model->getEmployeeDropdown();
		$data['categories'] = $this->Leads_model->getLeadsCategories();
		$this->template->load('template','leads/leads_report',$data);
	}

	public function mo_leads() 
	{
		$data['title'] = ' MO Website Leads Data';
		$this->load->model('MO_leads');
		$conditions=[];
		 if($this->input->get()) {
		 	$conditions['category_name']  = $this->input->get('category_name');
            $conditions['lead_code'] = $this->input->get('lead_code');
            $conditions['lead_status'] = $this->input->get('lead_status');
            if(!empty($this->input->get('upto_date'))) {
				$conditions['upto_date']=date('Y-m-d',strtotime($this->input->get('upto_date')));
			} else {
				$conditions['upto_date']= "";
			}
			if(!empty($this->input->get('from_date'))) {
				$conditions['from_date']=date('Y-m-d',strtotime($this->input->get('from_date')));
			} else {
				$conditions['from_date']= "";
			}
			// echo "<pre>";
			// print_r($_GET);

			$data['leads'] = $this->MO_leads->MOLeadList($conditions);
			$data['filtered_value']=$conditions;
		 }else{
		 	$data['leads'] = $this->MO_leads->MOLeadList();
		 }
		//echo var_dump($data['students']);
		//print_r($data['item_name']);exit;
		
		$data['categories'] = $this->Leads_model->getLeadsCategories();
		$this->template->load('layout/template','leads/mo_lead_view',$data);
	}
	public function worshop_leads() 
{
    $data['title'] = 'Complaints Data';
    
    $this->load->model('MO_leads');
    $conditions = [];
    
    if($this->input->get()) {
        $conditions['workshop_name'] = $this->input->get('workshop_name');
        $conditions['booking_status'] = $this->input->get('booking_status');
    }
    
    $data['filtered_value'] = $conditions;
    $data['leads'] = $this->MO_leads->MOWorkshopList($conditions);
    $data['workshopnames'] = $this->MO_leads->getWorkshop();

    $this->template->load('layout/template', 'leads/workshop_view', $data);
}

   public function mailtoAll($id=NULL)
    {
    $ids = $this->input->post('ids');
    // echo $ids;exit;
    if (!empty($ids)) {
        $selectedIds = explode(',', $ids);
        foreach ($selectedIds as $id) {
            $this->MO_leads->sendMail($id);
        }
        $this->session->set_flashdata('success', 'Emails have been sent successfully to all selected users!');
    } else {
        $id = $this->uri->segment(3);
        $this->MO_leads->sendMail($id);
        $this->session->set_flashdata('success', 'Email has been sent successfully!');
    }
    redirect('/User_authentication/dashboard', 'refresh');
}

	public function followups($id = NULL) 
	{
		$data=[];
		$data['id']=$this->uri->segment('3');
		
		$data['leads_data'] = $this->Leads_model->getById($id);
		$data['followups'] = $this->Leads_model->getFollowUps($id);
		$data['lead_title'] = $data['leads_data']['lead_title'];
		//$data['categories'] = $this->Leads_model->getCategories();
		//echo var_dump($data['students']);
		// print_r($data['leads_data']['lead_title']);exit;
		$this->template->load('template','leads/lead_followups',$data);
	}

	public function convert($id){
		// echo $id;exit;
		$data=[];
		$data['id']=$this->uri->segment('3');
		
		$data['leads_data'] = $this->Leads_model->getById($id);
		$data['lead_title'] = 'Convert Quotation';
		$data['products'] = $this->Leads_model->projectList();
		//  echo $data['products'];exit;

		//  $data['products'] = [
        // "VALUE ADDED MARBLE",
        // "VALUE ADDED GRANITE",
        // "VALUE ADDED SAND STONE",
        // "SAND STONE BLOCKS",
        // "SANDSTONE SLABS",
        // "MARBLE SLABS",
		// ];

	
		// $data['hsn_codes'] = [
		// 	"68022900",
		// 	"68022390",
		// 	"68022900",
		// 	"2516100",
		// 	"25162000",
		// 	"68022900",
		// ];
		// $data['units'] = [
		// 	"Tn",
		// 	"Sqf",
		// 	"CFT",
		// 	"Pcs",
		// 	"Nos",
			
		// ];
		// echo "<pre>"; print_r($data['leads_data']);exit;
		$this->template->load('layout/template','leads/convert_quotation',$data);
	}
	public function edit_print_preview($id=null){

		// echo $id;exit;
		$data=[];
		$data['id']=$this->uri->segment('3');
		
		// $data['leads_data'] = $this->Leads_model->getByQuotationId($id);
		$data['lead_title'] = 'Convert Quotation';
		//$data['categories'] = $this->Leads_model->getCategories();
		$data['products'] = $this->Leads_model->projectList();

		
			
		$this->db->select('q.*, lead_csv.id as leadid, lead_csv.lead_code , lead_csv.date, lead_csv.lead_title, lead_csv.email, lead_csv.mobile, lead_csv.category_name, lead_csv.contact_person,lead_csv.lead_architect, lead_csv.work_description, lead_csv.city, lead_csv.state');
			$this->db->from('quotation_table q');

			$this->db->join('lead_csv ', 'q.lead_id = lead_csv.id', 'left');

			$this->db->where('q.id', $id);	

			$quotation = $this->db->get()->row_array();

			// echo "<pre>"; print_r($quotation);exit;



			
			if(!$quotation){
				show_404();
				return;
			}

			// Load quotation items
			// $this->db->where('lead_id', $id);
			// $items = $this->db->get('lead_quotation_items')->result_array();
 			// 2. Load quotation items with product details
			$this->db->select('i.*, p.product_name, p.hsn_code as phsncode, p.unit as hsnunit');
			$this->db->from('lead_quotation_items i');
			$this->db->join('products p', 'i.product_id = p.id', 'left');
			$this->db->where('i.quotation_id', $id);
			$items = $this->db->get()->result_array();

			// $this->db->where('quotation_id', $id);
			// $items = $this->db->get('lead_quotation_items')->result_array();

			$data['quotation'] = $quotation;
			$data['items'] = $items;
			// echo "<pre>";print_r($items);exit;
		$this->template->load('layout/template','leads/edit_quotation',$data);
	}
	public function lead_quotation(){
		$data['leads'] = $this->Leads_model->QuotationLeadList();

		// echo "<pre>";print_r($data['leads']);exit;

		$this->template->load('layout/template','leads/leadquotation_list',$data);

	}

	public function add_quotation() {
		$lead_id = $this->input->post('lead_id');
		$auth_id = $this->session->userdata['logged_in']['auth_id'];

		// 1. Generate Estimate No
		$estimate_no = "EST" . str_pad($lead_id, 5, "0", STR_PAD_LEFT) . "/" . date('Y');

		// 2. Get totals from hidden fields (sent via form)
		$total_products = $this->input->post('total_products') ?? 0;
		$total_qty      = $this->input->post('total_qty_val') ?? 0;
		$total_gst      = $this->input->post('total_gst_val') ?? 0;
		$grand_total    = $this->input->post('grand_total_val') ?? 0;

		// 3. Get item data from form
		$products     = $this->input->post('product_id'); // matches name in select
		$descs        = $this->input->post('desc');
		$qtys         = $this->input->post('qty');
		$prices       = $this->input->post('price');
		$gsts         = $this->input->post('gst');
		$gst_amounts  = $this->input->post('gst_amount');
		$totals       = $this->input->post('total');
		$hsn_codes    = $this->input->post('hsn_code') ?? [];
		$units        = $this->input->post('unit') ?? [];

		// 4. Insert quotation header
		$quotation_data = [
			'lead_id'            => $lead_id,
			'estimate_no'        => $estimate_no,
			'total_products'     => $total_products,
			'total_qty'          => $total_qty,
			'total_price'        => array_sum(array_map(function($q,$p){ return $q*$p; }, $qtys,$prices)),
			'total_gst_amount'   => $total_gst,
			'total_grand_amount' => $grand_total,
			'created_at'         => date('Y-m-d H:i:s'),
			'created_by'         => $auth_id,
		];

		$quotation_id = $this->Leads_model->insertQuotation($quotation_data);

		// 5. Insert each quotation item
		if(!empty($products)){
			foreach($products as $key => $product_id){
				if(empty($product_id)) continue;

				$item_data = [
					'lead_id'      => $lead_id,
					'quotation_id' => $quotation_id,
					'product_id'   => $product_id,
					'description'  => $descs[$key] ?? '',
					'hsn_code'     => $hsn_codes[$key] ?? '',
					'unit'         => $units[$key] ?? '',
					'qty'          => $qtys[$key] ?? 0,
					'price'        => $prices[$key] ?? 0,
					'gst'          => $gsts[$key] ?? '',
					'gst_amount'   => $gst_amounts[$key] ?? 0,
					'total'        => $totals[$key] ?? 0,
					'auth_id'      => $auth_id,
				];

				$this->Leads_model->insertQuotationItem($item_data);
			}
		}

		// 6. Mark lead as converted to quotation
		$this->db->where('id',$lead_id)->update('lead_csv',['convert_quotation'=>1]);

		$this->session->set_flashdata('success','Quotation Added Successfully!');
		redirect('/Leads/index/','refresh');
}

	public function update_quotation()
{
    $lead_id      = $this->input->post('lead_id');
    $auth_id      = $this->session->userdata['logged_in']['auth_id'];
    $quotation_id = $this->input->post('quotation_id');

    // Arrays from form
    $item_ids    = $this->input->post('item_id') ?? [];
    $products    = $this->input->post('product_id') ?? []; // note: matches HTML name
    $descs       = $this->input->post('desc') ?? [];
    $hsn_codes   = $this->input->post('hsn_code') ?? [];
    $qtys        = $this->input->post('qty') ?? [];
    $units       = $this->input->post('unit') ?? [];
    $prices      = $this->input->post('price') ?? [];
    $gsts        = $this->input->post('gst') ?? [];
    $gst_amounts = $this->input->post('gst_amount') ?? [];
    $totals      = $this->input->post('total') ?? [];

    // Totals for header
    $total_products     = 0;
    $total_qty          = 0;
    $total_price        = 0;
    $total_gst_amount   = 0;
    $total_grand_amount = 0;

    if (!empty($products)) {
        foreach ($products as $key => $product_id) {

            // Skip empty rows
            $qty   = floatval($qtys[$key] ?? 0);
            $price = floatval($prices[$key] ?? 0);
            if (empty($product_id) || $qty <= 0 || $price <= 0) continue;

            $item_id    = $item_ids[$key] ?? 0;
            $gst_amount = floatval($gst_amounts[$key] ?? 0);
            $total      = floatval($totals[$key] ?? 0);

            // Update header totals
            $total_products++;
            $total_qty          += $qty;
            $total_price        += $price * $qty;
            $total_gst_amount   += $gst_amount;
            $total_grand_amount += $total;

            $item_data = [
                'lead_id'     => $lead_id,
                'quotation_id'=> $quotation_id,
                'product_id'  => $product_id,
                'description' => $descs[$key] ?? '',
                'hsn_code'    => $hsn_codes[$key] ?? '',
                'qty'         => $qty,
                'unit'        => $units[$key] ?? '',
                'price'       => $price,
                'gst'         => $gsts[$key] ?? '',
                'gst_amount'  => $gst_amount,
                'total'       => $total,
                'auth_id'     => $auth_id,
            ];

            if ($item_id > 0) {
                // Update existing item
                $this->Leads_model->updateQuotationItem($item_id, $item_data);
            } else {
                // Insert new item
                $this->Leads_model->insertQuotationItem($item_data);
            }
        }
    }

    // Update quotation header
    $quotation_data = [
        'total_products'     => $total_products,
        'total_qty'          => $total_qty,
        'total_price'        => $total_price,
        'total_gst_amount'   => $total_gst_amount,
        'total_grand_amount' => $total_grand_amount,
        'updated_at'         => date('Y-m-d H:i:s'),
        'updated_by'         => $auth_id
    ];

    $this->Leads_model->updateQuotation($quotation_id, $quotation_data);

    $this->session->set_flashdata('success', 'Quotation Updated Successfully!');
    redirect('/Leads/index/', 'refresh');
}



		public function print_preview($quotation_id){
			// Load quotation details
			$this->db->select('q.*, l.contact_person,l.lead_title, l.state, l.city, l.mobile, l.email, l.project_address');
			$this->db->from('quotation_table q');
			$this->db->join('lead_csv l', 'q.lead_id = l.id', 'left');
			$this->db->where('q.id', $quotation_id);
			$quotation = $this->db->get()->row_array();

			if(!$quotation){
				show_404();
				return;
			}

			 // 2. Load quotation items with product details
			$this->db->select('i.*, p.product_name, p.hsn_code as phsncode, p.unit as hsnunit');
			$this->db->from('lead_quotation_items i');
			$this->db->join('products p', 'i.product_id = p.id', 'left');
			$this->db->where('i.quotation_id', $quotation_id);
			$items = $this->db->get()->result_array();

			$data['quotation'] = $quotation;
			$data['items'] = $items;
			// echo "<pre>";print_r($items);exit;

			$this->template->load('layout/template','leads/print_preview',$data);
		}

	public function importdata()
	{	

		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		$data['auth_id']=$this->session->userdata['logged_in']['auth_id'];
		if ($this->input->post('submit')) 
		{
			$login_id=$this->session->userdata['logged_in']['id'];
				// echo "<pre>";
				// print_r($_FILES);
				$path = './uploads/';
				$config['upload_path'] = $path;
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = TRUE;

				//print_r($config);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);            
				if (!$this->upload->do_upload('uploadFile')) {
					$error = array('error' => $this->upload->display_errors());
					//($error);exit;
				} else {
					$data = array('upload_data' => $this->upload->data());
					// echo"<pre>";print_r($data);exit;
				}
			// echo "hy";exit;
			if(empty($error))
			{
				if (!empty($data['upload_data']['file_name'])) {
				$import_xls_file = $data['upload_data']['file_name'];
				} else {
				$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
				$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				// sizeof($allDataInSheet);exit;

				
				

				$flag = true;
				$i=0;
				foreach ($allDataInSheet as $value) 
				{
					if($flag){
					$flag =false;
					continue;
					}
					
					// echo"<pre>";print_r($value);exit;
				    //$data['lead_code_view']=$rs_id_code;

					
					if(!empty($value['B'])){
						
						$inserdata[$i]['date'] = $value['A'];
						$inserdata[$i]['category_name'] = $value['B'];
						$inserdata[$i]['lead_title'] = $value['C'];
						$inserdata[$i]['contact_person'] = $value['D'];
						$inserdata[$i]['email'] = $value['E'];
						$inserdata[$i]['country'] = $value['F'];
						$inserdata[$i]['mobile'] = $value['G'];
						$inserdata[$i]['city'] = $value['H'];
						$inserdata[$i]['lead_source'] = $value['I'];
						$inserdata[$i]['work_description'] = $value['J'];
						
						$i++;
					}
								//MSg API
									// Account details
						// $username = 'Arushi Goyal';
						// $apiKey = '8210F-832FC';
						// $apiRequest = 'Text';
						// // Message details
						// $numbers = $value['G']; // Multiple numbers separated by comma
						// $sender = 'NIRMAD';
						// $message = 'Your Lead is Generated';
						// $templateid = "1207162399760459990";
						// // Route details
						// $apiRoute = 'TRANS';
						// $format='JSON';


						
						// // Prepare data for POST request
						// $dataapi = 'username='.$username.'&apikey='.$apiKey.'&apirequest='.$apiRequest.'&route='.$apiRoute.'&mobile='.$numbers.'&sender='.$sender."&TemplateID=".$templateid."&message=".$message."&format".$format;
						// // print_r($dataapi);exit;
						// // Send the GET request with cURL
						// $url = "http://123.108.46.13/sms-panel/api/http/index.php?".$dataapi;
						// $url = preg_replace("/ /", "%20", $url);
						// $response = file_get_contents($url);
						// // Process your response here
						// // print_r($response);exit;
						// echo $response;

					
				}    
			         
				$result = $this->Leads_model->saverecords($inserdata); 
			
				if ($result == TRUE)
				{
					
					$this->session->set_flashdata('success', 'Imported successfully !');
					redirect('/Leads/index/', 'refresh');
				}else{
					
					$this->session->set_flashdata('failed', 'Import Failed !');
					redirect('/Leads/index/', 'refresh');
				}             
				} catch (Exception $e) {
				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
				. '": ' .$e->getMessage());
				}
			}
				else{
					echo $error['error'];
				}
		}
		$data['title'] = ' MO Website Leads Data';
		$this->template->load('template','/leads/leads_view',$data);
	}

	public function import_csv()
{
    if (!empty($_FILES['csv_file']['name'])) {

        $filename = $_FILES['csv_file']['tmp_name'];

        if ($_FILES['csv_file']['size'] > 0) {

            $file = fopen($filename, "r");

            // Skip header row
            $header = fgetcsv($file, 1000, "\t"); // <-- tab separated

            // Get last lead_code from DB
            $lastLead = $this->db->order_by('id', 'DESC')->get('lead_csv')->row();
            $lastCodeNumber = 0;
            if ($lastLead && !empty($lastLead->lead_code)) {
                preg_match('/(\d+)$/', $lastLead->lead_code, $matches);
                if (isset($matches[1])) $lastCodeNumber = intval($matches[1]);
            }

            $insertCount = 0;

            // Read CSV line by line
            while (($row = fgetcsv($file, 1000, "\t")) !== FALSE) {

                // Skip empty lines
                if (count($row) < 6) continue;

                // Clean phone number
                $mobile = isset($row[4]) ? preg_replace('/^p:\+?91|\D/', '', trim($row[4])) : '';

                // Generate new lead code
                $lastCodeNumber++;
                $leadCode = 'MUSK' . str_pad($lastCodeNumber, 4, '0', STR_PAD_LEFT);

                // Map CSV columns to DB fields
                $data = [
                    'category_name'     => trim($row[0] ?? ''), // what_is_your_profession?
                    'lead_title'        => trim($row[1] ?? ''), // which_products_do_you_require?
                    'work_description'  => trim($row[2] ?? ''), // do_you_have_any_questions?
                    'contact_person'    => trim($row[3] ?? ''), // full_name
                    'mobile'            => $mobile,             // phone_number
                    'city'              => trim($row[5] ?? ''), // city
                    'lead_code'         => $leadCode,
                    'duplicate_lead_code' => '',
                    'date'              => date('Y-m-d'),
                    'email'             => '',
                    'country'           => '',
                    'lead_source'       => '',
                ];

                // Fill extra keys expected by saverecords()
                $extraKeys = [
                    'lead_architect', 'firm_name', 'mediator_mobile_no', 'mediator_address',
                    'current_location', 'lead_assign', 'project_address', 'region_selection',
                    'lead_site_file', 'leads_priority'
                ];

                foreach ($extraKeys as $key) {
                    if (!isset($data[$key])) $data[$key] = '';
                }

                // Insert into DB
                $this->db->insert('lead_csv', $data);
                $insertCount++;
            }

            fclose($file);

            $this->session->set_flashdata('success', "Import successful! Inserted: $insertCount");

        } else {
            $this->session->set_flashdata('error', 'Empty CSV file.');
        }

    } else {
        $this->session->set_flashdata('error', 'Please select a CSV file.');
    }

    redirect('Leads');
}

	// public function importdata(){
	// 	if(isset($_POST["submit"]))
	// 	{
	// 		$file = $_FILES['file']['tmp_name'];
	// 		// print_r($file);exit;
	// 		$handle = fopen($file, "r");
	// 		//print_r($handle);exit;
	// 		$c = 0;//
	// 		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	// 		{	
	// 			 print_r($filesop);exit;

	// 			$date = $filesop[0];
	// 			$name = $filesop[1];
	// 			$work_description = $filesop[2];
	// 			$company_name = $filesop[3];
	// 			$mobile = $filesop[4];
	// 			$email = $filesop[5];
	// 			$website = $filesop[6];
	// 			if($c<pre>0){		

	// 			$data['login_id']=$this->session->userdata['logged_in']['id'];
	// 			$data = array(
	// 			'date' => date('Y-m-d',strtotime($date)),	
	// 			'name' => $name,
	// 			'work_description' => $work_description,
	// 			'company_name' => $company_name,
	// 			'mobile' => $mobile,
	// 			'email' => $email,
	// 			'website' => $website,
	// 			'created_by' => $data['login_id'],
	// 			'action' =>'',				
	// 			'status' =>'',				
	// 			);
	// 				$result = $this->Leads_model->saverecords($data);


	// 				// 		/* SKIP THE FIRST ROW */
	// 				// $this->Leads_model->saverecords($fname,$lname);
	// 			}
	// 			$c = $c + 1;
	// 		}
	// 		echo "sucessfully import data !";
				
	// 	}
				
	// }
	
	public function add_followup() {
		$this->form_validation->set_rules('lead_id', 'lead_id', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			if(isset($this->session->userdata['logged_in'])){
				$this->add();
			} else {
				$this->load->view('login_form');
			}
		}
		else 
		{			
			$data['login_id']  = $this->session->userdata['logged_in']['id'];
			$lead_id = $this->input->post('lead_id');
			// print_r($_FILES['photo']['name']);exit;
			if(!empty($_FILES['photo']['name'])){
				$config['upload_path']          = './uploads/lead_follow_up/';
				$config['allowed_types']        = '*';
				$config['max_size']             = '';
				$config['max_width']            = '';
				$config['max_height']           = '';
				$config['overwrite']            = TRUE;
				$this->load->library('upload', $config);
				// $resulttt = $this->upload->do_upload('photo');
				// print_r($resulttt);exit;
				if($this->upload->do_upload('photo') == 1) {
						$data = array(
						'lead_id'      => $this->input->post('lead_id'),
						'answer'       => $this->input->post('answer'),
						'file_path'    => $this->upload->data()['file_name'],
						'followup_by'  => $data['login_id']
					);	
					$result = $this->Leads_model->insertFollowup($data);
					if ($result == TRUE) {
						$this->session->set_flashdata('success', 'Follow Up Added Successfully !');
						redirect('/Leads/followups/'.$lead_id, 'refresh');
						//$this->fetchSuppliers();
					} else {
						$this->session->set_flashdata('failed', 'Already Exists , Follow Up Not Inserted !');
						redirect('/Leads/followups/'.$lead_id, 'refresh');
					}
					// $this->session->set_flashdata('failed', 'Document upload error!');
					// redirect('/Leads/followups/'.$lead_id, 'refresh');
					}
				} 
			else {

				$data = array(
						'lead_id'      => $this->input->post('lead_id'),
						'answer'       => $this->input->post('answer'),
						'file_path'    => '',
						'followup_by'  => $data['login_id']
					);	

				
				$result = $this->Leads_model->insertFollowup($data);
				if ($result == TRUE) {
					$this->session->set_flashdata('success', 'Follow Up Added Successfully !');
					redirect('/Leads/followups/'.$lead_id, 'refresh');
					//$this->fetchSuppliers();
				} else {
					$this->session->set_flashdata('failed', 'Already Exists , Follow Up Not Inserted !');
					redirect('/Leads/followups/'.$lead_id, 'refresh');
				}
			}
		} 
	}

	public function add($id=NULL) 
	{
		$data = array();
		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		$login_id=$this->session->userdata['logged_in']['id'];
		$data['designation_id']=$this->session->userdata['logged_in']['designation_id'];

		$data['page_title'] = ' Upload Lead File Here';
		$data['categories'] = $this->Leads_model->getCategories();
		$data['employees'] = $this->Leads_model->getEmployees();
		$data['countrylist'] = $this->Leads_model->getCountry();

		$logged_in_employee_id = $this->session->userdata['logged_in']['role_id'];
    	$data['lead_assign'] = $logged_in_employee_id;

		
		// $data['target'] = $this->Leads_model->getTarget($login_id);
		// echo "<pre>"; print_r($data['country']);exit;
		// $data['countries'] = $this->Leads_model->getCountries();

		

		if(!empty($id))
		{
			$data['page_title'] = ' Update Lead';
			$result = $this->Leads_model->getById($id);
			// $result = $this->Leads_model->GetByIdNew($id);
			// echo "<pre>"; print_r($result); exit;

			if (isset($result['id'])) :
	            $data['id'] = $result['id'];
	        else:
	            $data['id'] = '';
	        endif;

			if (isset($result['lead_title'])) :
	            $data['title'] = $result['lead_title'];
	        else:
	            $data['title'] = '';
	        endif;
	      
	     
	        if (isset($result['category_name'])) :
	            $data['category_name'] = $result['category_name'];
	        else:
	            $data['category_name'] = '';
	        endif;

			if (isset($result['lead_assign'])) :
	            $data['lead_assign'] = $result['lead_assign'];
	        else:
	            $data['lead_assign'] = '';
	        endif;

			if (isset($result['employee_name'])) :
	            $data['employee_name'] = $result['employee_name'];
	        else:
	            $data['employee_name'] = '';
	        endif;
			

	        if (isset($result['contact_person'])) :
	            $data['contact_person'] = $result['contact_person'];
	        else:
	            $data['contact_person'] = '';
	        endif;
			if (isset($result['country'])) :
	            $data['country'] = $result['country'];
	        else:
	            $data['country'] = '';
	        endif;
		

	        if (isset($result['mobile'])) :
	            $data['mobile'] = $result['mobile'];
	        else:
	            $data['mobile'] = '';
	        endif;
			if (isset($result['city'])) :
	            $data['city'] = $result['city'];
	        else:
	            $data['city'] = '';
	        endif;

			if (isset($result['state'])) :
	            $data['state'] = $result['state'];
	        else:
	            $data['state'] = '';
	        endif;

			if (isset($result['map_link'])) :
	            $data['map_link'] = $result['map_link'];
	        else:
	            $data['map_link'] = '';
	        endif;

	        if (isset($result['email'])) :
	            $data['email'] = $result['email'];
	        else:
	            $data['email'] = '';
	        endif;	        
			if (isset($result['lead_source'])) :
	            $data['lead_source'] = $result['lead_source'];
	        else:
	            $data['lead_source'] = '';
	        endif;
	         if (isset($result['date'])) :
	            $data['generation_date'] = $result['date'];
	        else:
	            $data['generation_date'] = '';
	        endif;
	       
	        if (isset($result['work_description'])) :
	            $data['description'] = $result['work_description'];
	        else:
	            $data['description'] = '';
	        endif;

			if (isset($result['activity_summary'])) :
	            $data['activity_summary'] = $result['activity_summary'];
	        else:
	            $data['activity_summary'] = '';
	        endif;

	        if (isset($result['lead_code'])) :
	            $data['lead_code'] = $result['lead_code'];
	        else:
	            $data['lead_code'] = '';
	        endif;

	        if (isset($result['lead_status'])) :
	            $data['lead_status'] = $result['lead_status'];
	        else:
	            $data['lead_status'] = '';
	        endif;

			if (isset($result['leads_priority'])) :
	            $data['leads_priority'] = $result['leads_priority'];
	        else:
	            $data['leads_priority'] = '';
	        endif;

			if (isset($result['lead_architect'])) :
	            $data['lead_architect'] = $result['lead_architect'];
	        else:
	            $data['lead_architect'] = '';
	        endif;

			if (isset($result['current_location'])) :
	            $data['current_location'] = $result['current_location'];
	        else:
	            $data['current_location'] = '';
	        endif;

			if (isset($result['firm_name'])) :
	            $data['firm_name'] = $result['firm_name'];
	        else:
	            $data['firm_name'] = '';
	        endif;

			if (isset($result['mediator_mobile_no'])) :
	            $data['mediator_mobile_no'] = $result['mediator_mobile_no'];
	        else:
	            $data['mediator_mobile_no'] = '';
	        endif;

			if (isset($result['mediator_address'])) :
	            $data['mediator_address'] = $result['mediator_address'];
	        else:
	            $data['mediator_address'] = '';
	        endif;

			if (isset($result['project_address'])) :
	            $data['project_address'] = $result['project_address'];
	        else:
	            $data['project_address'] = '';
	        endif;

			if (isset($result['region_selection'])) :
	            $data['region_selection'] = $result['region_selection'];
	        else:
	            $data['region_selection'] = '';
	        endif;

			if (isset($result['lead_site_selection'])) :
	            $data['lead_site_selection'] = $result['lead_site_selection'];
	        else:
	            $data['lead_site_selection'] = '';
	        endif;

			if (isset($result['activity_type'])) :
	            $data['activity_type'] = $result['activity_type'];
	        else:
	            $data['activity_type'] = '';
	        endif;

			if (isset($result['assign_to'])) :
	            $data['assign_to'] = $result['assign_to'];
	        else:
	            $data['assign_to'] = '';
	        endif;

			if (isset($result['due_date'])) :
	            $data['due_date'] = $result['due_date'];
	        else:
	            $data['due_date'] = '';
	        endif;

			if (isset($result['lead_site_file'])) :
	            $data['lead_site_file'] = $result['lead_site_file'];
	        else:
	            $data['lead_site_file'] = '';
	        endif;




			// echo"<pre>";print_r($result);exit;
	        $this->template->load('layout/template','Lead_Module/Lead_Generation/lead-create-edit',$data);

		} else {
			$data['page_title'] = ' Create New Lead';
			$data['id'] = '';
			$data['title'] = '';
			$data['category_name'] = '';
			$data['employee_name'] = '';
			$data['contact_person'] = '';
			$data['country'] = '';
		
			$data['mobile'] = '';
			$data['city'] = '';
			$data['state'] = '';
			$data['map_link'] = '';
			$data['email'] = '';
			$data['lead_source'] = '';
			$data['generation_date'] = '';

			$data['description'] = '';
			$data['activity_summary'] = '';
			$data['lead_status'] = '';
			$data['leads_priority'] = '';
			$data['lead_architect'] = '';
			$data['current_location'] = '';
			$data['firm_name'] = '';
			$data['mediator_mobile_no'] = '';
			$data['mediator_address'] = '';
			// $data['lead_assign'] = '';
			$data['project_address'] = '';
			$data['region_selection'] = '';
			$data['lead_site_selection'] = '';
			$data['lead_site_file'] = '';
			$data['due_date'] ='';
			$data['lead_count'] = $this->Leads_model->getLeadcsvCode();
		$data['countrylist'] = $this->Leads_model->getCountry();
		$data['employees'] = $this->Leads_model->getEmployees();
		// $data['employee_name'] = $this->Leads_model->getEmployees();

			if ($this->input->post('lead_assign')) {
				$data['lead_assign'] = $this->input->post('lead_assign');
			} else {
				$data['lead_assign'] = $login_id;
			}

			if ($this->input->post('assign_to')) {
				$data['assign_to'] = $this->input->post('assign_to');
			} else {
				$data['assign_to'] = $login_id;
			}




			$voucher_no= $data['lead_count']+1;

		    if($voucher_no<10){
		    	$rs_id_code='MUSK000'.$voucher_no;
		    } else if(($voucher_no>=10) && ($voucher_no<=99)){
		      $rs_id_code='MUSK00'.$voucher_no;
		    } else if(($voucher_no>=100) && ($voucher_no<=999)){
		      $rs_id_code='MUSK0'.$voucher_no;
		    } else{
		      $rs_id_code='MUSK'.$voucher_no;
		    }

		    $data['lead_code']=$rs_id_code;


		    $this->template->load('layout/template','Lead_Module/Lead_Generation/lead-create-edit',$data);
		}
	}

	
	
	public function edit($id = NULL) 
	{
			$data = array();
			$result = $this->Leads_model->getById($id);

			if (isset($result['id']) && $result['id']) :
	            $data['id'] = $result['id'];
	        else:
	            $data['id'] = '';
	        endif;

			if (isset($result['item_name']) && $result['item_name']) :
	            $data['item_name'] = $result['item_name'];
	       else:
	            $data['item_name'] = '';
	        endif;
	      
	     
	        if (isset($result['category_name']) && $result['category_name']) :
	            $data['category_name'] = $result['category_name'];
	       else:
	            $data['category_name'] = '';
	        endif;

			if (isset($result['lead_assign']) && $result['lead_assign']) :
	            $data['lead_assign'] = $result['lead_assign'];
	       else:
	            $data['lead_assign'] = '';
	        endif;
	      

			$data['title'] = ' Update Lead';
			$data['categories'] = $this->Leads_model->getCategories();
		$data['countrylist'] = $this->Leads_model->getCountry();

		
			$this->template->load('template','item_master',$data);
	}
	public function edit_worshop($id = NULL) 
	{
				$data = array(
					'booking_status'=>$this->input->post('booking_status'),
					);
  	 
  	 	$result =$this->Leads_model->EditWorkshopStatus($id,$data);
  	 	if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Workshop Status Updated Successfully !');
// 			echo"$result";exit;
			redirect('/Leads/worshop_leads/'.$id, 'refresh');
			//$this->fetchSuppliers();
		} else {
			$this->session->set_flashdata('failed', 'Operation Failed!');
			redirect('/Leads/worshop_leads/', 'refresh');
		}
	}
	public function add_new_item() {
    $this->form_validation->set_rules('title', 'title Name', 'required');
    if ($this->form_validation->run() == FALSE) 
    {
        if(isset($this->session->userdata['logged_in'])){
            $this->add();
        } else {
            $this->load->view('login_form');
        }
    }
    else 
    {
        $data['login_id'] = $this->session->userdata['logged_in']['id'];
        $number = $this->input->post('mobile');
        $i = 0;

        // ---------- FILE UPLOAD START ----------
        $file_url = NULL;
        if (!empty($_FILES['lead_site_file']['name'])) {
            $uploadPath = './uploads/leads/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, TRUE);
            }

            $config['upload_path']   = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('lead_site_file')) {
                $fileData = $this->upload->data();
                $file_url = base_url('uploads/leads/' . $fileData['file_name']);
            } else {
                $this->session->set_flashdata('failed', $this->upload->display_errors());
                redirect('/Leads/index/', 'refresh');
                return;
            }
        }

        $document_file_url = NULL;
        if (!empty($_FILES['document_file']['name'])) {
            $uploadPath = './uploads/activities/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, TRUE);
            }

            $config['upload_path']   = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('document_file')) {
                $fileData = $this->upload->data();
                $document_file_url = base_url('uploads/activities/' . $fileData['file_name']);
            } else {
                $this->session->set_flashdata('failed', $this->upload->display_errors());
                redirect('/Leads/index/', 'refresh');
                return;
            }
        }
        // ---------- FILE UPLOAD END ----------

        $inserdata[$i]['date'] = date('Y-m-d',strtotime($this->input->post('generation_date')));
        $inserdata[$i]['category_name'] = $this->input->post('category_name');
        $inserdata[$i]['lead_code'] = $this->input->post('lead_code');
        $inserdata[$i]['lead_title'] = $this->input->post('title');
        $inserdata[$i]['contact_person'] = $this->input->post('contact_person');
        $inserdata[$i]['email'] = $this->input->post('email');
        $inserdata[$i]['country'] = $this->input->post('country');
        $inserdata[$i]['mobile'] = $this->input->post('mobile');
        $inserdata[$i]['city'] = $this->input->post('city');
		$inserdata[$i]['state'] = $this->input->post('state');
		$inserdata[$i]['map_link'] = $this->input->post('map_link');
        $inserdata[$i]['lead_source'] = $this->input->post('lead_source');
        $inserdata[$i]['work_description'] = $this->input->post('description');
        $inserdata[$i]['activity_type'] = $this->input->post('activity_type');
        $inserdata[$i]['other_text'] = $this->input->post('other_text');
        $inserdata[$i]['due_date'] = date('Y-m-d H:i:s A',strtotime($this->input->post('due_date')));
        $inserdata[$i]['assign_to'] = $this->input->post('assign_to');
        $inserdata[$i]['lead_architect'] = $this->input->post('lead_architect');
        $inserdata[$i]['leads_priority'] = $this->input->post('leads_priority');
        $inserdata[$i]['current_location'] = $this->input->post('current_location');
        $inserdata[$i]['firm_name'] = $this->input->post('firm_name');
        $inserdata[$i]['mediator_mobile_no'] = $this->input->post('mediator_mobile_no');
        $inserdata[$i]['mediator_address'] = $this->input->post('mediator_address');
        $inserdata[$i]['lead_assign'] = $this->input->post('lead_assign');
        $inserdata[$i]['project_address'] = $this->input->post('project_address');
        $inserdata[$i]['region_selection'] = $this->input->post('region_selection');
        $inserdata[$i]['lead_site_file'] = $file_url;
        $inserdata[$i]['activity_summary'] = $this->input->post('activity_summary');
        $inserdata[$i]['document_file'] = $document_file_url;

        $result = $this->Leads_model->saverecords($inserdata);
	// 	 echo "<pre>";
    // print_r($result);
    // exit;

        if ($result == TRUE)
        {
				$api_url = "https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/bulk/";

				// Dynamic values from DB / variables
				$customer_name = $this->input->post('contact_person');   // example: fetch from DB
				$customer_mobile = '91'.$this->input->post('mobile');   // must be with country code (91 for India)
				$data = [
				    "integrated_number" => "919549999393", // your registered WA number
				    "content_type" => "template",
				    "payload" => [
				        "messaging_product" => "whatsapp",
				        "type" => "template",
				        "template" => [
				            "name" => "lead_creation",
				            "language" => [
				                "code" => "en",
				                "policy" => "deterministic"
				            ],
				            "namespace" => "2a2d4370_367f_4fab_910a_608101daba45",
				            "to_and_components" => [
				                [
				                    "to" => [$customer_mobile], // ✅ dynamic mobile
				                    "components" => [
				                        "header_1" => [
				                            "type" => "text",
				                            "value" => $customer_name  // ✅ dynamic customer name
				                        ]
				                    ]
				                ]
				            ]
				        ]
				    ]
				];


				$options = [
				    "http" => [
				        "header" => "Content-Type: application/json\r\n" .
				    	"authkey: 470224A0c0hCmfn9K68d26118P1\r\n",
				        "method" => "POST",
				        "content" => json_encode($data),
				        "timeout" => 30
				    ]
				];
			$context = stream_context_create($options);
			$response = file_get_contents($api_url, false, $context);

			if ($response === FALSE) {
				log_message('error', 'WhatsApp API call failed');
			} else {
				log_message('info', 'WhatsApp API response: ' . $response);
			}

            //  Notification Code
            $login_id  = $this->session->userdata['logged_in']['id'];
            $assign_to = $this->input->post('assign_to');
    		$lead_id   = is_array($result) ? $result[0] : $result; // ✅ saverecords se lead ID
			$assigned_by = $this->session->userdata($login_id);
			$lead_title = $this->input->post('title');

			$assigned_by = $this->session->userdata['logged_in']['name']; 

			$assigned_to_data = $this->employee->getById($assign_to); 
			$assigned_to_name = $assigned_to_data['name'];  
			$lead_data = $this->Leads_model->getLeadById($lead_id); // Lead data fetch
			$lead_code = $lead_data['lead_code'] ?? null;

	// 		    echo "<pre>";
    // echo "DEBUG:\n";
    // echo "Result from saverecords: "; print_r($result); echo "\n";
    // echo "Lead ID from POST: "; print_r($lead_id); echo "\n";
    // echo "Lead Title: "; print_r($lead_title); echo "\n";
	// echo "Lead Code: "; print_r($lead_code); echo "\n"; 
    // echo "Assigned By: "; print_r($assigned_by); echo "\n";
    // echo "Assigned To: "; print_r($assigned_to_name); echo "\n";
    // echo "</pre>";
    // die();
			

			$data1 = array(
    'type'        => 'lead-assign',
    'subject'     => 'New Lead Assigned',
    'message'     => $assigned_by . ' assigned new lead "' . $lead_title . '"to ' . $assigned_to_name,
    'page_url'    => 'Leads/view/'.$lead_id,
    'employee_id' => $assign_to,   
    'status'      => '0',
    'leave_id'    => '0',
    'lead_id'     => $lead_id,   // ✅ only store lead_id
    'created_on'  => date('Y-m-d H:i:s'),
    'datetime'    => date('Y-m-d H:i:s'),
    'created_by'  => $login_id,
);

            $this->notifications_model->add_notification($data1);

            $this->session->set_flashdata('success', 'Lead created successfully !');
            redirect('/Leads/index/', 'refresh');
    	} else {
            $this->session->set_flashdata('failed', 'Operation Failed !');
            redirect('/Leads/index/', 'refresh');
        }
    }
}

public function updateLeadStatus() {
    $login_id  = $this->session->userdata['logged_in']['id'];  
    $lead_id   = $this->input->post('lead_id');
    $new_status = $this->input->post('status'); 

    // Lead data nikal lo
    $lead_data = $this->Leads_model->getLeadById($lead_id);
    $lead_title = $lead_data['title'] ?? 'Unknown';
    $assign_to = $lead_data['assign_to'] ?? null; 

    // Logged in user data
    $updated_by = $this->session->userdata['logged_in']['name'];

    // Status update DB me karwa lo
    $result = $this->Leads_model->updateStatus($lead_id, $new_status);

    if ($result) {
        // Notification ke liye data banao
        $assigned_to_data = $this->employee->getById($assign_to); 
        $assigned_to_name = $assigned_to_data['name'] ?? 'Employee';
        
        $data1 = array(
            'type'        => 'lead-status',
            'subject'     => 'Lead Status Updated',
            'message'     => $updated_by . ' updated the status of lead "' . $lead_title . '" to "' . $new_status . '"',
            'page_url'    => 'Leads/view/' . $lead_id,
            'employee_id' => $assign_to,
            'status'      => 0,
            'lead_id'     => $lead_id,
            'datetime'    => date('Y-m-d H:i:s'),
            'created_by'  => $login_id,
        );

        // Notification Model Call
        $this->notifications_model->add_notification($data1);

		 echo "<pre>";
    echo "===== DEBUG: Notification Insert Check =====\n\n";
    echo "Insert Result: "; var_dump($result);
    echo "\n\nData Inserted:\n"; print_r($data1);
    echo "\n============================================\n";
    echo "</pre>";
    die();

        $this->session->set_flashdata('success', 'Lead status updated and notification sent!');
    } else {
        $this->session->set_flashdata('failed', 'Failed to update lead status!');
    }

    redirect('Leads/view/' . $lead_id);
}

	public function assignto(){
		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		$ids=$this->input->post('all_selected_ids');
		if(!empty($ids)) {
				$Datas=explode(',', $ids);
	  	 		foreach ($Datas as $key => $lead_id) {
	  	 			$data['login_id']=$this->session->userdata['logged_in']['id'];
	  	 			$data = array(
								'assign_to' => $this->input->post('employee_id'),
								'assign_date' => date('Y-m-d H:i:s A'),	
								'assign_by' => $data['login_id']			
								);
	  	 			$result = $this->Leads_model->lead_update($data,$lead_id);
					$getbyid=$this->Leads_model->getassignleadByID($lead_id);
					// $followup_date=$getbyid['followupdate'];
					$data1=array(
						'lead_id'=>$getbyid['id'],
						'lead_code'=>$getbyid['lead_code'],
						'category_name'=>$getbyid['category_name'],
						'lead_assign' => $getbyid['lead_assign'],
						'date'=>date('Y-m-d'),
						'lead_title'=>$getbyid['lead_title'],
						'work_description'=>$getbyid['work_description'],
						'contact_person'=>$getbyid['contact_person'],
						'country'=>$getbyid['country'],
						'mobile'=>$getbyid['mobile'],
						'city'=>$getbyid['city'],
						'state'=>$getbyid['state'],
						'map_link'=>$getbyid['map_link'],
						'email'=>$getbyid['email'],
						'assign_to'=>$getbyid['assign_to'],
						'assign_by'=>$getbyid['assign_by'],
						'assign_date'=>$getbyid['assign_date'],
						'lead_status'=>'Approve but no action',
						'created_by'=>$getbyid['created_by'],
						
					);
					$marketing=$this->Leads_model->marketing_insert($data1);
	  	 		}
			
  	 			$this->session->set_flashdata('success', 'All Leads Assign Successfully!');
  	 			redirect('/Leads/Assignleadview', 'refresh');
		}	
		else{
				$data['login_id']=$this->session->userdata['logged_in']['id'];
				$data = array(
				'assign_to' => $this->input->post('employee_id'),	
				'assign_date' => date('Y-m-d H:i:s A'),	
				'assign_by' => $data['login_id']			
				);
				$lead=$this->input->post('lead_id');
				// print_r($data);exit;
				$result = $this->Leads_model->lead_update($data,$lead);
				// echo $result;exit;
				if ($result == TRUE) {
					$getbyid=$this->Leads_model->getassignleadByID($data['login_id']);
					// $followup_date=$getbyid['followupdate'];
					$data1=array(
						'lead_id'=>$getbyid['id'],
						'lead_code'=>$getbyid['lead_code'],
						'category_name'=>$getbyid['category_name'],
						'date'=>date('Y-m-d'),
						'lead_title'=>$getbyid['lead_title'],
						'work_description'=>$getbyid['work_description'],
						'contact_person'=>$getbyid['contact_person'],
						'country'=>$getbyid['country'],
						'mobile'=>$getbyid['mobile'],
						'city'=>$getbyid['city'],
						'state'=>$getbyid['state'],
						'map_link'=>$getbyid['map_link'],
						'email'=>$getbyid['email'],
						'assign_to'=>$getbyid['assign_to'],
						'assign_by'=>$getbyid['assign_by'],
						'assign_date'=>$getbyid['assign_date'],
						'lead_status'=>'Approve but no action',
						'created_by'=>$getbyid['created_by'],
						
					);
					// print_r($data1);exit;
					$marketing=$this->Leads_model->marketing_insert($data1);
				$this->session->set_flashdata('success', 'Lead Assign Successfully !');
				redirect('/Leads/Assignleadview', 'refresh');
				//$this->fetchSuppliers();
				} else {
				$this->session->set_flashdata('failed', 'No Changes in Lead !');
				redirect('/Leads/Assignleadview', 'refresh');
				}
		
			}
		}
		public function approveall(){
			if($this->input->get()){
				$bulk_action = $this->input->get('approveaction');
				$sub_chk = $this->input->get('sub_chk');
				// print_r($bulk_action);
				// print_r($sub_chk);exit;
				$data=[];
				if($bulk_action == 'Approved'){
					foreach($sub_chk as $id){
						$this->db->set('lead_status','Approved');
						$this->db->where('id', $id);
						$this->db->update('lead_csv', $data);
					}
					$this->session->set_flashdata('success', 'Lead send to Approve Successfully');
					redirect('/Leads/index', 'refresh');
				}
				 else if($bulk_action == 'Rejected'){
					//  print_r($sub_chk);exit;
					foreach($sub_chk as $id){
						$this->db->set('lead_status','Rejected');
						$this->db->where('id', $id);
						$this->db->update('lead_csv', $data);
					}
					$this->session->set_flashdata('success', 'Lead Rejected Successfully');
					redirect('/Leads/index', 'refresh');
				}
				else if($bulk_action == 'delete_all'){
					// print_r($sub_chk);exit;
					foreach($sub_chk as $id){
						$this->db->where('id', $id);
						$this->db->delete('lead_csv');
						
			
					}
					$this->session->set_flashdata('success','lead Deleted Successfully');
						redirect('/Leads/index', 'refresh');
			}
		}
	}
		public function Assignleadview(){
			$data['role_id']=$this->session->userdata['logged_in']['role_id'];
			$data['title']=' All Assign Lead';
			$data['leads'] = $this->Leads_model->assignleadlist();
			$data['employees'] = $this->Leads_model->getEmployeeDropdown();
			$data['categories'] = $this->Leads_model->getLeadsCategories();
			//  echo "<pre>";print_r($data['leads']);exit;
			$this->template->load('layout/template','Lead_Module/Lead_Generation/assignLead',$data);
		}
		// public function reminder($id){
		// 	$data['login_id']=$this->session->userdata['logged_in']['id'];
		// 	$data = array(
		// 		'lead_id'=>$this->input->post('lead_id'),
		// 		'reminder_title'=>$this->input->post('reminder_title'),
		// 		'reminder_date' => date('Y-m-d',strtotime($this->input->post('reminder_date'))),
					
		// 		'reminder_time' => $this->input->post('reminder_time'),
		// 		'employee_id'=>	$data['login_id']
					
		// 		);
		// 		// $lead=$this->input->post('lead_id');
		// 		//print_r($item_id);exit;
		// 		$result = $this->Leads_model->reminderinsert($data);
				
		// 		//echo $result;exit;
		// 		if ($result == TRUE) {
		// 		$this->session->set_flashdata('success', 'reminder set Successfully !');
		// 		redirect('/Leads/index', 'refresh');
		// 		//$this->fetchSuppliers();
		// 		} else {
		// 		$this->session->set_flashdata('failed', 'reminder is not change !');
		// 		redirect('/Leads/index', 'refresh');
		// 		}
			
		// 	}

			public function reminderedit($id){
				$data['login_id']=$this->session->userdata['logged_in']['id'];
				$data = array(
					'lead_id'=>$this->input->post('lead_id'),
				
					'reminder_date' => date('Y-m-d',strtotime($this->input->post('reminder_date'))),
						
					'reminder_time' => $this->input->post('reminder_time'),
					
						
					);

					// $lead=$this->input->post('lead_id');
					//print_r($item_id);exit;
					$lead_id=$this->input->post('lead_id');
					$result = $this->Leads_model->reminder_update($data,$lead_id);
					
					//echo $result;exit;
					if ($result == TRUE) {
					$this->session->set_flashdata('success', 'reminder edit Successfully !');
					redirect('/User_authentication/admin_dashboard', 'refresh');
					//$this->fetchSuppliers();
					} else {
					$this->session->set_flashdata('failed', 'reminder is not change !');
					redirect('/User_authentication/admin_dashboard', 'refresh');
					}
				
				}
	public function complete($id){
		$data['login_id']=$this->session->userdata['logged_in']['id'];
		// echo"<pre>";print_r($_POST);exit;
		$data = array(
			'status' =>'Completed',
		);
		
		// echo"<pre>";print_r($lead);exit;

		$result = $this->Leads_model->reminder_update($data,$id);
		
		
			if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Reminder Completed Successfully !');
			redirect('User_authentication/admin_dashboard','refresh');

			
			} else {
			$this->session->set_flashdata('failed', 'No Changes in Reminder !');
			redirect('User_authentication/admin_dashboard','refresh');

			}
	}		


	public function close($id){
		$data['login_id']=$this->session->userdata['logged_in']['id'];
		// echo"<pre>";print_r($_POST);exit;
		$data = array(
			'status' =>'Closed',
		);
		
		// echo"<pre>";print_r($lead);exit;

		$result = $this->Leads_model->reminder_update($data,$id);
		
		
			if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Reminder CLosed Successfully !');
			redirect('User_authentication/admin_dashboard','refresh');

			
			} else {
			$this->session->set_flashdata('failed', 'No Changes in Reminder !');
			redirect('User_authentication/admin_dashboard','refresh');

			}
	}		
		

	public function edititem($id) {
		// echo "<pre>";print_r($_POST);exit;
		// echo"<pre>";print_r($_POST);exit;
		$this->form_validation->set_rules('title', 'title Name', 'required');
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
			$data['login_id']=$this->session->userdata['logged_in']['id'];

			// ---------------- FILE UPLOAD ----------------
        $file_url = $this->input->post('old_lead_site_file'); // default old file (hidden input field)
        
        if (!empty($_FILES['lead_site_file']['name'])) {
            $uploadPath = './uploads/leads/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, TRUE);
            }

            $config['upload_path']   = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('lead_site_file')) {
                $fileData = $this->upload->data();
                $file_url = base_url('uploads/leads/' . $fileData['file_name']);
            } else {
                $file_url = $this->input->post('old_lead_site_file');
            }
        }
        // ---------------- FILE UPLOAD END ----------------

		
			$data = array(
			'category_name' => $this->input->post('category_name'),	
			'lead_code' => $this->input->post('lead_code'),
			'lead_title' => $this->input->post('title'),
			'work_description' => $this->input->post('description'),
			'contact_person' => $this->input->post('contact_person'),

			'lead_site_file'  => $file_url, 
			
			
			'mobile' => $this->input->post('mobile'),	
			'city'        	 => $this->input->post('city'),
			'state'        	 => $this->input->post('state'),
			'map_link'        	 => $this->input->post('map_link'),
			'email' => $this->input->post('email'),	
			// 'company_name' => $this->input->post('company_name'),	
			'date' => date('Y-m-d',strtotime($this->input->post('generation_date'))),			
			'lead_source' => $this->input->post('lead_source'),		
			'leads_priority' => $this->input->post('leads_priority'),
			'lead_architect' => $this->input->post('lead_architect'),
			'firm_name' => $this->input->post('firm_name'),
			'mediator_mobile_no' => $this->input->post('mediator_mobile_no'),
			'mediator_address' => $this->input->post('mediator_address'),
			'current_location' => $this->input->post('current_location'),
			'lead_assign' => $this->input->post('lead_assign'),	
			'project_address' => $this->input->post('project_address'),	
			'region_selection' => $this->input->post('region_selection'),

			// 'activity_type' => $this->input->post('activity_type'),
			// 'due_date' => $this->input->post('due_date'),
			// 'assign_to' => $this->input->post('assign_to'),
			// 'activity_summary' => $this->input->post('activity_summary'),

					
		
			'lead_status' => $this->input->post('lead_status'),	
			'edited_by' => $data['login_id']			
			);
			$lead=$this->input->post('old_lead_id');
			// echo"<pre>";print_r($data);exit;
			$result = $this->Leads_model->lead_update($data,$lead);
			// echo $result;exit;
			if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Lead Updated Successfully !');
			redirect('/Leads/index', 'refresh');
			//$this->fetchSuppliers();
			} else {
			$this->session->set_flashdata('failed', 'No Changes in Lead !');
			redirect('/Leads/index', 'refresh');
			}
		} 
	}

	// public function deleteItem($id= null){
  	//  	$id = $this->uri->segment('3');
  	//  	$result =$this->Leads_model->deleteItem($id);
  	//  	if ($result == TRUE) {
	// 		$this->session->set_flashdata('success', 'Item deleted Successfully !');
	// 		redirect('/Leads/index', 'refresh');
	// 		//$this->fetchSuppliers();
	// 	} else {
	// 		$this->session->set_flashdata('failed', 'Operation Failed!');
	// 		redirect('/Leads/index', 'refresh');
	// 	}
  	// }
		public function deleteItem($id = null)
			{
				$ids = $this->input->post('ids'); // comes from AJAX
				// echo "<pre>";print_r($ids);exit;

				// Case 1: Multiple delete via AJAX
				if (!empty($ids)) {
					$Datas = explode(',', $ids);

					foreach ($Datas as $lead_id) {
						// 🔹 If you have any related files or data to clean, fetch before deleting
						// $lead = $this->Leads_model->getById($lead_id);
						// if (!empty($lead['document'])) {
						//     $file_path = FCPATH . "uploads/" . $lead['document'];
						//     if (file_exists($file_path)) {
						//         unlink($file_path);
						//     }
						// }

						// 🔹 Delete the lead record
						$this->Leads_model->deleteItem($lead_id);
					}

					echo "Leads deleted successfully!";
					return; // prevent redirect after AJAX
				}

				// Case 2: Single delete via URL (non-AJAX)
				$id = $this->uri->segment(3);
				if ($id) {
					// If needed, get lead and unlink files before deleting
					// $lead = $this->Leads_model->getById($id);
					// if (!empty($lead['document'])) {
					//     $file_path = FCPATH . "uploads/" . $lead['document'];
					//     if (file_exists($file_path)) {
					//         unlink($file_path);
					//     }
					// }

					$this->Leads_model->deleteItem($id);
					$this->session->set_flashdata('success', 'Lead deleted successfully!');
					redirect('/Leads/index', 'refresh');
				}
			}

  	public function deletefollowup($id= null){
  	 	$id = $this->uri->segment('3');
  	 	$lead_id=$this->input->post('lead_id');
  	 	$result =$this->Leads_model->deletefollowup($id);
  	 	if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Follow Up deleted Successfully !');
			redirect('/Leads/followups/'.$lead_id, 'refresh');
			//$this->fetchSuppliers();
		} else {
			$this->session->set_flashdata('failed', 'Operation Failed!');
			redirect('/Leads/index/'.$lead_id, 'refresh');
		}
  	}

  	public function getProductsByCategory($id=NULL){
    	$data = array();
    	$data['products']=$this->Leads_model->getProductsByCategory($id);
    	echo json_encode($this->load->view('productbycategory',$data));
    }

	public function view($lead_code=NULL){
		
		$data = array();
		$data['role_id']=$this->session->userdata['logged_in']['role_id'];
		$login_id=$this->session->userdata['logged_in']['id'];
		$data['designation_id']=$this->session->userdata['logged_in']['designation_id'];
		$data['page_title'] = ' Lead Details ';
		$data['Sourcedetails']=$this->Leads_model->getCodedetails($lead_code);
		// echo"<pre>";print_r(	$data['Sourcedetails']);exit;
		$this->template->load('template','leads/lead_codeview',$data);
	}

	public function export()
    {
        // 1) Filters + Selected IDs पकड़ें
        $filters = $this->input->get(); // सभी GET params
        $idsParam = $this->input->get('ids', true);
        $ids = [];
        if (!empty($idsParam)) {
            // ids=1,3,7
            $ids = array_filter(array_map('trim', explode(',', $idsParam)), 'strlen');
        }

        // 2) DB से rows लाएँ (filters/ids के साथ)
        $rows = $this->Leads_model->get_leads($filters, $ids);
		// echo '<pre>'; print_r($rows); exit;

        // 3) CSV headers
        $filename = 'leads_'.date('Ymd_His').'.csv';
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Excel में UTF-8 सही दिखे—BOM:
        echo "\xEF\xBB\xBF";

        $out = fopen('php://output', 'w');

        // 4) CSV columns (अपने actual columns के हिसाब से एडजस्ट करें)
        fputcsv($out, [
            'Sr No',
            'Duplicate Lead',
            'Status',
            'Code',
            'Date',
            'Services',
            'Title',
            'Contact Person',
            'Mobile',
            'Email',
        ]);

        // 5) Data rows
        $sr = 1;
        foreach ($rows as $r) {
            fputcsv($out, [
                $sr++,
                isset($r->duplicate_lead_code) ? $r->duplicate_lead_code : '',
                isset($r->lead_status) ? $r->lead_status : '',
                isset($r->lead_code) ? $r->lead_code : '',
                isset($r->date) ? $r->date : '',
                isset($r->category_name) ? $r->category_name : '',
                isset($r->lead_title) ? $r->lead_title : '',
                isset($r->contact_person) ? $r->contact_person : '',
                isset($r->mobile) ? $r->mobile : '',
                isset($r->email) ? $r->email : '',
            ]);
        }

        fclose($out);
        exit;
    }

	public function get_duplicate_details()
	{
		$lead_code = $this->input->get('id');
		$obj = $this->Leads_model->getCodedetails($lead_code);
		// return $obj;exit;
		$this->load->view('Lead_Module/Lead_Generation/component/view-duplicate', [
			'obj' => $obj
		]);
	}

	public function get_lead_activities($lead_id)
	{
		$this->load->model('Leads_model');

		$data['lead']       = $this->Leads_model->get_lead_by_id($lead_id);
		$data['activities'] = $this->Leads_model->get_activities_by_lead($lead_id);
		$data['employees']  = $this->Leads_model->get_all_employees();

		$this->load->view('Lead_Module/Lead_Generation/activityTracking_model', $data);
	}

	public function save_activity() {
		$this->load->model('Leads_model');

		$lead_id = $this->input->post('lead_id');

		$document_file_url = NULL;
        if (!empty($_FILES['document_file']['name'])) {
            $uploadPath = './uploads/activities/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, TRUE);
            }

            $config['upload_path']   = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
            $config['encrypt_name']  = TRUE; // random file name

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('document_file')) {
                $fileData = $this->upload->data();
                $document_file_url = base_url('uploads/activities/' . $fileData['file_name']);
            } else {
                $this->session->set_flashdata('failed', $this->upload->display_errors());
                redirect('/Leads/index/', 'refresh');
                return;
            }
        }


		$activity_data = [
			'lead_id'          => $lead_id,
			'activity_type'    => $this->input->post('activity_type'),
			'due_date'         => $this->input->post('due_date'),
			'assign_to'        => $this->input->post('assign_to'),
			'activity_summary' => $this->input->post('activity_summary'),
			'other_text'       => $this->input->post('other_text'),
			'document_file'    => $document_file_url,
			'created_at'       => date('Y-m-d H:i:s A'),
		];

		$this->Leads_model->insert_activity($activity_data);

		$this->session->set_flashdata('success', 'Activity added successfully!');
		redirect('Leads/index');
	}


	public function save_activityNew() {
    $this->load->model('Leads_model');

    $lead_id = $this->input->post('lead_id');

    $document_file_url = NULL;
    if (!empty($_FILES['document_file']['name'])) {
        $uploadPath = './uploads/activities/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, TRUE);
        }

        $config['upload_path']   = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
        $config['encrypt_name']  = TRUE; // random file name

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('document_file')) {
            $fileData = $this->upload->data();
            $document_file_url = base_url('uploads/activities/' . $fileData['file_name']);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => strip_tags($this->upload->display_errors())
            ]);
            return;
        }
    }

    $activity_data = [
        'lead_id'          => $lead_id,
        'activity_type'    => $this->input->post('activity_type'),
        'due_date'         => $this->input->post('due_date'),
        'assign_to'        => $this->input->post('assign_to'),
        'activity_summary' => $this->input->post('activity_summary'),
        'other_text'       => $this->input->post('other_text'),
        'document_file'    => $document_file_url,
        'created_at'       => date('Y-m-d H:i:s A'),
    ];

    $insert_id = $this->Leads_model->insert_activity($activity_data);

    if ($insert_id) {
        $this->session->set_flashdata('success', 'Activity added successfully!');
        echo json_encode(['status' => true, 'message' => 'Activity added successfully!']);
    } else {
        $this->session->set_flashdata('error', 'Failed to create activity');
        echo json_encode(['status' => false, 'message' => 'Failed to create activity']);
    }
}


	public function save_feedback($activity_id)
{
    $feedback = $this->input->post('activity_feedback');
    $lead_id  = $this->input->post('lead_id');

    if (!empty($feedback)) {
        $this->db->where('id', $activity_id);
        $this->db->update('lead_schedule_activities', [
            'activity_feedback'   => $feedback,
            'feedback_created_at' => date('Y-m-d H:i:s A')
        ]);

        $this->session->set_flashdata('success', 'Feedback added successfully!');
    } else {
        $this->session->set_flashdata('error', 'Feedback cannot be empty.');
    }

    redirect('Leads/index');
}

// public function save_feedback_New($activity_id)
// {
//      $feedback = $this->input->post('activity_feedback');
//     $lead_id  = $this->input->post('lead_id');

//     if (!empty($feedback)) {
//         $this->db->where('id', $activity_id);
//         $this->db->update('lead_schedule_activities', [
//             'activity_feedback'   => $feedback,
//             'feedback_created_at' => date('Y-m-d H:i:s')
//         ]);

//         $this->session->set_flashdata('success', 'Feedback added successfully!');
//     } else {
//         $this->session->set_flashdata('error', 'Feedback cannot be empty.');
//     }

//     redirect('Leads/leads_activity');
// }



public function save_feedback_New($act_id)
{
    $lead_id = $this->input->post('lead_id');
    $feedback = $this->input->post('activity_feedback');
    $rating = $this->input->post('activity_rating');

    if ($act_id && $lead_id && $feedback) {
        $updateData = [
            'activity_feedback' => $feedback,
            'feedback_created_at' => date('Y-m-d H:i:s A'),
            'activity_rating' => $rating ? intval($rating) : null
        ];

        $this->db->where('id', $act_id);
        $this->db->update('lead_schedule_activities', $updateData);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Feedback saved successfully');
            echo json_encode(['status' => true, 'message' => 'Feedback saved successfully']);
        } else {
            $this->session->set_flashdata('error', 'No changes made');
            echo json_encode(['status' => false, 'message' => 'No changes made']);
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid data']);
    }
}

// public function get_address()
// {
//     $lat = $this->input->get('lat');
//     $lon = $this->input->get('lon');

//     if ($lat && $lon) {
//         $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$lat&lon=$lon&addressdetails=1";

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
//         $response = curl_exec($ch);
//         curl_close($ch);

//         header('Content-Type: application/json');
//         echo $response;
//     } else {
//         echo json_encode(["error" => "Lat/Lon not provided"]);
//     }
// }

public function get_address()
{
    $lat = $this->input->get('lat', TRUE);
    $lon = $this->input->get('lon', TRUE);

    if ($lat === null || $lon === null) {
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Lat/Lon not provided']));
    }

    if (!is_numeric($lat) || !is_numeric($lon)) {
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Invalid coordinates']));
    }

    $lat = floatval($lat);
    $lon = floatval($lon);

    $contactEmail = 'youremail@example.com';

    $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$lat}&lon={$lon}&addressdetails=1&zoom=18&accept-language=en&email=" . urlencode($contactEmail);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "YourAppName/1.0 ({$contactEmail})");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErr  = curl_error($ch);
    curl_close($ch);

    if ($response === false || $httpCode !== 200) {
        $msg = 'Reverse geocode failed';
        if ($curlErr) $msg .= ": $curlErr";
        if ($httpCode) $msg .= " (HTTP $httpCode)";
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => $msg]));
    }

    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Invalid response from geocoder']));
    }

    return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
}

public function get_address_google()
{
    $lat = $this->input->get('lat', TRUE);
    $lon = $this->input->get('lon', TRUE);

    if (empty($lat) || empty($lon)) {
        echo json_encode(['status' => false, 'message' => 'Lat/Lon required']);
        return;
    }

    // Load key from config or env (recommended)
    $apiKey = getenv('GOOGLE_MAPS_API_KEY') ?: 'AIzaSyA-o7PpB2b0ge3KPLd7l3fI5PBkLVYm31Q';

    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" . urlencode($lat . ',' . $lon) . "&key=" . urlencode($apiKey);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $resp = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        echo json_encode(['status' => false, 'message' => 'Curl error: ' . $err]);
        return;
    }

    $json = json_decode($resp, true);
    if (!$json) {
        echo json_encode(['status' => false, 'message' => 'Invalid response from Google']);
        return;
    }

    if (!isset($json['status']) || $json['status'] != 'OK') {
        $msg = isset($json['error_message']) ? $json['error_message'] : 'No results';
        echo json_encode(['status' => false, 'message' => 'Geocoding failed: ' . $msg, 'raw' => $json]);
        return;
    }

    // take best result (first)
    $res = $json['results'][0];

    $components = [];
    foreach ($res['address_components'] as $comp) {
        foreach ($comp['types'] as $type) {
            $components[$type] = $comp['long_name'];
        }
    }

    $out = [
        'status' => true,
        'formatted_address' => $res['formatted_address'] ?? '',
        'lat' => $res['geometry']['location']['lat'] ?? $lat,
        'lng' => $res['geometry']['location']['lng'] ?? $lon,
        'components' => $components,
        'raw' => $res
    ];

    header('Content-Type: application/json');
    echo json_encode($out);
}

public function leads_activity()
{
    $this->load->model('Leads_model');
    $session = $this->session->userdata('logged_in');

    $employee_id = isset($session['employee_id']) ? $session['employee_id'] : (isset($session['id']) ? $session['id'] : null);

    if (empty($employee_id)) {
        $this->session->set_flashdata('failed', 'Please login to view your activities.');
        redirect('login');
        return;
    }

    $allActivities = $this->Leads_model->get_activities_for_user($employee_id);

    $incompleteActivities = [];
    $completedActivities = [];

    foreach ($allActivities as $act) {
        if (empty($act['activity_feedback'])) {
            $incompleteActivities[] = $act;
        } else {
            $completedActivities[] = $act;
        }
    }

    usort($incompleteActivities, function($a, $b) {
        $now = time();

        $dtA = !empty($a['due_date']) ? strtotime($a['due_date']) : strtotime($a['created_at']);
        $dtB = !empty($b['due_date']) ? strtotime($b['due_date']) : strtotime($b['created_at']);

        $diffA = abs($dtA - $now);
        $diffB = abs($dtB - $now);

		

        return $diffA - $diffB;
    });

    $data['incompleteActivities'] = $incompleteActivities;
    $data['completedActivities'] = $completedActivities;

    $data['employees'] = $this->Leads_model->getEmployeeDropdown();
    $data['page_title'] = 'My Activities';

    $this->template->load('layout/template', 'Lead_Module/Lead_Generation/leads_activity', $data);
}

// public function update_status()
// {
//     $id = $this->input->post('id');
//     $status = $this->input->post('status');

//     if ($id && $status) {
//         $this->db->where('id', $id);
//         $this->db->update('lead_csv', ['lead_status' => $status]);

//         if ($this->db->affected_rows() > 0) {
// 			$this->session->set_flashdata('success', 'Lead status updated successfully');
// 			echo json_encode(['status' => true]);
// 		} else {
// 			$this->session->set_flashdata('error', 'No changes made');
// 			echo json_encode(['status' => false]);
// 		}
//     } else {
//         echo json_encode(['status' => false, 'message' => 'Invalid data']);
//     }
// }

public function update_status()
{
    $lead_id    = $this->input->post('lead_id');
    $new_status = $this->input->post('status');

    // --- Validation ---
    if (empty($lead_id) || empty($new_status)) {
        echo json_encode(['status' => false, 'message' => 'Invalid data received.']);
        return;
    }

	

    // --- Lead status update ---
    $this->db->where('id', $lead_id);
    $this->db->update('lead_csv', ['lead_status' => $new_status]);

    if ($this->db->affected_rows() > 0) {

        // --- Lead data nikal lo (title, assign_to) ---
        $lead_data  = $this->Leads_model->getLeadById($lead_id);
        // $lead_title = $lead_data['title'] ?? 'Untitled Lead';  // ✅ yaha se title aayega
		 $lead_title = $lead_data['lead_title'] ?? 'Untitled Lead';
        $assign_to  = $lead_data['assign_to'] ?? null;

        // --- Logged in user data ---
        $login_id   = $this->session->userdata['logged_in']['id'];
        $updated_by = $this->session->userdata['logged_in']['name'];

        // --- Notification data ready ---
        $data1 = [
            'type'        => 'lead-status',
            'subject'     => 'Lead Status Updated',
            'message'     => $updated_by . ' updated the status of lead "' . $lead_title . '" to "' . $new_status . '"',
            'page_url'    => 'Leads/view/' . $lead_id,
            'employee_id' => $assign_to,
            'status'      => 0,
            'lead_id'     => $lead_id,
            'datetime'    => date('Y-m-d H:i:s'),
            'created_by'  => $login_id,
        ];

        // --- Save notification ---
        $insert_result = $this->notifications_model->add_notification($data1);

        // --- JSON Response for AJAX ---
		$this->session->set_flashdata('success', 'Lead status updated successfully');
        echo json_encode([
            'status' => true,
            'message' => 'Lead status updated successfully!',
            'notification_inserted' => $insert_result,
            'lead_title' => $lead_title
        ]);
        return;

    } else {
        echo json_encode(['status' => false, 'message' => 'No changes made.']);
        return;
    }
}

// public function update_priority()
// {
//     $id = $this->input->post('id');
//     $priority = $this->input->post('priority');

//     if ($id && $priority) {
//         $this->db->where('id', $id);
//         $this->db->update('lead_csv', ['leads_priority' => $priority]);

//         if ($this->db->affected_rows() > 0) {
// 			$this->session->set_flashdata('success', 'Lead priority updated successfully');
//             echo json_encode(['status' => true]);
//         } else {
// 			$this->session->set_flashdata('error', 'No changes made');
//             echo json_encode(['status' => false]);
//         }
//     } else {
//         echo json_encode(['status' => false, 'message' => 'Invalid data']);
//     }
// }

public function update_priority()
{
    $lead_id    = $this->input->post('lead_id');
    $new_priority = $this->input->post('priority');

    // --- Validation ---
    if (empty($lead_id) || empty($new_priority)) {
        echo json_encode(['status' => false, 'message' => 'Invalid data received.']);
        return;
    }

	

    // --- Lead status update ---
    $this->db->where('id', $lead_id);
    $this->db->update('lead_csv', ['leads_priority' => $new_priority]);

    if ($this->db->affected_rows() > 0) {

        // --- Lead data nikal lo (title, assign_to) ---
        $lead_data  = $this->Leads_model->getLeadById($lead_id);
        // $lead_title = $lead_data['title'] ?? 'Untitled Lead';  // ✅ yaha se title aayega
		 $lead_title = $lead_data['lead_title'] ?? 'Untitled Lead';
        $assign_to  = $lead_data['assign_to'] ?? null;

        // --- Logged in user data ---
        $login_id   = $this->session->userdata['logged_in']['id'];
        $updated_by = $this->session->userdata['logged_in']['name'];

        // --- Notification data ready ---
        $data1 = [
            'type'        => 'lead-priority',
            'subject'     => 'Lead priority Updated',
            'message'     => $updated_by . ' updated the priority of lead "' . $lead_title . '" to "' . $new_priority . '"',
            'page_url'    => 'Leads/view/' . $lead_id,
            'employee_id' => $assign_to,
            'status'      => 0,
            'lead_id'     => $lead_id,
            'datetime'    => date('Y-m-d H:i:s'),
            'created_by'  => $login_id,
        ];

        // --- Save notification ---
        $insert_result = $this->notifications_model->add_notification($data1);

        // --- JSON Response for AJAX ---
		$this->session->set_flashdata('success', 'Lead priority updated successfully');
        echo json_encode([
            'status' => true,
            'message' => 'Lead priority updated successfully!',
            'notification_inserted' => $insert_result,
            'lead_title' => $lead_title
        ]);
        return;

    } else {
        echo json_encode(['status' => false, 'message' => 'No changes made.']);
        return;
    }
}

public function update_employee()
{
    $id = $this->input->post('id');
    $employee_id = $this->input->post('lead_assign');

    if ($id && $employee_id) {
        $this->db->where('id', $id);
        $this->db->update('lead_csv', ['lead_assign' => $employee_id]);

        if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Employee assigned successfully');
            echo json_encode(['status' => true]);
        } else {
            $this->session->set_flashdata('error', 'No changes made');
            echo json_encode(['status' => false]);
        }
    } else {
        // Invalid data response with message
        echo json_encode([
            'status' => false,
            'message' => 'Invalid data'
        ]);
    }
}

public function update_activity()
{
    $id = $this->input->post('id');
    $data = [
        'activity_type' => $this->input->post('activity_type'),
        'due_date' => $this->input->post('due_date'),
		'other_text' => $this->input->post('other_text'),
        'activity_summary' => $this->input->post('activity_summary')
    ];

    $this->db->where('id', $id);
    $this->db->update('lead_schedule_activities', $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Activity updated successfully');
        echo json_encode(['status' => true]);
    } else {
        $this->session->set_flashdata('error', 'No changes made');
        echo json_encode(['status' => false]);
    }
}

public function delete_activity() {
    $this->load->model('Leads_model');

    $id = $this->input->post('id');

    if (!$id) {
        echo json_encode(['status' => false, 'message' => 'Invalid Activity ID']);
        return;
    }

    $this->Leads_model->delete_activity($id);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Activity cancelled successfully!');
        echo json_encode(['status' => true, 'message' => 'Activity cancelled successfully!']);
    } else {
        $this->session->set_flashdata('error', 'No changes made');
        echo json_encode(['status' => false, 'message' => 'No changes made']);
    }
}

public function get_leads_summary()
{
    $data = [];

    $this->db->from('lead_csv');
    $data['total'] = $this->db->count_all_results();

    $this->db->from('lead_csv');
    $this->db->where('status', 'Won');
    $data['won'] = $this->db->count_all_results();

    $this->db->from('lead_csv');
    $this->db->where('status', 'Loss');
    $data['loss'] = $this->db->count_all_results();

    return $data;
}

	
}

?>