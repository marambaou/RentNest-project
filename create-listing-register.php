<?php 
    session_start();
    include 'config.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        
        require 'vendor/autoload.php';
    function sendemail_verify($firstname,$email,$verify){

        $mail = new PHPMailer(true);    
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'marambasunga@gmail.com';                     
        $mail->Password   = 'qccv phzy fxou bmha';                               
        $mail->SMTPSecure = 'tls';           
        $mail->Port       = 587;  

        $mail->setFrom('marambasunga@gmail.com', $firstname);
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Email Verification from RentNest';


        $mail->Body = 'Dear ' . $firstname . ',<br><br><h5>You have registered with RentNest The best house locator<h5><br><br>Please click the following link to verify your email: <a href="http://localhost/rentnest%20project/verify-email.php?token='.$verify.'">Verify Email</a>';

        $mail->send();
       // echo 'Verification email sent successfully!';


    }
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify = md5(rand());
        
    
     $check_emai_query = "SELECT Email FROM house_owners WHERE Email = '$email' LIMIT 1";
     $check_emai_query_run = mysqli_query($con, $check_emai_query);

     if(mysqli_num_rows($check_emai_query_run) > 0){

        $error_message = "Email Already Exist";
        //header("Location: create-listing-register.php");

     }else{
        $sql = "insert into house_owners(FirstName,LastName,PhoneNumber,Email,Password,verify_token) values('$firstname','$lastname','$phone','$email','$password', '$verify')";
        $result = mysqli_query($con, $sql);
        if($result){
        sendemail_verify("$firstname","$email", "$verify");
        $_SESSION['status'] = "Registration successull verify your email address";
        //header("Location: create-listing-register.php");
        }else {
         $_SESSION['status'] = "Registration Failed";
         //header("Location: create-listing-register.php");
    
        }

     }
   
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(images/pedro-lastra-Nyvq2juw4_o-unsplash.jpg);
            background-size: cover;
            background-position: center;
        }
         .navbar {
            width: 100%;
            height: 60px;
            display: flex;
            top: 0;
            justify-content: space-between;
            background-color: rgb(187, 169, 119);

        }
        .logo {
            padding: 10px;
            font-family: Arial;
            font-weight: bold;
            font-size: 40px;
            box-shadow: -3px -3px 6px;

        }
        .links {
            display: flex;
        }
        .links li {
            list-style: none;
        }
        .links li a {
            text-decoration: none;
            margin: 0 20px;
            font-family: Arial;
            font-weight: bold;
        }
        .links li a:hover {
            border-bottom: 1px solid wheat;
            color: blue;
        }
        .container {
            width: 330px;
            padding: 2rem 2rem;
            margin: 100px auto 30px auto;
            border-radius: 10px;
            text-align: center;
            background-color: rgba(67, 80, 95, 0.9);
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
        h4{
            color: green;
            font-weight: bold;
            font-size: 20px;
            
        }
        footer {
    background: linear-gradient(to right , #00093c, #2d0b00);
    width: 100%;
    bottom: 0;
    color: white;
    padding: 100px 0 30px;
    border-top-left-radius: 125px;
    font-size: 13px;
    line-height: 20px;
}
.row2 {
    width: 85%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: space-between;
}
.col {
    flex-basis: 25%;
    padding: 10px;

}
.col:nth-child(2), .col:nth-child(3) {
    flex-basis: 15%;
}
.col h3 {
    width: fit-content;
    margin-bottom: 40px;
    position: relative;
}
.email-id {
    width: fit-content;
    border-bottom: 1px solid #ccc;
    margin: 20px 0;
}
.col li {
    list-style: none;
}
.col li a {
    text-decoration: none;
    color: #ffff;
}
#foorm {
    padding-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #ccc;
    margin-bottom: 50px;

}
#foorm .far {
    font-size: 18px;
    margin-right: 10px;
}
#foorm input {
    width: 100%;
    background: transparent;
    color: #ccc;
    border: 0;
    outline: none;


}
#foorm button {
    background: transparent;
    border: 0;
    outline: none;
    cursor: pointer;
}
#foorm button  .fa-solid {
    font-size: 16px;
    color: white;

}
#foorm .fa-regular {
    margin-right: 5px;
}
.social-icon .fa-brands{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    font-size: 20px;
    color: #000;
    background: white;
    margin-right: 15px;
    cursor: pointer;

}
.social-icon .fa-brands:hover {
    scale: 1.1;
    background: wheat;
    
}
hr {
    width: 90%;
    border: 0;
    border-bottom: 1px solid #ccc;
    margin: 20px auto;
}
.copy-right {
    text-align: center;



}
.underline {
    width: 100%;
    height: 5px;
    background: #767676;
    border-radius: 3px;
    position: absolute;
    top: 25px;
    left: 0;
    overflow: hidden;


}
.underline span {
    width: 15px;
    height: 100%;
    background: #fff;
    border-radius: 3px;
    position: absolute;
    top: 0;
    left: 10px;
    animation: moving 2s linear infinite;
}
@keyframes moving{
    0%{
        left: -20px;
    }
    100%{
        left: 100%;
    }
}
@media (max-width:700px){
    footer{
        bottom: unset;
    }
    .col {
        flex-basis: 100%;
       
    
    }
    .col:nth-child(2), .col:nth-child(3) {
        flex-basis: 100%;
    }
    header {
        bottom: unset;
    }
}

    </style>
</head>
<body>
    

    <div class="navbar">
        <div class="logo">RENT NEST</div>
        <ul class="links">
            <li><a href="">Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Log Out</a></li>
        </ul>
    
    </div>
    <div class="container">
        <?php
        if(isset($_SESSION['status'])){
            echo "<h4>" .$_SESSION['status']. "</h4>";
            unset($_SESSION['status']);
        }

        ?>
        <h1>sign-up</h1>
        <form action="create-listing-register.php" method="post" id="form">
            <input type="text" placeholder="First name" name="firstname" required>
            <input type="text" placeholder="Last name" name="lastname" required>
            <input type="number" placeholder="Phone Number" name="phone" required>  
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
    <footer class="footer">
        <div class="row2">
            <div class="col">
                <h3>RENT NEST <div class="underline"><span></span></div></h3>
                <P>Discover a range of vacaton home woldwide, <br> book securely online and get a expert customer care for a stress free stay. Since we value your privacy all your data and search history will be kept secure.</P>
            </div>
            <div class="col">
                <h3>Office <div class="underline"><span></span></div></h3>
                <p>ITPL Road</p>
                <p>Whitefield,  Bangalore</p>
                <p>Karnataka, PIN 560066, Nairobi</p>
                <p class="email-id">rentnest africa@gmail.com</p>
                <h4>+254-0123456767</h4>
            </div>
            <div class="col">
                <h3>Links <div class="underline"><span></span></div></h3>
                
                <li><a href="">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Sign UP</a></li>
                <li><a href="">Log in</a></li>
               
               
            </div>
            <div class="col">
                <h3>News Letter <div class="underline"><span></span></div></h3>
                <form action="" id="foorm">
                     <i class="fa-regular fa-envelope"></i>
                    <input type="email" placeholder="Enter your email id" required>
                    <button type="button"><i class="fa-solid fa-arrow-right"></i></button>

                </form>
                <div class="social-icon">
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-tiktok"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copy-right">Rent Nest Africa ©  2024 - All Right reserverd</p>
    </footer>
</body>
</html>