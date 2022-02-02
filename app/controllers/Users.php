<?php

class Users extends Controller
{
	public function __construct()
	{
		$this->userModel = $this->model('Users_model');
        $this->absenModel = $this->model('Absen_model');
        $this->karyawanModel = $this->model('Karyawan_model');
        $this->lemburModel = $this->model('Lembur_model');
        $this->gajiModel = $this->model('Gaji_model');
        date_default_timezone_set('Asia/Jakarta');
	}

    //Memanggil halaman login
	public function index()
	{
		$data = [
            'NRNP' => '',
            'password' => '',
            'passwordError' => ''
        ];

        //Check post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //filter input dari karakter asing
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'NRNP' => trim($_POST['NRNP']),
                'password' => trim($_POST['password']),
                'passwordError' => ''
            ];

            //Login
            $loggedInUser = $this->userModel->login($data['NRNP'], $data['password']);

            if ($loggedInUser) {
                $this->createUserSession($loggedInUser);
            } else {
                $data['passwordError'] = 'Password atau username salah. Coba lagi.';

                $this->view('pegawai/login_page', $data);
            }
            
        }else
        {
        	$data = [
            'NRNP' => '',
            'password' => '',
            'passwordError' => ''
        	];

        	$this->view('pegawai/login_page', $data);
    	}
	}

    //membuat session
	public function createUserSession($user) 
	{
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['NRNP'] = $user->NRNP;
        $_SESSION['nama'] = $user->nama;
        header('location:' . URLROOT . '/Users/sejarah');
    }

    //Memanggil halaman register
	public function register()
	{
		$data = [
            'NRNP' => '',
            'nama' => '',
            'password' => '',
            'confirmPassword' => '',
            'NRNPError' => '',
            'confirmPassError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form
        // Sanitize POST data untuk menghilangkan karakter asing
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'NRNP' => trim($_POST['NRNP']),
                'nama' => trim($_POST['nama']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'NRNPError' => '',
                'confirmPassError' => ''
            ];

            //Validasi NRNP
            if ($this->userModel->findUserByNRNP($data['NRNP'])) 
            {
                $data['NRNPError'] = 'NRNP sudah terdaftar!';
			}elseif ($this->karyawanModel->findNRNP($data['NRNP']) == false) {
                $data['NRNPError'] = 'NRNP tidak ada di daftar karyawan!';
            }

            //Validasi confirm password
                if ($data['password'] != $data['confirmPassword']) {
                	$data['confirmPassError'] = 'Passwords Tidak Sama, Coba Lagi.';
                }

           	 	// Jika Error Kosong
            	if (empty($data['NRNPError']) && empty($data['confirmPassError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register users
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/Users/index');
                } else {
                    die('Ada yang salah.');
                }
            }
        }
        $this->view('pegawai/register_page', $data);
	}

	public function logout()
	{
		unset($_SESSION['user_id']);
        unset($_SESSION['NRNP']);
        unset($_SESSION['nama']);
        header('location:' . URLROOT . '/Users/index');
	}

    //Fungsi absen datang
    public function absen_datang () 
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'NRNP' => $_SESSION['NRNP'],
            'nama' => $_SESSION['nama'],
            'bagian' => $this->karyawanModel->getBagianByNRNP($_SESSION['NRNP']),
            'jam_datang' => date('H:i:s'),
            'tanggal' => date('Y-m-d')
        ];

        //validasi absen datang
        if ($this->absenModel->getJamDatang($data['NRNP'], $data['tanggal']) != null) 
        {
            header('location:' . URLROOT . '/Users/absen');
        }else 
        {
            //Simpan jam datang
            if ($this->absenModel->tambah_jam_datang($data)) 
            {
                header('location:' . URLROOT . '/Users/absen');
            } else
            {
                header('location:' . URLROOT . '/Users/absen');
            }
        }

    }

    //fungsi absen pulang
    public function absen_pulang () 
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'NRNP' => $_SESSION['NRNP'],
            'jam_pulang' => date('H:i:s')
        ];

        if ($this->absenModel->getJamPulang($data['NRNP'], date('Y-m-d')) != null && $this->absenModel->getJamDatang($data['NRNP'], date('Y-m-d')) == null) 
        {
            header('location:' . URLROOT . '/Users/absen');
        }else 
        {
            //Simpan jam pulang
            if ($this->absenModel->tambah_jam_pulang($data)) {
                header('location:' . URLROOT . '/Users/absen');
            } else
            {
                header('location:' . URLROOT . '/Users/absen');
            }
        }

    }

    //Memanggil halaman absen
	public function absen()
	{
        $data = [
            'title' => 'Absen | Absensi Pegawai',
            'jam_datang' => $this->absenModel->getJamDatang($_SESSION['NRNP'], date('Y-m-d')),
            'jam_pulang' => $this->absenModel->getJamPulang($_SESSION['NRNP'], date('Y-m-d'))
        ];
        $this->view('pegawai/header_page', $data);
		$this->view('pegawai/absen_page', $data);
        $this->view('pegawai/footer_page');
	}

    //Memanggil halaman sejarah
	public function sejarah()
	{
        $data=[
            'title' => 'Sejarah | Absensi Pegawai'
        ];
        $this->view('pegawai/header_page', $data);
		$this->view('pegawai/sejarah_page');
        $this->view('pegawai/footer_page');
	}

    //Memanggil halaman tugas dan fungsi
	public function tugas_fungsi() 
	{
        $data=[
            'title' => 'Tugas dan Fungsi | Absensi Pegawai'
        ];
        $this->view('pegawai/header_page', $data);
		$this->view('pegawai/tugasfungsi_page');
        $this->view('pegawai/footer_page');
	}

    //Memanggil halaman pengajuan lembur
	public function pengajuan_lembur() 
	{
        $data_lembur = $this->lemburModel->getAllDataByNRNP($_SESSION['NRNP']);

        $data = [
            'title' => 'Pengajuan Lembur | Absensi Pegawai',
            'data_lembur' => $data_lembur
        ];
        $this->view('pegawai/header_page', $data);
		$this->view('pegawai/pengajuan_lembur_page', $data);
        $this->view('pegawai/footer_page');
	}

    //fungsi ajukan lembur
    public function ajukan_lembur()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'NRNP' => '',
            'nama' => '',
            'alasan' => '',
            'status' => '',
            'tanggal' => ''
        ];


      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form
        // Sanitize POST data untuk menghilangkan karakter asing
        //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'NRNP' => trim($_POST['NRNP']),
                'nama' => trim($_POST['nama']),
                'alasan' => $_POST['alasan'],
                'status' => 'menunggu',
                'tanggal' => date('Y-m-d H:i:s')
            ];

                if ($this->lemburModel->tambah_lembur($data)) {
                    header('location: ' . URLROOT . '/Users/pengajuan_lembur');
                } else {
                    die('Ada yang salah.');
                }
        }
    }

    public function hapus_lembur ($id) 
    {
        $this->lemburModel->hapus($id);
        header('location: ' . URLROOT . '/Users/pengajuan_lembur');
    }

    public function absen_gaji()
    {
        $data = [
			'title' => 'Absen dan Gaji | Absensi Pegawai',
			'absen' => $this->absenModel->getAbsenByNRNP($_SESSION['NRNP']),
			'gaji' => $this->gajiModel->getDataByNRNP($_SESSION['NRNP'])
		];
        $this->view('pegawai/header_page', $data);
		$this->view('pegawai/absen_gaji_page', $data);
		$this->view('pegawai/footer_page');
    }
}