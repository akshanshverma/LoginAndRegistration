<?php
class Database extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function login($data)
    {
        $check = "email = '" . $data['email'] . "'and password = " . $data['password'];
        // $qr = $this->db->query("select * from user where $check");

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($check);
        $this->db->limit(1);
        $query = $this->db->get();
        if (!(is_bool($query))) {
            if ($query->num_rows() === 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function userInformation($email)
    {

        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
// $data = array('username' => 'akku',
//         'email' => 'dsvhbaj',
//         'mobile' => '6574951',
//         'password' => 'ncjdkebf'); 
// Database::login($data);
?>