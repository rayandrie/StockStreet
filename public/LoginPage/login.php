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
  <?php require '../Constants/js-constants.php'; ?>
  <script src="login.js"></script>
</head>
<body class="dark-mode-bg">
  <div class="container-fluid">
    <div class="row align-items-center dark-mode-bg">
        <div class="col-sm-7 login-image slight-bot-margin">
            <!-- Background Image Here -->
        </div>
        <!-- Login Form -->
        <div class="col-sm-5 company-color">
          <p class="h3 text-center">
            <i class="fas fa-quidditch slight-right-margin"></i>Welcome to StockStreet
          </p>
          <form>
            <div class="form-group">
              <label for="inputEmail">Email or Username</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email/Username" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" id="inputPassword" 
              name="password"
              placeholder="Password" required>
            </div>
            <!-- <input type="submit" class="btn btn-primary" value="Login"/> -->
            <!-- OR -->
            <div class="d-flex flex-row bd-highlight mb-3">
              <div class="p-0 bd-highlight">
                <input type="submit" class="btn btn-primary" value="Login" />
              </div>
              <div class="ml-3 mt-1half bd-highlight" id="errVal">
                <!-- <h5>
                  <span class="badge badge-pill badge-danger very-red-bg">Error: Never make a number </span>
                </h5> -->
              </div>
            </div>
          </form>
        </div>
    </div>
  </div>
  <div class="fixed-bottom phone-footer-block background-coy-color">
    <!-- Footer Background Yellow Color -->
  </div>
</body>
</html>