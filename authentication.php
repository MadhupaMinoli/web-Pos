<?php

if (!(isset($_POST["uname"]) && isset($_POST["upassowrd"]))){
    header("Location: login.php");
}

$message = '';

$uname = $_POST["uname"];
$upassword = $_POST["upassowrd"];

$connection = mysqli_connect("localhost","root","","php_db","3306");

if (!$connection){
    echo "Could not establish the connection", "<br>";
    echo mysqli_connect_error();
}else{

    $resultset = $connection->query("SELECT * FROM login WHERE username='$uname'");

    if ($resultset->num_rows > 0){
        $rowData = $resultset->fetch_row();

        $hash = $rowData[1];

        if ($upassword == $hash){

            session_start();
            $_SESSION["exists"] = true;
            $_SESSION["username"] = $uname;

            header("Location: index.php");

        }else{

            $message = "Invalid Username or Password";

        }

    }else{

        $message = "Invalid Username or Password";
    }

}


?>

<main class="container">
    <div class="alert alert-danger">
        <?= $message ?>
    </div>
    <p>
        Return to <a href="login.php">Login</a>
    </p>
</main>



