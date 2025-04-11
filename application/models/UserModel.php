<?php
class UserModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $config = array(
            'cipher' => 'aes-256',
            'mode'   => 'cbc',
            'key'    =>  hex2bin('7a4e0aabd6bd2d6b38a0c51245854576b9289fbbf20992eeafd7d778f0fafc2ae0a0954f2f7143dfd098db7f003c3c06cfd3b00fb9140f506f5c4ce1195fdb55'), // 256 bits
            'iv'     => '1234567890123456' // 16 bytes for AES-256
        );
        $this->encryption->initialize($config);
    }

    public function getAllUsers()
    {
        $this->db->select('*');
        $result = $this->db->get('users');
        return $result->result_array() ?? NULL;
    }
    public function getUserById($id)
    {
        $this->db->select('*');
        $this->db->where('uid', $id);
        $result = $this->db->get('users');
        return $result->row() ?? NULL;
    }
    public function getUserByUsername($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $result = $this->db->get('users');
        return $result->row() ?? NULL;
    }
    public function getUserByEmail($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $result = $this->db->get('users');
        return $result->row() ?? NULL;
    }

    public function getUserByPhone($phone)
    {
        $this->db->select('*');
        $this->db->where('phone', $phone);
        $result = $this->db->get('users');
        return $result->row() ?? NULL;
    }

    public function addUser($data)
    {;
        $result = $this->db->insert('users', $data);
        return $result;
    }

    public function updateUserById($id, $data)
    {
        $condition = 'uid = ' . $id;
        return $this->db->update('users', $data, $condition);
    }

    public function deleteUserById($id)
    {
        $this->db->where('uid', $id);
        return $this->db->delete('users');
    }

    public function matchUser($id, $password)
    {
        $this->db->select('e_key');
        $this->db->from('users');
        $this->db->where('uid', $id);
        $result = $this->db->get();

        if ($password == $this->encryption->decrypt(($result->row())->e_key)) {
            return true;
        } else {
            return false;
        }
    }

    public function countTotalUsers(){
        return $this->db->count_all('users') ?? NULL;
    }
    public function countNewUsers($date){
        $this->db->where('created_at >=', $date);
        $res= $this->db->get('users');
        return $res->num_rows();
    }
}
