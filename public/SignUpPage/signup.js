// On Submit Function
$(document).ready(function() {
  $("form").submit(function(event) {
    event.preventDefault()
    console.log("In Submit Function of Signup Page!")
    // Form Validation
    const fName = $("#inputFirstName").val()
    const lName = $("#inputLastName").val()
    const email = $("#inputEmail").val()
    const password = $("#inputPassword").val()
    const err = validateSignUp(fName, lName, email, password)
    if (err !== "") {
      // Output Error onto Pill
      let $valPill = createErrorPill(err)
      $("#errVal").append($valPill)
    }
  
    // If we're here, then user has inputted correct values.
    // Check the database whether we can add this user
    // Email has to be unique in the DB
    $.ajax({
      method: "POST",
      url: BACKEND_URL,
      data: {
        requestType: USER_SIGN_UP,
        email: email,
        password: password
      }
    }).done(function(results) {
      results = JSON.parse(results)
      console.log(results)
      // Server-side Validation
      if (results.status == "Failure") {
        // Output Error onto Pill
        let $valPill = createErrorPill(results.response)
        $("#errVal").append($valPill)
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

// Validation Helper
function validateSignUp(fName, lName, email, password) {
  let error = ""
  if (!fName || fName === "" || !lName || lName === "") {
    error = "Please input your name."
  } else if (!email || email === "") {
    error = "Please enter a valid email."
  } else if (!password || password === "") {
    error = "Please enter a valid password."
  } 
  return error
}