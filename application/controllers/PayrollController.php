<?php

//session_start(); //we need to start session in order to access it through CI

Class PayrollController extends MY_Controller {

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

$this->load->model('Payroll_model');
$this->load->model('Leave_model');

$this->load->library('template');


}


public function index() {
    $data['title'] = 'Attendance List';
    $data['AttendanceDates'] = $this->Payroll_model->getUniqueAttendanceDates();
	//  echo"<pre>";print_r($data['AttendanceDates']);exit;
    $data['employees']  = $this->Payroll_model->getEmployeesList();
    $data['totalemployees']  = $this->Payroll_model->getTotalEmployee();
    
    $this->template->load('layout/template', 'payroll/attendance', $data);
}

public function add() {
    $data['title'] = 'Add Attendance';

    $data['employees']  = $this->Payroll_model->getEmployeesList();

    $this->template->load('layout/template', 'payroll/add_attendance', $data);
  
}

public function edit($date = null) {
    if (!$date) {
        redirect('PayrollController'); // Redirect if no date provided
    }

    // Fetch all attendance records for the given date
    $data['attendanceRecords'] = $this->Payroll_model->get_attendance_by_date($date);
				// echo "<pre>";print_r($data['attendanceRecords']);exit;	
    
    if (empty($data['attendanceRecords'])) {
        $this->session->set_flashdata('failed', 'No attendance records found for this date.');
        redirect('PayrollController');
    }
    $data['employees']  = $this->Leave_model->getEmployeesList();

    $data['title'] = "Edit Attendance - " . date("d-m-Y", strtotime($date));
    $this->template->load('layout/template', 'payroll/edit_attandace', $data);
}

    public function update_attendance()
    {
        $date = date('Y-m-d', strtotime($this->input->post('date'))); // Single date
        $check_in = $this->input->post('check_in');
        $check_out = $this->input->post('check_out');
        $status = $this->input->post('status');
        $emp_ids = $this->input->post('emp_id');

        if (!empty($date) && !empty($emp_ids)) {
            $i = 0; // index for status array (sequential)

            foreach ($emp_ids as $row_id => $employee_id) {

                $updateData = [
                    'status' => isset($status[$i]) ? $status[$i] : 'Absent',
                    'check_in' => !empty($check_in[$row_id]) ? date('H:i:s', strtotime($check_in[$row_id])) : null,
                    'check_out' => !empty($check_out[$row_id]) ? date('H:i:s', strtotime($check_out[$row_id])) : null,
                ];

                // For Absent/Leave → No check-in/out
                if ($updateData['status'] == 'Absent' || $updateData['status'] == 'Leave') {
                    $updateData['check_in'] = null;
                    $updateData['check_out'] = null;
                }

                // Update or Insert
                $this->Payroll_model->update_attendance_record($employee_id, $date, $updateData);

                $i++; // move to next status
            }

            $this->session->set_flashdata('success', 'Attendance updated successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Failed to update attendance. Please check the inputs.');
        }

        redirect('/PayrollController/index', 'refresh');
    }





    public function add_attendance() {
	$date= date('Y-m-d',strtotime($this->input->post('date')));
    $year = date('Y');
    $month = date('m');
	$created_by=$this->session->userdata['logged_in']['id'];
    foreach ($this->input->post('emp_id') as $key => $emp_id) {
        // Fetch the input values
        $date      = $date ?? null;
        $created_by      = $created_by ?? null;
        $check_in  = $this->input->post('check_in')[$key] ?? null;
        $check_out = $this->input->post('check_out')[$key] ?? null;
        $status    = $this->input->post('status')[$key] ?? null;

        // Only save the row if any of the fields (except emp_id) has a value
        if (!empty($check_in) || !empty($check_out) || !empty($status)) {
            $data = array(
                'emp_id'    => $emp_id,  
                'date'      => $date,
                'year'      => $year,
                'month'      => $month,
                'check_in'  => $check_in,
                'check_out' => $check_out,
                'status'    => $status,
                'created_by'    => $created_by,
            );

            $this->db->insert('attendance', $data);
        }
    }

    $this->session->set_flashdata('success', 'Attendance successfully added!');  
	redirect('/PayrollController/index', 'refresh');

}

public function show_calculation(){
    $conditions=[];
		if($this->input->get()) {
			// print_r($conditions);exit;				
            $conditions['employee_id'] 	 = $this->input->get('employee_id');
			$conditions['month_id'] 	 = $this->input->get('month_id');
            $conditions['year']        = $this->input->get('year'); 
            // print_r($conditions['employee_id']);exit;				
			

			// echo "<pre>";
			// print_r($_GET);
			
			$data['filtered_value']=$conditions;
		    $data['employees']  = $this->Payroll_model->getEmployeesList();
            $data['months'] 	= $this->Payroll_model->getMonths();
            $data['salaries']  = $this->Payroll_model->getSalaryList($conditions);
            // echo "<pre>";print_r($data['salaries']);exit;
            $data['title'] = "Attendance Calculation";

			
            } else {
                

        $data['employees']  = $this->Payroll_model->getEmployeesList();
        $data['months'] 	= $this->Payroll_model->getMonths();
        $data['salaries']  = $this->Payroll_model->getSalaryList();
        // echo "<pre>";print_r($data['months']);exit;
        $data['title'] = "Attendance Calculation";
            }
        $this->template->load('layout/template', 'payroll/attandace_calculation', $data);
}

