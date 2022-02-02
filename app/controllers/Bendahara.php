<?php 
class Bendahara extends Controller
{

	public function __construct()
	{
    $this->absenModel = $this->model('Absen_model');
    $this->karyawanModel = $this->model('Karyawan_model');
    $this->lemburModel = $this->model('Lembur_model');
    $this->bendaharaModel = $this->model('Bendahara_model');
    $this->gajiModel = $this->model('Gaji_model');
    date_default_timezone_set('Asia/Jakarta');
	}
	
	//Memanggil halaman login
	public function index () 
	{
		$data = [
            'username' => '',
            'password' => '',
            'passwordError' => ''
        ];

        //Check post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //filter input dari karakter asing
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'passwordError' => ''
            ];

            //Login
            $loggedInBendahara = $this->bendaharaModel->login($data['username'], $data['password']);

            if ($loggedInBendahara) {
                $this->createAdminSession($loggedInBendahara);
            } else {
                $data['passwordError'] = 'Password atau username salah. Coba lagi.';

                $this->view('bendahara/login_bendahara', $data);
            }
            
        }else
        {
        	$data = [
            'username' => '',
            'password' => '',
            'passwordError' => ''
        	];

        	$this->view('bendahara/login_bendahara', $data);
    	}
	}

	//membuat session
	public function createAdminSession($bendahara) 
	{
        $_SESSION['bendahara_id'] = $bendahara->bendahara_id;
        header('location:' . URLROOT . '/Bendahara/sejarah');
    }

    public function logout()
    {
        unset($_SESSION['bendahara_id']);
        header('location:' . URLROOT . '/Bendahara/index');
    }

    //Memanggil halaman sejarah
	public function sejarah()
	{
        $data=[
            'title' => 'Sejarah | Bendahara'
        ];
        $this->view('bendahara/bendahara_header', $data);
		$this->view('bendahara/bendahara_sejarah');
        $this->view('bendahara/bendahara_footer');
	}

    //Memanggil halaman tugas dan fungsi
	public function tugas_fungsi() 
	{
        $data=[
            'title' => 'Tugas dan Fungsi | Bendahara'
        ];
        $this->view('bendahara/bendahara_header', $data);
		$this->view('bendahara/bendahara_tugasfungsi');
        $this->view('bendahara/bendahara_footer');
	}

    //Memanggil halaman kelola gaji
	public function kelola_gaji ()
	{

		$data = [
			'title' => 'Kelola Gaji | Bendahara',
			'data_gaji' => $this->gajiModel->getAllData()
		];
		$this->view('bendahara/bendahara_header', $data);
		$this->view('bendahara/bendahara_kelola_gaji', $data);
		$this->view('bendahara/bendahara_footer');
	}

	//Memanggil halaman edit gaji
	public function edit_gaji ($id)
	{
		$data = [
			'title' => 'Edit Gaji | Bendahara',
			'data_gaji' => $this->gajiModel->getDataByID($id)
		];
		$this->view('bendahara/bendahara_header', $data);
		$this->view('bendahara/bendahara_edit_gaji', $data);
		$this->view('bendahara/bendahara_footer');
	}

	//Fungsi edit gaji
	public function edit_data_gaji ()
	{
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form
        // Sanitize POST data untuk menghilangkan karakter asing
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
            	'gaji_id' => trim($_POST['gaji_id']),
                'nama' => trim($_POST['nama']),
                'NRNP' => trim($_POST['NRNP']),
                'bagian' => trim($_POST['bagian']),
                'jumlah_lembur' => trim($_POST['jumlah_lembur']),
                'total_jam_lembur' => trim($_POST['total_jam_lembur']),
                'bonus' => trim($_POST['bonus']),
                'bulan' => trim($_POST['bulan']),
                'tahun' => trim($_POST['tahun'])
            ];

            //Edit gaji
            if ($this->gajiModel->edit($data)) {
                header('location: ' . URLROOT . '/bendahara/kelola_gaji');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	//Fungsi hapus gaji
	public function hapus_gaji ($id) 
	{
		$this->gajiModel->hapus($id);
		header('location: ' . URLROOT . '/bendahara/kelola_gaji');
	}

    //Memanggil halaman kelola absen
	public function kelola_absen ()
	{
		$data = [
			'title' => 'Lembur dan Absen | Bendahara',
			'karyawan' => $this->karyawanModel->getJumlahData(),
			'jam_datang' => $this->absenModel->getAllJamDatang(date('Y-m-d')),
			'jam_pulang' => $this->absenModel->getAllJamPulang(date('Y-m-d')),
			'absen' => $this->absenModel->getAllAbsenByTanggal(date('Y-m-d')),
			'lembur' => $this->lemburModel->getAllDataByTanggal(date('Y-m-d'))
		];
		$this->view('bendahara/bendahara_header', $data);
		$this->view('bendahara/bendahara_kelola_absen', $data);
		$this->view('bendahara/bendahara_footer');
	}

	//fungsi hapus absen
	public function hapus_absen ($id) 
	{
		$this->absenModel->hapus($id);
		header('location: ' . URLROOT . '/Bendahara/kelola_absen');
	}
}