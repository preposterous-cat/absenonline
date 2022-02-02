<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="login page">
    <title>Login | Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link href="<?php echo URLROOT . '/public/css/style_login.css' ?>" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form action="<?php echo URLROOT . '/Admin/index' ?>" method="POST">
        <h2 class="h4 mb-2 fw-normal">Login Admin</h2>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <span class="text-danger"><?php echo $data['passwordError']; ?></span>
        <button class="w-100 btn btn-lg text-dark" id="button-admin" type="submit">Log in</button>
        <p class="mt-5 mb-3 text-muted">&copy; Admin Page | 2021-Now</p>
      </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>