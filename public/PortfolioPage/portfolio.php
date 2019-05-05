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
  <?php require '../Constants/js-constants.php'; ?>
  <script src="portfolio.js"></script>
</head>
<body class="dark-mode-bg">
  <!-- Nav Bar -->
  <?php include '../Components/nav-bar.php'; ?>
  <!-- Container for The User's Stocks and Credits -->
  <div class="container-fluid">
    <div class="row justify-content-center text-center">
      <div class="col align-self-center">
        <div class="card background-coy-color slight-margin-top">
          <!-- Your Stocks Header -->
          <div class="card-header cath-font two-em font-weight-bolder header-bg-color coy-headings">
            Your Portfolio:
          </div>
          <!-- List of User's Stocks and Credits -->
          <div class="card-body body-bg-color">
            <div class="list-group" id="portfolio-list">
              <!-- First List Item -->
              <!-- <div class="list-group-item list-group-item-action dark-mode-bg company-color">
                <div class="d-flex justify-content-between">
                  <h3><span class="badge badge-coy">AAPL | 30 Shares</span></h3>
                  <h3><span class="badge badge-light">Bought for: 12222</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5><span class="badge badge-coy">Sell Price Today: 12345</span></h5>
                  <h5><span class="badge badge-secondary">Profit: 3%</span></h5>
                </div>
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#sellPortfolioModal">Block level button</button>
              </div> -->
            </div>
          </div>
          <div id="allPortfolioModals">
            <!-- Modal for List Item (Below) -->
            <!-- <div class="modal fade" id="sellPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="sellModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="sellPortfolioLabel">Are you sure you want to sell your AAPL Stocks?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You will gain 5858 Credits.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sell</button>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Modal for List Item (Above) -->
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
    <div class="row">
      <div class="col-sm-6">
        <div class="card background-coy-color take-full-height">
          <!-- Your Stocks Header -->
          <div class="card-header cath-font two-em font-weight-bolder header-bg-color coy-headings">
            Today's Stocks:
          </div>
          <!-- List of Current Day Stocks -->
          <div class="card-body body-bg-color">
            <div class="list-group" id="Stocks">
              <!-- List Item -->
              <!-- <div href="#" class="list-group-item list-group-item-action dark-mode-bg company-color">
                <div class="d-flex justify-content-between">
                  <h3><span class="badge badge-coy">AAPL | Apple Inc.</span></h3>
                  <h3><span class="badge badge-light">Price</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5><span class="badge badge-coy">Market Cap: 9000000</span></h5>
                  <h5><span class="badge badge-secondary">Perc</span></h5>
                </div>
                <div class="d-flex justify-content-between">
                  <h5><span class="badge badge-coy">Avg Volume: 9000000</span></h5>
                  <h5><span class="badge badge-info">ß: </span></h5>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 phone-margin-top-bot">
        <div class="card background-coy-color take-full-height">
          <!-- Your Stocks Header -->
          <div class="card-header cath-font two-em font-weight-bolder header-bg-color coy-headings">
            Current Live Orders:
          </div>
          <!-- List of Orders; Buy and Sell -->
          <div class="card-body body-bg-color">
            <div class="card background-coy-color">
              <!-- Full Sell List (Below) -->
              <div class="card-header cath-font two-em font-weight-bolder header-bg-color coy-headings text-center">
                You have: <span class="cath-font font-italic" id="userCredits"></span>
              </div>
              <div class="card-body body-bg-color">
                <!-- List for Sells -->
                <div class="list-group" id="allSellOrders">
                  <!-- First List Item -->
                  <!-- <div class="list-group-item list-group-item-action dark-mode-bg company-color">
                    <div class="d-flex justify-content-between">
                      <h5><span class="badge badge-coy">AAPL | Selling 30 Shares</span></h5>
                      <h5><span class="badge badge-info">Buy Price/Share: 12345</span></h5>
                      <h5><span class="badge badge-light">Profit to be Made: +150</span></h5>
                    </div>
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#sellOrdersModal">Buy Shares</button>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- Full Sell List (Above) -->
            <!-- Modal for List Item (Below) -->
            <div id="allBuyModals">
              <!-- <div class="modal fade" id="buyOrdersModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="buyModalLabel">Are you sure you want to buy these Apple Stocks?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      You will lose 5858 Credits.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Buy</button>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- Modal for List Item (Above) -->
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