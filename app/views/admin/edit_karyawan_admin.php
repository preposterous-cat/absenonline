<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3>Form Edit Karyawan</h3>
            <hr>
            <form action="<?php echo URLROOT . '/Admin/edit_data_karyawan' ?>" method="POST">
              <div class="row mb-3">
                <label for="Nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputNama" name="nama" value="<?php echo $data['data_karyawan']->nama ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="NRNP" class="col-sm-2 col-form-label">NRNP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputNRNP" name="NRNP" value="<?php echo $data['data_karyawan']->NRNP ?>" required>
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="laki-laki" <?php if ($data['data_karyawan']->gender == 'laki-laki') {
                      echo "checked";
                    } ?>>
                    <label class="form-check-label" for="laki-laki">
                      Laki-laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="perempuan" <?php if ($data['data_karyawan']->gender == 'perempuan') {
                      echo "checked";
                    } ?>>
                    <label class="form-check-label" for="perempuan">
                      Perempuan
                    </label>
                  </div>
                </div>
              </fieldset>
              <div class="row mb-3">
                <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputAgama" name="agama" value="<?php echo $data['data_karyawan']->agama ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Bagian" class="col-sm-2 col-form-label">Bagian</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputBagian" name="bagian" value="<?php echo $data['data_karyawan']->bagian ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="Bagian" class="col-sm-2 col-form-label">Tahun Masuk</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputBagian" name="tahun_masuk" value="<?php echo $data['data_karyawan']->tahun_masuk ?>" required>
                </div>
              </div>
              <button type="submit" class="btn btn-admin">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <!-- Content -->