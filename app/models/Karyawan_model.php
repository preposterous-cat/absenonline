<?php

//Model untuk tb_karyawan
class Karyawan_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    //Mengambil bagian berdasarkan NRNP
    public function getBagianByNRNP($NRNP)
    {
        $this->db->query('SELECT * FROM tb_karyawan WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $NRNP);

        $row = $this->db->single();
        $bagian = $row->bagian;

        return $bagian; 
    }

    //Mengecek NRNP
    public function findNRNP($NRNP)
    {
        $this->db->query('SELECT * FROM tb_karyawan WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $NRNP);

        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        } 
    }

    //Mengambil nama berdasarkan NRNP
    public function getNamaByNRNP($NRNP)
    {
        $this->db->query('SELECT * FROM tb_karyawan WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $NRNP);

        $row = $this->db->single();
        $nama = $row->nama;

        return $nama; 
    }

    //Mengambil seluruh data berdasarkan NRNP
    public function getAllByNRNP($NRNP)
    {
        $this->db->query('SELECT * FROM tb_karyawan WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $NRNP);

        $row = $this->db->single();

        return $row; 
    }

    //Mengambil seluruh data karyawan
    public function getAllData()
    {
        $this->db->query('SELECT * FROM tb_karyawan ORDER BY nama ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    //Menambah karyawan
    public function tambah_karyawan ($data)
    {
        $this->db->query('INSERT INTO tb_karyawan (nama, NRNP, gender, agama, bagian, tahun_masuk) VALUES(:nama, :NRNP, :gender, :agama, :bagian, :tahun_masuk)');

        //Ambil Nilai
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':agama', $data['agama']);
        $this->db->bind(':bagian', $data['bagian']);
        $this->db->bind(':tahun_masuk', $data['tahun_masuk']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Edit karyawan
    public function edit_karyawan($data)
    {
        $this->db->query('UPDATE tb_karyawan SET nama = :nama, NRNP = :NRNP, gender = :gender, agama = :agama, bagian = :bagian, tahun_masuk = :tahun_masuk WHERE NRNP = :NRNP');

        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':agama', $data['agama']);
        $this->db->bind(':bagian', $data['bagian']);
        $this->db->bind(':tahun_masuk', $data['tahun_masuk']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    //Hapus karyawan
    public function hapus($NRNP)
    {
        $this->db->query('DELETE FROM tb_karyawan WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $NRNP);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Mengambil jumlah data
    public function getJumlahData()
    {
        $this->db->query('SELECT * FROM tb_karyawan');

        $count = $this->db->rowCount();

        return $count;
    }

}