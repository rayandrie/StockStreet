$(document).ready(function() {
  // If we're here, we definitely have a logged in user
  const username = $.session.get('username')
  // Set the # of Credits the user has
  $('#userCredits').append('$' + $.session.get('credits'))
  populateWholePage()
})

// Global Variables
let userPortfolio = []
let buyOrdersCounter = 1
let sellOrdersCounter = 1

function populateWholePage() {
  $.ajax({
    method: "GET",
    url: `${FMP_API}${ALL_COYS_STR}?datatype=json`
  }).done(function(results) {
    const allStocks = JSON.parse(results)
    // console.log(allStocks)
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
        $.session.set(stock, curr.Price)
      }
    }
    // After this, call the backend to get the user portfolio
    genPortfolio()

    // TESTING TODO
    // Create Selling Item
    // let qw = createSellingListItem("AAPL", 100, 200, "100,100")
    // $('#allSellOrders').append(qw)
    // // Create Selling Modal
    // let sellModal = createModal(false, "AAPL", 100, 200, "100,100")
    // $('#allBuyModals').append(sellModal)

  })
}

function genSellOrders() {
  $.ajax({
    method: "GET",
    url: BACKEND_URL,
    data: {
      requestType: GET_ALL_ORDERS,
      email: $.session.get('email')
    }
  }).done(function(results) {
    results = JSON.parse(results)
    console.log(results)
    for (let i = 0; i < results.length; i++) {
      let curr = results[i]
      const symbol = curr.symbol_abbr
      // Create Selling Item
      let sellListItem = createSellingListItem(symbol, curr.order_qty, $.session.get(symbol))
      $('#allSellOrders').append(sellListItem)
      // Create Selling Modal
      let sellModal = createModal(false, symbol, curr.order_qty, $.session.get(symbol), null)
      $('#allBuyModals').append(sellModal)
    }
  }) 
}

// symbol is the NASDAQ Symbol
// numQty is the # of Qty the user is selling
// currPrice is the current price in the market right now
function createSellingListItem(symbol, numQty, currPrice) {
  // const commaIndex = symbolStr.indexOf(',')
  // const qty = parseInt(symbolStr.substring(0, commaIndex))
  // const prevPrice = parseFloat(symbolStr.substring(commaIndex + 1))

  // Create Inner Div
  $innerDiv = $('<div>')
  $innerDiv.addClass('d-flex justify-content-between')
  let headingText = symbol + " | " + "Selling " + numQty + " Shares"
  $coyBadge = createBadge("badge-coy", headingText, "<h5>")
  let infoText = "Buy Price/Share: $" + currPrice
  $infoBadge = createBadge("badge-info", infoText, "<h5>")
  let $thirdBadge
  // Calculate total cost
  let totalCost = currPrice * numQty
  totalCost = totalCost.toFixed(2)
  if (parseFloat($.session.get('credits')) < parseFloat(totalCost)) {
    $thirdBadge = createBadge("badge-danger", "Total Cost: $" + totalCost, "<h5>")
  } else {
    $thirdBadge = createBadge("badge-light", "Total Cost: $" + totalCost, "<h5>")
  }
  $innerDiv.append($coyBadge)
  $innerDiv.append($infoBadge)
  $innerDiv.append($thirdBadge)

  // Create outer div
  $outerDiv = $('<div>')
  $outerDiv.addClass('list-group-item list-group-item-action dark-mode-bg company-color')
  
  // Create Button
  let $button = createButton(false, totalCost)

  // Append all to outer div
  $outerDiv.append($innerDiv)
  $outerDiv.append($button)
  return $outerDiv
}

function createButton(isSelling, currCost) {
  let $button = $('<button>')
  $button.attr('type', 'button')
  $button.attr('data-toggle', 'modal')
  if (isSelling) {
    // Check if user is selling from his/her portfolio
    $button.addClass('btn btn-danger btn-block')
    let modal_id = "#sellPortfolioModal" + sellOrdersCounter
    // sellOrdersCounter++
    $button.attr('data-target', modal_id)
    $button.append('Sell your Shares')
  } else {
    // User is buying from one of the orders in the market
    $button.addClass('btn btn-success btn-block')
    // First, need to check whether user has enough credits to buy
    if (parseFloat($.session.get('credits')) < parseFloat(currCost)) {
      // TODO - Check Disabled Status
      $button.attr('disabled', true)
    }
    let modal_id = "#buyOrdersModal" + buyOrdersCounter
    // buyOrdersCounter++
    $button.attr('data-target', modal_id)
    $button.append('Buy Shares')
  }
  return $button
}

