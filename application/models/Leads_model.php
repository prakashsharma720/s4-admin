<?php

class Leads_model extends MY_Model
{

	private $table = 'leads';
	private $lead_followups = 'lead_followups';

	public function __construct()
	{
		parent::__construct();
	}
	public function checkRecors($created_by, $date)
	{
		$this->db->select('id');
		$this->db->from('lead_count');
		$this->db->where(['employee_id' => $created_by, 'date' => $date]);
		$count = $this->db->get()->num_rows();
		return $count;
	}

	public function insertQuotationItem($data){
    return $this->db->insert('lead_quotation_items', $data);
}

public function updateQuotation($id, $data) {
    $this->db->where('id', $id)->update('quotation_table', $data);
}

public function updateQuotationItem($id, $data) {
    $this->db->where('id', $id)->update('lead_quotation_items', $data);
}

	function saverecords($inserdata)
	{

		foreach ($inserdata as $key => $value) {

			// $data['lead_code'] = $this->getLeadcsvCode();
			// $voucher_no= $data['lead_code']+1;
			// if($voucher_no<10){
			// $rs_id_code='MUSK000'.$voucher_no;
			// }
			// else if(($voucher_no>=10) && ($voucher_no<=99)){
			//   $rs_id_code='MUSK00'.$voucher_no;
			// }
			// else if(($voucher_no>=100) && ($voucher_no<=999)){
			//   $rs_id_code='MUSK0'.$voucher_no;
			// }
			// else{
			//   $rs_id_code='MUSK'.$voucher_no;
			// }

			$data12['lead_code'] = $value['lead_code'];
			$data12['date'] = date('Y-m-d', strtotime($value['date']));
			$data12['category_name'] = $value['category_name'];
			$data12['lead_title'] = $value['lead_title'];
			$data12['contact_person'] = $value['contact_person'];
			$data12['email'] = $value['email'];
			$data12['country'] = $value['country'];
			$data12['mobile'] = $value['mobile'];
			$data12['city'] = $value['city'];
			$data12['state'] = $value['state'];
			$data12['map_link'] = $value['map_link'];
			$data12['lead_source'] = $value['lead_source'];
			$data12['work_description'] = $value['work_description'];
			$data12['lead_architect'] = $value['lead_architect'];
			$data12['firm_name'] = $value['firm_name'];
			$data12['mediator_mobile_no'] = $value['mediator_mobile_no'];
			$data12['mediator_address'] = $value['mediator_address'];
			$data12['current_location'] = $value['current_location'];
			$data12['lead_assign'] = $value['lead_assign'];
			$data12['project_address'] = $value['project_address'];
			$data12['region_selection'] = $value['region_selection'];
			$data12['lead_site_file'] = $value['lead_site_file'];
			$data12['leads_priority'] = $value['leads_priority'];
			$data12['lead_status'] = "Qualify";


			// $data12['email'] = $value['email'];
			// $data12['website'] = $value['website'];
			// $data12['lead_source'] = $value['lead_source'];
			// $data12['company_name'] = $value['company_name'];
			// $data12['country'] = $value['country'];
			// $data12['lead_status'] = $value['lead_status'];			
			$data12['created_by'] = $this->session->userdata['logged_in']['id'];

			// Query to check whether username already exist or not
			$condition = "mobile =" . "'" . $data12['mobile'] . "'";
			$condition = "email =" . "'" . $data12['email'] . "'";
			// $condition = "lead_title =" . "'" . $data['title'] . "'";


			$this->db->from('lead_csv');
			$this->db->where($condition);
			$this->db->like('lead_title', $data12['lead_title']);
			$this->db->limit(1);
			$query = $this->db->get()->row_array();

			if (empty($query)) {

				$this->db->insert('lead_csv', $data12);
				$id = $this->db->insert_id();
				// $target = $this->getTarget($created_by);
				$leadhistory = array(
					'lead_id' => $id,
					'date' => date('Y-m-d'),
					'lead_status' => 'created',
					'created_on' => date('Y-m-d H:i:s A'),
					'emp_id' => $this->login_id,
				);
				$leadscheduleactivity = array(
					'lead_id' => $id,
					'due_date' => $value['due_date'],
					'activity_type' => $value['activity_type'],
					'assign_to' => $value['assign_to'],
					'activity_summary' => $value['activity_summary'],
					'document_file' => $value['document_file'],
					'other_text' => $value['other_text'],
				);

				$this->db->insert('lead_history', $leadhistory);
				$this->db->insert('lead_schedule_activities', $leadscheduleactivity);
				// $login_id=$this->session->userdata['logged_in']['id'];
				$lead_data = $this->getemployee($id);

				$date = $lead_data['date'];
				$created_by = $lead_data['created_by'];
				$is_duplcate = $lead_data['is_duplicate'];

				$count = $this->checkRecors($created_by, $date);
				// print_r($count);exit;
				if ($count == 0) {
					$target = $this->getTarget($created_by);
					// echo print_r($target);exit;

					$data = array(
						'employee_id' => $created_by,
						'date' => $date,
						'month' => date('m', strtotime($date)),
						'target' => $target,
						'lead_count' => 1,

					);

					$this->db->insert('lead_count', $data);





					// if ($this->db->affected_rows() > 0) {
					// 	return true;
					// }else{
					// 	return false;
					// }
				} else {

					$old_count = $this->getLeadsTotalCount($created_by, $date);
					$data = array(
						'lead_count ' => $old_count + 1
					);
					$this->db->where(['employee_id' => $created_by, 'date' => $date]);
					$this->db->update('lead_count', $data);



				}
			} else {
				// without duplicate insert code 

				$data1 = array(
					'is_duplicate ' => 1,
					'duplicate_lead_code' => $query['lead_code'],
				);
				$data2 = array_merge($data12, $data1);
				$this->db->insert('lead_csv', $data2);

				$id = $this->db->insert_id();
				// $target = $this->getTarget($created_by);
				$leadhistory = array(
					'lead_id' => $id,
					'date' => date('Y-m-d'),
					'lead_status' => 'created',
					'created_on' => date('Y-m-d H:i:s A'),
					'emp_id' => $this->login_id,
				);

				$this->db->insert('lead_history', $leadhistory);

				$id = $this->db->insert_id();
				// print_r($id);exit;

				$lead_data = $this->getemployee($id);

				// ✅ Safe handling of lead_data
				if (!empty($lead_data) && isset($lead_data['date'], $lead_data['created_by'])) {
					$date       = $lead_data['date'];
					$created_by = $lead_data['created_by'];
				} else {
					// If no data is returned, set safe defaults
					$date       = date('Y-m-d');
					$created_by = $this->session->userdata('logged_in')['id'] ?? null;
				}


				$count = $this->checkRecors($created_by, $date);
				// print_r($count);exit;
				if ($count == 0) {
					$target = $this->getTarget($created_by);
					// echo print_r($target);exit;

					$data = array(
						'employee_id' => $created_by,
						'date' => $date,
						'month' => date('m', strtotime($date)),
						'target' => $target,
						'lead_count' => 1,
						'is_duplicate' => 1,

					);

					$this->db->insert('lead_count', $data);
					//update duplicate feild
				} else {

					$old_count = $this->getLeadsTotalCount($created_by, $date);
					$old_count1 = $this->getLeadsduplicateCount($created_by, $date);
					$data = array(
						'lead_count ' => $old_count + 1,
						'is_duplicate ' => $old_count1 + 1
					);
					$this->db->where(['employee_id' => $created_by, 'date' => $date]);
					$this->db->update('lead_count', $data);

				}
			}
		}
		if ($this->db->affected_rows() > 0) {
			// echo print_r($_POST);exit;
			return true;
		} else {
			return false;
		}
	}



