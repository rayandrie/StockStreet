// On Load, check if session is ongoing. If not, set Portfolio Link to be disabled
$(document).ready(function() {
  if (!$.session.get('logged in')) {
    console.log('User not logged in.')
    $('#portfolio-link').toggleClass('nav-grey-disabled')
    $('#portfolio-link').removeClass('font-bg-color')
    $('#portfolio-link').attr('tabindex', '-1')
    $('#portfolio-link').attr('aria-disabled', 'true')
  } else {
    // If session is ongoing, need to make Log In Button be a nav item with the username, as well as make the Sign Up Button be a Log Out Button instead (Need to change href attribute and onclick function to destroy the session).
    const username = $.session.get('username')
    console.log('Username in Session:', username)
    $('#leftButton').removeClass()
    $('#leftButton').addClass('nav-link disabled')
    $('#leftButton').html(username)
    $('#rightButton').html('Log Out')
    $('#rightButton').click(function() {
      $.session.clear()
      window.location.replace('../IndexPage/index.php')
    })
    $('#rightButton').attr('href', '../IndexPage/index.php')
    // console.log($('#leftButton'))
    // console.log($('#rightButton'))
  }
})
