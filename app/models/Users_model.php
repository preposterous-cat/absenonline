<?php


class Users_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    //Fungsi register
    public function register($data) 
    {
        $this->db->query('INSERT INTO tb_users (NRNP, nama, password) VALUES(:NRNP, :nama, :password)');

        //Ambil Nilai
        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':password', $data['password']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //fungsi login
    public function login($NRNP, $password) {
        $this->db->query('SELECT * FROM tb_users WHERE NRNP = :NRNP');

        //simpan nilai
        $this->db->bind(':NRNP', $NRNP);

        $row = $this->db->single();
        if (!empty($row)) {
            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }else{
            return false;
        }        
    }

    //Mencari User berdasarkan NRNP
    public function findUserByNRNP($NRNP) 
    {
        //Perintah Query
        $this->db->query('SELECT * FROM tb_users WHERE NRNP = :NRNP');

        //NRNP disimpan di variabel $NRNP
        $this->db->bind(':NRNP', $NRNP);

        //Cek NRNP sudah digunakan atau belum
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Mengambil seluruh data user
    public function getAllData()
    {
        $this->db->query('SELECT * FROM tb_users ORDER BY user_id DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    //hapus user
    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_users WHERE user_id = :user_id');

        $this->db->bind(':user_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}