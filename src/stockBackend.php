<?php
  /* This is the backend for my Stock Trading Application */
  define('DB_STOCK_HOST', "303.itpwebdev.com");
  define('DB_STOCK_USER', "andrieja_db_user");
  define('DB_STOCK_PASSWORD', "uscItp2019");
  define('DB_STOCK_NAME', "andrieja_stock_db");
  // echo "I got here!";
  // var_dump($_POST);
  // Check if a POST Request
  if (isset($_POST["requestType"]) && !empty($_POST["requestType"])) {
    $requestType = $_POST["requestType"];
  }
  // Check if a GET Request
  if (isset($_GET["requestType"]) && !empty($_GET["requestType"])) {
    $requestType = $_GET["requestType"];
  }

  if (isset($requestType) && !empty($requestType)) {
    $mysqli = new mysqli(DB_STOCK_HOST, DB_STOCK_USER, DB_STOCK_PASSWORD, DB_STOCK_NAME);
    if ($mysqli->errno) {
      echo $mysqli->error;
      exit();
    }
    // Check what is the request type
    switch ($requestType) {
      case "USER_SIGN_UP":
        $result = userSignUp($mysqli, $_POST["email"], $_POST["password"]);
        echo json_encode($result);
        break;
      case "USER_LOGIN":
        $result = userLogIn($mysqli, $_POST["email"], $_POST["password"]);
        echo json_encode($result);
        break;
      case "GET_USER_PORTFOLIO":
        $result = getUserPortfolio($mysqli, $_GET["email"]);
        echo json_encode($result);
        break;
      case "GET_ALL_ORDERS":
        $result = getAllOrders($mysqli, $_GET["email"]);
        echo json_encode($result);
        break;
      case "GET_PENDING_ORDERS_OF_USER":
        $result = getPendingOrders($mysqli, $_GET["email"]);
        echo json_encode($result);
        break;
      case "SELL_PORTFOLIO_SHARE":
        $result = sellPortfolioShare($mysqli, $_POST["email"], $_POST["symbol"], $_POST["qtyToSell"]);
        echo json_encode($result);
        break;
      case "BUY_SHARES":
        $result = buyShares($mysqli, $_POST["email"], $_POST["symbol"], $_POST["qtyToBeBought"], $_POST["priceBoughtFor"], $_POST["orderToBeUpdated"], $_POST["credits"]);
        echo json_encode($result);
        break;
      case "GET_CREDITS":
        $result = getCredits($mysqli, $_GET["email"]);
        echo json_encode($result);
        break;
      default:
        echo "Not a valid request type!";
        break;
    }
    $mysqli->close();
  }

  // Function for GET_CREDITS
  function getCredits($mysqli, $email) {
    if (!$mysqli || !isset($email) || empty($email)) {
      exit();
    }

    // Find the user_id associated to the email.
    $sql_query = "SELECT credits from users WHERE email='$email';";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_buying_user would contain the user_id with the corresponding email
    $sql_user_credits = ($sql_results->fetch_assoc())["credits"];
    return [
      "credits" => $sql_user_credits
    ];
  }

  // Function for BUY_SHARES
  function buyShares($mysqli, $email, $symbol, $qtyToBeBought, $priceBoughtFor, $order_id, $credits) {
    if (!$mysqli || !isset($email) || empty($email)) {
      exit();
    }

    // Find the user_id associated to the email.
    $sql_query = "SELECT user_id from users WHERE email='$email';";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_buying_user would contain the user_id with the corresponding email
    $sql_buying_user = ($sql_results->fetch_assoc())["user_id"];
    if (!isset($sql_buying_user) || empty($sql_buying_user)) {
      echo $mysqli->error;
      exit();
    }

    // Find the Buying User's Portfolio ID
    $sql_buyer_portfolio = "SELECT portfolio_id FROM users WHERE user_id=$sql_buying_user;";
    $sql_buyer_results = $mysqli->query($sql_buyer_portfolio);
    if (!$sql_buyer_results) {
      echo $mysqli->error;
      exit();
    }
    // $buyer_portfolio_id would contain the portfolio_id of the corresponding buyer's user ID
    $buyer_portfolio_id = ($sql_buyer_results->fetch_assoc())["portfolio_id"];

    // Update Buying User ($sql_user) Portfolio to have the qty he/she bought
    $col = $qtyToBeBought . "," . $priceBoughtFor;
    $sql_update_buy_portfolio = "UPDATE portfolios SET $symbol='$col' WHERE portfolio_id=$buyer_portfolio_id;";
    $update_buy_portfolio_results = $mysqli->query($sql_update_buy_portfolio);
    if (!$update_buy_portfolio_results) {
      echo $mysqli->error;
      exit();
    }

    // Get the Buying User's Current # of Credits
    $sql_buyer_credits = "SELECT credits FROM users WHERE user_id=$sql_buying_user;";
    $buyer_credits_results = $mysqli->query($sql_buyer_credits);
    if (!$buyer_credits_results) {
      echo $mysqli->error;
      exit();
    }
    $currBuyerCredits = ($buyer_credits_results->fetch_assoc())["credits"];

    // Update Buying User's Credits to be less
    $buyerUpdatedCredits = $currBuyerCredits - $credits;
    if ($buyerUpdatedCredits < 0) {
      return [
        "status" => "Error",
        "response" => 'Cannot complete order. Buying User does not have enough credits!'
      ];
    }
    $sql_update_buyer_credits = "UPDATE users SET credits=$buyerUpdatedCredits WHERE user_id=$sql_buying_user;";
    $update_buyer_credits_results = $mysqli->query($sql_update_buyer_credits);
    if (!$update_buyer_credits_results) {
      echo $mysqli->error;
      exit();
    }

    // Find the user id of the selling user
    $sql_find_selling_user = "SELECT user_id FROM orders WHERE order_id=$order_id;";
    $find_selling_user_results = $mysqli->query($sql_find_selling_user);
    if (!$find_selling_user_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_selling_user contains the user_id of the selling user
    $sql_selling_user = ($find_selling_user_results->fetch_assoc())["user_id"];

    // Find Selling User's Current Number of Credits
    $sql_seller_credits = "SELECT credits FROM users WHERE user_id=$sql_selling_user;";
    $seller_credits_results = $mysqli->query($sql_seller_credits);
    if (!$seller_credits_results) {
      echo $mysqli->error;
      exit();
    }
    $currSellerCredits = ($seller_credits_results->fetch_assoc())["credits"];

    // Update Selling User's # of Credits
    $sellerUpdatedCredits = $currSellerCredits + $credits;
    $sql_update_seller_credits = "UPDATE users SET credits=$sellerUpdatedCredits WHERE user_id=$sql_selling_user;";
    $update_seller_credits_results = $mysqli->query($sql_update_seller_credits);
    if (!$update_seller_credits_results) {
      echo $mysqli->error;
      exit();
    }

    // Delete the Order from the DB
    $sql_delete_order_query = "DELETE FROM orders WHERE order_id=$order_id;";
    $sql_delete_order_results = $mysqli->query($sql_delete_order_query);
    if (!$sql_delete_order_results) {
      echo $mysqli->error;
      exit();
    }

    // If we reached here, then the transaction was successful
    return [
      "status" => "Success",
      "response" => "Transaction Successful!"
    ];
  }

  // Function for SELL_PORTFOLIO_SHARE
  function sellPortfolioShare($mysqli, $email, $symbol, $qtyToSell) {
    if (!$mysqli || !isset($email) || empty($email)) {
      exit();
    }

    // Find the user_id associated to the email.
    $sql_query = "SELECT user_id from users WHERE email='$email';";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_user would contain the user_id with the corresponding email
    $sql_user = ($sql_results->fetch_assoc())["user_id"];
    if (!isset($sql_user) || empty($sql_user)) {
      echo $mysqli->error;
      exit();
    }

    // Find the Corresponding Symbol
    $find_symbol_query = "SELECT symbol_id FROM symbols WHERE symbol_abbr='$symbol';";
    $find_symbol_results = $mysqli->query($find_symbol_query);
    if (!$find_symbol_results) {
      echo $mysqli->error;
      exit();
    }
    // $curr_symbol_id holds the corresponding symbol
    $curr_symbol_id = ($find_symbol_results->fetch_assoc())["symbol_id"];

    // Add to the Order Table
    $insert_order_query = "INSERT INTO orders(order_qty, user_id, symbol_id, order_status) VALUES($qtyToSell, $sql_user, $curr_symbol_id, 'open');";
    $insert_order_results = $mysqli->query($insert_order_query);
    if (!$insert_order_results) {
      echo $mysqli->error;
      exit();
    }
    // Find the Portfolio ID of the User
    $find_portfolio_query = "SELECT portfolio_id FROM users WHERE user_id=$sql_user;";
    $find_portfolio_results = $mysqli->query($find_portfolio_query);
    if (!$find_portfolio_results) {
      echo $mysqli->error;
      exit();
    }
    // $curr_portfolio_id contains the user's portfolio id
    $curr_portfolio_id = ($find_portfolio_results->fetch_assoc())["portfolio_id"];

    // Update User's Portfolio
    $update_portfolio_query = "UPDATE portfolios SET $symbol=NULL WHERE portfolio_id=$curr_portfolio_id;";
    $update_portfolio_results = $mysqli->query($update_portfolio_query);
    if (!$update_portfolio_results) {
      echo $mysqli->error;
      exit();
    }
    // If here, then we have successfully updated our database
    return [
      "status" => "Success",
      "response" => "Successfully added Order and updated User's Portfolio"
    ];
  }

  // Function for GET_PENDING_ORDERS_OF_USER
  function getPendingOrders($mysqli, $email) {
    if (!$mysqli || !isset($email) || empty($email)) {
      exit();
    }
    // Find the user_id associated to the email.
    $sql_query = "SELECT user_id from users WHERE email='$email';";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_user would contain the user_id with the corresponding email
    $sql_user = ($sql_results->fetch_assoc())["user_id"];
    if (!isset($sql_user) || empty($sql_user)) {
      echo $mysqli->error;
      exit();
    }
    // Find all pending orders of user
    $sql_sec_query = "SELECT * FROM orders o LEFT JOIN symbols s ON s.symbol_id=o.symbol_id WHERE o.order_status='open' AND o.user_id=$sql_user;";
    $sql_sec_results = $mysqli->query($sql_sec_query);
    if (!$sql_sec_results) {
      echo $mysqli->error;
      exit();
    }
    // If no rows returned, then user has no pending orders. Else, user does.
    if ($sql_sec_results->num_rows > 0) {
      $resArr = array();
      while ($row = $sql_sec_results->fetch_assoc()) {
        array_push($resArr, $row);
      }
      return $resArr;
    }
    return [
      "status" => "Error",
      "response" => "No pending orders for specified user."
    ];
  }

  // Function for GET_ALL_ORDERS
  function getAllOrders($mysqli, $email) {
    if (!$mysqli || !isset($email) || empty($email)) {
      exit();
    }
    // Find the user_id associated to the email.
    $sql_query = "SELECT user_id from users WHERE email='$email';";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_user would contain the user_id with the corresponding email
    $sql_user = ($sql_results->fetch_assoc())["user_id"];
    if (!isset($sql_user) || empty($sql_user)) {
      echo $mysqli->error;
      exit();
    }
    // Find all open orders that is not the current users'
    $sql_sec_query = "SELECT * FROM orders o LEFT JOIN symbols s ON s.symbol_id=o.symbol_id WHERE o.order_status='open' AND o.user_id!=$sql_user;";
    $sql_sec_results = $mysqli->query($sql_sec_query);
    if (!$sql_sec_results) {
      echo $mysqli->error;
      exit();
    }
    $resArr = array();
    while ($row = $sql_sec_results->fetch_assoc()) {
      array_push($resArr, $row);
    }
    return $resArr;
  }

  // Function for USER_SIGN_UP
  function userSignUp($mysqli, $email, $password) {
    if (!$mysqli || !isset($email) || empty($email) || !isset($password) || empty($password)) {
      exit();
    }
    // Check whether email is unique. If not, output error to Front-End. If email is unique, insert to the database, and tell user success.
    $sql_query = "SELECT * FROM users WHERE email='$email';";
    $results = $mysqli->query($sql_query);
    if (!$results) {
      echo $mysqli->error;
      exit();
    }
    $row_count = $results->num_rows;
    if ($row_count == 0) {
      // If we're here, email is unique. Can proceed to add the user. Insert to the Database a new portfolio for the new user first. Need to get the next Portfolio ID that's going to be added.
      $sql_portfolio = "SELECT * FROM portfolios;";
      $portfolio_results = $mysqli->query($sql_portfolio);
      if (!$portfolio_results) {
        echo $mysqli->error;
        exit();
      }
      $new_portfolio_id = $portfolio_results->num_rows + 1;
      $sql_add_portfolio = "INSERT INTO portfolios(portfolio_id) VALUES($new_portfolio_id);";
      $add_portfolio_results = $mysqli->query($sql_add_portfolio);
      if (!$add_portfolio_results) {
        echo $mysqli->error;
        exit();
      }
      // Hash the password first
      $password = hash('sha256', $password);
      // Insert the user to the Database along with the Portfolio for them that we just added
      $curr_date = date("Y/m/d");
      $sql_user_insert = "INSERT INTO users(user_id, email, password, credits, date_joined, portfolio_id) VALUES($new_portfolio_id, '$email', '$password', 15000, '$curr_date', $new_portfolio_id);";
      $user_insert_results = $mysqli->query($sql_user_insert);
      if (!$user_insert_results) {
        echo $mysqli->error;
        exit();
      }
      // return success
      return [
        "status" => "Success",
        "response" => "Successfully added User to the Database",
        "credits" => 15000
      ];
    }
    // return failure
    return [
      "status" => "Failure",
        "response" => "Email already Exists!"
    ];
  }

  function userLogIn($mysqli, $email, $password) {
    if (!$mysqli || !isset($email) || empty($email) || !isset($password) || empty($password)) {
      exit();
    }
    // Hash the password. Use that hashed string and match it with the hash stored in the database.
    $password = hash('sha256', $password);
    $sql_query = "SELECT * FROM users WHERE email='$email' AND password='$password';";

    // Find the record where the email tuple is exactly the same as email inputted by the user.
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    $row_count = $sql_results->num_rows;
    $credits = ($sql_results->fetch_assoc())["credits"];

    if ($row_count == 1) {
      // Here, we have found the user. Can return Success.
      return [
        "status" => "Success",
        "response" => "Successfully logged in.",
        "credits" => $credits
      ];
    }
    // Return Failure. User not found
    return [
      "status" => "Failure",
      "response" => "Invalid Email Address or Password! Please try again."
    ];
  }

  function getUserPortfolio($mysqli, $email) {
    if (!$mysqli || !isset($email) || empty($email)) {
      exit();
    }
    // Find the user_id associated to the email.
    $sql_query = "SELECT user_id from users WHERE email='$email';";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    // $sql_user would contain the user_id with the corresponding email
    $sql_user = ($sql_results->fetch_assoc())["user_id"];
    if (!isset($sql_user) || empty($sql_user)) {
      echo $mysqli->error;
      exit();
    }
    // echo $sql_user;
    // Find the portfolio_id of corresponding user
    $sql_query = "SELECT portfolio_id FROM users WHERE user_id=$sql_user;";
    $sql_results = $mysqli->query($sql_query);
    if (!$sql_results) {
      echo $mysqli->error;
      exit();
    }
    $user_portfolio = ($sql_results->fetch_assoc())["portfolio_id"];
    // echo $user_portfolio;
    // With the portfolio_id, find the portfolio of the corresponding user
    if (isset($user_portfolio) && !empty($user_portfolio)) {
      $sql_portfolio_query = "SELECT * FROM portfolios WHERE portfolio_id=$user_portfolio;";
      $sql_portfolio_results = $mysqli->query($sql_portfolio_query);
      if (!$sql_portfolio_results) {
        echo $mysqli->error;
        exit();
      }
      // If reached here, means we have the user portfolio in associative array format. Return it.
      return $sql_portfolio_results->fetch_assoc();
    }
    // If here, failed.
    return [
      "status" => "Error"
    ];
  }
?>