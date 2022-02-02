<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
          <h4 class="mb-4">Absensi dan Lembur | Tanggal <?php echo date('d-m-Y'); ?></h4>       
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body text-center p-3">
                  <span class="fs-2 fw-bold text-admin"><?php echo $data['karyawan']; ?></span>
                  <br>
                  <span class="fs-5">Jumlah Karyawan Total</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body text-center p-3">
                  <span class="fs-2 fw-bold text-admin"><?php echo $data['jam_datang']; ?></span>
                  <br>
                  <span class="fs-5">Jumlah Karyawan Datang</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body text-center p-3">
                  <span class="fs-2 fw-bold text-admin"><?php echo $data['jam_pulang']; ?></span>
                  <br>
                  <span class="fs-5">Jumlah Karyawan Pulang</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Data Absensi Karyawan -->
          <div class="card shadow-sm mt-5">
            <div class="card-body">
              <h3 class="mb-3">Data Absensi Karyawan</h3>
              <hr>
              <div class="table-responsive">
                <table
                  id="example"
                  class="table data-table align-middle"
                  style="width: 100%"
                >
                  <thead class="table-admin text-dark">
                    <tr>
                      <th>NRNP</th>
                      <th>Nama</th>
                      <th>Bagian</th>
                      <th>Jam Datang</th>
                      <th>Jam Pulang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach ($data['absen'] as &$datas) {
                      ?>
                    <tr>
                      <td>
                        <?php 
                          echo $datas->NRNP;
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo $datas->nama;  
                        ?>
                        </td>
                      <td>
                        <?php 
                          echo $datas->bagian; 
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo $datas->jam_datang;  
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo $datas->jam_pulang; 
                        ?>
                      </td>
                      <td>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/hapus_absen/' . $datas->absen_id ;  ?>">
                          <div class="btn btn-danger btn-sm d-grid">Hapus</div>
                        </a>
                      </td>
                    </tr>
                    <?php
                      }
                      unset($datas);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Data Absensi Karyawan Karyawan -->

          <!-- Data Pengajuan Lembur -->
          <div class="card shadow-sm mt-5">
            <div class="card-body">
              <h3 class="mb-3">Data Pengajuan Lembur</h3>
              <hr>
              <div class="table-responsive">
                <table
                  id="example"
                  class="table data-table align-middle"
                  style="width: 100%"
                >
                  <thead>
                    <tr class="table-admin text-dark">
                      <th>NRNP</th>
                      <th>Nama</th>
                      <th>Alasan Lembur</th>
                      <th>Tanggal</th>
                      <th>Jam Pengajuan</th>
                      <th>Status</th>
                      <th>Persetujuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data['lembur'] as $lembur) 
                      {
                     ?>
                    <tr>
                      <td><?php echo $lembur->NRNP; ?></td>
                      <td><?php echo $lembur->nama; ?></td>
                      <td><?php echo $lembur->alasan; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($lembur->tanggal)); ?></td>
                      <td><?php echo date('H:i:s', strtotime($lembur->tanggal)); ?></td>
                      <td>
                        <?php 
                        if ($lembur->status == 'menunggu') {
                      ?>
                          <span class="text-primary"><?php echo $lembur->status; ?></span>
                      <?php
                        } elseif ($lembur->status == 'disetujui') {
                        ?>  
                          <span class="text-success"><?php echo $lembur->status; ?></span>
                      <?php
                        } elseif ($lembur->status == 'tidak disetujui') {
                      ?>
                          <span class="text-danger"><?php echo $lembur->status; ?></span>
                      <?php
                        }
                      ?>
                      </td>
                      <td>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/setuju_lembur/' . $lembur->NRNP . '/' . $lembur->lembur_id ?>">
                          <div class="btn btn-success btn-sm d-grid">Setuju</div>
                        </a>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/tidak_setuju_lembur/' . $lembur->NRNP . '/' .$lembur->lembur_id ?>">
                          <div class="btn btn-danger btn-sm d-grid">Tidak</div>
                        </a>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Data Pengajuan Lembur -->
      </div>
    </main>
    <!-- Content -->