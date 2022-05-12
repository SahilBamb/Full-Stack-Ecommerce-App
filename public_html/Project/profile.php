<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
<link rel="stylesheet" href="form.css">

<style> 
.rounded{
  border-radius:50% !important; 
  max-height: 100px;
  max-width: 100px;
  resize: both;
  overflow: auto;
 }
 

</style>


<title>Profile Page</title>
<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in() && !isset($_GET["id"])) {
    flash("Please login or register before editing your profile", "warning");
    /* die(header("Location: login.php")); */
    redirect("login.php");
}
?>

<?php

$db = getDB();

$publicProfile = true;
// $requestID = get_user_id();
$requestID = get_user_id();
if (isset($_GET['id'])) $requestID = se($_GET,"id",0,false);


$query = "SELECT id, image, email, created, username, privacy FROM `Users` WHERE :id=id";
$stmt = $db->prepare($query);
$stmt->bindValue(":id", $requestID, PDO::PARAM_INT);
$results = [];

try {
    $stmt->execute([":id" => se($requestID,null,"",false)]);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}
$requestedPrivacy = 0;
$image = "";

// echo "<pre>" . var_export($_POST, true) . "</pre>";



$image = se($results,"image","",false);
$requestedPrivacy = se($results,"privacy",0,false);
$defaultImage="https://1.bp.blogspot.com/-jHrJ3VITQf8/UDILF_ctbOI/AAAAAAAACn4/UwOvDmW4EJw/s1600/CUTE+GIRL+HAIR+FB+DP.jpg";
if ($image=="") $image = $defaultImage;

if (isset($_POST['privacy'])) $requestedPrivacy = se($_POST,"privacy",0,false);

?>

