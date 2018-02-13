<?php

session_set_cookie_params( 30 * 60,"/");
session_start();

if (!isset($_SESSION["exists"])){
    header("Location: login.php");
}

if(!(isset($_POST['orderID']) && isset($_POST['date']) && isset($_POST['customerID']) && isset($_POST['orderDetails']))){
    echo "Enter Valid Information";
    die;
}

$orderID = $_POST['orderID'];
$date = $_POST['date'];
$customerID = $_POST['customerID'];
$orderDetails = json_decode($_POST['orderDetails']);
$connection = mysqli_connect("localhost", "root", "", "php_db", "3306");

if (!$connection) {
    echo "Could not able to establish the connection", "<br>";
    echo mysqli_connect_error();
    die;
}

$connection->autocommit(false);

$result = $connection->query("INSERT INTO `orders` VALUES ('$orderID', '$date', '$customerID')");

$result = $result && ($connection->affected_rows > 0);

if ($result){
    foreach ($orderDetails as $orderDetail){
        $result = $connection->query("INSERT INTO orderDetails VALUES ('$orderID', '$orderDetail[0]', '$orderDetail[3]')");
        $result = $result && ($connection->affected_rows > 0);

        if ($result){
            echo true;
            $connection->commit();
        }else{
            echo false;
            $connection->rollback();
        }
    }
}else{
    echo false;
    $connection ->rollback();
}

$connection->autocommit(true);
