<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>StockStreet</title>
  <?php require '../Constants/bootstrap-const.php'; ?>
  <?php require '../Constants/font-awesome-const.php'; ?>
  <!-- CSS Links -->
  <link rel="stylesheet" href="../CSS/for-all.css">
  <link rel="stylesheet" href="index.css">
  <!-- JS Links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <?php require '../Constants/js-constants.php'; ?>
  <script src="index.js"></script>
</head>
<body class="dark-mode-bg">
  <!-- Nav Bar -->
  <?php include '../Components/nav-bar.php'; ?>
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid jumbo-img rounded">
    <div class="container company-color text-center">
      <h1 class="display-3 shadow-effect font-weight-bold slightly-smaller-font-h1">Invest, Commision-Free!</h1>
      <p class="lead shadow-effect font-weight-bold"> With StockStreet, you can invest in your favourite NASDAQ stocks, right from your phone or desktop.</p>
      <hr class="my-4">
      <h4 class="cath-font shadow-effect">Why Invest?</h4>
      <p class="cath-font shadow-effect">Most investment platforms such as stocks, bonds and mutual funds offer good returns on investment over the long term. This return builds and creating your wealth over time. The growth of money is also important to fulfil basic needs in life and investing can help a person to meet long-term life goals easily.</p>
      <!-- Button that goes to Investopedia -->
      <a class="btn btn-primary btn-lg" href="https://www.investopedia.com/university/beginner/" role="button">Learn More</a>
    </div>
  </div>
  <!-- Container for Stocks and News -->
  <div class="container-fluid">
    <div class="row">
      <!-- Stocks -->
      <div class="col-sm-6">
        <div class="card background-coy-color take-full-height">
          <div class="card-header header-bg-color coy-headings cath-font two-em font-weight-bolder">
            Today's Stocks:
          </div>
          <!-- List of Current Stocks -->
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
        <div class="card-header header-bg-color coy-headings cath-font two-em font-weight-bolder">
          Today's News:
        </div>
        <div class="card-body body-bg-color">
          <!-- News Carousel -->
          <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <!-- <div class="carousel-item active">
                  <img src="../Components/images/glenstone.jpeg" class="d-block w-100 border border-secondary rounded" alt="glenstone">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>First Top Headline</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
                </div> -->
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <!-- List of Current News -->
          <div class="card-body body-bg-color">
            <div class="list-group" id="News">
              <!-- First List Item -->
              <!-- <a href="#" class="list-group-item list-group-item-action dark-mode-bg company-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">News 1</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
              </a> -->
              <!-- Second List Item -->
              <!-- <div href="#" class="list-group-item list-group-item-action dark-mode-bg company-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">News 2</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </div> -->
              <!-- Third List Item -->
              <!-- <div href="#" class="list-group-item list-group-item-action dark-mode-bg company-color">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">News 3</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </div> -->
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