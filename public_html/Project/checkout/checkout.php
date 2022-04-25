<!doctype html>
<html lang="en">

<!-- /*
UCID: sb59
Date: 4/20/22
Site(s)/Who: https://getbootstrap.com/docs/4.5/examples/checkout/
Purpose: I used Bootstrap Example checkout
Why: I enjoyed the design
*/ -->


<script>

function validate(form) {

let firstName = form.firstName.value;
let lasttName = form.lastName.value;
let payment = form.payment.value;
let paymentMethod = form.paymentMethod.value;
let username = form.username.value;
let email = form.email.value;
let address = form.address.value;
let country = form.country.value;
let state = form.state.value;
let zip = form.zip.value;


let isValid = true;

return isValid;

}


</script>

<?php

require(__DIR__ . "/../../../partials/nav.php");

$db = getDB();

if (!is_logged_in()) {
    flash("Please login or register before attempting to checkout", "warning");
    /* die(header("Location: " . get_url("login.php"))); */
    redirect("login.php");
}

else {

  $query = "SELECT name, c.id as prodid, item_id, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";

  $stmt = $db->prepare($query);
  $cartResults = [];
  try {
      $stmt->execute([":id" => get_user_id()]);
      $cartResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "<pre>" . var_export($e, true) . "</pre>";
  }

  $username = get_username();
  $email = get_user_email();

}

$OrderItemsSuccess = false; 
$OrderSuccess = false;

#firstName lastName username email address address2 country state zip

if ( isset($_POST["save"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["paymentMethod"])
     && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["address"]) 
     && isset($_POST["country"]) && isset($_POST["state"]) && isset($_POST["zip"]) )  {

      $firstName = se($_POST, "firstName", "", false);
      $lastName = se($_POST, "lastName", "", false);
      $name = $firstName . " " . $lastName;
      $payment = se($_POST, "Payment", "", false);
      $paymentMethod = se($_POST, "paymentMethod", "", false);
      $username = se($_POST, "username", "", false);
      $email = se($_POST, "email", "", false);
      $address = se($_POST, "address", "", false);
      if (isset($_POST["address2"])) {$address .= " " . se($_POST, "address2", "", false);}
      
      $country = se($_POST, "country", "", false);
      $state = se($_POST, "state", "", false);
      $zip = se($_POST, "zip", "", false);
      $address = $address . " " . $country . " " . $state . " " . $zip;

      $hasError = false;

      #Verifying current price against products table

      $query = "SELECT name, c.id as prodid, item_id, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";
      $query = "SELECT name, item_id, unit_price, stock, visibility, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";

      $stmt = $db->prepare($query);
      $prodTableResults = [];
      try {
          $stmt->execute([":id" => get_user_id()]);
          $prodTableResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          echo "<pre>" . var_export($e, true) . "</pre>";
      }
    
      $username = get_username();
      $email = get_user_email();
      $cartTotal = 0; 

      if (count($prodTableResults)>0) :
        foreach ($prodTableResults as $index => $record) : 
                //echo "<pre>" . var_export($record, true) . "</pre>";
                if (se($record,"stock","",false)<se($record,"quantity","",false)) {
                  flash("Exceeded Stock: Only " . se($record,"stock","",false) . " stock of " . se($record,"name","",false) . " remaining", "danger");
                  $hasError = true;
                };

                if (se($record,"visibility","",false)==0) {
                  flash(se($record,"name","",false) . " no longer available", "danger");
                  $hasError = true;
                };
                foreach ($cartResults as $column => $value) : 
                endforeach;
                $cartTotal+=se($record,'subtotal',"",false);
        endforeach;
      endif;

      $paymentDifference = $cartTotal - $payment;
      if ($payment<$cartTotal) {
            flash("Payment is not enough: add " . $paymentDifference . " more to payment", "danger");
            $hasError = true;
      }

    //description, category, stock, unit_price, visibility required and stock and unit price >0
    if (!$hasError) {

        $OrderSuccess = false;
        $OrderItemsSuccess = false;
        //$db = getDB();
        $stmt = $db->prepare("INSERT INTO Orders (firstName, lastName, user_id, total_price, address, payment_method, money_received) VALUES(:firstName, :lastName, :uid, :total_price, :address, :payment_method, :money_received)");
        try {
            $stmt->execute([":uid" => get_user_id(), ":firstName" => $firstName, ":lastName" => $lastName, ":total_price" => $cartTotal, ":address" => $address, ":payment_method" => $paymentMethod, ":money_received" => $payment]);
            $OrderSuccess = true;
            //flash("Successfully added order to Orders Table", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A product with this name already exists, please try another", "warning");
            } else {
                flash("An unexpected error occured in trying to add this product", "danger");
                //flash(var_export($e->errorInfo, true), "danger");
                //error_log($e);
            }
        }
    
    $lastId = $db->lastInsertId();

    foreach ($prodTableResults as $index => $record) : 
      //echo "<pre>" . var_export($record, true) . "</pre>";
      $stmt = $db->prepare("INSERT INTO OrderItems (order_id, item_id, quantity, unit_price) VALUES(:oid, :iid, :quantity, :unit_price)");
      try {
          $stmt->execute([":oid" => $lastId, ":iid" => se($record,"item_id","",false), ":quantity" => se($record,"quantity","",false), ":unit_price" => se($record,"unit_price","",false)]);
          $OrderItemsSuccess = true;
          //flash("Successfully added order to OrderItems Table", "success");
      } catch (PDOException $e) {
          if ($e->errorInfo[1] === 1062) {
              flash("A product with this name already exists, please try another", "warning");
          } else {
              flash("An unexpected error occured in trying to add this product", "danger");
              flash(var_export($e->errorInfo, true), "danger");
              error_log($e);
          }
      }
        foreach ($cartResults as $column => $value) : 
        endforeach;
      endforeach;

      if (($OrderItemsSuccess) && ($OrderSuccess)) {
        flash("Order successfully completed!", "success");

        $_SESSION["user"]["lastID"] = $lastId;
        die(header("Location: " . get_url("checkout/checkoutConfirmPage.php")));
      }

}

}

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout Page</title>

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/lightning-charge.svg" alt="" width="72" height="57">
      <h2>Checkout form</h2>
      <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
    </div>

    <div class="row g-6">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <!-- <span class="text-primary">Your Cart</span> -->
          <span class="text-primary"><a href="/./Project/cart.php">Your Cart</a></span>
          <span class="badge bg-primary rounded-pill"><?php echo count($cartResults)?></span>
        </h4>
        <ul class="list-group mb-3">

