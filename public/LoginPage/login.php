<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>StockStreet Login</title>
  <?php require '../Constants/bootstrap-const.php'; ?>
  <?php require '../Constants/font-awesome-const.php'; ?>
  <!-- CSS Links -->
  <link rel="stylesheet" href="../CSS/for-all.css">
  <link rel="stylesheet" href="login.css">
  <!-- JS Links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body class="dark-mode-bg">
  <div class="container-fluid">
    <div class="row align-items-center dark-mode-bg">
        <div class="col-sm-6 login-image slight-bot-margin">
            <!-- Background Image Here -->
        </div>
        <!-- Login Form -->
        <div class="col-sm-6 company-color">
          <p class="h3 text-center">
            <i class="fas fa-quidditch slight-right-margin"></i>Welcome to StockStreet
          </p>
          <form>
            <div class="form-group">
              <label for="inputEmail">Email or Username</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email/Username">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" 
              name="password"
              placeholder="Password">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">I agree to the terms and conditions</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
  </div>
  <div class="fixed-bottom phone-footer-block background-coy-color">
    <!-- Footer Background Yellow Color -->
  </div>
</body>
</html>