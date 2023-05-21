function enableCardFields() {
    document.getElementById("card-number").disabled = false;
    document.getElementById("cvc").disabled = false;
    document.getElementById("mobile-number").disabled = true;
  }
  
  function enableMobileField() {
    document.getElementById("mobile-number").disabled = false;
    document.getElementById("card-number").disabled = true;
    document.getElementById("cvc").disabled = true;
  }