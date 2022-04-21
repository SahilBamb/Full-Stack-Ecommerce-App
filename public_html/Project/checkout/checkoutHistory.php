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


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout History Page</title>

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


<?php

if (!is_logged_in()) {
    flash("Please login or register before attempting to checkout", "warning");
    die(header("Location: " . get_url("login.php")));
}

/* else {

  $db = getDB();

  $orderID = 0;
  

  //$query = "SELECT id, user_id, total_price, address, payment_method, money_received FROM Orders WHERE id = :id";
  $query = "SELECT id, user_id, total_price, address, payment_method, money_received FROM Orders WHERE user_id = :uid";
  
  $stmt = $db->prepare($query);
  $orderDetails = [];
  try {
      $stmt->execute([":uid" => get_user_id()]); //temp
      $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "<pre>" . var_export($e, true) . "</pre>";
  }

    foreach ($orderDetails as $index => $record) { 
      $orderID = se($orderDetails[$index],'id',"",false);
      $moneyReceived = se($orderDetails[$index],'money_received',"",false);
      $paymentMethod = se($orderDetails[$index],'payment_method',"",false);
    
    $query = "SELECT name, c.id as prodid, item_id, quantity, c.unit_price, ROUND((c.unit_price*c.quantity),2) as subtotal FROM OrderItems c JOIN Products i ON c.item_id = i.id WHERE c.order_id = :id";
    
    $stmt = $db->prepare($query);
    $cartResults = [];
    try {
        $stmt->execute([":id" => $orderID]); //temp
        $cartResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }

  } */

?>

<body class="bg-light">
    
<div class="container">
  <main>

    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bag-check-fill.svg" alt="" width="72" height="57">
      <h2><?php if (has_role("Admin")) {echo "Admin Checkout History (All Users)";} else {echo "Your Checkout History";} ?></h2>
    </div>

    <div class="row">
      <div class="order-md-last">
      <?php

    $db = getDB();
    $orderID = 0;
    
    $query = "SELECT id, user_id, total_price, address, payment_method, money_received FROM Orders WHERE user_id = :uid limit 10";
    $HeadTitle = "Your Order History";

    if (has_role("Admin")) {
      $query = "SELECT id, user_id, total_price, address, payment_method, money_received FROM Orders ORDER BY created limit 10";
      $HeadTitle = "All Order History";
    }

    $stmt = $db->prepare($query);
    $orderDetails = [];
    try {
      if (!has_role("Admin")) {$stmt->execute([":uid" => get_user_id()]);} 
      else {$stmt->execute();}
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }

    foreach ($orderDetails as $index => $record) { 
      $orderID = se($orderDetails[$index],'id',"",false);
      $moneyReceived = se($orderDetails[$index],'money_received',"",false);
      $paymentMethod = se($orderDetails[$index],'payment_method',"",false);
    
    $query = "SELECT name, c.id as prodid, item_id, quantity, c.unit_price, ROUND((c.unit_price*c.quantity),2) as subtotal FROM OrderItems c JOIN Products i ON c.item_id = i.id WHERE c.order_id = :id";
    
    $stmt = $db->prepare($query);
    $cartResults = [];
    try {
        $stmt->execute([":id" => $orderID]); //temp
        $cartResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }

?>
        <br>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Order #<?php se($orderID); ?></span>
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
                      <h6> <?php se($record,'name',"",true); ?> x<?php se($numberOfProds);?></h6>
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
          <?php } ?>

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