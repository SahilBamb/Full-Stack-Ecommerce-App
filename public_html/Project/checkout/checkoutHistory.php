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
    <title>Order History Page</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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



<script>

$(function () {
  $('[data-toggle="popover"]').popover()
})


</script>

    <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<?php

if (!is_logged_in()) {
    flash("Please login or register before attempting to checkout", "warning");
    die(header("Location: " . get_url("login.php")));
}



if ( isset($_POST['item_id']) && isset($_POST['stars']) && isset($_POST['save']) ) {

  $rID = se($_POST,'item_id',"",false);
  $rStars = se($_POST,'stars',"",false);
  $rContent = se($_POST,'ratingContent',"",false);

  //Validation, making sure that user bought the product previously

  $db = getDB();
  // (id, product_id, user_id, rating, comment, created, modified)
  // $query = "SELECT c.id FROM  INTO Ratings (product_id, user_id, rating, comment) VALUES(:prodid, :uid, :rating, :comment)";
  $query = "SELECT item_id FROM Orders c JOIN OrderItems i ON c.id = i.order_id WHERE c.user_id = :uid AND item_id = :iid";

  $stmt = $db->prepare($query);
  $stmt->bindValue(':uid', get_user_id(), PDO::PARAM_INT);
  $stmt->bindValue(':iid', $rID, PDO::PARAM_INT);
  $results = [];
  try {
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //flash("Great! you have purchased this product before!", "success");
  } catch (PDOException $e) {
      echo "<pre>" . var_export($e, true) . "</pre>";
  }

  echo "<pre>" . var_export($results, true) . "</pre>";

  if (count($results)<1) {
    flash("You must purchase the product before rating it!", "danger");
  }

  else {

  // (id, product_id, user_id, rating, comment, created, modified)
  $query = "INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES(:prodid, :uid, :rating, :comment)";

  $stmt = $db->prepare($query);
  $stmt->bindValue(':prodid', $rID, PDO::PARAM_INT);
  $stmt->bindValue(':uid', get_user_id(), PDO::PARAM_INT);
  $stmt->bindValue(':rating', $rStars, PDO::PARAM_INT);
  $stmt->bindValue(':comment', $rContent, PDO::PARAM_STR);

  $results = [];
  try {
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      flash("Review Added!", "success");
  } catch (PDOException $e) {
      echo "<pre>" . var_export($e, true) . "</pre>";
  }
      

  // $stmt = $db->prepare("INSERT INTO Orders (firstName, lastName, user_id, total_price, address, payment_method, money_received) VALUES(:firstName, :lastName, :uid, :total_price, :address, :payment_method, :money_received)");
  //   $stmt->execute([":uid" => get_user_id(), ":firstName" => $firstName, ":lastName" => $lastName, ":total_price" => $cartTotal, ":address" => $address, ":payment_method" => $paymentMethod, ":money_received" => $payment]);
  //   $OrderSuccess = true;
    
        

}
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

  // echo "<pre>" . var_export($_POST, true) . "</pre>";
?>




<body class="bg-light">
    
<div class="container">
  <main>

    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bag-check-fill.svg" alt="" width="72" height="57">
      <h2><?php if (has_role("Admin")) {echo "Admin Order History (All Users)";} else {echo "Your Order History";} ?></h2>
    </div>

    <p class="text-center">
        <a class="responsive-content btn btn-dark" id="rateOrderBtn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Filters
        </a>
    </p>
    <div class="collapse" id="collapseExample">
    <div class="container py-9">
    <form onsubmit="return validate(this)" method="GET">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="category">Category</label>
                <input type="text" class="form-control" id="category" value="<?php if (isset($_GET['category'])) se($_GET['category']); ?>" name="category" placeholder="category name"/>
            </div>
            <div class="col-auto">
                <label for="startDate" class="sr-only" >Category</label>
                <input type="date" id="startDate" class="form-control" value="<?php if (isset($_GET['startDate'])) se($_GET['startDate']); ?>" name="startDate" />
            </div>
            <div class="col-auto">
                <label for="endDate" class="sr-only" >Category</label>
                <input type="date" id="endDate" class="form-control" value="<?php if (isset($_GET['endDate'])) se($_GET['endDate']); ?>" name="endDate" />
            </div>
            <div class="col-auto">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="SortByPrice" name="SortByPrice" value="1">
                    <label class="form-check-label" for="SortByPrice">Sort By Order Total</label>
                </div>
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary"/>
            </div>
        </div>
    </form>
</div>

    </div>



    <div class="row">
      <div class="order-md-last">
      <?php

    $db = getDB();
    $orderID = 0;
    
    //$query = "SELECT name, c.id as prodid, item_id, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";
  
    $query = "SELECT firstName, lastName, c.id, c.user_id, total_price, c.created, address, payment_method, money_received FROM Orders c JOIN Users i ON c.user_id = i.id WHERE c.user_id = :uid";
    $nolimitQuery = "SELECT COUNT(firstName) as total FROM Orders c JOIN Users i ON c.user_id = i.id WHERE c.user_id = :uid";
    //SELECT firstName, lastName, p.category, c.id, c.user_id, total_price, c.created, address, payment_method, money_received FROM Orders c JOIN Users i ON c.user_id = i.id JOIN OrderItems o ON o.order_id = c.id JOIN Products p ON p.id = o.item_id WHERE c.user_id = :uid

    if (has_role("Admin")) {
      $query = "SELECT firstName, lastName, c.id, c.user_id, total_price, c.created, address, payment_method, money_received FROM Orders c JOIN Users i ON c.user_id = i.id WHERE 1=1";
      $nolimitQuery = "SELECT COUNT(firstName) as total FROM Orders c JOIN Users i ON c.user_id = i.id WHERE 1=1";
    }


// Filter by Date Range
// Filter by Category
// Sort by total, date purchased, etc


    if (isset($_GET["startDate"]) || (isset($_GET["endDate"]))) {

      //sb59 4/18 - This checks if its empty and then clears the GET fields, allowing for users to
      //clear filters by inputting empty values in the filter form
      if (isset($_GET["SortByTotalPrice"]) && $_GET["SortByTotalPrice"]=="") {unset($_GET['SortByTotalPrice']);}
      
      if (isset($_GET["category"]) && $_GET["category"]=="") {unset($_GET['category']);}

      if (isset($_GET["startDate"]) && $_GET["startDate"]=="") {unset($_GET['startDate']);}
      if (isset($_GET["endDate"]) && $_GET["endDate"]=="") {unset($_GET['endDate']);}

      if (isset($_GET["startDate"]) || isset($_GET["endDate"]) || isset($_GET["category"]) || (isset($_GET["SortByTotalPrice"]))) echo "<br><h2>" . "Filters Applied" . "</h2>";
  
  }

//   WHERE BIRTH_DATE_TIME BETWEEN
// '2000-01-01 00:00:00' AND '2002-09-18 12:00:00';
  
    $startDate = "";
    $endDate = "";
    $category = "";
    
    if (isset($_GET["startDate"]) && isset($_GET["endDate"])) {
        $startDate = "" . se($_GET, "startDate", "", false) . "";
        $endDate = "" . se($_GET, "endDate", "", false) . "";
        echo "<h5>" . "Orders Between: " . $startDate . " and " . $endDate . "</h5>";
        $subqery = " AND c.created BETWEEN :startDate AND :endDate"; 
        $query .=$subqery;
        $nolimitQuery.=$subqery;
    }
    
    if (isset($_GET["startDate"]) && !isset($_GET["endDate"])) {
        echo "<h5>" . "Orders Placed On: " . $_GET["startDate"] . "</h5>";
        $startDate = "" . se($_GET, "startDate", "", false) . "";
        $subqery = " AND c.created > :startDate"; 
        $query .=$subqery;
        $nolimitQuery.=$subqery;
    }
    
    //sb59 4/18 - if the $_GET category variable is set, it does the same as search
    //The actual query works as a LIKE '%word%' where it matches the word in any location
    if (isset($_GET["category"])) {
        echo "<h5>" . "Orders with Products in Category: " . $_GET["category"] . "</h5>";
        $category = "" . se($_GET, "category", "", false) . "";
        // $subqery = " AND order_created LIKE :ctgry"; 
        // $query .=$subqery;
        // $nolimitQuery.=$subqery;
    } 

    //sb59 4/18 - if the $_GET price variable is set, this will simply sort by unit_price
    //again using a partial query
    $Endquery = " ORDER BY c.created";

    if (isset($_GET["SortByTotalPrice"])) {
        echo "<h5>" . "Sorting By Total Price " . "</h5>";
        $Endquery = " ORDER BY total_price";
    }

    $query .=$Endquery;

    //Test Query not final
    // $query = "SELECT firstName, lastName, c.id, c.user_id, total_price, c.created as order_created, address, payment_method, money_received FROM Orders c JOIN Users i ON c.user_id = i.id WHERE c.user_id = :uid AND c.created > '2014-8-12 18:51:44'";
    // $nolimitQuery = "SELECT COUNT(firstName) as total FROM Orders c JOIN Users i ON c.user_id = i.id WHERE c.user_id = :uid AND 1=1";
    $page = se($_GET, "page", 1, false);
    $per_page = 10;
    $offset = ($page - 1) * $per_page;
    $limit = " LIMIT :offset, :per_page";
    $query .=$limit;

    //Runs query to tell total pages and products


    $stmt = $db->prepare($query);
    $orderDetails = [];
    try {
      if (!empty($startDate)) $stmt->bindValue(":startDate", $startDate, PDO::PARAM_STR);
      if (!empty($endDate)) $stmt->bindValue(":endDate", $endDate, PDO::PARAM_STR);

      $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
      $stmt->bindValue(":per_page", $per_page, PDO::PARAM_INT);//[":uid" => get_user_id()]
      
      if (!has_role("Admin")) {$stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);$stmt->execute();} 
      else {$stmt->execute();}
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
        error_log('Error Log Starting');
        error_log(var_export($e,true));
    }


    $stmt = $db->prepare($nolimitQuery);
    try {
      if (!empty($startDate)) $stmt->bindValue(":startDate", $startDate, PDO::PARAM_STR);
      if (!empty($endDate)) $stmt->bindValue(":endDate", $endDate, PDO::PARAM_STR);
      if (!has_role("Admin")) {
        $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
      } 
      $stmt->execute();
      $results = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
        error_log('Error Log Starting');
        error_log(var_export($e,true));
    }

    $totalProducts = 0;

    if (isset($results)) {
        $totalProducts = (int)se($results, "total", 0, false);
    }

    foreach ($orderDetails as $index => $record) { 
      // echo "<pre>" . var_export($orderDetails, true) . "</pre>";
      $orderID = se($orderDetails[$index],'id',"",false);
      $moneyReceived = se($orderDetails[$index],'money_received',"",false);
      $paymentMethod = se($orderDetails[$index],'payment_method',"",false);
    
    $query = "SELECT name, c.id as prodid, category, item_id, quantity, c.unit_price, ROUND((c.unit_price*c.quantity),2) as subtotal FROM OrderItems c JOIN Products i ON c.item_id = i.id WHERE c.order_id = :id";
    
    $stmt = $db->prepare($query);
    $cartResults = [];
    try {
        $stmt->execute([":id" => $orderID]); //temp
        $cartResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }

    

?>
        
        <?php if (!empty($category))
        foreach ($cartResults as $index => $record) : ?>
          <?php
              $categoryMatch = false; 
              foreach ($cartResults as $column => $value) {
                if (se($value,'category',"N/A",false)==$category) {
                  $categoryMatch = true;
                  break;
                }
              } 
          ?>
        <?php endforeach; 
        
        if ( (empty($category)) || $categoryMatch) {?> 

        <br>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">
            <a  href="orderHistory.php?id=<?php echo $orderID; ?>">Order #<?php se($orderID); ?> - <?php se($orderDetails[$index],'firstName',"",true); ?> <?php se($orderDetails[$index],'lastName',"",true); ?></a> 
          </span>
          <span class="badge bg-primary rounded-pill"><?php echo count($cartResults)?></span>
        </h4>

        <ul class="list-group">
          <?php 
          $cartTotal = 0;
          $numberOfProds = 0;
          $count = 0;
          if (count($cartResults)>0) :?>
          <?php foreach ($cartResults as $index => $record) : ?>
                  <?php foreach ($cartResults as $column => $value) : ?>
                    <?php $numberOfProds=se($record,'quantity',"",false);?>
                  <?php endforeach; ?>
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                      <div>
                      <h6> <?php se($record,'name',"",true); ?> x<?php se($numberOfProds);?></h6>
                        <small class="text-muted">
                        <p>
                          <a class="responsive-content btn btn-light" id="rateOrderBtn" data-toggle="collapse" href="#collapseExample<?php echo $count; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Rate Order
                          </a>
                        </p>
                        <div class="collapse" id="collapseExample<?php echo $count; ?>">
                          <div class="card card-body">
                            <form method="POST" onsubmit="return validate(this);">
                                <div class="form-group">
                                    <label class="form-label" for="stars">Stars</label>
                                    <input type="hidden" value="<?php se($value,'item_id',"",true);?>" name="item_id" />
                        
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="stars" type="radio" id="inlineCheckbox1" value="1">
                                      <label class="form-check-label" for="inlineCheckbox1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="stars" type="radio" id="inlineCheckbox2" value="2">
                                      <label class="form-check-label" for="inlineCheckbox2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="stars" type="radio" id="inlineCheckbox3" value="3">
                                      <label class="form-check-label" for="inlineCheckbox3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="stars" type="radio" id="inlineCheckbox3" value="4">
                                      <label class="form-check-label" for="inlineCheckbox3">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="stars" type="radio" id="inlineCheckbox3" value="5">
                                      <label class="form-check-label" for="inlineCheckbox3">5</label>
                                    </div>
                                    <input class="form-control" type="text" name="ratingContent" id="ratingContent" value="" placeholder="Leave your comments!" />
                                    <input type="submit" class="mt-3 btn btn-primary" value="Submit Review" name="save" />
                                </div>
                            </form>
                          </div>
                        </div>


                        </small>
                      </div>
                      <span class="text-muted">$<?php se($record,'subtotal',"",true); $cartTotal+=se($record,'subtotal',"",false); ?></span>
                  </li>
          <?php $count++; ?>
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

          <?php } ?>

  </main>

<br>

  <!-- Pagination (uses page files from query section and getGETURL from functions.php) -->

  <nav aria-label="Page navigation example" style="align-items: center; justify-content: center;">
    <ul2 class="pagination justify-content-center">
    
        <li class="page-item <?php if ($page-1<=0) echo "disabled" ?>">
            <a class="page-link" href="<?php se(getGETURL($page-1)); ?>">Previous</a>
        </li>
    <?php if ($page>1): ?>
        <!-- <a class="page-link" href="?" tabindex="-1">Previous</a> -->
        <li class="page-item <?php if ($page-1<=0) echo "disabled" ?>">
            <a class="page-link" href="<?php se(getGETURL($page-1)); ?>">
                <?php se($page-1); ?>
            </a>
        </li>
    <?php endif; ?>
    <li class="page-item active">
        <a class="page-link" href="#" >
            <?php se($page); ?>
        </a>
    </li>
    <?php if ($page<($totalProducts/$per_page)): ?>
    <li class="page-item <?php if ($page>($totalProducts/$per_page)) echo "disabled" ?>">
        <a class="page-link" href="<?php se(getGETURL($page+1)); ?>">
            <?php se($page+1); ?>
        </a>
    </li>
    <?php endif; ?>
    <li class="page-item <?php if ($page>=($totalProducts/$per_page)) echo "disabled" ?>">
        <a class="page-link" href="<?php se(getGETURL($page+1)); ?>">Next</a>
    </li>
  </ul2>
</nav>

<br>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>


<?php require_once(__DIR__ . "/../../../partials/flash.php"); ?>