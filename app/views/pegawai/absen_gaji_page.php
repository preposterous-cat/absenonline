<!-- Content -->
<main class="mt-5 pt-3">
      <div class="container-fluid">
          <h4 class="mb-4">Absensi dan Gaji | <?php echo $_SESSION['nama'] ?></h4>       
          <!-- Data Absensi Karyawan -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h3 class="mb-3">Data Absensi</h3>
              <hr>
              <div class="table-responsive">
                <table
                  id="example"
                  class="table data-table align-middle"
                  style="width: 100%"
                >
                  <thead class="table-page text-white">
                    <tr>
                      <th>Tanggal</th>
                      <th>Jam Datang</th>
                      <th>Jam Pulang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach ($data['absen'] as &$datas) {
                      ?>
                    <tr>
                      <td>
                        <?php 
                          echo date('d-m-Y', strtotime($datas->tanggal));
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

          <!-- Data Gaji -->
          <div class="card shadow-sm mt-5">
          <div class="card-body">
            <h3 class="mb-3">Data Gaji</h3>
            <hr>
            <div class="table-responsive">
              <table
                id="example"
                class="table data-table align-middle"
                style="width: 100%;"
                >
                <thead class="table-page text-white">
                  <tr>
                    <th>NRNP</th>
                    <th>Nama</th>
                    <th>Bagian</th>
                    <th>Jumlah Lembur</th>
                    <th>Total Jam Lembur</th>
                    <th>Bonus</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['gaji'] as $gaji) 
                    {
                  ?>
                  <tr>
                    <td><?php echo $gaji->NRNP ?></td>
                    <td><?php echo $gaji->nama ?></td>
                    <td><?php echo $gaji->bagian ?></td>
                    <td><?php echo $gaji->jumlah_lembur.' Hari' ?></td>
                    <td><?php echo $gaji->total_jam_lembur. ' Jam' ?></td>
                    <td><?php echo $gaji->bonus ?></td>
                    <td><?php echo convert_bulan($gaji->bulan) ?></td>
                    <td><?php echo $gaji->tahun ?></td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <!-- Data Gaji -->
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