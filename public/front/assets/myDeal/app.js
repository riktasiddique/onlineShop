function totalPrice(){
    let priceIds = document.querySelectorAll('[id^="productPriceId"]');
    let total_price = 0;
    priceIds.forEach(price => total_price += +price.innerText);
    // return total_price;
    console.log(total_price);
}
function totalPrice();