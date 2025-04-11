<?php
class ProductModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts()
    {
        $result = $this->db->get('products');
        return $result->result_array();
    }

    public function additem($data)
    {
        $result = $this->db->insert('products', $data);
        return $result;
    }

    public function getItemById($id)
    {
        $this->db->where('pid', $id);
        $result = $this->db->get('products');
        return $result->row_array();
    }

    public function updateItem($id, $data)
    {
        $condition = 'pid = ' . $id;
        return $this->db->update('products', $data, $condition);
    }
    
    public function deleteItemById($id)
    {
        $this->db->where('pid', $id);
        return $this->db->delete('products');
    }

    public function countTotalItems(){
        return $this->db->count_all('products') ?? NULL;
    }
    public function countNewItems($date){
        $this->db->where('created_at >=', $date);
        return $this->db->get('products')->num_rows() ?? NULL;
    }
}
