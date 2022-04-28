<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<title>Product Page</title>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>

function add_to_cart(item_id, quantity = 1) {
        postData({
            item_id: item_id,
            desired_quantity: quantity
        }, "/Project/add_to_cart.php").then(data => {
            console.log(data);
            if (data.status === 200) {
                flash(data.message, "success");
/*                 if (get_cart) {
                    get_cart();
                } */
            } else {
                flash(data.message, "danger");
            }
        }).catch(e => {
            flash("There was a problem adding the item to cart", "danger");
        });
    }

function validate() {  
    return true;
}  

$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>

<?php
require(__DIR__ . "/../../partials/nav.php");

if ( isset($_GET['id']) && isset($_POST['stars']) && isset($_POST['save']) ) {

    $rID = se($_GET,'id',"",false);
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
  
    // echo "<pre>" . var_export($results, true) . "</pre>";
  
    if (count($results)<1) {
      flash("You must purchase the product before rating it!", "danger");
    }
  
    else {
  
    // (id, product_id, user_id, rating, comment, created, modified)
    $query = "INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES (:prodid, :uid, :rating, :comment)";
  
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

?>

<br>

<!-- <section style="background-color: #eee;"> -->
  <div class="container py-5">
    <div class="row">
      <div class="col">

      <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="shopCards.php">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Page</li>
        </ol>
        </nav>

      </div>
    </div>
  </div>



<?php

$db = getDB();

//generally try to avoid SELECT *, but this is about being dynamic so I'm using it this time

//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
//echo "<pre>" . var_export($_GET, true) . "</pre>";


if (!isset($_GET["id"])) {
    flash("That is not a valid product", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
    redirect("home.php");
}

$id = $_GET["id"]; 


$query = "SELECT u.username, r.id, product_id, user_id, rating, r.created, privacy, comment FROM Ratings r JOIN Users u ON r.user_id = u.id WHERE r.product_id = :pid LIMIT 10";

$stmt = $db->prepare($query);
$cartResults = [];
try {
    $stmt->execute([":pid" => $id]); 
    $reviewCarts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}
  

$rating = 0;
$reviewCount = 0; 
foreach ($reviewCarts as $index => $record) { 
    $reviewCount++;
    $rating += se($record,'rating',"",false);
}
if ($reviewCount!=0) {$rating/=$reviewCount;}
else $rating=-1;
    
if (has_role("Admin")) {
    $query = "SELECT name, description, category, stock, unit_price, image FROM Products WHERE id=:iid ";
}
else {
    $query = "SELECT name, description, category, stock, unit_price, image FROM Products WHERE visibility=1 AND id=:iid ";
}

$stmt = $db->prepare($query);
$stmt->bindValue(':iid', $id, PDO::PARAM_INT);
$results = [];
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}

//echo "<pre>" . var_export($results, true) . "</pre>";

if (count($results) != 0) :
    $name = $results[0]['name'];
    $descr = $results[0]['description'];
    $category = $results[0]['category'];
    $category = ucfirst($category);
    $stock = $results[0]['stock'];
    $unit_price = $results[0]['unit_price'];
    $image = $results[0]['image'];
    $sale = 0;
    $stars = 0;

endif;

?>

<br>
<br>
<br>
<?php if (count($results) == 0) : ?>
    <p class="text-center">Product does not exist</p>
<?php else : ?>

<div class="container">
  <div class="row">
    <div class="col">
        <div class="text-center">
            <?php if (isset($results[0]['image'])) : ?> 
            <img src="<?php echo $image ?>" class="rounded" style="max-height:450px; max-width:450px; overflow: hidden"> 
            <?php else : ?> 
            <img src="http://cohenwoodworking.com/wp-content/uploads/2016/09/image-placeholder-500x500.jpg" class="rounded">
            <?php endif; ?>
        </div>
    </div>
    <div class="col">
        <h1> <?php echo $name ?> 
            <?php if (has_role("Admin")) : ?>
            <button type="button" onClick="location.href='./admin/product_edit.php?id=<?php echo $id?>'"  class="btn btn-outline-primary">Edit</button>
            <?php endif; ?>
            <?php if ($sale>0) : ?> <span class="badge bg-secondary">Sale</span> <?php endif; ?></h1> 
            
            <dl class="row">
                <dt class="col-sm-3">Category</dt>
                <dd class="col-sm-9">
                        <?php echo $category ?>
                </dd>
               
                <dt class="col-sm-3">
                    <?php if ($rating>=0) :?> Rating
                    <?php else : ?> Not Rated
                    <?php endif; ?>
                </dt>

                <dd class="col-sm-9">
                    <div>
                        <?php 
                            $stars = $rating;
                            for ($x = 0; $x <= 5; $x++) {
                                if ($x<=$stars) :
                                    echo '<i class="bi-star-fill" style="font-size: 1rem; color: goldenrod;"></i>';
                                else :
                                    echo '<i class="bi-star" style="font-size: 1rem; color: goldenrod;"></i>';
                                endif;
                            } 
                        ?>
                    </div>    
                </dd>
                
                <dt class="col-sm-3">In Stock</dt>
                <dd class="col-sm-9"><?php echo $stock ?></dd>
                <dt class="col-sm-3">
                    <p class="fs-3" >
                        Price
                    </p>
                </dt>
                <dd class="col-sm-9">
                    <?php if ($sale==0) : ?>
                    <p class="fs-3" style="font-size: 1rem; color: green;" >
                        $<?php echo $unit_price ?>
                    </p>
                    <?php else : ?>
                    <p class="fs-2" >
                        <div>
                            <p class="text-decoration-line-through">
                                $<?php echo $unit_price ?>
                            </p>
                            $<?php echo round(($unit_price * $sale),2) ?>
                        </div>
                    </p>
                    <?php endif; ?>
                </dd>
                <dt class="col-sm-3">
                    <p class="fs-4" >
                        Description
                    </p>
                </dt>
                <dd class="col-sm-9">
                    <p class="fs-4" >
                        <?php echo $descr ?>
                    </p>
                </dd>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" onclick="add_to_cart('<?php se($id); ?>')" type="button">Add to Cart</button>
                    <button class="btn btn-primary" type="button" disabled>Buy Now</button>
                    
                    <!-- Rating System -->

                    <!-- <p class="text-center">
                        <i class="bi-geo-fill"></i> Free Shipping & Free Returns
                    </p> -->

                    <p class="text-center">
                        <a class="responsive-content btn btn-light" id="rateOrderBtn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Rate Order
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
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
                </div>   
        </dl>
    </dd>
    </dl>

    </div>
  </div>
</div>

<div class="container">
<div class="row">

<?php 

// echo "<pre>" . var_export($reviewCarts, true) . "</pre>";
//id, product_id, user_id, rating, created, comment 
foreach ($reviewCarts as $index => $record) { 

    $rating = se($record,'rating',"",false);
    $orderID = se($record,'id',"",false);
    $product_id = se($record,'product_id',"",false);
    $user_id = se($record,'user_id',"",false);
    $comment = se($record,'comment',"",false);
    $reviewUser = se($record,'username',"",false);
    $reviewPrivacy = se($record,'privacy',"",false);

    // echo "<pre>" . var_export($record, true) . "</pre>";
?>

    <div class="col">
      

      <div class="card" style="width: 10rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <div>
                    <?php 
                        $stars=$rating;
                            for ($x = 0; $x <= 5; $x++) {
                                if ($x<=$stars) :
                                    echo '<i class="bi-star-fill" style="font-size: 1rem; color: goldenrod;"></i>';
                                else :
                                    echo '<i class="bi-star" style="font-size: 1rem; color: goldenrod;"></i>';
                                endif;
                            } 
                        ?>
                    </div>    
                </h5>
                <?php if (!empty($comment)) {?>
                    <h6 class="card-subtitle mb-2 text-muted">"<?php se($comment)?>"</h6>
                    <?php }?>
                <small class="card-subtitle mb-2 text-muted">-<?php if ($reviewPrivacy==1) {se($reviewUser);} else {se("Anonymous");}?></small>
                <!-- <p class="card-text">Product Descr: Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <!-- <a href="#" class="card-link">Product link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>

    </div>

<?php } ?>

</div>
</div>

<?php endif; ?>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>
<!-- se($_GET, "category", "", false) -->