<?php 
if (isset($_GET["id"])) {

    // $publicProfile = true;
    // $requestID = se($_GET,"id","",false);

    // $query = "SELECT id, image, email, created, username, privacy FROM `Users` WHERE :id=id";
    // $stmt = $db->prepare($query);
    // $stmt->bindValue(":id", $requestID, PDO::PARAM_INT);
    // $results = [];

    // try {
    //     $stmt->execute([":id" => se($requestID,null,"",false)]);
    //     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // } catch (PDOException $e) {
    //     echo "<pre>" . var_export($e, true) . "</pre>";
    // }
    // $image = se($results[0],"image","",false);

    $requestedUserName = se($results,"username","",false);
    $requestedJoined = se($results,"created","",false);
    $requestedPrivacy = se($results,"privacy",0,false);
    

    if ($requestedPrivacy==0) {

        flash("That users profile is not public", "warning");
        redirect("profile.php");

    }

    $requestID = se($_GET,"id","",false);
    $id = $requestID;

    $query = "SELECT p.name, u.username, r.id, product_id, user_id, rating, r.created, privacy, comment FROM Ratings r JOIN Users u ON r.user_id = u.id JOIN Products p ON r.product_id = p.id WHERE r.user_id = :id LIMIT 4;";
    $stmt = $db->prepare($query);
    $UserReviews = [];
    try {
        $stmt->execute([":id" => $id]); 
        $UserReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }

    // echo "<pre>" . var_export($UserReviews, true) . "</pre>";
    ?>
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Profile Page</h2>
      <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
    </div>
  </main>
</div>

<div class="row">
      <div class="col-lg-4">
          
      <div class="card mb-4">
        <div class="card-body text-center">
            <img src=<?php se($image, null, $defaultImage, true); ?>  alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php se($requestedUserName,null,"",true);?></h5>
            <p class="text-muted mb-1">Joined: <?php se($requestedJoined,null,"",true);?></p>
            <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
            <!-- <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div> -->
        </div>
      </div>


        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php se($requestedUserName,null,"",true);?></p>
                </div>
                </div>
                <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(Hidden)</p>
                        </div>
                    </div>
                <!-- <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(097) 234-5678</p>
                        </div>
                    </div>
                <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(098) 765-4321</p>
                        </div>
                    </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                    </div>
                </div> -->
            </div>
            </div>
            <div class="row">
            
            <?php foreach ($UserReviews as $index => $record) { ?>
                <div class="col-sm-3">
                <?php $pName = se($record,'name',"",false);
                $product_id = se($record,'product_id',"",false);?>
                <div class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php se($pName);?>
                            <div>
                                <?php 
                                $stars=se($record,'rating',"",false);
                                    for ($x = 0; $x < 5; $x++) {
                                        if ($x<=$stars) :
                                            echo '<i class="bi-star-fill" style="font-size: 1rem; color: goldenrod;"></i>';
                                        else :
                                            echo '<i class="bi-star" style="font-size: 1rem; color: goldenrod;"></i>';
                                        endif;
                                    } 
                                ?>
                            </div>    
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Product Review</h6>
                        <h6 class="card-subtitle mb-1 text-muted"><?php se($record,'created',"",true);?></h6>
                        <!-- <p class="card-text">Product Descr: Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a class="card-link" href='product_page.php?id=<?php se($product_id,null,"",true);?>'>Product link</a>
                        <a href="shopCards.php" class="card-link">Shop Page</a>
                    </div>
                </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
  </div>

  <!-- <div class="container">
  <div class="row">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Product Number 1
                        <div>
                            <?php 
                            $stars=1;
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
            <h6 class="card-subtitle mb-2 text-muted">Product Review</h6>
            <p class="card-text">Product Descr: Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Product link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>

  </div>
</div> -->


<?php 

}

else {
?>



<?php
if (!isset($_GET["id"]) && isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $privacy = se($_POST, "privacy", null, false);
    $imageR = se($_POST, "image", null, false);
    $hasError = false;

    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    
    if (!$hasError) {
        $params = [":email" => $email, ":username" => $username, ":image" => $imageR, ":privacy" => $privacy, ":id" => get_user_id()];
        $db = getDB();
        $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, image = :image, privacy = :privacy where id = :id");
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        $stmt = $db->prepare("SELECT id, email, username, privacy from Users where id = :id LIMIT 1");
        try {
            $stmt->execute([":id" => get_user_id()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                //$_SESSION["user"] = $user;
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
            } else {
                flash("User doesn't exist", "danger");
            }
        } catch (Exception $e) {
            flash("An unexpected error occurred, please try again", "danger");
            //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        $hasError = false;
        if (!is_valid_password($new_password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        //TODO validate current
        if (!is_valid_password($new_password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (empty($new_password)) {
            flash("password must not be empty", "danger");
            $hasError = true;
        }
        if (empty($confirm_password)) {
            flash("Confirm password must not be empty", "danger");
            $hasError = true;
        }

        if (strlen($new_password) > 0 && $new_password !== $confirm_password) {
            flash("Passwords must match", "danger");
            $hasError = true;
        }

        if (!$hasError) {
            if ($new_password === $confirm_password) {
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([
                                ":id" => get_user_id(),
                                ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                            ]);

                            flash("Password reset", "success");
                        } else {
                            flash("Current password is invalid", "danger");
                        }
                    }
                } catch (Exception $e) {
                    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                    flash("There was an unexpected error", "danger");
                }
            } else {
                flash("New passwords don't match", "danger");
            }
        }
    }
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>
<div class="container-fluid">
    
    
    <div class="text-center">
        <h2>Profile</h2>
        
        <img src=<?php se($image,null,$defaultImage,true); ?>  alt="avatar"
                class="rounded" style="width: 150px;">
        </div>
        <form method="POST" onsubmit="return validate(this);">

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
        </div>

        <div class="form-group">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Profile Picture</label>
            <input class="form-control" type="text" name="image" id="image" value="<?php se($image) ?>" />
        </div>

        <hr>
        
        <!-- <div class="form-group">Privacy</div> -->

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="privacy" id="privacy" value="0" <?php if ($requestedPrivacy==0) echo "checked"?>>
            <label class="form-check-label" for="inlineRadio1">Hide profile to others</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="privacy" id="privacy" value="1" <?php if ($requestedPrivacy==1) echo "checked"?>>
            <label class="form-check-label" for="inlineRadio2">Show profile to others</label>
        </div>

        <!-- DO NOT PRELOAD PASSWORD -->
        <br>
        <!-- <div class="form-group">Password Reset</div> -->
        <div class="form-group">
            <label class="form-label" for="cp">Current Password</label>
            <input class="form-control" type="password" name="currentPassword" id="cp" />
        </div>
        <div class="form-group">
            <label class="form-label" for="np">New Password</label>
            <input class="form-control" type="password" name="newPassword" id="np" />
        </div>
        <div class="form-group">
            <label class="form-label" for="conp">Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" id="conp" />
        </div>
        <br>
        <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
        <br>
        <button id="chk" type="button" onclick="window.location.href = './checkout/checkoutHistory.php';" class="btn btn-lg btn-primary">Order History</button>
    </form>
    
</div>


<?php } ?>

<script>
    //profile.php (email, username, current/new password length, new == confirm password (given))
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let cp = form.currentPassword.value;
        let usn = form.username.value;
        let email = form.email.value;
        let isValid = true;
        
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild

        //Queuing up all errors
        
        //Checks if email is empty (also isSet)
        if ((email === "")) {flash("Email cannot be empty", "warning"); isValid=false;} 

        else {
            //If it is not empty, checks if email is correct format
            const regexEmail = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
            if (!regexEmail.test(email)) {flash("Invalid email address", "warning"); isValid=false;}
        }

        //Checks if username is empty (also isSet)
        if ((usn === "")) {flash("Username cannot be empty", "warning"); isValid=false;} 

        else {
            //Checks if username is correct format
            const regexUsername = /^[a-z0-9_-]{3,16}$/;
            if (!regexUsername.test(usn)) {flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "warning"); isValid=false;}
        }

         //Also checks if password is empty
        if ((cp === "")) {
            //If it is, and new password or confirm password are fill give warning
            if ((pw!=="") || (con!=="")){
                flash("Please input your current password to reset your password", "warning"); isValid=false;
            }
        } 
            //If it is not, check both are equal and length of pw is not less than 8 
        else{
            if ((pw==="") || (con==="")){
                flash("To reset password, please input both the new password and confirm password", "warning"); isValid=false;
            }
            else {
                if (pw !== con){flash("Password does not match confirm password", "warning"); isValid=false;}
                if (pw.length < 8) {flash("Password is not long enough", "warning"); isValid=false;}
            }
        }

        //ensure it returns false for an error and true for success
        return isValid;
    }
</script>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>