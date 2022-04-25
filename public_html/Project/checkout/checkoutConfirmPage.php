<!doctype html>
<html lang="en">

<!-- /*
UCID: sb59
Date: 4/20/22
Site(s)/Who: https://getbootstrap.com/docs/4.5/examples/checkout/
Purpose: I used Bootstrap Example checkout
Why: I enjoyed the design
*/ -->


<?php require(__DIR__ . "/../../../partials/nav.php"); ?>


<?php

if (!is_logged_in()) {
    flash("Please login or register before attempting to checkout", "warning");
    die(header("Location: " . get_url("login.php")));
}

if (!isset($_SESSION['user']['lastID'])) {
  flash("Please checkout from your cart", "warning");
  die(header("Location: " . get_url("cart.php")));
}

?>

<script> 

clear_cart("",false);

</script>



<?php {

  $db = getDB();

  #$query = "SELECT name, c.id as prodid, item_id, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";
  //$query = "SELECT name, c.id as prodid, item_id, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";

  $orderID = $_SESSION["user"]["lastID"];
  unset($_SESSION["user"]["lastID"]);

  $query = "SELECT id, user_id, total_price, address, payment_method, money_received FROM Orders WHERE id = :id";
  
  $stmt = $db->prepare($query);
  $orderDetails = [];
  try {
      $stmt->execute([":id" => $orderID]); //temp
      $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "<pre>" . var_export($e, true) . "</pre>";
  }

  $moneyReceived = se($orderDetails[0],'money_received',"",false);
  $paymentMethod = se($orderDetails[0],'payment_method',"",false);

  $query = "SELECT name, c.id as prodid, item_id, quantity, c.unit_price, ROUND((c.unit_price*c.quantity),2) as subtotal FROM OrderItems c JOIN Products i ON c.item_id = i.id WHERE c.order_id = :id";
  
  $stmt = $db->prepare($query);
  $cartResults = [];
  try {
      $stmt->execute([":id" => $orderID]); //temp
      $cartResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "<pre>" . var_export($e, true) . "</pre>";
  }

}

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout Confirmation Page</title>

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
      <img class="d-block mx-auto mb-4" src="../assets/brand/bag-heart.svg" alt="" width="72" height="57">
      <h2>Thank you for your purchase!</h2>
    </div>

    <div class="row">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Order #<?php se($orderID); ?> Confirmation</span>
          <span class="badge bg-primary rounded-pill"><?php echo count($cartResults)?></span>
        </h4>

        <ul class="list-group">
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

        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$<?php se($cartTotal);?></strong>
        </li>
        
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <span>Payment (<?php echo ucfirst($paymentMethod); ?>)</span>
            </div>
            <!-- echo str_pad($string,$length,"0", STR_PAD_LEFT); -->
            <strong>$<?php 
                if ( str_contains($moneyReceived, '.') ) {
                  echo $moneyReceived;
                }
                else {
                  echo $moneyReceived . ".00";
                }
            ?>
            </strong>
        </li>

          
          </ul>

  </main>

<!--   <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
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