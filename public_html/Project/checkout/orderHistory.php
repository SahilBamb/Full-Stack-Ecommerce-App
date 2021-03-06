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
    <title>Order Details Page</title>

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

<nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item"><a href="/./Project/profile.php">Profile</a></li>
    <li class="breadcrumb-item"><a href="checkoutHistory.php">Order History</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Details Page</li>
  </ol>
</nav>

<?php

if (!is_logged_in()) {
    flash("Please login or register before attempting to checkout", "warning");
    die(header("Location: " . get_url("login.php")));
}

if ( !(isset($_GET["id"])) ) {
  flash("Please select an order", "warning");
  die(header("Location: " . get_url("checkoutHistory.php")));
}


?>

<body class="bg-light">
    
<div class="container">
  <main>

    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bag-dash-fill.svg" alt="" width="72" height="57">
      <h2><?php if (has_role("Admin")) {echo "Admin Order Details";} else {echo "Order #" . se($_GET,'id',"",false) . " Details Page";} ?></h2>
    </div>

    <div class="row">
      <div class="order-md-last">
      <?php

    $db = getDB();
    $orderID = se($_GET,'id',"",false);
    
    $query = "SELECT firstName, lastName, c.created, c.id, c.user_id, total_price, address, payment_method, money_received FROM Orders c JOIN Users i ON c.user_id = i.id  WHERE c.user_id = :uid AND c.id = :cidd limit 10";

    if (has_role("Admin")) {
      $query = "SELECT firstName, lastName, c.created, c.id, c.user_id, total_price, address, payment_method, money_received FROM Orders c JOIN Users i ON c.user_id = i.id WHERE c.id = :cidd ORDER BY c.created limit 10";
    }

    $stmt = $db->prepare($query);
    $orderDetails = [];
    try {
      $stmt->bindValue(':cidd', $orderID, PDO::PARAM_INT);
      if (!has_role("Admin")) {
        $stmt->bindValue(':uid', get_user_id(), PDO::PARAM_INT);
      }
      $stmt->execute();
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }


    foreach ($orderDetails as $index => $record) { 
      // echo "<pre>OrderDetails:" . var_export($orderDetails, true) . "</pre>";
      /* $orderID = se($orderDetails[$index],'id',"",false); */
      
      $moneyReceived = se($orderDetails[$index],'money_received',"",false);
      $paymentMethod = se($orderDetails[$index],'payment_method',"",false);
      $address = se($orderDetails[$index],'address',"",false);
      $created = se($orderDetails[$index],'created',"",false);
      /* $created = date_format($created,"Y/m/d H:i:s"); */
    
      $query = "SELECT name, c.id as prodid, item_id, quantity, c.unit_price, ROUND((c.unit_price*c.quantity),2) as subtotal FROM OrderItems c JOIN Products i ON c.item_id = i.id WHERE c.order_id = :id";
      
      $stmt = $db->prepare($query);
      $cartResults = [];
      try {
          $stmt->execute([":id" => $orderID]); //temp
          $cartResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          echo "<pre>" . var_export($e, true) . "</pre>";
      }

      $idMatch = 0;
      foreach ($orderDetails as $index => $record){
        if (se($record,'id',"",false)==$orderID) $idMatch=1; 
      }

      if ($idMatch!=1) {
        flash("You can only view your own orders", "warning");
        redirect(get_url("./checkout/checkoutHistory.php"));
      }


?>
        <br>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <a  href="orderHistory.php?id=<?php echo $orderID; ?>">Order #<?php se($orderID); ?> - <?php se($orderDetails[0],'firstName',"",true); ?> <?php se($orderDetails[0],'lastName',"",true); ?></a> 
          <span class="badge bg-primary rounded-pill"><?php echo count($cartResults)?></span>
        </h4>

        <li class="list-group-item d-flex justify-content-between list-group-item-primary">
          <span><strong>Shipping Address: </strong><?php echo $address;?></span>
          <span><?php echo $created;?></span>
        </li>
        <br>

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
                        <h6><?php se($record,'name',"",true); ?> x<?php se($numberOfProds);?></h6>
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
    

          <?php break;} //end of intiial loop?> 

  </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>


<?php require_once(__DIR__ . "/../../../partials/flash.php"); ?>