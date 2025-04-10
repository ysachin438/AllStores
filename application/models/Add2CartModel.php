<?php
class Add2CartModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addItemToCart($data)
    {
        $result = $this->db->insert('carts', $data);
        return $result;
    }

    public function getCartItemsById($id)
    {
        $this->db->select('carts.*, products.name, products.price, products.desc');
        $this->db->from('carts');
        $this->db->join('products', 'products.pid = carts.pid');
        $this->db->where('uid', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    // public function deleteCartItem($uid, $pid){
    //     $this->db->from('cart');
    //     $this->db->where('uid', $uid);
    //     $this->db->where('pid', $pid);
    //     return $this->db->delete('cart');
    // }

    //ALTERNATE APPROACH
    public function deleteCartItem($uid, $pid)
    {
        return $this->db->delete('carts', array('uid'=>$uid, 'pid'=> $pid));
    }

    public function getAllUserCart()
    {
        $query = 'users.uid, users.fname, users.phone, users.email, ANY_VALUE(carts.created_at) as created_at, COUNT(*) as total_items';
        $this->db->select($query);
        $this->db->from('carts');
        $this->db->join('users','users.uid = carts.uid');
        $this->db->group_by('uid');
        return $this->db->get()->result_array();
    }

    public function totalCartItems($user_id){
        $this->db->where('uid',$user_id);
        return $this->db->count_all_results() ?? NULL;
    }
}
