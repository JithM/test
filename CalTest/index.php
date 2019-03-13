<!DOCTYPE html>
<?php
session_start();
 //include ('phpConnection.php');
 
// DB connection
$servername = "localhost";
$root = "root";
$password = "123";
$db = "caltest";

$connect = new mysqli($servername, $root, $password, $db, 3307) or die("Errors Check".mysqli_error());
//assign characters to use in DB 
//login form
        $username=mysqli_real_escape_string($connect,$_POST['username']);
	$pass= mysqli_real_escape_string($connect,$_POST['pass']);
// registering form        
	$uname = mysqli_real_escape_string($connect,$_POST['uname']);
	$utel =mysqli_real_escape_string($connect,$_POST['utel']);
	$uemail = mysqli_real_escape_string($connect,$_POST['uemail']);
        $pass1 = mysqli_real_escape_string($connect,$_POST['pass1']);
        $pass2 = mysqli_real_escape_string($connect,$_POST['pass2']);

// load roles to combo box @ registering form
    $roleResult= mysqli_query($connect,"SELECT * FROM role");

        if(isset($_POST['login'])){
// login members
            if (!empty($username)&& !empty($pass)){
                $sqlLogin= mysqli_query("SELECT pass,email FROM login WHERE email='$username' AND pass='$pass'" ,$connect) or die ("Query Error: ". mysqli_error());
 // create session for identify user & increse secure 
            $_SESSION['user']=$_POST['uemail'] || $_POST['username'];
            header("location:Dashboard.php");
            exit();
            }
// new members registration 
        }else if (isset ($_POST['reg'])){
            if (!empty($uname)&& !empty($utel)&&!empty($uemail)&&!empty($pass1)&&!empty($pass2) && $pass1==$pass2 ){
                $sqlRegister = mysqli_query("INSERT INTO users(name,tel,joinDate,role_id) VALUES($uname,$utel,$dt->format('Y-m-d H:i:s'),$urole)", $connect); 
                $_SESSION['user']=$_POST['uemail']|| $_POST['username'];
                 header("location:Dashboard.php");
            }
            
        }
// date ime
    $dt = new DateTime();
    $dt->format('Y-m-d H:i:s');
                   
      ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CAL Test</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
   <body style="height: max-content;image-orientation:calc ;background-image: url(img/milky-way-2695569_960_720.jpg);padding: px"> 
        <div class="row" style="height: 100px;background-color: #000;padding: 5px">
            <h1 style="color: #ffffff;float: left;padding-left: 15px">CAL Test </h1>
           
        </div>
        <div class="row" style="height: 80px"></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5" style="opacity: 0.85">
                <div class="conatiner" style="padding-left: 30px;padding-top: 30px; opacity: 1.5;background-color: #ff9900;font-size: medium;">
                    <center><h3>Login</h3></center>
                    <form action="" method="POST">
                    <span>Name<input type="text" name="username" placeholder="Jhon@abc.lk" class="form form-control" style="width: 80%;"></span> <br>
                    <span>Password<input type="password" name="pass" placeholder="******" class="form form-control" style="width: 80%"></span> <br>
                    <br>
                    <center><input type="submit" name="login" class="btn btn-danger btn-lg"></center>
                    </form>
                    <br>
                </div>
            </div>
            <div class="col-sm-5" style="opacity: 0.85" >
                <div class="conatiner" style="padding-left: 30px;padding-top: 30px; opacity: 1.5;background-color: #ff9900">
                   <center><h3>Register</h3></center>
                   <form action="" method="POST">
                   <span>Name<input type="text"  name="uname" class="form form-control" style="width: 80%"></span> <br>
                   <span>Email<input type="email" name="uemail" class="form form-control" style="width: 80%"></span> <br>
                   <span>Tel.<input type="tel" name="utel" class="form form-control" style="width: 80%"></span> <br>
                   <table border="0">
                         <tr>
                             <td>Password</td>
                              <td>Comfirm Password</td>
                              <td></td>
                        </tr>
                        <tr>
                           <td><input type="password" name="pass1" class="form form-control" style="width: 200px"></td>
                           <td><input type="password" name="pass2" class="form form-control" style="width: 200px"></td>
                           <td></td>
                        </tr>
                    </table>
                    <br>
                   <span>Role</span>
                   <select class="form form-control" style="width: 400px"  name="urole" >
                       <?php 
                           while ($res= mysqli_fetch_row($roleResult)){
                                echo '<option value="'.$res[id].'">'.$res[type].'</option>';
                                echo '';
                           }
                       ?>
                    </select>
                    <br>
                    <center><input type="submit" name="reg" class="btn btn-danger btn-lg"></center>
                    <br>
                   </form>
                </div>
            </div>
             <div class="col-sm-1"></div>
             <center>
                
             </center>
        </div>   
    </body>
</html>