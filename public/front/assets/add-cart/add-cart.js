function totalPrice(){
  let priceIds = document.querySelectorAll('[id^="productPriceId"]');
  let total_price = 0;
  priceIds.forEach(price => total_price += +price.innerText);
  return total_price;
  // console.log(total_price);
}
let totalPayable = () =>{
  document.getElementById('subTotal').innerText = totalPrice();
  document.getElementById('total').innerText = totalPrice();
  document.getElementById('shippingCharge').innerText = 50;
  document.getElementById('payable').innerText = 50 + totalPrice();
}
totalPayable();