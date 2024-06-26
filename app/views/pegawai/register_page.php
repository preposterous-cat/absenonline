<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="description" content="Register page">
    <title>Register | Absen Pegawai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link href="<?php echo URLROOT . '/public/css/style_login.css' ?>" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form action="<?php echo URLROOT . '/Users/register'; ?>" method="POST" >
        <h2 class="h4 mb-2 fw-normal">Register</h2>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="NRNP *" name="NRNP" required>
          <label for="floatingInput">NRNP</label>
        </div>
        <span class="text-danger"><?php echo $data['NRNPError']; ?></span>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Nama *" name="nama" required>
          <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password *" name="password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingConfirmPassword" placeholder="ConfirmPassword *" name="confirmPassword">
          <label for="floatingConfirmPassword">Confirm Password</label>
        </div>
        <span class="text-danger"><?php echo $data['confirmPassError']; ?></span>
        <button class="w-100 btn btn-lg btn-info mb-3" id="button" type="submit" value="submit">Register</button>
      </form>
      <span class="text-start mt-5">
        Sudah memiliki akun? Silakan melakukan <a class="link-info text-decoration-none" href="<?php echo URLROOT . '/Users/index'; ?>">Log in</a>
      </span>
      <p class="mt-3 mb-3 text-muted">&copy; 2017–2021</p>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>