<!-- 
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
          </li>
          
 -->
          <?php 
          $cartTotal = 0;
          $numberOfProds = 0;
          if (count($cartResults)>0) :?>
          <?php foreach ($cartResults as $index => $record) : ?>
                  <?php foreach ($cartResults as $column => $value) : ?>
                    <?php $numberOfProds=se($record,'quantity',"",false);?>
                  <?php endforeach; ?>
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                      <div>
                        <h6 class="my-0"> <?php se($record,'name',"",true); ?> x<?php se($numberOfProds);?></h6>  
                        <small class="text-muted">regular shipping item</small>
                      </div>
                      <span class="text-muted">$<?php se($record,'subtotal',"",true); $cartTotal+=se($record,'subtotal',"",false); ?></span>
                  </li>
          <?php endforeach; ?>
        <?php endif;?> 
<!-- 
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>

          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
           -->
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$<?php se($cartTotal);?></strong>
          </li>
        </ul>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing Information</h4>
        <form class="needs-validation" method="POST" onsubmit="return validate(this);" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value=<?php echo $username?> required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Required)</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value=<?php echo $email?>>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" name="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" name="state" required>
                <option value="">Choose...</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

<!--           <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div> -->

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="col-md-3">
              <label for="zip" class="form-label">Payment Amount</label>
              <input type="number" step=".01" min="<?php echo $cartTotal ?>" class="form-control" id="Payment" name="Payment" placeholder="" required>
              <div class="invalid-feedback">
                Minimum $<?php echo $cartTotal; ?> payment required.
              </div>
            </div>

            <!-- Cash, Visa, MasterCard, Amex -->
          <div class="my-3">
            <div class="form-check form-check-inline">
              <input id="credit" value="cash" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="cash">Cash</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="debit" value="visa" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="visa">Visa</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="paypal" value="mastercard" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="mastercard">MasterCard</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="paypal" value="amex" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="amex">Amex</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="paypal" value="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="paypal" value="bitcoin" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="bitcoin">Bitcoin</label>
            </div>
          </div>



          <!-- <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div> -->

            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="save">Complete Purchase</button>
        </form>
      </div>
    </div>
  </main>

<!--   <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>f
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
 -->

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>


<?php require_once(__DIR__ . "/../../../partials/flash.php"); ?>