public function calculate_salary()
{
    $month_id = $this->input->post('month_id');
    $emp_id = $this->input->post('emp_id');
    // echo "<pre>";print_r($_POST);exit;

    if (!empty($month_id) && !empty($emp_id)) {
        $year = date('Y');
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month_id, $year);

        $this->load->model('Payroll_model');

        $attendance = $this->Payroll_model->get_attendance_summary($emp_id, $month_id, $year) ?? [];
        $present_days = isset($attendance['present']) ? $attendance['present'] : 0;
        $absent_days = isset($attendance['absent']) ? $attendance['absent'] : 0;
        $basic_salary = isset($attendance['basic_salary']) ? $attendance['basic_salary'] : 0;
        $salary = isset($attendance['total_net_salary']) ? $attendance['total_net_salary'] : 0;
        $leave = isset($attendance['leave']) ? $attendance['leave'] : 0;
      // ✅ Fetch employee eligibility for PF/ESI
        $employee = $this->db->get_where('employees', ['id' => $emp_id])->row_array();
        $eligible_pf_esi = isset($employee['eligible_esi_pf']) ? $employee['eligible_esi_pf'] : 0;
        
        // Salary per day with 2 decimal places
        $salary_per_day = ($salary > 0 && $total_days > 0)
            ? round($salary / $total_days, 2)
            : 0;

      if ($eligible_pf_esi == 1) {
        $pf_amount_per_day = ($basic_salary * 0.12) / $total_days; // 12% of basic salary
        $pf_amount = round($pf_amount_per_day * $present_days);
        $ecs_amount_per_day = round($salary * 0.0075) / $total_days; // 0.75% of basic salary
        $ecs_amount = round($ecs_amount_per_day * $present_days);
      }else {
            $pf_amount_per_day = 0;
            $pf_amount = 0;
            $ecs_amount_per_day = 0;
            $ecs_amount = 0;
        }

        // Gross salary with 2 decimal places
        
        $total_deductions = round($pf_amount + $ecs_amount);
        // $gross_salary = round($salary_per_day * $present_days);
        $gross_salary = round($salary_per_day * $present_days);
        $net_payble = round($salary_per_day * $present_days) - $total_deductions;
            echo '
          <form id="salaryUpdateForm">
           <input type="hidden" id="basic_salary" name="basic_salary" value="' . $basic_salary . '">
           <input type="hidden" id="ecs_amount_per_day" name="ecs_amount_per_day" value="' . $ecs_amount_per_day . '">
           <input type="hidden" id="pf_amount_per_day" name="pf_amount_per_day" value="' . $pf_amount_per_day . '">
           <input type="hidden" id="salary_per_day" name="salary_per_day" value="' . $salary_per_day . '">

            <div class="px-4 py-2 fw-bold text-dark border-top border-bottom sticky-top bg-gray-100">Salary Calculation</div>
            <div class="form-group">
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="control-label fw-semibold">Total Days in Month: </label>
                    <div class="col-md-12">
                        <input type="text" name="total_days" id="total_days" class="form-control" value="' . $total_days . '" readonly>
                    </div>
                </div>
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">Present Days:</lablel>
                        <div class="col-md-12"><input type="text" class="form-control" value="' . $present_days . '" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="control-label fw-semibold">Absent Days:</label>
                    <div class="col-md-12"><input type="text" id="absent_days" name="absent_days" class="form-control" value="' . $absent_days . '" readonly>
                </div>
            </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col-md-4">
                    <label class="control-label fw-semibold">Employee Salary (₹):</label>
                    <div class="col-md-12"><input type="text" id="total_salary" class="form-control" value="' . $salary . '" readonly></div>
                   
                </div>
                <div class="col-md-4">
                        <label class="control-label fw-semibold"> Gross Salary (₹):</label>
                        <div class="col-md-12"><input type="text" id="gross_salary" name="gross_salary" class="form-control" value="' . $gross_salary . '" readonly></div>
                </div>
                 <div class="col-md-4">
                        <label class="control-label fw-semibold"> Eligible Leaves:</label>
                        <div class="col-md-12"><input type="text" id="eligible_leaves" name="eligible_leaves" class="form-control" value="' . $leave . '" readonly></div>
                    </div>
            </div>
        
                <div class="row form-group mb-3">
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">Payable Days:</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="feather-truck"></i>
                                </div>
                                <input type="number" id="payable_days" name="payable_days" class="form-control" value="' . $present_days . '">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">TDS (%):</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="feather-truck"></i>
                                </div>
                            <input type="text" id="tds" class="form-control" value="0"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <label class="control-label fw-semibold">Provident Fund (PF) (₹):</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="feather-truck"></i>
                                    </div>
                                    <input type="number" id="pf" class="form-control" value="'. $pf_amount . '" readonly>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row form-group mb-3">
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">ECS Deduction (₹):</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="feather-truck"></i>
                                </div>    
                                <input type="number" id="ecs" class="form-control" value="'.$ecs_amount.'" readonly></div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">Other Salary Cuts (₹):</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="feather-truck"></i>
                                </div>    
                                <input type="number" id="other_cuts" class="form-control" value="0"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">Total Deductions (₹):</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="feather-trending-down"></i>
                                     <input type="text" id="total_deductions" class="form-control " value="' . $total_deductions . '" readonly>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <label class="control-label fw-semibold">Net Salary (₹):</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="feather-truck"></i>
                                </div>    
                                <input type="text" id="final_salary" class="form-control" value="' . $net_payble . '" readonly>
                            </div>
                        </div>
                    </div>
                </div>
    
            <div class="row form-group mb-3">
                <div class="col-md-4"></div>
                <div class="col-md-4"><button type="button" id="saveSalary" class="btn btn-primary btn-block">Save Salary</button></div>
            </div>
        </form>';
    } else {
        echo '<p class="text-danger">Please select both Month and Employee.</p>';
    }
}


