// On page load, Call the News API for the Index Page
$.ajax({
  method: "GET",
  url: `${NEWS_API_PATH}?country=us&apiKey=${NEWS_API_KEY}`,
}).done(function(results) {
  const articles = results.articles
  // console.log(articles)
  // Add to the News Carousel first
  let i = 0
  let firstItemHit = false
  let carousel_limit = 0
  // 3 because Carousel only allows for 3 items
  while (carousel_limit < 3) {
    let curr = articles[i]
    // Error Check: if there is no title, or no description, or no urlToImage, continue
    if (!curr.title || !curr.description || !curr.urlToImage) {
      i++
      continue
    }
    let currCarousel;
    if (!firstItemHit) {
      currCarousel = createNewsCarouselItem(curr.title, curr.description, curr.url, curr.urlToImage, 1)
      firstItemHit = true
    } else {
      currCarousel = createNewsCarouselItem(curr.title, curr.description, curr.url, curr.urlToImage)
    }
    $(".carousel-inner").append(currCarousel)
    i++
    carousel_limit++
  }
  let list_limit = carousel_limit
  // Add to News List (7 more items)
  while (list_limit < 10) {
    let curr = articles[i]
    // Error Check: if there is no title, or no description, or no author, or no source, or no url, continue
    if (!curr.title || !curr.description || !curr.author || !curr.source || !curr.url) {
      i++
      continue
    }
    let currNewsItem = createNewsListItem(curr.title, curr.description, curr.author,curr.source.name, curr.url)
    $("#News").append(currNewsItem)
    i++
    list_limit++
  }
})

// On page load, Call the stock API for the Index Page
callStockAPIIndex(`${INDEX_COYS_STR}`)