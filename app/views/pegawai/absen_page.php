<!-- Content -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-sm-10">
            <h3 class="text-center">Selamat Datang, 
              <?php 
              if (isset($_SESSION['nama'])) 
              {
                echo $_SESSION['nama'];
              }
            ?>! Silakan Melakukan Absen</h3>
          </div>
        </div>
        <div class="row justify-content-around mt-5">
          <div class="col-sm-4 mb-3 h-100">
            <div class="card card-absen bg-white h-100 text-center fs-4 shadow rounded">
              <a href="<?php 
                if(empty($data['jam_datang']))
                {
                  echo URLROOT . '/Users/absen_datang';
                }else {
                  echo "javascript:void(0)";
                } 
                ?>" 
                class="absen-link text-decoration-none">
                <div class="card-body p-4 text-info">
                  <i class="bi bi-arrow-down-circle fs-1"></i>
                  <br>
                  <span class="text-dark">Absen Datang</span>
                  <br>
                  <?php
                    if (!empty($data['jam_datang'])) 
                    {
                  ?>
                    <p class="text-dark text-status"><?php echo 'Kamu datang pada ' . $data['jam_datang'] . ' WIB'; ?></p>
                  <?php
                    }
                  ?>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-4 mb-3 h-100">
            <div class="card card-absen bg-white h-100 text-center fs-4 shadow rounded">
              <a href="<?php 
                if(empty($data['jam_pulang']))
                {
                  echo URLROOT . '/Users/absen_pulang';
                }else {
                  echo "javascript:void(0)";
                } 
                ?>" 
                class="absen-link text-decoration-none">
                <div class="card-body p-4 text-info">
                  <i class="bi bi-arrow-up-circle fs-1"></i>
                  <br>
                  <span class="text-dark">Absen Keluar</span>
                  <br>
                  <?php
                    if (!empty($data['jam_pulang'])) 
                    {
                  ?>
                    <p class="text-dark text-status"><?php echo 'Kamu pulang pada ' . $data['jam_pulang'] . ' WIB'; ?></p>
                  <?php
                    }
                  ?>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
   