public function save_salary()
{
    $emp_id = $this->input->post('emp_id');
    $month_id = $this->input->post('month_id');
    $total_days = $this->input->post('total_days');
    $payable_days = $this->input->post('payable_days');
    $absent_days = $this->input->post('absent_days');
    $gross_salary = $this->input->post('gross_salary');
    $tds = $this->input->post('tds');
    $pf = $this->input->post('pf');
    $other_cuts = $this->input->post('other_cuts');
    $ecs = $this->input->post('ecs'); // Get ECS deduction
    $total_salary = $this->input->post('total_salary');

    $data = [
        'emp_id' => $emp_id,
        'month_id' => $month_id,
        'year' => date('Y'),
        'total_days' => $total_days,

        'payable_days' => $payable_days,
        'absent_days' => $absent_days,
        'gross_salary' => $gross_salary,
        'tds' => $tds,
        'pf' => $pf,
        'other_cuts' => $other_cuts,
        'ecs' => $ecs, // Save ECS
        'total_salary' => $total_salary
    ];
    $this->db->insert('salary_table', $data);

    $this->session->set_flashdata('success', 'Salary successfully added!');  
	redirect('/PayrollController/show_calculation', 'refresh');
    exit(); // Force redirection
}

	public function deleteItem($id= null){
  	 	$id = $this->uri->segment('3');
  	 	$result =$this->Payroll_model->deleteItem($id);
  	 	if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Item deleted Successfully !');
            redirect('/PayrollController/show_calculation', 'refresh');
			//$this->fetchSuppliers();
		} else {
			$this->session->set_flashdata('failed', 'Operation Failed!');
            redirect('/PayrollController/show_calculation', 'refresh');
		}
  	}

   public function export()
{
    // 1) Get filters from GET parameters
    $filters = [];
    if ($this->input->get()) {
        $filters['employee_id'] = $this->input->get('employee_id');
        $filters['month_id']    = $this->input->get('month_id');
        $filters['year']        = $this->input->get('year');
    }

    // 2) Get selected IDs if any (for specific records export)
    $idsParam = $this->input->get('ids', true);
    $ids = [];
    if (!empty($idsParam)) {
        // Example: ids=1,3,7
        $ids = array_filter(array_map('trim', explode(',', $idsParam)), 'strlen');
    }

    // 3) Fetch filtered salary data
    $rows = $this->Payroll_model->get_salaryList($filters, $ids);

    // 4) Prepare CSV headers
    $filename = 'salary_' . date('Ymd_His') . '.csv';
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Excel UTF-8 BOM
    echo "\xEF\xBB\xBF";

    $out = fopen('php://output', 'w');

    // 5) CSV column headers
    fputcsv($out, [
        'Sr No',
        'Employee Name',
        'Employee Code',
        'Month',
        'Payable Days',
        'Total Salary',
        
    ]);

    // 6) CSV data rows
    $sr = 1;
   foreach ($rows as $r) {
    // Calculate Cash Salary = total_net_salary - o_allowance
    $totalNet   = (float) ($r->total_net_salary ?? 0);
    $oAllowance = (float) ($r->o_allowance ?? 0);
    $cashSalary = $totalNet - $oAllowance;

    // Combine month + year safely
    $monthYear = trim(($r->month_name ?? '') . ' ' . ($r->year ?? ''));

    fputcsv($out, [
        $sr++,
        $r->emp_name ?? '',
        $r->employee_code ?? '',
        $monthYear,
        $r->payable_days ?? 0,
        number_format($cashSalary, 2), // 👈 Final net salary minus o_allowance
    ]);
}

fclose($out);
exit;
}

}