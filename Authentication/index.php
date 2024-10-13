<?php

require("./inc/Header.php");
require("./inc/db.php");
require("./security.php");

$query = "select * from user where email='$_SESSION[user]'";
$result = mysqli_query($conn,$query);

$db_data = mysqli_fetch_assoc($result);


if(isset($_POST['logoutButton'])){
    unset($_SESSION['user']);
    $_SESSION['success']="Logout Success :)";
    header("location:login.php");
}



if(isset($_POST['dltActButton'])){
    $query = "delete from user where email='$_SESSION[user]'";
$result = mysqli_query($conn,$query);
    unset($_SESSION['user']);
    $_SESSION['success']="Account Delete Success :)";
    header("location:login.php");
}

?>
                <div class="card col-sm-4 shadow mx-auto my-5 py-3 px-3">
                            
                <div class="card-heading">
                <h1>Profile</h1>
                </div>
                        <hr>
            <div class="card-body">
                <h2 >Email: <?= $db_data['email'] ?> </h2>
                <h2 >Name: <?= $db_data['name'] ?> </h2>
            </div>

        <div class="d-flex card-footer justify-content-between align-items-center">
        <form method="post" action="/" class="">
                <button name="logoutButton" class="btn btn-dark ">Logout</button>
            </form>
            <form method="post" action="/" class="">
                <button name="dltActButton" class="btn btn-danger ">Delete Account</button>
            </form>
        </div>
                </div>
<?php
require("./inc/Footer.php")
?>