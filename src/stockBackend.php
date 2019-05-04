<?php
  /* This is the backend for my Stock Trading Application */
  define('DB_STOCK_HOST', "303.itpwebdev.com");
  define('DB_STOCK_USER', "andrieja_db_user");
  define('DB_STOCK_PASSWORD', "uscItp2019");
  define('DB_STOCK_NAME', "andrieja_stock_db");
  // echo "I got here!";
  // var_dump($_POST);
  $requestType = $_POST["requestType"];
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
      default:
        echo "Not a valid request type!";
        break;
    }
    $mysqli->close();
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
      $sql_user_insert = "INSERT INTO users(user_id, email, password, credits, date_joined, portfolio_id) VALUES($new_portfolio_id, '$email', '$password', 1000, '$curr_date', $new_portfolio_id);";
      $user_insert_results = $mysqli->query($sql_user_insert);
      if (!$user_insert_results) {
        echo $mysqli->error;
        exit();
      }
      // return success
      return [
        "status" => "Success",
        "response" => "Successfully added User to the Database"
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

    if ($row_count == 1) {
      // Here, we have found the user. Can return Success.
      return [
        "status" => "Success",
        "response" => "Successfully logged in."
      ];
    }
    // Return Failure. User not found
    return [
      "status" => "Failure",
      "response" => "Invalid Email Address or Password! Please try again."
    ];
  }
?>