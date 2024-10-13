
<?php
require("./inc/Header.php")
?>
<?php 
include './inc/db.php';
                if(isset($_POST['registerBtn'])){
                    $name = mysqli_real_escape_string($conn,$_POST['name']);
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $password =  mysqli_real_escape_string($conn,$_POST['password']);
                    if(!$name|| !$email || !$password){
                        $_SESSION['error']="please fill all Details";
                    }
                   else{
                    $chk_user = "select * from user where email='$email'";
                    $result = mysqli_query($conn,$chk_user);
                    if(mysqli_num_rows($result)>0){
                        $_SESSION['error']="User already Exist try with different email";  
                    }   else{
                            $hash_pass= password_hash($password,PASSWORD_BCRYPT);
                        $query= "insert into user(name,email,password) values('$name','$email','$hash_pass')";
                      
                        $result = mysqli_query($conn,$query);

                        if($result){
                            $_SESSION['success']="User Register Successfully";
                        }
                        else{
                            $_SESSION['error']="Something wrong went insert into db";
                        }


                    }
                   }




                }
?>



            <div class="shadow col-sm-10 mx-auto col-md-6 py-5 my-5 px-5">
                        <div class="mb-3 border-b">
                            <h1 class="text-center">Register</h1>
                        </div>
                        <form action="/register.php" method="post" class="w-full form-control shadow py-5 px-4">
                                    <?php
                        if(isset($_SESSION['error'])  && $_SESSION['error']!=''){
                            ?>
                            <div class="mb-3 alert  alert-danger">
                                        <?= $_SESSION['error'] ?> 
                                    </div>
                            <?php
                            unset($_SESSION['error']);
                        }
                                    ?>

<?php
                       if(isset($_SESSION['success'])  && $_SESSION['success']!=''){
                            ?>
                            <div class="mb-3 alert  alert-success">
                                        <?= $_SESSION['success'] ?> 
                                    </div>
                            <?php
                            unset($_SESSION['success']);
                        }
                                    ?>

<div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" 
                                        name="name" placeholder="Enter Your Name  " type="text" class="form-control">
                            </div>

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
                                <button name="registerBtn" class="btn btn-primary    mx-auto">Register</button>
                            </div>
                        </form>
            </div>

<?php
require("./inc/Footer.php")
?>