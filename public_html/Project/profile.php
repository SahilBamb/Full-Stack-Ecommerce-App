<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="form.css">

<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
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
        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
        $db = getDB();
        $stmt = $db->prepare("UPDATE Users set email = :email, username = :username where id = :id");
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
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
<form method="POST" onsubmit="return validate(this);">
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php se($email); ?>" />
    </div>
    <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php se($username); ?>" />
    </div>
    <!-- DO NOT PRELOAD PASSWORD -->
    <div>Password Reset</div>
    <div class="mb-3">
        <label for="cp">Current Password</label>
        <input type="password" name="currentPassword" id="cp" />
    </div>
    <div class="mb-3">
        <label for="np">New Password</label>
        <input type="password" name="newPassword" id="np" />
    </div>
    <div class="mb-3">
        <label for="conp">Confirm Password</label>
        <input type="password" name="confirmPassword" id="conp" />
    </div>
    <input type="submit" value="Update Profile" name="save" />
</form>

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