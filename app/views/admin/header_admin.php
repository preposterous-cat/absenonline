<?php 
  if (!isset($_SESSION['admin_id'])) {
    header('location:' . URLROOT . '/Admin/index');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard page">
    <title><?php echo $data['title'] ?></title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    
    <!-- DataTables CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css"/>

    
    <!-- Custom CSS -->
    <link href="<?php echo URLROOT . '/public/css/style_admin.css' ?>" rel="stylesheet">
  </head>
  <body class="h-100">   
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold text-admin fs-5"
          href="<?php echo URLROOT; ?>"
          >Halaman Admin</a
        >
      </div>
    </nav>
    <!-- top navigation bar -->
    
    <!-- SideBar -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-white shadow"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-light px-3">
          <h3 class="my-3 ms-3"> Admin </h3>
          <hr>
          <ul class="navbar-nav">
            <li>
              <div class="text-dark small fw-bold text-uppercase px-3">
                About
              </div>
            </li>
            <li>
              <a href="<?php echo URLROOT . '/Admin/sejarah' ?>" class="nav-link px-3 <?php if($data['title'] == 'Sejarah | Admin') echo 'active' ?>">
                <span class="me-2"><i class="bi bi-book"></i></span>
                <span>Sejarah</span>
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT . '/Admin/tugas_fungsi' ?>" class="nav-link px-3  <?php if($data['title'] == 'Tugas dan Fungsi | Admin') echo 'active' ?>">
                <span class="me-2"><i class="bi bi-list-task"></i></span>
                <span>Tugas dan Fungsi</span>
              </a>
            </li>
            <hr>
            <li>
              <div class="text-dark small fw-bold text-uppercase px-3">
                Karyawan
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link <?php if($data['title'] == 'Input Karyawan | Admin' 
                || $data['title'] == 'Kelola Karyawan | Admin' || $data['title'] == 'Kelola Gaji | Admin') echo 'active' ?>"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
                <span>Kelola Karyawan</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="<?php echo URLROOT . '/Admin/input_karyawan' ?>" class="nav-link px-3 <?php if($data['title'] == 'Input Karyawan | Admin') echo 'active' ?>">
                      <span class="me-2"
                        ><i class="bi bi-person-plus"></i></span>
                      <span>Input Data</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo URLROOT . '/Admin/kelola_karyawan' ?>" class="nav-link px-3 <?php if($data['title'] == 'Kelola Karyawan | Admin') echo 'active' ?>">
                      <span class="me-2"
                        ><i class="bi bi-pencil-square"></i></span>
                      <span>Kelola Data</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo URLROOT . '/Admin/kelola_gaji' ?>" class="nav-link px-3 <?php if($data['title'] == 'Kelola Gaji | Admin') echo 'active' ?>">
                      <span class="me-2"
                        ><i class="bi bi-credit-card"></i></span>
                      <span>Kelola Gaji</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <hr>
            <li>
              <div class="text-dark small fw-bold text-uppercase px-3">
                Absensi
              </div>
            </li>
            <li>
              <a href="<?php echo URLROOT . '/Admin/kelola_absen' ?>" class="nav-link px-3 <?php if($data['title'] == 'Lembur dan Absen | Admin') echo 'active' ?>">
                <span class="me-2"><i class="bi bi-journal-check"></i></span>
                <span>Absen dan Lembur</span>
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT . '/Admin/laporan' ?>" class="nav-link px-3 <?php if($data['title'] == 'Laporan | Admin') echo 'active' ?>">
                <span class="me-2"><i class="bi bi-file-earmark-arrow-down"></i></span>
                <span>Laporan</span>
              </a>
            </li>
            <li class="bottom" id="bottom">
              <a href="<?php echo URLROOT . '/Admin/logout' ?>" class="nav-link px-3 text-danger" id="logout">
                <span class="me-2"><i class="bi bi-power"></i></span>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- Sidebar -->