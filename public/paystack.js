var paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener('submit', payWithPaystack, false);

function payWithPaystack() {
   let  fon =  document.getElementById('phone').value;
   let amt = document.getElementById('amount').value;


    const now = new Date();
    var handler = PaystackPop.setup({

    key: 'pk_live_7ef6ab8d50e59b8be1b9bced9b23a5d6e24f59fb', // Replace with your public key

    email: document.getElementById('email').value =="" ? "info@signalghana.com" :document.getElementById('email').value ,

    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit

    currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars

    ref: Math.floor(Math.random() * 1000000000 + 1), // Replace with a reference you generated

    callback: function(response) {


      var reference = response.reference;

      // Make an AJAX call to your server with the reference to verify the transaction
      $.getJSON('https://signalsouth.sbaresultchecker.com/api/fetchwhensuccess' ,{'phone':fon,"amount":amt}, function(data){
        //alert('Payment complete! Voucher Code: ' + data.vourcher);
      });

    },

    onClose: function() {

      alert('Transaction was not completed, window closed.');

    },

  });


  handler.openIframe();

}
