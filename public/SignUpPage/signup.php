<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>StockStreet Sign Up</title>
  <?php require '../Constants/bootstrap-const.php'; ?>
  <?php require '../Constants/font-awesome-const.php'; ?>
  <!-- CSS Links -->
  <link rel="stylesheet" href="../CSS/for-all.css">
  <link rel="stylesheet" href="signup.css">
  <!-- JS Links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="jumbo-padding company-color text-center">
        <p class="h1"><i class="fas fa-quidditch slight-right-margin"></i>StockStreet ~ Make Your Money Move</h1>
        <p class="h3">Invest in the companies you love, commission-free. You want this, you know you do.</p>
      </div>
      <div class="col-sm-8">
        <!-- Sign Up Form -->
        <form class="company-color">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputFirstName">First Name</label>
              <input type="text" class="form-control" id="inputFirstName" name="first-name" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputLastName">Last Name</label>
              <input type="text" class="form-control" id="inputLastName" name="last-name" placeholder="Last Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                I agree to the terms and conditions
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
      <div class="col-sm-4 text-center align-items-center company-color phone-slight-top-margin">
        <!-- StockStreet Cool Animation -->
        <i class="fas fa-comments-dollar fa-7x"></i>
        <p class="lead">
          Stay on top of your portfolio. Anytime. Anywhere. Fast execution, real-time market data, and smart notifications help you make the most of the stock market no matter where you are.
        </p>
      </div>
    </div>
  </div>
</body>
</html>