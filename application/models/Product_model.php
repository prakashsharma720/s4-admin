<?php
class Product_model extends MY_Model {

    public function get_all() {
        return $this->db->get('products')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('products', $data);
    }
    function getCategories()
	{
		$result = $this->db->select('id, category_name')->get('categories')->result_array(); 
		// print_r($result);exit;
		$productname = array(); 
		$productname[''] = 'Select Category...'; 
		foreach($result as $r) { 
		    $productname[$r['id']] = $r['category_name']; 
		} 

		return $productname;
	}
    public function update($id, $data) {
        return $this->db->where('id', $id)->update('products', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('products');
    }
    
    public function getProductList() 
	{
		
		$this->db->select('products.*,c.category_name as category_name');
		$this->db->from('products');
        $this->db->join('categories as c','products.category_id=c.id','left');
		$this->db->order_by("products.id", "asc");
		$query = $this->db->get();
		return $query->result_array();

	}
}
