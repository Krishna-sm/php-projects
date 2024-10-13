
<?php
require("./inc/Header.php")
?>
<?php  
require("./inc/db.php");
                if(isset($_POST['loginBtn'])){
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $password = mysqli_real_escape_string($conn,$_POST['password']);
                    if(!$email || !$password){
                        $_SESSION['error']="please fill all Details"; 
                    }
                        else{
                            
                    $chk_user = "select * from user where email='$email'";
                    $result = mysqli_query($conn,$chk_user);
                    if(mysqli_num_rows($result)<=0){
                        $_SESSION['error']="User Does not Exist";  
                    }else{
                        $db_data=mysqli_fetch_assoc($result);
                        $str_pass = $db_data['password'];

                        $isMatch = password_verify($password,$str_pass);

                        if($isMatch){
                            $_SESSION['success']="login success";  
                                $_SESSION['user'] = $email;

                                header("location:/");
                        }else{
                        $_SESSION['error']="Invalid Credentails";  
                            
                        }


                    }
                        }

                        // header("location:/");

                }
?>




            <div class="shadow col-sm-10 mx-auto col-md-6 py-5 my-5 px-5">
                        <div class="mb-3 border-b">
                            <h1 class="text-center">Login</h1>
                        </div>
                        <form action="/login.php" method="post" class="w-full form-control shadow py-5 px-4">
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
                                        name="email" placeholder="Enter Email Address" type="text" class="form-control">
                            </div>

                            <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" 
                                        name="password" placeholder="Enter password " type="text" class="form-control">
                            </div>

                            <div class="mb-3  ">
                                <button name="loginBtn" class="btn btn-primary    mx-auto">Login</button>
                            </div>
                        </form>
            </div>

<?php
require("./inc/Footer.php")
?>