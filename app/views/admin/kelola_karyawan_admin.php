<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">       
          <!-- Tabel Karyawan -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h3 class="mb-3">Data Karyawan</h3>
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
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Bagian</th>
                      <th>Tahun Masuk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data['data_karyawan'] as &$datas) 
                      {
                    ?>
                    <tr>
                      <td><?php echo $datas->NRNP ?></td>
                      <td><?php echo $datas->nama ?></td>
                      <td><?php echo $datas->gender ?></td>
                      <td><?php echo $datas->agama ?></td>
                      <td><?php echo $datas->bagian ?></td>
                      <td><?php echo $datas->tahun_masuk?></td>
                      <td>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/edit_karyawan/' . $datas->NRNP ?>">
                        <div class="btn btn-primary btn-sm d-grid">Edit</div>
                      </a>
                      <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/hapus_karyawan/' . $datas->NRNP?>">
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
          <!-- Tabel Karyawan -->

          <!-- Tabel Users -->
          <div class="card shadow-sm mt-5">
            <div class="card-body">
              <h3 class="mb-3">Data Users</h3>
              <hr>
              <div class="table-responsive">
                <table
                  id="example"
                  class="table data-table"
                  style="width: 100%"
                >
                  <thead class="table-admin text-dark">
                    <tr>
                      <th>NRNP</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data['data_users'] as $data) 
                      {
                    ?>
                    <tr>
                      <td><?php echo $data->NRNP ?></td>
                      <td><?php echo $data->nama ?></td>
                      <td>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/hapus_user/' . $data->user_id?>">
                        <div class="btn btn-danger btn-sm d-grid">Hapus</div>
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
          <!-- Tabel Users -->
      </div>
    </main>
    <!-- Content -->