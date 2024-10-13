<?php

require("./inc/Header.php");
require("./inc/db.php");
require("./security.php");

$query = "select * from user where email='$_SESSION[user]'";
$result = mysqli_query($conn,$query);

$db_data = mysqli_fetch_assoc($result);

        if(isset($_POST['updateButton'])){
            $name=mysqli_real_escape_string($conn,$_POST['name']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);

            $query =  "update user set name='$name', email='$email' where email='$db_data[email]'";

            $result = mysqli_query($conn,$query);

            if($result){
                $_SESSION['success']="Profile Update Successfully";

                $_SESSION['user']=$email;
               
            }else{
                $_SESSION['error']="something wrong went update set"; 
            }

        }

?>
             
            <div class="shadow col-sm-10 mx-auto col-md-8 py-5 my-5 px-5">
                        <div class="mb-3 border-b">
                            <h1 class="text-center">Profile</h1>
                        </div>
                        <form action="/profile.php" method="post" class="w-full form-control shadow py-5 px-4">
                                    <?php
                        if(isset($_SESSION['error'])){
                            ?>
                            <div class="mb-3 alert  alert-danger">
                                        <?= $_SESSION['error'] ?> 
                                    </div>
                            <?php
                            unset($_SESSION['error']);
                        }
                                    ?>

<?php
                        if(isset($_SESSION['success'])):  ?>
                            <div class="mb-3 alert  alert-success">
                                        <?= $_SESSION['success'] ?> 
                                    </div>
                            <?php
                            unset($_SESSION['success']);
                        endif;
                                    ?>


                            <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" 
                                        name="email" value=<?=$db_data['email']?> placeholder="Enter Email Address" type="text" class="form-control">
                            </div>

                            <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" 
                                        name="name" value=<?=$db_data['name']?> placeholder="Enter password " type="text" class="form-control">
                            </div>

                            <div class="mb-3  ">
                                <button name="updateButton" class="btn btn-primary    mx-auto">Update</button>
                            </div>
                        </form>
            </div>
<?php
require("./inc/Footer.php")
?>