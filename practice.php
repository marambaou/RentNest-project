<?php
function sendemail_verify($name,$email , $verify){
    
}
session_start();
$conn = new mysqli("localhost", "root", "" ,"emailcheck");
if(!$conn){
    die(mysqli_error($con));
}
if(isset($_POST['submit'])){
    $name = $_POST['firstname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    $verify = md5(rand());

    $check_email_query = "SELECT Emall FROM `owners` WHERE Emall = '$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
       $error_message = "email already exist";
    }else {
        $query = "INSERT INTO `owners` (firstname,phone,emall, password, verify_token) VALUES('$name', '$phone','$email','$hashed', '$verify')";
        $result = mysqli_query($conn, $query);
        if($result){
            sendemail_verify("$name","$email" , "$verify");
            $_SESSION['status'] = "Registration successfull. please verify your email address";
            header("Location: log-in.php");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .container {
            width: 330px;
            padding: 2rem 2rem;
            margin: 100px auto 30px auto;
            border-radius: 10px;
            text-align: center;
            background-color: rgba(67, 80, 95, 0.8);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);


        }
        h1 {
            font-size: 2rem;
            color: bisque;
            margin-top: 1.2rem;
            margin-bottom: 1.2rem;
            font-family: Arial;
        }
        form input {
            width: 92%;
            outline: none;
            border: 1px solid white;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 20px;
            background: white;
        }
        #button {
            font-size: 1rem;
            margin-top: 1.8rem;
            padding: 10px 0;
            outline: none;
            border: none;
            width: 90%;
            color: white;
            cursor: pointer;
            background: rgb(17, 107, 143);
            border-radius: 2px;

        }
        #button:hover {
            background: rgba(17, 107, 143, 0.877);
        }
        #input:focus {
            border: 1px solid white;
        }
        .terms {
            margin-top: 18px;

        }
        .terms input{
            height: 1em;
            width: 1em;
            vertical-align: middle;
            cursor: pointer;
            margin-top: 7px;


        }
        .terms label {
            font-size: 0.7rem;

        }

        .terms a {
            color: rgb(17, 107, 143);
            text-decoration: none;
        }
        .member {
            font-size: 0.8rem;
            margin-top: 1.4rem;
            color: black;


        }
        .member a {
            color: rgb(17, 107, 143);
            text-decoration: none;
        }
        label {
            margin-bottom: 7px;
        }
        .error {
            color: red;
            margin-right: 40px;
            position: absolute;

        }
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(images/pedro-lastra-Nyvq2juw4_o-unsplash.jpg);
            background-size: cover;
            background-position: center;
        }
        .error {
            color: red;
            margin-right: 40px;
            position: absolute;

        }
    </style>
</head>
<body>
    <h3>This is index page</h3>
    <div class="container">
        <form action="practice.php" method="post" id="form">
                <input type="text" placeholder="First name" name="firstname" required>
                <input type="number" placeholder="phone number" name="phone" required> 
                <input type="email" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password" required><br>
                <?php
            if(isset($error_message)){
                echo '<div class = "error">' .$error_message. '</div>';
            }
            ?>
            
                
                <div class="terms">
                    <input type="checkbox" id="checkbox">
                    <label for="checkbox">I agree to these <a href="">terms & condition</a></label>
                </div>
                <div>
                    <input type="submit" name="submit" value="Sign up" id="button">
                    <div class="member"> Already a member? <a href="listing-login.php">Log in</a></div>
                    </div>
        </form>
    </div>
        
    
    
</body>
</html>