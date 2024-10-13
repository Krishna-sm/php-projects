<?php

require("./inc/Header.php");
require("./inc/db.php");
require("./security.php");
 
 

        if(isset($_POST['changePasswordButton'])){
            $password=mysqli_real_escape_string($conn,$_POST['password']); 
            if(!$password ){
                $_SESSION['error']="Please Fill All Details";
               
            }
            else{
                $hash_pass= password_hash($password,PASSWORD_BCRYPT);

            $query =  "update user set password='$hash_pass'  where email='$_SESSION[user]'";

            $result = mysqli_query($conn,$query);

            if($result){
        
 
                session_reset();
                $_SESSION['success']="Password Update Successfully";
                header("location:login.php");
 
                exit;
            }else{
                $_SESSION['error']="something wrong went update Password"; 
            }

            }
        }

?>
             
            <div class="shadow col-sm-10 mx-auto col-md-8 py-5 my-5 px-5">
                        <div class="mb-3 border-b">
                            <h1 class="text-center">Change Password</h1>
                        </div>
                        <form action="/change-password.php" method="post" class="w-full form-control shadow py-5 px-4">
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
                                        <label for="password">Password</label>
                                        <input type="password" id="password" 
                                        name="password"  placeholder="Enter Password" type="text" class="form-control">
                            </div>
 

                            <div class="mb-3  ">
                                <button name="changePasswordButton" class="btn btn-primary    mx-auto">Change Password</button>
                            </div>
                        </form>
            </div>
<?php
require("./inc/Footer.php")
?>