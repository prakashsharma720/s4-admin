<?php
class To_do_model extends CI_Model {

    public function get_all() {
        $this->db->select('t.*, e.name as employee_name');
        $this->db->from('to_do_activities t');
        $this->db->join('employees e', 'e.id = t.assigned_to', 'left');
        $this->db->order_by('t.id', 'DESC');
        return $this->db->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('to_do_activities', $data);
    }

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('to_do_activities', ['status' => $status]);
    }

    public function update_status_feedback($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('to_do_activities', $data);
    }

    public function get_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('to_do_activities')->row();
    }

    public function update_feedback($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('to_do_activities', $data);
    }

    public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('to_do_activities');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
}