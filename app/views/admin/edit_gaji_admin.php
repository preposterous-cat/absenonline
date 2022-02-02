<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3>Form Edit Gaji</h3>
            <hr>
            <form action="<?php echo URLROOT . '/Admin/edit_data_gaji' ?>" method="POST">
              <div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label">ID Gaji</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="gaji_id" value="<?php echo $data['data_gaji']->gaji_id ?>" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?php echo $data['data_gaji']->nama ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="NRNP" class="col-sm-2 col-form-label">NRNP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="NRNP" value="<?php echo $data['data_gaji']->NRNP ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="bagian" class="col-sm-2 col-form-label">Bagian</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="bagian" value="<?php echo $data['data_gaji']->bagian ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Lembur(hari)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlah_lembur" value="<?php echo $data['data_gaji']->jumlah_lembur ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="jumlah" class="col-sm-2 col-form-label">Total Jam Lembur(Jam)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="total_jam_lembur" value="<?php echo $data['data_gaji']->total_jam_lembur?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Bonus" class="col-sm-2 col-form-label">Bonus(Jumlah lembur x 100000)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="inputBagian" name="bonus" value="<?php echo $data['data_gaji']->bonus ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Bulan" class="col-sm-2 col-form-label">Bulan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="bulan" value="<?php echo $data['data_gaji']->bulan ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tahun" value="<?php echo $data['data_gaji']->tahun ?>" required>
                </div>
              </div>
              <button type="submit" class="btn btn-admin">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <!-- Content -->