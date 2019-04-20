<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>StockStreet Portfolio</title>
  <?php require '../Constants/bootstrap-const.php'; ?>
  <?php require '../Constants/font-awesome-const.php'; ?>
  <!-- CSS Links -->
  <link rel="stylesheet" href="../CSS/for-all.css">
  <link rel="stylesheet" href="portfolio.css">
  <!-- JS Links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body class="dark-mode-bg">
  <!-- Nav Bar -->
  <?php include '../Components/nav-bar.php'; ?>
  <!-- Container for The User's Stocks and Credits -->
  <div class="container-fluid">
    <div class="row justify-content-center text-center">
      <div class="col align-self-center">
        <div class="card background-coy-color">
          <!-- Your Stocks Header -->
          <div class="card-header">
            Your Portfolio:
          </div>
          <!-- List of User's Stocks and Credits -->
          <div class="card-body">
            <div class="list-group">
              <!-- First List Item -->
              <div href="#" class="list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Your Stock 1</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
              </div>
              <!-- Second List Item -->
              <div href="#" class="list-group-item list-group-item-action background-coy-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Your Stock 2</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </div>
              <!-- Third List Item -->
              <div href="#" class="list-group-item list-group-item-action background-coy-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Your Stock 3</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="slight-margin-top-bot">
    <!-- Slight Margin between Your Stocks and Others -->
  </div>
  <!-- Container for Current Stock Prices, Current Orders -->
  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-sm-6">
        <div class="card background-coy-color take-full-height">
          <!-- Your Stocks Header -->
          <div class="card-header">
            Today's Stocks:
          </div>
          <!-- List of Current Day Stocks -->
          <div class="card-body">
            <div class="list-group">
              <!-- First List Item -->
              <div href="#" class="list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Stock 1</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
              </div>
              <!-- Second List Item -->
              <div href="#" class="list-group-item list-group-item-action background-coy-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Stock 2</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </div>
              <!-- Third List Item -->
              <div href="#" class="list-group-item list-group-item-action background-coy-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Stock 3</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 phone-margin-top-bot">
        <div class="card background-coy-color">
          <!-- Your Stocks Header -->
          <div class="card-header">
            Current Orders:
          </div>
          <!-- List of Orders; Buy and Sell -->
          <div class="card-body">
            <div class="card background-coy-color">
              <div class="card-header">
                Buys:
              </div>
              <div class="card-body">
                <!-- List for Buys -->
                <div class="list-group">
                  <!-- First List Item -->
                  <div href="#" class="list-group-item list-group-item-action active">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Buy Order 1:</h5>
                      <small>3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small>Donec id elit non mi porta.</small>
                  </div>
                  <!-- Second List Item -->
                  <div href="#" class="list-group-item list-group-item-action background-coy-color">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Buy Order 2:</h5>
                      <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small class="text-muted">Donec id elit non mi porta.</small>
                  </div>
                  <!-- Third List Item -->
                  <div href="#" class="list-group-item list-group-item-action background-coy-color">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Buy Order 3:</h5>
                      <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small class="text-muted">Donec id elit non mi porta.</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="card background-coy-color">
              <div class="card-header">
                Sells:
              </div>
              <div class="card-body">
                <!-- List for Sells -->
                <div class="list-group">
                  <!-- First List Item -->
                  <div href="#" class="list-group-item list-group-item-action active">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Sell Order 1:</h5>
                      <small>3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small>Donec id elit non mi porta.</small>
                  </div>
                  <!-- Second List Item -->
                  <div href="#" class="list-group-item list-group-item-action background-coy-color">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Sell Order 2:</h5>
                      <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small class="text-muted">Donec id elit non mi porta.</small>
                  </div>
                  <!-- Third List Item -->
                  <div href="#" class="list-group-item list-group-item-action background-coy-color">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Sell Order 3:</h5>
                      <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small class="text-muted">Donec id elit non mi porta.</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="slight-margin-top-bot">
    <!-- Slight Margin between cols and footer -->
  </div>
  <?php include "../Components/footer.php"; ?>
</body>
</html>