<?php
require_once(__DIR__ . "/../../lib/functions.php");
//error_log("add_to_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
//handle the potentially incoming post request
$item_id = (int)se($_POST, "item_id", null, false);
$desired_quantity = (int)se($_POST, "desired_quantity", 0, false);
$curr_quantity = (int)se($_POST, "curr_quantity", 0, false);
$response = ["status" => 400, "message" => "Invalid data"];
$mess = "";
http_response_code(400);
if (isset($item_id)) {
    if (is_logged_in()) {
        $db = getDB();
        //note adding to cart doesn't verify price or quantity
        if ($desired_quantity>0) :
            $mess = "Item added to cart";
            $stmt = $db->prepare("INSERT INTO Cart (item_id, quantity, user_id) VALUES(:iid, :q, :uid) ON DUPLICATE KEY UPDATE quantity = quantity + :q");
        elseif ($desired_quantity<0) :
            $mess = "Item removed from cart";
            if ($curr_quantity==1) : {
                $stmt = $db->prepare("DELETE FROM Cart WHERE item_id = :iid AND user_id = :uid");
            }
            else : {
                $desired_quantity = abs($desired_quantity);
                $stmt = $db->prepare("INSERT INTO Cart (item_id, quantity, user_id) VALUES(:iid, :q, :uid) ON DUPLICATE KEY UPDATE quantity = quantity - :q");
            }
            endif;
        endif;

        if ($curr_quantity!=1 || $desired_quantity==1) : $stmt->bindValue(":q", $desired_quantity, PDO::PARAM_INT);
        endif;
        $stmt->bindValue(":iid", $item_id, PDO::PARAM_INT);
        $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);

        try {
            $stmt->execute();
            $response["status"] = 200;
            $response["message"] = $mess;
            //$response["message"] = "Item added to cart";
            http_response_code(200);
        } catch (PDOException $e) {
            error_log("Add to cart error: " . var_export($e, true));
            $response["message"] = "Error adding item to cart";
        }
    } else {
        http_response_code(403);
        $response["status"] = 403;
        $response["message"] = "Must be logged in to add to cart";
        //flash("Please login to add to cart", "Danger");
    }
}
echo json_encode($response);

