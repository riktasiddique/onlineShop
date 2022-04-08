let isIncrese = (isIncrese, inputId, unitPriceId, priceId) =>{
   let inputFeild = document.getElementById(inputId);
    let inputFeildValue = parseInt(inputFeild.value);
    // console.log(inputFeildValue);
    if(isIncrese == true){
       inputFeildValue += 1;
    }else if(isIncrese == false && inputFeildValue > 1){
       inputFeildValue -= 1;
    }
    inputFeild.value = inputFeildValue;
    let unitPrice = document.getElementById(unitPriceId).value * inputFeildValue;
    // console.log(unitPrice)
    document.getElementById(priceId).innerText = unitPrice;
}
