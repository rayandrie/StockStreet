<nav class="navbar navbar-expand-lg navbar-dark background-coy-color">
  <a class="navbar-brand" href="../IndexPage/index.php"><i class="fas fa-quidditch font-bg-color"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link font-bg-color" href="../IndexPage/index.php">Stock Street<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <!-- Clicking this should go to the Home Page if user is logged in-->
        <a class="nav-link font-bg-color" id="portfolio-link" href="../PortfolioPage/portfolio.php">Portfolio</a>
      </li>
      <li class="nav-item">
        <!-- Clicking this should go to -->
        <a class="nav-link font-bg-color" href="https://www.nerdwallet.com/blog/category/investing/">Investing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle font-bg-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Learn More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Blog</a>
          <a class="dropdown-item" href="#">About Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Contact Us</a>
        </div>
      </li>
    </ul>
    <!-- Right Side of Nav Bar -->
    <!-- Goes to Log In Page -->
    <a class="btn btn-outline-dark nav-link full-width" id="leftButton" href="../LoginPage/login.php" role="button">Log In</a>
    <!-- <a class="nav-link font-bg-color" id="portfolio-link" href="../PortfolioPage/portfolio.php">Portfolio</a> -->
    <!-- <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a> -->
    <!-- Goes to Sign Up Page -->
    <a class="btn btn-dark nav-link ten-pixel-margin full-width top-margin" id="rightButton" href="../SignUpPage/signup.php" role="button">Sign Up</a>
  </div>
</nav>