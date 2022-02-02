<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">       
          <!-- Tabel Gaji -->
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="mb-3">Data Gaji Karyawan</h3>
            <hr>
            <div class="table-responsive">
              <table
                id="example"
                class="table data-table align-middle"
                style="width: 100%;"
                ><thead class="table-admin text-dark">
                  <tr>
                    <th>NRNP</th>
                    <th>Nama</th>
                    <th>Bagian</th>
                    <th>Jumlah Lembur</th>
                    <th>Total Jam Lembur</th>
                    <th>Bonus</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['data_gaji'] as $data) 
                    {
                  ?>
                  <tr>
                    <td><?php echo $data->NRNP ?></td>
                    <td><?php echo $data->nama ?></td>
                    <td><?php echo $data->bagian ?></td>
                    <td><?php echo $data->jumlah_lembur.' Hari' ?></td>
                    <td><?php echo $data->total_jam_lembur. ' Jam' ?></td>
                    <td><?php echo $data->bonus ?></td>
                    <td><?php echo convert_bulan($data->bulan) ?></td>
                    <td><?php echo $data->tahun ?></td>
                    <td>
                      <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/edit_gaji/' . $data->gaji_id ?>">
                        <div class="btn btn-primary btn-sm d-grid">Edit</div>
                      </a>
                      <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/hapus_gaji/' . $data->gaji_id ?>">
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
        <!-- Tabel Karyawan -->
      </div>
    </main>
    <!-- Content -->

<?php
  function convert_bulan($bulan)
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
?>