function checkButtonStatus(symbol, numSelling, qtyUserHas) {
  // // If user does not have the exact quantity of what the other user wants, then disable button
  // if (qtyUserHas !== numSelling) {
  //   return false
  // }
  // for (let i = 0; i < userPortfolio.length; i++) {
  //   if (userPortfolio[i].symbol === symbol) {
  //     // User has that particular symbol that the other user wants exactly. Do not disable button
  //     return true
  //   }
  // }
  // return false
  
}

function createModal(isSelling, symbol, qtyInSellOrder, currPrice, symbolStr) {
  let commaIndex
  let qty
  let prevPrice
  if (isSelling) {
    commaIndex = symbolStr.indexOf(',')
    qty = parseInt(symbolStr.substring(0, commaIndex))
    prevPrice = parseFloat(symbolStr.substring(commaIndex + 1))
  }

  // Modal Content
  let $modalContent = $('<div>')
  $modalContent.addClass('modal-content')

  // Modal Header
  let $modalHeader = $('<div>')
  $modalHeader.addClass('modal-header')
  let $modalTitle = $('<h5>')
  $modalTitle.addClass('modal-title')
  if (isSelling) {
    $modalTitle.attr('id', 'sellPortfolioLabel')
    $modalTitle.append('Are you sure you want to sell your ' + symbol + ' Stocks?')
  } else {
    $modalTitle.attr('id', 'buyOrdersLabel')
    $modalTitle.append('Are you sure you want to buy these ' + symbol + ' Stocks?')
  }
  // let $button = $('<button>')
  // $button.attr('type', 'button')
  // $button.addClass('close')
  // $button.attr('data-dismiss', 'modal')
  // $button.attr('aria-label', 'Close')
  // let $butSpan = $('<span>')
  // $butSpan.attr('aria-hidden', 'true')
  // $butSpan.append('&times;')
  // $button.append($butSpan)

  $modalHeader.append($modalTitle)

  // Modal Body
  let $modalBody = $('<div>')
  $modalBody.addClass('modal-body')
  if (isSelling) {
    let totalGain = currPrice * qty
    totalGain = cleanNumber(totalGain)
    $modalBody.append('You will gain ' + totalGain + ' Credits.')
  } else {
    let totalLoss = currPrice * qtyInSellOrder
    totalLoss = cleanNumber(totalLoss)
    $modalBody.append('You will lose ' + totalLoss + ' Credits.')
  }

  // Modal Footer
  let $modalFooter = $('<div>')
  $modalFooter.addClass('modal-footer')
  let $footerCloseButton = $('<button>')
  $footerCloseButton.attr('type', 'button')
  $footerCloseButton.addClass('btn btn-secondary')
  $footerCloseButton.attr('data-dismiss', 'modal')
  $footerCloseButton.append('Close')
  let $footerCurrButton = $('<button>')
  $footerCurrButton.attr('type', 'button')
  if (isSelling) {
    $footerCurrButton.addClass('btn btn-danger')
    $footerCurrButton.append('Sell')
  } else {
    $footerCurrButton.addClass('btn btn-success')
    $footerCurrButton.append('Buy')
  }
  $modalFooter.append($footerCloseButton)
  $modalFooter.append($footerCurrButton)

  $modalContent.append($modalHeader)
  $modalContent.append($modalBody)
  $modalContent.append($modalFooter)

  // Modal Dialog Div
  let $modalDialogDiv = $('<div>')
  $modalDialogDiv.addClass('modal-dialog modal-dialog-centered')
  $modalDialogDiv.attr('role', 'document')
  $modalDialogDiv.append($modalContent)

  // Modal Fade Div
  let $modalFadeDiv = $('<div>')
  $modalFadeDiv.addClass('modal fade')
  if (isSelling) {
    $modalFadeDiv.attr('id', 'sellPortfolioModal' + sellOrdersCounter)
    sellOrdersCounter++
  } else {
    $modalFadeDiv.attr('id', 'buyOrdersModal' + buyOrdersCounter)
    buyOrdersCounter++
  }
  $modalFadeDiv.attr('tabindex', '-1')
  $modalFadeDiv.attr('role', 'dialog')
  if (isSelling) {
    $modalFadeDiv.attr('aria-labelledby', 'sellModalLabel')
  } else {
    $modalFadeDiv.attr('aria-labelledby', 'buyModalLabel')
  }
  $modalFadeDiv.attr('aria-hidden', 'true')

  $modalFadeDiv.append($modalDialogDiv)

  return $modalFadeDiv
}

