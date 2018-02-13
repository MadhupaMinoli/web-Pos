<?php
session_set_cookie_params( 30 * 60,"/");
session_start();

if (!isset($_SESSION["exists"])){
    header("Location: login.php");
}


$connection = mysqli_connect("localhost", "root", "", "php_db", "3306");

if (!$connection) {
    echo "Could not able to establish the connection", "<br>";
    echo mysqli_connect_error();
    die;
}




if(isset($_POST['itemId'])&& !empty($_POST['itemId'])&&isset($_POST['itemName']) && isset($_POST['quantity'])) {

    $id = $_POST['itemId'];
    $name = $_POST['itemName'];
    $quantity = $_POST['quantity'];
    $unitPrice=(double) $_POST['unitPrice'];




    $result = $connection->query("UPDATE `php_db`.`item` SET `itemName`='$name', `quantity`='$quantity',`unitPrice`='$unitPrice' WHERE  `itemId`='$id'");

    $result = (bool)(($connection->affected_rows) > 0);

    if ($result) {

        $message = "Item has been successfully updated";

    } else {

        $message = "Item has not been updated";
    }


    header("Location:../Item.php?message='$message'");

    echo $message;

}

elseif(empty($_POST['itemId'])&&isset($_POST['itemName']) && isset($_POST['quantity'])) {
    $name = $_POST['itemName'];
    $quantity=(int) $_POST['quantity'];
    $unitPrice=(double) $_POST['unitPrice'];



    $result = $connection->query("INSERT INTO `php_db`.`item` (`itemName`, `quantity`, `unitPrice`) VALUES ('$name', '$quantity', '$unitPrice');");



    $result = (bool)(($connection->affected_rows) > 0);

    if ($result) {

        $message = "Item has been successfully saved";

    } else {

        $message = "Item has not been saved";
    }

    header("Location:../Item.php?message='$message");
    echo $message;

}

else if (isset($_GET['all'])){


    $result = $connection->query("SELECT * FROM item");

    if(isset($result)) {
        $rows = $result->fetch_all();
        ob_clean ();
        echo json_encode($rows);
    }
    else {

        echo '<script> alert("Error in the get data")</script>';
    }

}

else if (isset($_GET['deleteItem'])){

    $id=$_GET['deleteItem'];
    $result = $connection->query("DELETE FROM `php_db`.`item` WHERE  `itemId`='$id'");

    $result = (bool)(($connection->affected_rows) > 0);

    if ($result) {

        $message = "Item has been successfully Deleted";

    } else {

        $message = "Item had not been Deleted";
    }


    ob_clean();
    echo json_encode($message);

}

else if (isset($_GET['search'])){

    $id=$_GET['search'];
    $result = $connection->query("SELECT * FROM `php_db`.`item` WHERE  `itemId`='$id'");

    $row=$result->fetch_row();


    if (isset($row)) {


        $message = "Item operator has been successfully ";



    } else {

        $message = "Item operator has been failed ";
    }

    $row[5]=$message;

        ob_clean ();
    echo json_encode($row);

}

unset($_GET);
unset($_POST);



