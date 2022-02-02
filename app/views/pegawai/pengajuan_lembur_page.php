<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="card shadow-sm mb-3">
          <div class="card-body">
            <h3>Syarat Pengajuan Lembur</h3>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mollis bibendum elit, non ultrices ex volutpat quis. Fusce hendrerit, ipsum vel blandit pretium, dui ipsum cursus nulla, in tincidunt nisi nunc ut erat. Donec tempus ex ut accumsan consequat. Morbi in magna sed elit cursus luctus. Quisque et augue et velit cursus posuere id id erat. Nam quis convallis libero. Maecenas tincidunt sapien nec finibus rutrum. Mauris sodales placerat efficitur. Proin blandit aliquam massa in hendrerit.</span>
          </div>
        </div>
        <div class="card shadow-sm mb-3">
          <div class="card-body">
            <h3>Form Pengajuan Lembur</h3>
            <form action="<?php echo URLROOT . '/Users/ajukan_lembur';?>" method="POST">
              <div class="row mb-3">
                <label for="Nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="namaLengkap" name="nama" value="<?php echo $_SESSION['nama']; ?>" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <label for="NRNP" class="col-sm-2 col-form-label">NRNP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="NRNP" name="NRNP" value="<?php echo $_SESSION['NRNP']; ?>" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Alasan" class="col-sm-2 col-form-label">Alasan Lembur</label>
                <div class="col-sm-10">
                  <textarea class="form-control" style="height: 200px;" name="alasan"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-info text-white">Ajukan</button>
            </form>
          </div>
        </div>
        <div class="card shadow-sm mb-3">
          <div class="card-body">
            <h3>Data Pengajuan Lembur</h3>
            <div class="table-responsive">
              <table
                id="example"
                class="table data-table"
                style = "width: 100%;"
              >
                <thead class="table-page text-white">
                  <tr>
                    <th>NRNP</th>
                    <th>Nama</th>
                    <th>Alasan</th>
                    <th>Tanggal</th>
                    <th>Jam Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                  foreach ($data['data_lembur'] as $data) {
                ?>
                  <tr>
                    <td><?php echo $data->NRNP; ?></td>
                    <td><?php echo $data->nama; ?></td>
                    <td><?php echo $data->alasan; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                    <td><?php echo date('H:i:s', strtotime($data->tanggal)); ?></td>
                    <td>
                      <?php 
                        if ($data->status == 'menunggu') {
                      ?>
                          <span class="text-primary"><?php echo $data->status; ?></span>
                      <?php
                        } elseif ($data->status == 'disetujui') {
                        ?>  
                          <span class="text-success"><?php echo $data->status; ?></span>
                      <?php
                        } elseif ($data->status == 'tidak disetujui') {
                      ?>
                          <span class="text-danger"><?php echo $data->status; ?></span>
                      <?php
                        }
                      ?>
                      </td>
                      <td>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Users/hapus_lembur/' . $data->lembur_id ;  ?>">
                          <div class="btn btn-danger">Hapus</div>
                        </a>
                      </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>
    </main>
    <!-- Content -->