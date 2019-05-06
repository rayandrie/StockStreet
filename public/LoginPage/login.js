$(document).ready(function() {
  $('form').submit(function(event) {
    event.preventDefault()
    console.log("In Submit Function of Login Page!")
    // Validate Log In
    const email = $('#inputEmail').val()
    const password = $('#inputPassword').val()
    const err = validateLogIn(email, password)
    if (err !== "") {
      const $errPill = createErrorPill(err)
      $("#errVal").append($errPill)
    }

    // Here email and password fields are good. Call the backend and check whether user is in records (POST). If so, create a session for the user. Else, display error and let user try again. 
    $.ajax({
      method: "POST",
      url: BACKEND_URL,
      data: {
        requestType: USER_LOGIN,
        email: email,
        password: password
      }
    }).done(function(results) {
      results = JSON.parse(results)
      console.log(results)
      // Let the backend give the error response to the frontend if any
      if (results.status === "Failure"){
        // Output Error onto Pill
        let $errPill = createErrorPill(results.response)
        $("#errVal").append($errPill)
      } else {
        // Set a Session
        setSession(email)
        // Redirect to Portfolio Page
        console.log("Redirecting to Portfolio Page...")
        window.location.replace("../PortfolioPage/portfolio.php")
      }
    })
  })
})

function validateLogIn(email, password) {
  let error = ""
  // Check if email is valid
  if (!email || email === "") {
    error = "Please enter a valid email."
  } else if (!password || password === "") {
    error = "Please enter a valid password."
  }
  return error
}