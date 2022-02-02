<?php
use Mpdf\Mpdf;
class Admin extends Controller
{

	public function __construct()
	{
		$this->userModel = $this->model('Users_model');
        $this->absenModel = $this->model('Absen_model');
        $this->karyawanModel = $this->model('Karyawan_model');
        $this->lemburModel = $this->model('Lembur_model');
        $this->adminModel = $this->model('Admin_model');
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
            $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);

            if ($loggedInAdmin) {
                $this->createAdminSession($loggedInAdmin);
            } else {
                $data['passwordError'] = 'Password atau username salah. Coba lagi.';

                $this->view('admin/login_admin', $data);
            }
            
        }else
        {
        	$data = [
            'username' => '',
            'password' => '',
            'passwordError' => ''
        	];

        	$this->view('admin/login_admin', $data);
    	}
	}

	//membuat session
	public function createAdminSession($admin) 
	{
        $_SESSION['admin_id'] = $admin->admin_id;
        header('location:' . URLROOT . '/Admin/sejarah');
    }

  public function logout()
	{
		unset($_SESSION['admin_id']);
        header('location:' . URLROOT . '/Admin/index');
	}

	//menghapus user
	public function hapus_user ($id) 
	{
		$this->userModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_karyawan');
	}

	//Memanggil halaman sejarah
	public function sejarah ()
	{
		$data = [
			'title' => 'Sejarah | Admin'
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/sejarah_admin');
		$this->view('admin/footer_admin');
	}

	//Memanggil halaman tugas dan fungsi
	public function tugas_fungsi ()
	{
		$data = [
			'title' => 'Tugas dan Fungsi | Admin'
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/tugasfungsi_admin');
		$this->view('admin/footer_admin');
	}

	//Memanggil halaman input karyawan
	public function input_karyawan ()
	{
		$data = [
			'title' => 'Input Karyawan | Admin'
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/input_admin');
		$this->view('admin/footer_admin');
	}

	//Fungsi menambah karyawan
	public function input_data_karyawan ()
	{
		$data = [
            'nama' => '',
            'NRNP' => '',
            'gender' => '',
            'agama' => '',
            'bagian' => '',
            'tahun_masuk' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form
        // Sanitize POST data untuk menghilangkan karakter asing
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nama' => trim($_POST['nama']),
                'NRNP' => trim($_POST['NRNP']),
                'gender' => trim($_POST['gender']),
                'agama' => trim($_POST['agama']),
                'bagian' => trim($_POST['bagian']),
                'tahun_masuk' => trim($_POST['tahun_masuk'])
            ];

            //tambah karyawan
            if ($this->karyawanModel->tambah_karyawan($data)) {
                header('location: ' . URLROOT . '/Admin/kelola_karyawan');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	//Memanggil halaman karyawan
	public function kelola_karyawan ()
	{
		$data_karyawan = $this->karyawanModel->getAllData();
		$data_users = $this->userModel->getAllData();

		$data = [
			'title' => 'Kelola Karyawan | Admin',
			'data_karyawan' => $data_karyawan,
			'data_users' => $data_users
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/kelola_karyawan_admin', $data);
		$this->view('admin/footer_admin');
	}

	//Memanggil halaman edit karyawan
	public function edit_karyawan ($NRNP)
	{
		$data_karyawan = $this->karyawanModel->getAllByNRNP($NRNP);

		$data = [
			'title' => 'Edit Karyawan | Admin',
			'data_karyawan' => $data_karyawan
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/edit_karyawan_admin', $data);
		$this->view('admin/footer_admin');
	}

	//Fungsi edit karyawan
	public function edit_data_karyawan ()
	{
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form
        // Sanitize POST data untuk menghilangkan karakter asing
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nama' => trim($_POST['nama']),
                'NRNP' => trim($_POST['NRNP']),
                'gender' => trim($_POST['gender']),
                'agama' => trim($_POST['agama']),
                'bagian' => trim($_POST['bagian']),
                'tahun_masuk' => trim($_POST['tahun_masuk'])
            ];

            //edit karyawan
            if ($this->karyawanModel->edit_karyawan($data)) {
                header('location: ' . URLROOT . '/Admin/kelola_karyawan');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	//Fungsi hapus karyawan
	public function hapus_karyawan ($NRNP) 
	{
		$this->karyawanModel->hapus($NRNP);
		header('location: ' . URLROOT . '/Admin/kelola_karyawan');
	}

	//Memanggil halaman kelola gaji
	public function kelola_gaji ()
	{

		$data = [
			'title' => 'Kelola Gaji | Admin',
			'data_gaji' => $this->gajiModel->getAllData()
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/kelola_gaji_admin', $data);
		$this->view('admin/footer_admin');
	}

	//Memanggil halaman edit gaji
	public function edit_gaji ($id)
	{
		$data = [
			'title' => 'Edit Gaji | Admin',
			'data_gaji' => $this->gajiModel->getDataByID($id)
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/edit_gaji_admin', $data);
		$this->view('admin/footer_admin');
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
                header('location: ' . URLROOT . '/Admin/kelola_gaji');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	//Fungsi hapus gaji
	public function hapus_gaji ($id) 
	{
		$this->gajiModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_gaji');
	}

	//Memanggil halaman kelola absen
	public function kelola_absen ()
	{
		$data = [
			'title' => 'Lembur dan Absen | Admin',
			'karyawan' => $this->karyawanModel->getJumlahData(),
			'jam_datang' => $this->absenModel->getAllJamDatang(date('Y-m-d')),
			'jam_pulang' => $this->absenModel->getAllJamPulang(date('Y-m-d')),
			'absen' => $this->absenModel->getAllAbsenByTanggal(date('Y-m-d')),
			'lembur' => $this->lemburModel->getAllDataByTanggal(date('Y-m-d'))
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/kelola_absen_admin', $data);
		$this->view('admin/footer_admin');
	}

	//fungsi hapus absen
	public function hapus_absen ($id) 
	{
		$this->absenModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_absen');
	}

	//fungsi menyetujui lembur
	public function setuju_lembur ($NRNP, $id)
	{
		 if ($this->lemburModel->getStatusByID($id) != 'menunggu') {
        	header('location: ' . URLROOT . '/Admin/kelola_absen');
        } else
        {
			$data= [
				'NRNP' => $NRNP,
				'lembur_id' => $id,
				'status' => 'disetujui',
				'tanggal' => date('Y-m-d')
			];

			if ($this->lemburModel->pengubahan_status($data)) 
			{
				$gaji = [
	            'NRNP' => $data['NRNP'],
	            'nama' => $this->karyawanModel->getNamaByNRNP($data['NRNP']),
	            'bagian' => $this->karyawanModel->getBagianByNRNP($data['NRNP']),
	            'jumlah_lembur' => $this->lemburModel->getJumlahLembur($data['NRNP']),
	            'total_jam_lembur' => $this->lemburModel->getJumlahLembur($data['NRNP']) * 5,
	            'bonus' => $this->lemburModel->getJumlahLembur($data['NRNP']) * 100000,
	            'bulan' => date('m'),
	            'tahun' => date('Y')
	        ];
	        
				if ($this->gajiModel->getBulanTahunByNRNP($NRNP, date('m'), date('Y')) == null) {
					$this->gajiModel->tambah_gaji_pertama($gaji);
				} 
				 else
				{
					$this->gajiModel->tambah_gaji($gaji);
				}
				header('location: ' . URLROOT . '/Admin/kelola_absen');
			}else
			{
				die('ada yang salah.');
			}
		}		
	}

	//Fungsi tidak menyetujui lembur
	public function tidak_setuju_lembur ($NRNP, $id)
	{
		if ($this->lemburModel->getStatusByID($id) != 'menunggu') {
        	header('location: ' . URLROOT . '/Admin/kelola_absen');
        } else
        {
			$data= [
				'lembur_id' => $id,
				'NRNP' => $NRNP,
				'status' => 'tidak disetujui',
				'tanggal' => date('Y-m-d')
			];

			if ($this->lemburModel->pengubahan_status($data)) 
			{
				header('location: ' . URLROOT . '/Admin/kelola_absen');
			}else
			{
				die('ada yang salah.');
			}
		}
	}

	//Memanggil halaman cetak laporan
	public function laporan()
	{
		$data=[
			'title' => 'Laporan | Admin',
		];
		$this->view('admin/header_admin', $data);
		$this->view('admin/cetak_laporan');
		$this->view('admin/footer_admin');
	}

	//fungsi cetak laporan karyawan
	public function cetak_laporan_karyawan() 
	{	
		$data = [
			'karyawan' => $this->karyawanModel->getAllData()
		];
		ob_start();
		$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

		//Template laporan dalam bentuk HTML
	 	$header = '
	 	<div>
		 	<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
		 	<div class="text-header">
		 		<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
		 		<br/>
		 		<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
		 		<br/>
		 		<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
		 		<br/>
		 		<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
		 		<br/>
		 		<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
		 	<div>
	 	</div>
	 	<br/>
	 	<div class="baris"></div>
	 	<br/>
	 	';
	 	$no=1;
	 	$body = '
	 		<h3 class="content-head">Data Karyawan</h3>
	 		<table id="table-id" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
                  	  <td><b>No</b></td>
                      <td><b>NRNP</b></td>
                      <td><b>Nama</b></td>
                      <td><b>Jenis Kelamin</b></td>
                      <td><b>Agama</b></td>
                      <td><b>Bagian</b></td>
                      <td><b>Tahun Masuk</b></td>
                    </tr>
                    ';
        $temp = '';
        
        foreach ($data['karyawan'] as $datas) {
                    	$temp = $temp . '
                    <tr>
                      <td>'.$no++.'</td>
                      <td>'.$datas->NRNP.'</td>
                      <td>'.$datas->nama.'</td>
                      <td>'.$datas->gender.'</td>
                      <td>'.$datas->agama.'</td>
                      <td>'.$datas->bagian.'</td>
                      <td>'.$datas->tahun_masuk.'</td>
                    </tr>
                    ';
                   }            
        $body = $body . $temp . '</tbody></table>';          
	 	$mpdf = new Mpdf();
	 	$mpdf->setAutoTopMargin = 'stretch'; 
	 	$mpdf->setAutoBottomMargin = 'stretch';
	 	$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
	 	$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
		ob_end_clean();
		$mpdf->Output('Laporan_Karyawan.pdf', 'D');
	}

	//fungsi cetak laporan absen
	public function cetak_laporan_absen () {
		$data = [
			'absen' => $this->absenModel->getAllAbsenBulanIni(date('m'))
		];
		ob_start();
		$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

	 	$header = '
	 	<div>
		 	<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
		 	<div class="text-header">
		 		<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
		 		<br/>
		 		<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
		 		<br/>
		 		<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
		 		<br/>
		 		<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
		 		<br/>
		 		<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
		 	<div>
	 	</div>
	 	<br/>
	 	<div class="baris"></div>
	 	<br/>
	 	';
	 	
	 	$body = '
	 		<h3 class="content-head">Data Absen | Bulan '.$this->convert_bulan(date('m')).' Tahun '.date('Y').' </h3>
	 		<table id="table-id" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
              		  <td><b>No</b></td>
                      <td><b>NRNP</b></td>
                      <td><b>Nama</b></td>
                      <td><b>Bagian</b></td>
                      <td><b>Jam Datang</b></td>
                      <td><b>Jam Pulang</b></td>
                      <td><b>Tanggal</b></td>
                    </tr>
                    ';
        $temp = '';
        $no=1;
        foreach ($data['absen'] as $datas) {
                    	$temp = $temp . '
                    <tr>
                      <td>'.$no++.'</td>
                      <td>'.$datas->NRNP.'</td>
                      <td>'.$datas->nama.'</td>
                      <td>'.$datas->bagian.'</td>
                      <td>'.$datas->jam_datang.'</td>
                      <td>'.$datas->jam_pulang.'</td>
                      <td>'.date('d-m-Y', strtotime($datas->tanggal)).'</td>
                    </tr>
                    ';
                   }            
        $body = $body . $temp . '</tbody></table>';          
	 	$mpdf = new Mpdf();
	 	$mpdf->setAutoTopMargin = 'stretch'; 
	 	$mpdf->setAutoBottomMargin = 'stretch';
	 	$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
	 	$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
		ob_end_clean();
		$mpdf->Output('Laporan_Absen.pdf', 'D');
	}

	//fungsi cetak laporan lembur
	public function cetak_laporan_lembur () {
		$data = [
			'lembur' => $this->gajiModel->getDataByBulanTahun(date('m'), date('Y'))
		];
		ob_start();
		$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

	 	$header = '
	 	<div>
		 	<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
		 	<div class="text-header">
		 		<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
		 		<br/>
		 		<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
		 		<br/>
		 		<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
		 		<br/>
		 		<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
		 		<br/>
		 		<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
		 	<div>
	 	</div>
	 	<br/>
	 	<div class="baris"></div>
	 	<br/>
	 	';
	 	
	 	$body = '
	 		<h3 class="content-head">Data Lembur | Bulan '.$this->convert_bulan(date('m')).' Tahun '.date('Y').' </h3>
	 		<table id="table-id" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
              		  <td><b>No</b></td>
                      <td><b>NRNP</b></td>
                      <td><b>Nama</b></td>
                      <td><b>Bagian</b></td>
                      <td><b>Jumlah Lembur</b></td>
                      <td><b>Total Jam Lembur</b></td>
                      <td><b>Bonus</b></td>
                    </tr>
                    ';
        $temp = '';
        $no=1;
        foreach ($data['lembur'] as $datas) {
                    	$temp = $temp . '
                    <tr>
                      <td>'.$no++.'</td>
                      <td>'.$datas->NRNP.'</td>
                      <td>'.$datas->nama.'</td>
                      <td>'.$datas->bagian.'</td>
                      <td>'.$datas->jumlah_lembur.' Hari'.'</td>
                      <td>'.$datas->total_jam_lembur.' Jam'.'</td>
                      <td>'.$datas->bonus.'</td>
                    </tr>
                    ';
                   }            
        $body = $body . $temp . '</tbody></table>';          
	 	$mpdf = new Mpdf();
	 	$mpdf->setAutoTopMargin = 'stretch'; 
	 	$mpdf->setAutoBottomMargin = 'stretch';
	 	$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
	 	$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
		ob_end_clean();
		$mpdf->Output('Laporan_Lembur.pdf', 'D');
	}

	//fungsi konversi penamaan bulan menjadi bahasa indonesia
	public function convert_bulan($bulan)
  {
    switch ($bulan){
     case 1:
      return "Januari";
      break;
     case 2:
      return "Februari";
      break;
     case 3:
      return "Maret";
      break;
     case 4:
      return "April";
      break;
     case 5:
      return "Mei";
      break;
     case 6:
      return "Juni";
      break;
     case 7:
      return "Juli";
      break;
     case 8:
      return "Agustus";
      break;
     case 9:
      return "September";
      break;
     case 10:
      return "Oktober";
      break;
     case 11:
      return "November";
      break;
     case 12:
      return "Desember";
      break;
    }
  }
}