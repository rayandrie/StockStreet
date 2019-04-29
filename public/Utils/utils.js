// Function to create a Session
function setSession(user_email) {
  const endPos = user_email.indexOf('@')
  if (endPos != -1) {
    const username = user_email.substring(0, endPos)
    // sessionStorage.setItem('logged in', true)
    // sessionStorage.setItem('email', user_email)
    // sessionStorage.setItem('username', username)
    $.session.set('logged in', 'true')
    $.session.set('email', user_email)
    $.session.set('username', username)
  }
}

// Function to call stock API
function callStockAPIIndex(selectInfo) {
  $.ajax({
    method: "GET",
    url: `${FMP_API}${selectInfo}?datatype=json`
  }).done(function(results) {
    const allStocks = JSON.parse(results)
    console.log(allStocks)
    // Add to Stocks List
    for (let stock in allStocks) {
      if (allStocks.hasOwnProperty(stock)) {
        const curr = allStocks[stock]
        // console.log(curr)
        const title = stock + " | " + curr.companyName
        const mktCap = cleanNumber(curr.MktCap)
        const volAvg = cleanNumber(curr.VolAvg)
        let currStockItem = createStockItem(title, curr.Price, curr.Beta, "$" + mktCap, volAvg, curr.ChangesPerc)
        $("#Stocks").append(currStockItem)
      }
    }
  })
}

// Function to create Stock Item (companyName, Price, Beta, MktCap, ChangesPerc)
function createStockItem(companyName, price, beta, mktCap, volAvg, changesPerc) {
  // Create inner div of coyName and Price
  let $coyBadge = createBadge("badge-coy", companyName, "<h3>")
  let $priceBadge = createBadge("badge-light", "$" + price, "<h3>")
  let $firstDiv = $("<div>")
  $firstDiv.addClass("d-flex justify-content-between")
  $firstDiv.append($coyBadge)
  $firstDiv.append($priceBadge)

  // Create inner div of marketCap and Percentage
  let $mktCapBadge = createBadge("badge-coy", "Market Cap: " + mktCap, "<h5>")
  // Need to check whether % increase or decrease
  let $percBadge;
  if (changesPerc.includes("+")) {
    $percBadge = createBadge("badge-success", changesPerc, "<h5>")
  } else {
    $percBadge = createBadge("badge-danger", changesPerc, "<h5>")
  }
  let $secondDiv = $("<div>")
  $secondDiv.addClass("d-flex justify-content-between")
  $secondDiv.append($mktCapBadge)
  $secondDiv.append($percBadge)

  // Create inner div of Avg Volume and Beta
  let $volBadge = createBadge("badge-coy", "Avg Volume: " + volAvg, "<h5>")
  let $betaBadge = createBadge("badge-info", "ß: " + beta, "<h5>")
  let $thirdDiv = $("<div>")
  $thirdDiv.append($volBadge)
  $thirdDiv.append($betaBadge)

  // Create outer div of list item and append all
  let $outerDiv = $("<div>")
  $outerDiv.attr('href', '#')
  $outerDiv.addClass("list-group-item list-group-item-action dark-mode-bg company-color")
  $outerDiv.append($firstDiv)
  $outerDiv.append($secondDiv)
  $outerDiv.append($thirdDiv)

  return $outerDiv
}

// Function to create the badge
function createBadge(badgeType, content, headingSize) {
  let $heading = $(headingSize)
  let $badge = $("<span>")
  $badge.addClass("badge " + badgeType)
  $badge.append(content)
  $heading.append($badge)
  return $heading
}

// Function to give a clean number
function cleanNumber(str) {
  // Convert to integer, and make into a string
  let num = parseInt(str)
  let remainder = 0
  let result = ""
  while (Math.floor(num / 1000) != 0) {
    remainder = num % 1000
    result = "," + remainder.toString() + result
    num = Math.floor(num / 1000)
  }
  result = num.toString() + result
  // console.log(result)
  return result
}


// Function to create a Carousel Item
function createNewsCarouselItem(title, desc, url, urlToImage, first = null) {
  // Create the inner carousel element
  $heading = $("<h5>")
  $heading.append(title)
  $heading.addClass('company-color shadow-effect')
  $description = $("<p>")
  $description.append(desc)
  $description.addClass('company-color shadow-effect')
  const $innerDiv = $("<div>")
  $innerDiv.addClass('carousel-caption d-none d-md-block')
  $innerDiv.append($heading)
  $innerDiv.append($description)
  const $innerImage = $("<img>")
  $innerImage.attr('src', urlToImage)
  $innerImage.addClass('d-block w-100 border border-secondary rounded')
  // Append it to the outer Div
  $outerA = $("<a>")
  if (first) {
    $outerA.addClass('carousel-item active')
  } else {
    $outerA.addClass('carousel-item')
  }
  $outerA.attr('href', url)
  $outerA.attr('target', '_blank')
  $outerA.append($innerImage)
  $outerA.append($innerDiv)
  // console.log($outerA)
  return $outerA
}

// Function to create a News List Item (No Image Needed)
function createNewsListItem(title, desc, author, source, url) {
  // Create the inner div with its corresponding elements (title and source)
  $innerDiv = $("<div>")
  $innerDiv.addClass("d-flex w-100 justify-content-between")
  $title = $("<h5>")
  $title.addClass("mb-1")
  title = cleanTitle(title)
  $title.append(title)
  $source = $("<small>")
  $source.append(source)
  $innerDiv.append($title)
  $innerDiv.append($source)
  // Create the paragraph which is desc
  $description = $("<p>")
  $description.addClass("mb-1")
  $description.append(desc)
  // Create the small (author)
  $author = $("<small>")
  $author.append(author)
  // Create the outer a tag, with href, and append
  $outerA = $("<a>")
  $outerA.attr('href', url)
  $outerA.attr('target', '_blank')
  $outerA.addClass("list-group-item list-group-item-action dark-mode-bg company-color")
  $outerA.append($innerDiv)
  $outerA.append($description)
  $outerA.append($author)

  return $outerA
}

// Find last index of dash, and return the substring before the dash. 
function cleanTitle(title) {
  let lastDashIndex = title.lastIndexOf('-')
  if (lastDashIndex == -1) {
    return title
  }
  return title.substring(0, lastDashIndex - 1)
}