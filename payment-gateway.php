<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(images/henning-witzel-ukvgqriuOgo-unsplash.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
}

.container{
    width: 750px;
    height: 500px;
    border: 1px solid;
    background-color: white;
    display: flex;
    flex-direction: column;
    padding: 40px;
    justify-content:space-around;
}

.container h1{
    text-align: center;
}

.btn{
    background-color: blueviolet;
    color: white;
    text-align: center;
    text-transform: uppercase;
    padding: 10px;
    font-size: 18px;
    transition: 0.5s;
    margin-top: 30px;
}

.btn:hover{
    background-color: dodgerblue;
}

.cards img{
    width: 100px;
}
hr {
  position: absolute;
  color: wheat;
  font-size: 30px;
  width: 100%;
  top: 60px;
}
.rent {
  position: absolute;
  top: 10px;
  font-size: 30px;
  font-family: 'Segoe UI';
  font-weight: bold;
  color: wheat;
}
h1 {
  margin-bottom: 30px;

}
h2 {
  margin-bottom: 20px;
}
</style>
</head>
<body>
  <div>
    <p class="rent">RENTNEST</p>
  </div>
  <hr>
    <div class="container">
      <form action="checkout.php" method="post">
          <h1>Confirm RentNest Payment</h1>
          <h2>Users will enjoy the following services</h2>
          <ul class="brak">
            <li><p>Unlimited listing of vaccant houses</p></li>
            <li><p>weekly report of most searched houses</p></li>
            <li><p>eekly report of most booked houses</p></li>
            <li><p>User friendly interface</p></li>
            <li><p>Unlimited support of the company</p></li>
            <li><p>Weekly report on the best selling type of houses</p></li>
          </ul>

        
              <button class="btn">Continue to payment of $40.00</button>
      </form>
    </div>
</body>
<!-- <script>
  // Set your publishable key
var stripe = Stripe('pk_test_51OzF5t2Ks3vyzGvln5X13dDoixSJnLYRx3rXUki6yXJwpmK8xg0TGbwt1qVINkmy0ahbh7FZ4o5DsnBktTyIugoC006EvncQFA');

// Create an instance of Elements
var elements = stripe.elements();

// Create an instance of the card Element
var card = elements.create('card');

// Add an instance of the card Element into the `card-element` div
card.mount('#card-element');

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Append token to form
      var tokenInput = document.createElement('input');
      tokenInput.setAttribute('type', 'hidden');
      tokenInput.setAttribute('name', 'stripeToken');
      tokenInput.setAttribute('value', result.token.id);
      form.appendChild(tokenInput);
      
      // Submit form
      form.submit();
    }
  });
});

</script> -->
</html>
