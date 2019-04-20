<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Stock Street</title>
  <?php require '../Constants/bootstrap-const.php'; ?>
  <?php require '../Constants/font-awesome-const.php'; ?>
  <!-- CSS Links -->
  <link rel="stylesheet" href="../CSS/for-all.css">
  <link rel="stylesheet" href="index.css">
  <!-- JS Links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body class="dark-mode-bg">
  <!-- Nav Bar -->
  <?php include '../Components/nav-bar.php'; ?>
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid jumbo-img">
    <div class="container company-color text-center">
      <h1 class="display-3 bold-my-text">Invest, Commision-Free!</h1>
      <p class="lead bold-my-text"> With StockStreet, you can invest in your favourite NASDAQ stocks, right from your phone or desktop.</p>
      <hr class="my-4">
      <h4>Why Invest?</h4>
      <p>Most investment platforms such as stocks, bonds and mutual funds offer good returns on investment over the long term. This return builds and creating your wealth over time. The growth of money is also important to fulfil basic needs in life and investing can help a person to meet long-term life goals easily.</p>
      <!-- Button that goes to Investopedia -->
      <a class="btn btn-primary btn-lg" href="https://www.investopedia.com/university/beginner/" role="button">Learn More</a>
    </div>
  </div>
  <!-- Container for Stocks and News -->
  <div class="container-fluid">
    <div class="row">
      <!-- Stocks -->
      <div class="col-sm-6">
        <!-- Stock Card -->
        <div class="card text-center bg-my-color">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Stock 1</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
        <!-- Stock Card -->
        <div class="card text-center top-bot-margin bg-my-color">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Stock 2</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
        <!-- Stock Card -->
        <div class="card text-center top-bot-margin bg-my-color">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Stock 3</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
        <!-- Stock Card -->
        <div class="card text-center top-bot-margin bg-my-color">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Stock 4</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
        <!-- Stock Card -->
        <div class="card text-center top-bot-margin bg-my-color">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Stock 5</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <!-- News Carousel -->
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../Components/images/glenstone.jpeg" class="d-block w-100" alt="glenstone">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First Top Headline</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../Components/images/exposure.jpeg" class="d-block w-100" alt="exposure">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second Top Headline</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../Components/images/turf.jpg" class="d-block w-100" alt="turf">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third Top Headline</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
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
        <!-- News Card -->
        <div class="card mb-3 top-bot-margin bg-my-color">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">News 1</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <!-- News Card -->
        <div class="card mb-3 top-bot-margin bg-my-color">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">News 2</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <!-- News Card -->
        <div class="card mb-3 top-bot-margin bg-my-color">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">News 3</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="page-footer font-small blue bg-my-color">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/">StockStreet and the Little Homies</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>
</html>