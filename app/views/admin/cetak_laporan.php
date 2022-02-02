<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row justify-content-around mt-5">
          <div class="col-sm-4 mb-3 h-100">
            <div class="card card-absen bg-white h-100 text-center fs-4 shadow rounded">
              <a href="<?php echo URLROOT . '/Admin/cetak_laporan_karyawan' ?>" class="absen-link text-decoration-none">
                <div class="card-body p-4 text-admin">
                  <i class="bi bi-cloud-arrow-down fs-1"></i>
                  <br>
                  <span class="text-dark">Laporan Data Karyawan</span>
                  <br>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-4 mb-3 h-100">
            <div class="card card-absen bg-white h-100 text-center fs-4 shadow rounded">
              <a href="<?php echo URLROOT . '/Admin/cetak_laporan_absen' ?>" 
                class="absen-link text-decoration-none">
                <div class="card-body p-4 text-admin">
                  <i class="bi bi-cloud-arrow-down fs-1"></i>
                  <br>
                  <span class="text-dark">Laporan Absen Bulan Ini</span>
                  <br>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-4 mb-3 h-100">
            <div class="card card-absen bg-white h-100 text-center fs-4 shadow rounded">
              <a href="<?php echo URLROOT . '/Admin/cetak_laporan_lembur' ?>" 
                class="absen-link text-decoration-none">
                <div class="card-body p-4 text-admin">
                  <i class="bi bi-cloud-arrow-down fs-1"></i>
                  <br>
                  <span class="text-dark">Laporan Data Lembur</span>
                  <br>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
