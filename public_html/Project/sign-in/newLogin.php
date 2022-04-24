<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

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
    <link href="signin.css" rel="stylesheet">

    <?php require(__DIR__ . "/../../../partials/nav.php"); ?>


  </head>
<body id="mainbody" class="text-center">
    
<main class="form-signin">
  <form onsubmit="return validate(this)" method="POST">
    <img class="mb-4" src="../assets/brand/envelope-paper-heart.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email Address or Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" value="Login">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2022</p>
  </form>
</main>


    
  </body>
</html>

<script>

    //TODO 1: implement JavaScript validation
    //login.php (username or email, password length)
    function validate(form) {
        let isValid = true; 
        let email = form.email.value;
        let password = form.password.value;
        //Queuing up all errors
        
        //Checks if email is empty (also isSet)
        if ((email === "")) {flash("Email cannot be empty", "warning"); isValid=false;} 

         //Checks if password is empty (also isSet)
        if ((password === "")) {flash("Password cannot be empty", "warning"); isValid=false;} 

        //Checks if password is too short
        else {
            if (password.length < 8) {flash("Password must be at least 8 characters long", "warning"); isValid=false;};
        }
        

        if (email.includes("@")) {
            
            //Checking if it is a valid EMAIL (using regex)
            const regexEmail = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
            if (!regexEmail.test(email)) {flash("Invalid email address", "warning"); isValid=false;}
        }
        
        //Checking if it is a valid USERNAME  (using regex)
        else {
            const regexUsername = /^[a-z0-9_-]{3,16}$/;
            if (!regexUsername.test(email)) {
                flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "warning"); 
                isValid=false;
                }
        }    

        //ensure it returns false for an error and true for success
        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email cannot not be empty", "danger");
        $hasError = true;
    }

    if (str_contains($email, "@")) {
        //sanitize
        $email = sanitize_email($email);
    
        //validate
        if (!is_valid_email($email)) {
            flash("Invalid email address", "danger");
            $hasError = true;
        }
    } 
        else {
            if (!is_valid_username($email)) {
                flash("Invalid username", "danger");
                $hasError = true;
            }
    }

    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }

    if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    }

    //I don't think this should be here
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }    
    
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email or username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        flash("Welcome $email");
                        $_SESSION["user"] = $user;
                        //Why were these try taken away?
                        try {
                            //lookup potential roles
                            $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                            JOIN UserRoles on Roles.id = UserRoles.role_id 
                            where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        } catch (Exception $e) {
                            //error_log(var_export($e, true));
                            flash("There was an error retrieving privileges", "danger");
                        }
                        //save roles or empty array
                        //why is this $roles instead of isset($roles)
                        if (isset($roles)) { 
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        //flash("Welcome, " . get_username());
                        /* die(header("Location: home.php")); */
                        redirect("home.php");

                    } else {
                        flash("Invalid password", "danger");
                    }
                } else {
                    flash("Email/Username not found", "danger");
                }
            }
        }   catch (Exception $e) {
            flash("There was a problem logging-in", "danger");
            //flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>