// Generates the Portfolio Section of the logged in User
function genPortfolio() {
  $.ajax({
    method: "GET",
    url: BACKEND_URL,
    data: {
      requestType: GET_USER_PORTFOLIO,
      email: $.session.get('email')
    }
  }).done(function(results) {
    results = JSON.parse(results)
    console.log(results)
    // Check if error
    if (results.status === "Error") {
      console.log(results.status)
    } else {
      // Log out the Portfolio onto the Portfolio Page
      for (let symbol in results) {
        if (results.hasOwnProperty(symbol) && symbol !== "portfolio_id") {
          // symbol variable will hold the symbol the user has in his/her portfolio. If the value for that symbol key is not null, then create a list item and modal for that symbol.
          // curr price in the market
          const currPrice = $.session.get(symbol)
          // symbolObj format: "qty,price_bought_for"
          const symbolStr = results[symbol]
          // console.log(symbol, currPrice, symbolStr)
          if (symbolStr && symbolStr !== "") {
            let portfolioItem = createPortfolioListItem(symbol, currPrice, symbolStr)
            // Add Portfolio List Item
            $('#portfolio-list').append(portfolioItem)
            // Add Portfolio Modal
            let modalPortfolioItem = createModal(true, symbol, null, currPrice, symbolStr)
            $('#allPortfolioModals').append(modalPortfolioItem)
            // Add to user portfolio
            userPortfolio = [
              ...userPortfolio,
              {
                symbol: symbol,
                currPrice: parseInt(currPrice),
                symbolStr: symbolStr
              }
            ]
            console.log(userPortfolio)
          }
        }
      }
      // After this, generate Sell orders
      genSellOrders()
    }
  })
}

// symbol is the NASDAQ Symbol
// currPrice is the current price in the market right now
// symbolStr is "qty,price_bought_for"
function createPortfolioListItem(symbol, currPrice, symbolStr) {
  if (!symbol || symbol === "" || !currPrice || currPrice === "" || !symbolStr || symbolStr === "") {
    console.log("Error in createPortfolioListItem Function")
    return
  }
  const commaIndex = symbolStr.indexOf(',')
  const qty = parseInt(symbolStr.substring(0, commaIndex))
  const prevPrice = parseFloat(symbolStr.substring(commaIndex + 1))
  // Create 1st Inner Div
  let $firstInnerDiv = $('<div>')
  $firstInnerDiv.addClass('d-flex justify-content-between')
  const shares = cleanNumber(qty)
  let headingText = symbol + " | " + shares + " Shares"
  let $coyBadge = createBadge("badge-coy", headingText, "<h3>")
  let $boughtForBadge = createBadge("badge-light", "Bought For: $" + prevPrice, "<h3>")
  $firstInnerDiv.append($coyBadge)
  $firstInnerDiv.append($boughtForBadge)

  // Create 2nd Inner Div
  let $secInnerDiv = $('<div>')
  $secInnerDiv.addClass('d-flex justify-content-between')
  let $sellPriceBadge = createBadge("badge-coy", "Today's Selling Price: $" + currPrice, "<h5>")
  // Check if profit or loss
  let $profitBadge = createProfitBadge(prevPrice, currPrice, qty)

  // Create Sell Button
  let $button = createButton(true)

  $secInnerDiv.append($sellPriceBadge)
  $secInnerDiv.append($profitBadge)

  // Create outer div and append
  let $outerDiv = $('<div>')
  $outerDiv.addClass('list-group-item list-group-item-action dark-mode-bg company-color')
  $outerDiv.append($firstInnerDiv)
  $outerDiv.append($secInnerDiv)
  $outerDiv.append($button)

  return $outerDiv
}

function createProfitBadge(prevPrice, currPrice, qty) {
  // Check if profit or loss
  const totalPrevPrice = Math.floor(prevPrice * qty)
  const totalCurrPrice = Math.floor(currPrice * qty)
  let percProfit = calcProfit(totalPrevPrice, totalCurrPrice)
  let $profitBadge;
  if (percProfit == 0) {
    percProfit = "Profit: +" + percProfit + "%"
    $profitBadge = createBadge("badge-secondary", percProfit, "<h5>")
  } else if (percProfit > 0) {
    percProfit = "Profit: +" + percProfit + "%"
    $profitBadge = createBadge("badge-success", percProfit, "<h5>")
  } else {
    percProfit = "Profit: -" + percProfit + "%"
    $profitBadge = createBadge("badge-danger", percProfit, "<h5>")
  }
  return $profitBadge
}

function calcProfit(totalPrevPrice, totalCurrPrice) {
  const diff = totalCurrPrice - totalPrevPrice
  const result = (diff / totalPrevPrice) * 100.0;
  return result
}