	public function getLeadsTotalCount($created_by, $date)
	{
		$this->db->select('lead_count');
		$this->db->from('lead_count');
		$this->db->where(['employee_id' => $created_by, 'date' => $date]);
		$count = $this->db->get()->row_array();
		return $count['lead_count'];
	}
	public function getLeadsduplicateCount($created_by, $date)
	{
		$this->db->select('is_duplicate');
		$this->db->from('lead_count');
		$this->db->where(['employee_id' => $created_by, 'date' => $date]);
		$count = $this->db->get()->row_array();
		return $count['is_duplicate'];

	}



	// Insert registration data in database
	public function insert($data)
	{
		// Query to check whether username already exist or not
		$condition = "mobile =" . "'" . $data['mobile'] . "'" . " || ";
		$condition .= "email =" . "'" . $data['email'] . "'" . " || ";
		$condition .= "lead_title =" . "'" . $data['lead_title'] . "'";


		$this->db->from('lead_csv');
		$this->db->where($condition);

		// $this->db->like('lead_title',$data['lead_title']);
		$this->db->limit(1);
		$query = $this->db->get()->row_array();
		// echo "<pre>";print_r($query);exit;

		//  $leadcode=$query['lead_code'];
		//  echo "<pre>";print_r($leadcode);exit;

		if (empty($query)) {

			$this->db->insert('lead_csv', $data);
			$id = $this->db->insert_id();
			$leadhistory = array(
				'lead_id' => $id,
				'date' => date('Y-m-d'),
				'lead_status' => 'created',
				'created_on' => date('Y-m-d h:i:s'),
				'emp_id' => $this->login_id,
			);

			$this->db->insert('lead_history', $leadhistory);
			if ($this->db->affected_rows() > 0) {
				// echo print_r($_POST);exit;
				return true;
			}
		} else if (!empty($query)) {

			$data1 = array(
				'is_duplicate ' => 1,

				'duplicate_lead_code' => $query['lead_code'],
			);
			$data2 = array_merge($data, $data1);
			$this->db->insert('lead_csv', $data2);
			if ($this->db->affected_rows() > 0) {
				return true;
			}

		} else {
			return false;
		}
	}
	public function insertLeadCount($data1)
	{
		$this->db->insert('lead_count', $data1);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	public function getTarget($login_id)
	{
		$this->db->select('target');
		$this->db->from('employees');
		$this->db->where(['id' => $login_id]);
		$count = $this->db->get()->row_array();		//print_r($count);exit;
		return $count['target'];
	}
	public function insertQuotation($data){
		$this->db->insert('quotation_table', $data);
		return $this->db->insert_id(); // return inserted quotation id
	}
	public function QuotationLeadList(){
    $this->db->select('quotation_table.*, lead_csv.lead_title, lead_csv.state, lead_csv.city, lead_csv.mobile, lead_csv.email, lead_csv.project_address');
    $this->db->from('quotation_table');
    $this->db->join('lead_csv', 'quotation_table.lead_id = lead_csv.id', 'left');
    $this->db->order_by('lead_csv.id', 'desc');
    
    $query = $this->db->get();
    return $query->result_array();
}

	public function getemployee($lead_id)
	{
		$this->db->select('date,created_by,is_duplicate');
		$this->db->from('lead_csv');
		$this->db->where(['id' => $lead_id]);
		$count = $this->db->get()->row_array();
		// print_r($count);exit;
		return $count;
	}
	public function lead_update($data, $lead_id)
	{
		// print_r($id);
		$this->db->where('id', $lead_id);
		$this->db->update('lead_csv', $data);
		$leadhsistory = array(
			'lead_id' => $lead_id,
			'date' => date('Y-m-d'),
			'lead_status' => 'assign_by',
			'created_on' => date('Y-m-d h:i:s'),
			'emp_id' => $this->login_id,

		);


		// echo"<pre>";print_r($leadhsistory);
		$this->db->insert('lead_history', $leadhsistory);
		$data1 = array(
			'lead_id' => $lead_id,
			'date' => date('Y-m-d'),
			'lead_status' => 'assign_to',
			'created_on' => date('Y-m-d h:i:s'),
			'emp_id' => $this->login_id,
			// $this->input->post('employee_id'),
		);
		// echo"<pre>";print_r($data1);exit;
		$this->db->insert('lead_history', $data1);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function reminder_update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('lead_reminder', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function EditWorkshopStatus($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('workshop_detail', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function marketing_insert($data1)
	{
		$this->db->insert('lead_marketing', $data1);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function LeadList()
	{

		$this->db->select('leads.*,categories.category_name as category_name');
		$this->db->from('leads');
		$this->db->join('categories', 'leads.category_id=categories.id', 'left');
		//$this->db->join('grades','leads.grade_id=grades.id');


		$this->db->where('leads.flag', '0');
		$this->db->order_by("leads.id", "desc");
		$query = $this->db->get();
		return $query->result_array();

	}
	public function assignleadlist()
	{
		$this->db->select('lead_csv.*,emp1.name as person_name,emp2.name as assign_name,');
		$this->db->from('lead_csv');
		$this->db->where(['lead_csv.lead_status' => 'Approved']);
		$this->db->where("date BETWEEN DATE_SUB(NOW(), INTERVAL 10 DAY) AND NOW()");
		$this->db->join('employees as emp1', 'emp1.id=lead_csv.assign_to', 'left');
		$this->db->join('employees as emp2', 'lead_csv.assign_by=emp2.id', 'left');

		$this->db->order_by("lead_csv.id", "desc");

		$query = $this->db->get();
		// 		print_r($this->db->last_query());exit;

		return $query->result_array();
	}
	public function getassignleadByID($lead_id)
	{
		$this->db->select('lead_csv.*');
		$this->db->from('lead_csv');

		$this->db->where('lead_csv.id', $lead_id);
		// $this->db->join('lead_followups','lead_csv.id=lead_followups.lead_id','left');
		$this->db->order_by("lead_csv.id", "desc");
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->row_array();
	}
 	public function projectList() 
	{
		 $result = $this->db->select('id, product_name,hsn_code,unit')->from('products')->get()->result_array(); 
        // $result= $result->result_array();
        $products = array(); 
        
        foreach($result as $r) { 
            $products[$r['id']] = $r['product_name'].' ('.$r['hsn_code'].')'; 
        } 
        
        return $products; 

	}
	public function LeadListCSV($conditions = null)
	{

		$this->db->select('lead_csv.*,employees.name as employee_name, quotation_table.estimate_no, quotation_table.id as quotation_id');
		$this->db->from('lead_csv');
		if ($this->role_id != 1) {
			$this->db->where(['lead_assign=' => $this->login_id]);
		}
		// $this->db->where(['lead_assign='=>$this->login_id]);
		// 		$this->db->where("date BETWEEN DATE_SUB(NOW(), INTERVAL 10 DAY) AND NOW()");
		$this->db->join('employees', 'lead_csv.lead_assign=employees.id', 'left');
		$this->db->join('quotation_table', 'lead_csv.id=quotation_table.lead_id', 'left');
		//$this->db->join('grades','leads.grade_id=grades.id');

		if (!empty($conditions)) {

			if (!empty($conditions['category_name'])) {
				$this->db->where('lead_csv.category_name', $conditions['category_name'], 'both');
			}
			if (!empty($conditions['lead_code'])) {
				$this->db->where('lead_csv.lead_code', $conditions['lead_code'], 'both');
			}
			if (!empty($conditions['lead_status'])) {
				$this->db->where('lead_csv.lead_status', $conditions['lead_status'], 'both');
			}
			if (!empty($conditions['employee_id'])) {
				$this->db->where('lead_csv.assign_to', $conditions['employee_id'], 'both');
			}
			if (!empty($conditions['from_date'])) {
				$this->db->where('lead_csv.date >=', $conditions['from_date'], 'both');
			}

			if (!empty($conditions['upto_date'])) {
				$this->db->where('lead_csv.date <=', $conditions['upto_date'], 'both');
			}
		}// $this->db->where('lead_csv.flag','0');
		$this->db->order_by("lead_csv.id", "desc");
		$query = $this->db->get();

		// 		print_r($this->db->last_query());exit;
		return $query->result_array();

	}
	public function duplicate()
	{
		$this->db->select('lead_code');
		$this->db->from('lead_csv');

		// $this->db->where('lead_csv.mobile','mobile','both');


		// $this->db->where('lead_csv.email','email','both');


		// $this->db->where('lead_csv.lead_title','lead_title','both');


		$this->db->where('is_duplicate=', '1');

		$this->db->order_by("lead_csv.lead_code", "asc");
		$query = $this->db->get();
		return $query->row_array();

	}


	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('lead_csv');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getByQuotationId($id)
	{
		$this->db->select('*');
		$this->db->from('lead_csv');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function GetByIdNew($id)
	{
		$this->db->select('*');
		$this->db->from('lead_csv');
		$this->db->where('id', $id);
		$query = $this->db->get()->result_array();
		;
		foreach ($query as $i => $po_data) {
			$this->db->select('lead_schedule_activities.*');
			$this->db->where('lead_schedule_activities.lead_id', $po_data['id']);
			$images_query = $this->db->get('lead_schedule_activities')->result_array();
			$query[$i]['activity_details'] = $images_query;
		}
		return $query;
	}
	public function getCodedetails($lead_code)
	{
		$this->db->select('lead_csv.*, employees.name as employee_name');
		$this->db->from('lead_csv');
		$this->db->join('employees', 'employees.id = lead_csv.lead_assign', 'left');
		$this->db->where('lead_csv.lead_code', $lead_code);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insertFollowup($data)
	{
		$this->db->insert('lead_followups', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function getFollowUps($id)
	{
		$this->db->select('lead_followups.*,employees.name as giver,lead_csv.lead_title as title');
		$this->db->from('lead_followups');
		$this->db->join('lead_csv', 'lead_followups.lead_id = lead_csv.id', 'left');
		$this->db->join('employees', 'lead_followups.followup_by = employees.id', 'left');
		$this->db->where('lead_followups.lead_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	function getLeadCode()
	{
		$count = 0;
		$this->db->select_max('lead_code');
		$this->db->from($this->table);
		//$this->db->where(['flag'=>'0']);
		$query = $this->db->get()->row_array();
		//print_r($query['requisition_slip_no']);exit;
		$count = $query['lead_code'] + 1;
		//print_r($count);exit;
		return $count;

	}

	function getLeadcsvCode()
	{

		$query = $this->db->query('SELECT * FROM lead_csv');

		$count = $query->num_rows();
		//print_r($count);exit;
		return $count;

	}


	function getCategories()
	{
		$result = $this->db->select('id, category_name')->from('categories')->where('flag', '0')->get()->result_array();
		//$result = $this->db->select('id, category_name')->get('categories')->result_array(); 
		//print_r($result);exit;
		//order_by('category_name', 'asc');
		$productname = array();
		$productname[''] = 'Select Services...';
		foreach ($result as $r) {
			$productname[$r['category_name']] = $r['category_name'];
		}

		return $productname;
	}

	function getEmployees()
	{
		$result = $this->db->select('id, name')->from('employees')->where('flag', '0')->get()->result_array();
		//$result = $this->db->select('id, category_name')->get('categories')->result_array(); 
		//print_r($result);exit;
		//order_by('category_name', 'asc');
		$productname = array();
		$productname[''] = 'Select Employee...';
		foreach ($result as $r) {
			$productname[$r['id']] = $r['name'];
		}

		return $productname;
	}


	function getCountry()
	{
		// echo "<pre>"; print_r($_POST);exit;

		$result = $this->db->select('id,iso,name,phonecode')->from('countries')->get()->result_array();
		// $result = $this->db->select('id,name,iso,phonecode')->get('country')->result_array(); 

		//order_by('category_name', 'asc');
		$productname = array();
		$productname[''] = 'Select Country...';
		// print_r(  $productname['']);exit; 
		foreach ($result as $r) {
			$productname[$r['name'] . "  " . '+' . $r['phonecode']] = $r['name'] . " " . "+" . $r['phonecode'];

		}
		// echo "<pre>";print_r($productname);exit;

		return $productname;
	}
	public function getEmployeeDropdown($department_id = null, $login_id = null)
	{
		$this->db->select('id, name');
		$this->db->from('employees');
		if ((!empty($department_id))) {
			$this->db->where(['department_id' => $department_id, 'flag' => '0']);
		}
		if ((!empty($login_id))) {
			$this->db->where(['id !=' => $login_id, 'flag' => '0']);
		}
		// else {
		// 	$this->db->where('flag','0');
		// }
		$query = $this->db->get();
		return $query->result_array();
	}

	function getLeadsCategories()
	{
		$result = $this->db->select('id, category_name')->from('lead_csv')->group_by('category_name')->get()->result_array();
		//$result = $this->db->select('id, category_name')->get('categories')->result_array(); 
		//print_r($result);exit;
		//order_by('category_name', 'asc');
		// $productname = array(); 
		// $productname[''] = 'Select Category...'; 
		// foreach($result as $r) { 
		//     $productname[$r['category_name']] = $r['category_name']; 
		// } 

		return $result;
	}


	function getCountries()
	{
		$result = $this->db->select('id,phone_code,country_code,country_name')->from('countries')->get()->result_array();
		//$result = $this->db->select('id, category_name')->get('categories')->result_array(); 
		//print_r($result);exit;
		//order_by('category_name', 'asc');
		$productname = array();
		$productname[''] = 'Select Country...';
		foreach ($result as $r) {
			$productname[$r['country_name']] = '(+' . $r['phone_code'] . ') ' . $r['country_name'];
		}

		return $productname;
	}

	function getGrades()
	{
		$result = $this->db->select('id, grade')->from('grades')->where('flag', '0')->get()->result_array();
		//$result = $this->db->select('id, category_name')->get('categories')->result_array(); 
		//print_r($result);exit;
		//order_by('category_name', 'asc');
		$productname = array();
		$productname[''] = 'Select Grade...';
		foreach ($result as $r) {
			$productname[$r['id']] = $r['grade'];
		}

		return $productname;
	}

	function deleteItem($id)
	{
		if ($this->db->delete('lead_csv', "id = " . $id))
			return true;
		
	}

	function deletefollowup($id)
	{
		if ($this->db->delete('lead_followups', "id = " . $id))
			return true;
		// $data=array('flag'=>'1');
		// $this->db->set('flag','flag',false);
		// $this->db->where('id',$id);
		// if($this->db->update('leads', $data)){
		// 	return true;
		// }else{
		// 	return false;
		// }
	}

	public function getProductsByCategory($id)
	{
		$result = $this->db->select('id, name')->from('packing_materials')->where(['flag' => '0', 'categories_id' => $id])->get()->result_array();

		return $result;
	}

	public function mo_enquiry($data)
	{


		// Query to insert data in database
		$this->db->insert('mo_website_leads', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function MOLeadList()
	{

		$this->db->select('mo_website_leads.*');
		$this->db->from('mo_website_leads');
		// $this->db->join('categories','mo_website_leads.category_id=categories.id','left');
		//$this->db->join('grades','leads.grade_id=grades.id');
		// $this->db->where('mo_website_leads.flag','0');
		$this->db->order_by("mo_website_leads.id", "desc");
		$query = $this->db->get();
		return $query->result_array();

	}


	public function get_leads($filters = [], $ids = [])
	{
		$this->db->select('lead_csv.*, e.name as employee_name');
		$this->db->from('lead_csv');
		$this->db->join('employees e', 'e.id = lead_csv.lead_assign', 'left');

		// अगर selected IDs आए हैं तो वही निकालें
		if (!empty($ids)) {
			$this->db->where_in('id', $ids);
		} else {
			// वरना सारे filters लगाएँ

			// उदाहरण filters — अपने actual GET keys के हिसाब से:
			if (!empty($filters['status'])) {
				$this->db->where('status', $filters['status']);
			}

			if (!empty($filters['services'])) {
				$this->db->where('services', $filters['services']);
			}

			// Date range
			if (!empty($filters['date_from'])) {
				$this->db->where('date >=', $filters['date_from']);
			}
			if (!empty($filters['date_to'])) {
				$this->db->where('date <=', $filters['date_to']);
			}

			// Generic search (title/contact/email/mobile पर LIKE)
			if (!empty($filters['q'])) {
				$q = $filters['q'];
				$this->db->group_start()
					->like('title', $q)
					->or_like('contact_person', $q)
					->or_like('email', $q)
					->or_like('mobile', $q)
					->group_end();
			}
		}

		// Order (optional)
		$this->db->order_by('id', 'DESC');

		// अगर आपकी टेबल में बहुत ज्यादा डेटा है तो export में limit न लगाएँ (सारा filtered data चाहिए)
		$query = $this->db->get();
		return $query->result();
	}

	public function get_lead_by_code($lead_code)
	{
		return $this->db->where('lead_code', $lead_code)->get('leads')->row_array();
	}

	public function getLeadById($id)
	{
		return $this->db->get_where('lead_csv', ['id' => $id])->row_array();
	}

	public function get_lead_by_id($lead_id)
	{
		return $this->db->where('id', $lead_id)->get('lead_csv')->row_array();
	}

	// public function get_activities_by_lead($lead_id) {
	//     return $this->db->where('lead_id', $lead_id)
	//                     ->order_by('created_at', 'DESC')
	//                     ->get('lead_schedule_activities')
	//                     ->result_array();
	// }

	// public function insert_activity($data) {
	//     return $this->db->insert('lead_schedule_activities', $data);
	// }

	// public function get_all_employees() {
	//     $employees = $this->db->select('id, employee_name')->get('employees')->result_array();
	//     $options = [];
	//     foreach ($employees as $emp) {
	//         $options[$emp['id']] = $emp['employee_name'];
	//     }
	//     return $options;
	// }

	public function get_all_employees()
	{
		$this->db->select('id, name');
		$query = $this->db->get('employees');
		$result = $query->result_array();

		$employee_options = [];
		foreach ($result as $row) {
			// yahan sirf string dalni hai
			$employee_options[$row['id']] = $row['name'];
		}
		return $employee_options;
	}


	public function get_all_employeesNew()
	{
		$this->db->select('id, name');
		$this->db->from('employees');
		$query = $this->db->get();

		$result = $query->result_array();

		$employee_options = [];
		foreach ($result as $row) {
			$employee_options[$row['id']] = $row['name'];
		}

		return $employee_options;
	}


	// public function get_activities_by_lead($lead_id) {
	//     $this->db->select('*');
	//     $this->db->from('lead_schedule_activities');
	//     $this->db->where('lead_id', $lead_id);
	//     $this->db->order_by('created_at', 'DESC');
	//     return $this->db->get()->result_array();
	// }

	public function get_activities_by_lead($lead_id)
	{
		$this->db->order_by('id', 'DESC');
		$this->db->select('a.*, e.name as employee_name');
		$this->db->from('lead_schedule_activities a');
		$this->db->join('employees e', 'e.id = a.assign_to', 'left');
		$this->db->where('a.lead_id', $lead_id);
		return $this->db->get()->result_array();
	}

	public function get_all_employees_dropdown()
	{
		$this->db->select('id, name');
		$query = $this->db->get('employees');
		$result = $query->result_array();

		$employee_options = [];
		foreach ($result as $emp) {
			$employee_options[$emp['id']] = $emp['name'];
		}
		return $employee_options;
	}

	// 	public function get_activities_by_lead($lead_id) {
//     $this->db->select('a.*, e.name as employee_name');
//     $this->db->from('lead_schedule_activities a');
//     $this->db->join('employees e', 'e.id = a.assign_to', 'left');
//     $this->db->where('a.lead_id', $lead_id);
//     $query = $this->db->get();

	//     // Debug
//     echo "<pre>";
//     print_r($query->result_array());
//     exit;

	//     return $query->result_array();
// }

	public function insert_activity($data)
	{
		return $this->db->insert('lead_schedule_activities', $data);
	}


	public function get_activities_for_user($employee_id)
	{
		$this->db->select('a.*, 
		l.lead_code, 
		l.lead_status,
		l.date,
		l.category_name,
		l.country,
		l.email,
		l.lead_source,
		l.work_description,
		l.current_location,
		l.lead_assign,
		l.map_link,
		l.region_selection,
		l.lead_site_file,
		l.lead_architect,
		l.firm_name,
		l.mediator_mobile_no,
		l.mediator_address,
        l.lead_title, 
        l.contact_person, 
        l.mobile, 
		l.leads_priority,
        e.name as employee_name');
		$this->db->from('lead_schedule_activities a');
		$this->db->join('lead_csv l', 'l.id = a.lead_id', 'left');
		$this->db->join('employees e', 'e.id = a.assign_to', 'left');
		$this->db->where('a.assign_to', $employee_id);
		$this->db->order_by('a.created_at', 'DESC');
		return $this->db->get()->result_array();
	}

	public function delete_activity($id) {
		$this->db->where('id', $id);
		$this->db->delete('lead_schedule_activities');
	}




}
?>