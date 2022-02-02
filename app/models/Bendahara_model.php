<?php


class Bendahara_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    //fungsi login
    public function login($uname, $password) {
        $this->db->query('SELECT * FROM tb_bendahara WHERE username = :uname');

        //simpan nilai
        $this->db->bind(':uname', $uname);

        $row = $this->db->single();
        if (!empty($row)) {
            $password_base = $row->password;

            if ($password_base == $password) {
                return $row;
            } else {
                return false;
            }
        }else{
            return false;
        }         
    }
}