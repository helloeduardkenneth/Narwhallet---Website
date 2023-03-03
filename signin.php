<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    
    <meta name="author" content="Eduard Kenneth Galuran">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">

    <title>NarwhalPay - Payment Gateway</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/Narwhallet.css">

  </head>

  <style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900");

    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-image:
      linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(117, 19, 93, 0.73)),
      url('assets/images/hero-img.jpg');
      background-size: cover;
      font-family: "Poppins", sans-serif;
      color: white !important;
    }

    .form-signin {
      max-width: 500px;
    }

    form {
      /* From https://css.glass */
      background: rgba(255, 255, 255, 0.2);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="text"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
      box-shadow: none;
      background: rgba(255, 255, 255, 0.2);
    }

    .form-signin input[type="text"]::placeholder {}

    .form-signin input[type="text"]:focus {
      border: 1px solid #bdbdbd;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      box-shadow: none;
      background: rgba(255, 255, 255, 0.2);
      color: #FFFFFF;
    }

    .form-signin input[type="password"]:focus {
      border: 1px solid #bdbdbd;
    }

  </style>

  <body class="text-center">   

  <div class="form-signin w-100 mx-auto">
      <?php
      session_start();

      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header("location: dashboard.php");
        exit;
      }

      if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === 'admin' && $_POST['password'] === 'narwhaladmin') {
          $_SESSION['loggedin'] = true;
          header("location: dashboard.php");
          exit;
        } else {
          $login_err = "Invalid username or password";
        }
      }
      ?>
    
      <?php if (isset($login_err)): ?>
          <div class="alert alert-danger"><?= $login_err ?></div>
      <?php endif; ?>

    <form method="post">

      <img class="my-4 mx-auto" src="assets/images/narwhallet.png" alt="" width="100" height="60">
      <h1 class="h3 mb-3 fw-bold text-white">NarwhalPay (Admin)</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        <label for="username">Username</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-white">&copy; NarwhalPay - Payment Gateway</p>

    </form>
  </div>

  </body>
</html>
