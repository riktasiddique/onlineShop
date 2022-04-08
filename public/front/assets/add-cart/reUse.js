// Product Increse and Decrese
function productIncreseDecrese(issIncrese,id, productPriceId, unitPrice){
    var inputFeild = document.getElementById(id);
    var inputFeildValue = parseInt(inputFeild.value);
    if(issIncrese == true){
     inputFeildValue = inputFeildValue + 1;
    }
    else if(issIncrese == false && inputFeildValue > 1 ){
         inputFeildValue = inputFeildValue - 1;
     }
     inputFeild.value = inputFeildValue;
     // var totalPrice = 100 * inputFeildValue;
     var totalPrice = document.getElementById(unitPrice).value * inputFeildValue;
     document.getElementById(productPriceId).innerText = totalPrice;
     payAble();
 }
 // Cart Input Feild
 function cartFeild(){
     // var cartFeild = document.getElementById('cartFeild');
     // var cartFeildValue = cartFeild.value;
     // return cartFeildValue;
     let priceIds = document.querySelectorAll('[id^="productPrice"]');
     let total_price = 0;
     priceIds.forEach(p => total_price += +p.innerText);
 
     // priceIds .forEach(sumTotal);
     
     // function sumTotal(item, index) {
     // total_price += +document.getElementById(id).innerText;
     // }
 
     return total_price;
 }
 // Product Total Calculation
 function payAble(){
     // subtotal
    var subTotal = cartFeild();
     document.getElementById('subTotal').innerText = subTotal;
     // total
     document.getElementById('total').innerText = subTotal;
     // shipping
     var shippingCharge = 50 ;
     document.getElementById('shippingCharge').innerText = shippingCharge;
     // payable
     var totalPayable = subTotal + shippingCharge;
     document.getElementById('payable').innerText = totalPayable;
 
 }
 