<?php

//Model untuk tb_absen
class Absen_model
{
	
	private $db;
    public function __construct() 
    {
        $this->db = new Database;
    }

    //Mengambil jam datang berdasarkan NRNP dan tanggal
    public function getJamDatang($NRNP, $time)
    {
        $this->db->query('SELECT * FROM tb_absen WHERE NRNP = :NRNP AND tanggal = :tanggal');

        $this->db->bind(':NRNP', $NRNP);
        $this->db->bind(':tanggal', $time);

        $row = $this->db->single();
        if (!empty($row)) {
            $jam_datang = $row->jam_datang;
            return $jam_datang;
        }else{
            return null;
        }
    }

    //Mengambil Absen berdasarkan NRNP
    public function getAbsenByNRNP($NRNP)
    {
        $this->db->query('SELECT * FROM tb_absen WHERE NRNP = :NRNP ORDER BY MONTH(tanggal) ASC');

        $this->db->bind(':NRNP', $NRNP);

        $results = $this->db->resultSet();
        return $results;
    }

    //Mengambil jam pulang berdasarkan NRNP dan tanggal
    public function getJamPulang($NRNP, $time)
    {
        $this->db->query('SELECT * FROM tb_absen WHERE NRNP = :NRNP AND tanggal = :tanggal');

        $this->db->bind(':NRNP', $NRNP);
        $this->db->bind(':tanggal', $time);

        $row = $this->db->single();
        if (!empty($row)) {
            $jam_pulang = $row->jam_pulang;
            return $jam_pulang;
        }else{
            return null;
        }
    }

    //Menambah jam datang
    public function tambah_jam_datang ($data) 
    {
        $this->db->query('INSERT INTO tb_absen (NRNP, nama, bagian, jam_datang, jam_pulang, tanggal) VALUES(:NRNP, :nama, :bagian, :jam_datang, :jam_pulang, :tanggal)');

        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':bagian', $data['bagian']);
        $this->db->bind(':jam_datang', $data['jam_datang']);
        $this->db->bind(':jam_pulang', $data['jam_pulang']);
        $this->db->bind(':tanggal', $data['tanggal']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Menambah jam pulang
    public function tambah_jam_pulang ($data)
    {
        $this->db->query('UPDATE tb_absen SET jam_pulang = :jam_pulang WHERE NRNP = :NRNP');

        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':jam_pulang', $data['jam_pulang']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //hapus absen
    public function hapus($id) 
    {
        $this->db->query('DELETE FROM tb_absen WHERE absen_id = :absen_id');

        $this->db->bind(':absen_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Mengambil semua data absen
    public function getAllAbsen()
    {
        $this->db->query('SELECT * FROM tb_absen ORDER BY absen_id DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    //Mengambil data absen berdasarkan tanggal
    public function getAllAbsenByTanggal($tanggal)
    {
        $this->db->query('SELECT * FROM tb_absen WHERE tanggal = :tanggal ORDER BY absen_id DESC');

        $this->db->bind(':tanggal', $tanggal);

        $results = $this->db->resultSet();

        return $results;
    }

    //Mengambil data absen bulan ini
    public function getAllAbsenBulanIni($bulan)
    {
        $this->db->query('SELECT * FROM tb_absen WHERE MONTH(tanggal) = :bulan ORDER BY absen_id DESC');

        $this->db->bind(':bulan', $bulan);

        $results = $this->db->resultSet();

        return $results;
    }

    //mengambil seluruh jam datang berdasarkan tanggal
    public function getAllJamDatang($tanggal)
    {
        $this->db->query('SELECT jam_datang FROM tb_absen WHERE tanggal = :tanggal');

        $this->db->bind(':tanggal', $tanggal);

        $jumlah = $this->db->rowCount();

        return $jumlah;
    }

    //mengambil seluruh jam pulang berdasarkan tanggal
    public function getAllJamPulang($tanggal)
    {
        $this->db->query('SELECT jam_pulang FROM tb_absen WHERE tanggal = :tanggal AND jam_pulang IS NOT NULL');

        $this->db->bind(':tanggal', $tanggal);
        
        $rowCount=$this->db->rowCount();
        
        return $rowCount;
    }
}