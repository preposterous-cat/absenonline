<?php

//Model untuk tb_gaji
class Gaji_model
{
	
	private $db;
    public function __construct() 
    {
        $this->db = new Database;
    }

    //Tambah gaji untuk pertama kali lembur
    public function tambah_gaji_pertama($data)
    {
        $this->db->query('INSERT INTO tb_gaji (NRNP, nama, bagian, jumlah_lembur, total_jam_lembur, bonus, bulan, tahun) VALUES(:NRNP, :nama, :bagian, :jumlah_lembur, :total_jam_lembur, :bonus, :bulan, :tahun)');

        //Ambil Nilai
        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':bagian', $data['bagian']);
        $this->db->bind(':jumlah_lembur', $data['jumlah_lembur']);
        $this->db->bind(':total_jam_lembur', $data['total_jam_lembur']);
        $this->db->bind(':bonus', $data['bonus']);
        $this->db->bind(':bulan', $data['bulan']);
        $this->db->bind(':tahun', $data['tahun']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //tambah gaji untuk lembur yang kesekian
    public function tambah_gaji ($data) 
    {
        $this->db->query('UPDATE tb_gaji SET jumlah_lembur = :jumlah_lembur, total_jam_lembur = :total_jam_lembur, bonus = :bonus  WHERE NRNP = :NRNP AND bulan = :bulan AND tahun = :tahun');

        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':bulan', $data['bulan']);
        $this->db->bind(':tahun', $data['tahun']);
        $this->db->bind(':jumlah_lembur', $data['jumlah_lembur']);
        $this->db->bind(':total_jam_lembur', $data['total_jam_lembur']);
        $this->db->bind(':bonus', $data['bonus']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    //Mengambil semua data gaji
    public function getAllData()
    {
        $this->db->query('SELECT * FROM tb_gaji ORDER BY gaji_id DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    //Mengambil data gaji berdasarkan id
    public function getDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_gaji WHERE gaji_id = :gaji_id');

        $this->db->bind(':gaji_id', $id);

        $row = $this->db->single();

        return $row;
    }

    //mengambil data gaji berdasarkan NRNP
    public function getDataByNRNP($NRNP)
    {
        $this->db->query('SELECT * FROM tb_gaji WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $NRNP);

        $results = $this->db->resultSet();

        return $results;
    }

    //mengambil data gaji berdasarkan bulan, tahun, dan NRNP
    public function getBulanTahunByNRNP($NRNP, $bulan, $tahun)
    {
        $this->db->query('SELECT * FROM tb_gaji WHERE NRNP = :NRNP AND bulan = :bulan AND tahun = :tahun');

        $this->db->bind(':NRNP', $NRNP);
        $this->db->bind(':bulan', $bulan);
        $this->db->bind(':tahun', $tahun);

        $row = $this->db->single();
        return $row;
    }

    //mengambil data gaji berdasarkan bulan dan tahun
    public function getDataByBulanTahun($bulan, $tahun)
    {
        $this->db->query('SELECT * FROM tb_gaji WHERE bulan = :bulan AND tahun = :tahun');

        $this->db->bind(':bulan', $bulan);
        $this->db->bind(':tahun', $tahun);

        $results = $this->db->resultSet();
        return $results;
    }

    //Mengedit gaji
    public function edit ($data) 
    {
        $this->db->query('UPDATE tb_gaji SET NRNP = :NRNP, nama = :nama, bagian = :bagian, jumlah_lembur = :jumlah_lembur, total_jam_lembur = :total_jam_lembur, bonus = :bonus, bulan = :bulan, tahun = :tahun WHERE gaji_id = :gaji_id');

        $this->db->bind(':gaji_id', $data['gaji_id']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':bagian', $data['bagian']);
        $this->db->bind(':jumlah_lembur', $data['jumlah_lembur']);
        $this->db->bind(':total_jam_lembur', $data['total_jam_lembur']);
        $this->db->bind(':bonus', $data['bonus']);
        $this->db->bind(':bulan', $data['bulan']);
        $this->db->bind(':tahun', $data['tahun']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    //Hapus gaji
    public function hapus($id) 
    {
        $this->db->query('DELETE FROM tb_gaji WHERE gaji_id = :gaji_id');

        $this->db->bind(':gaji_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}