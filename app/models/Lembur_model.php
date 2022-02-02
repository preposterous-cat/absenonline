<?php

//Model untuk tb_lembur
class Lembur_model
{
	
	private $db;
    public function __construct() 
    {
        $this->db = new Database;
    }

    //Tambah Lembur
    public function tambah_lembur($data) 
    {
        $this->db->query('INSERT INTO tb_lembur (NRNP, nama, alasan, status, tanggal) VALUES(:NRNP, :nama, :alasan, :status, :tanggal)');

        //Ambil Nilai
        $this->db->bind(':NRNP', $data['NRNP']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':alasan', $data['alasan']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':tanggal', $data['tanggal']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Fungsi mengubah status pengajuan lembur
    public function pengubahan_status ($data)
    {
        $this->db->query('UPDATE tb_lembur SET status = :status WHERE lembur_id = :lembur_id AND tanggal = :tanggal');

        $this->db->bind(':lembur_id', $data['lembur_id']);
        $this->db->bind(':tanggal', $data['tanggal']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Mengambil seluruh data lembur berdasarkan tanggal
    public function getAllDataByTanggal($tanggal)
    {
        $this->db->query('SELECT * FROM tb_lembur WHERE DATE(tanggal) = :tanggal ORDER BY lembur_id DESC');

        $this->db->bind(':tanggal', $tanggal);

        $results = $this->db->resultSet();

        return $results;
    }

    //Mengambil seluruh data lembur berdasarkan NRNP
    public function getAllDataByNRNP($NRNP) 
    {
        $this->db->query('SELECT * FROM tb_lembur WHERE NRNP = :NRNP ORDER BY lembur_id DESC');

        $this->db->bind(':NRNP', $NRNP);

        $results = $this->db->resultSet();

        return $results;
    }

    //Mengambil jumlah lembur
    public function getJumlahLembur($NRNP) 
    {
        //Perintah Query
        $this->db->query('SELECT * FROM tb_lembur WHERE NRNP = :NRNP AND status = :status');

        //NRNP disimpan di variabel $NRNP
        $this->db->bind(':NRNP', $NRNP);
        $this->db->bind(':status', 'disetujui');

        $dataAll = $this->db->resultSet();
        $n=0;
        foreach ($dataAll as $data) {
            if (date('m', strtotime($data->tanggal)) == date('m') && date('Y', strtotime($data->tanggal)) == date('Y')) {
                $n = $n + 1;
            }
        }
        return $n;
    }

    //Mengambil status berdasarkan id
    public function getStatusByID($id)
    {
        $this->db->query('SELECT * FROM tb_lembur WHERE lembur_id = :lembur_id');

        $this->db->bind(':lembur_id', $id);

        $row = $this->db->single();
        $status = $row->status;
        return $status;
    }

    //hapus lembur
    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_lembur WHERE lembur_id = :lembur_id');

        $this->db->bind(':lembur_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}