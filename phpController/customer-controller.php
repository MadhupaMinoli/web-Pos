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




if(isset($_POST['customerId'])&& !empty($_POST['customerId'])&&isset($_POST['customerName'])&&isset($_POST['customerAddress'])  && isset($_POST['contactNo'])) {

    $id = $_POST['customerId'];
    $name = $_POST['customerName'];
    $address = $_POST['customerAddress'];
    $contactNo = $_POST['contactNo'];



    $result = $connection->query("UPDATE `php_db`.`customer` SET `customerName`='$name',`customerAddress`='$address', `contactNo`='$contactNo' WHERE  `customerId`='$id'");

    $result = (bool)(($connection->affected_rows) > 0);

    if ($result) {

        $message = "Customer has been successfully updated";

    } else {

        $message = "Customer has not been updated";
    }


    header("Location:../Customer.php?message='$message'");

    echo $message;

}

elseif(empty($_POST['customerId'])&&isset($_POST['customerName'])&&isset($_POST['customerAddress']) && isset($_POST['contactNo'])) {
    $name = $_POST['customerName'];
    $address = $_POST['customerAddress'];
    $contactNo = $_POST['contactNo'];



    $result = $connection->query("INSERT INTO `php_db`.`customer` (`customerName`,`customerAddress`, `contactNo`) VALUES ('$name','$address' ,'$contactNo')");

    $result = (bool)(($connection->affected_rows) > 0);

    if ($result) {

        $message = "Customer has been successfully saved";

    } else {

        $message = "Customer has not been saved";
    }

    header("Location:../Customer.php?message='$message'");
    echo $message;

}

else if (isset($_GET['all'])){


    $result = $connection->query("SELECT * FROM customer");

    if(isset($result)) {
        $rows = $result->fetch_all();
        ob_clean ();
        echo json_encode($rows);
    }
    else {

        echo '<script> alert("Error in the get data")</script>';
    }

}

else if (isset($_GET['deleteCustomer'])){

    $id=$_GET['deleteCustomer'];
    $result = $connection->query("DELETE FROM `php_db`.`customer` WHERE  `customerId`='$id'");

    $result = (bool)(($connection->affected_rows) > 0);

    if ($result) {

        $message = "Customer has been successfully Deleted";

    } else {

        $message = "Customer had not been Deleted";
    }


    ob_clean();
    echo json_encode($message);

}

else if (isset($_GET['search'])){

    $id=$_GET['search'];
    $result = $connection->query("SELECT * FROM `php_db`.`customer` WHERE  `customerId`='$id'");

    $row=$result->fetch_row();


    if (isset($row)) {


        $message = "Customer operator has been successfully ";



    } else {

        $message = "Customer operator has been failed ";
    }

    $row[5]=$message;

    ob_clean ();
    echo json_encode($row);

}

unset($_GET);
unset($_POST);



