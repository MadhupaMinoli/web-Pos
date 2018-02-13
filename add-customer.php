<?php


$id = $_POST['cid'];
$name = $_POST['cname'];
$address = $_POST['caddress'];
$contact = $_POST['ccontact'];

$connection = mysqli_connect("localhost", "root", "", "php_db", "3306");

if (!$connection) {
    echo "Could not able to establish the connection", "<br>";
    echo mysqli_connect_error();
    die;
}

$result = $connection->query("INSERT INTO customer VALUES ($id,'$name,$address,$contact')");

$result = (bool) (($connection -> affected_rows) > 0);

if ($result){

    $message =  "Customer has been successfully saved";

}else{

    $message = "Customer has not been saved";
}
?>


<main class="container">
    <div class="alert alert-<?= $result ? "success" : "danger" ?>">
        <?= $message ?>
    </div>

</main>

