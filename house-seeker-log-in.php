<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'config.php';
        $username = $_POST['username'];
        $password= $_POST['password'];
    
    
    $sql = "select * from `house_seekers` where Username = '$username' and Password = '$password'";
   $result = mysqli_query($con, $sql);
   if($result){
    $num = mysqli_num_rows($result);
     if($num>0){
        header("Location: listed-display.php");
     }else {
        $error_message = "Please check Username/Password";
     }
   }else {
    die(mysqli_error($con));

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
        
        body {
            background-image: linear-gradient(rgb(0, 0, 0, 0.50),rgb(0, 0, 0, 0.50)), url(andreas-brucker-g5Uh7nP60FA-unsplash.jpg);
            background-position: center;
            background-attachment: fixed;
            background-size: cover;

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
        .wraped {
            background-color: lightblue;
            margin: 35px auto;
            text-align: center;
            width: 350px;
            padding: 2rem 1rem;
            border-radius: 10px;
        }
        h1 {
            font-family: 'Arial Narrow Bold',

        }
        .input1{
            margin-bottom: 10px; 
            padding: 12px 20px;
            width: 92%;
            border-radius: 20px;
            border: 1px solid white;
            outline: none;
            background-color: burlywood;
            margin-top: 1.8rem;
           
        }
        button {
            width: 90%;
            background-color: rgb(17, 107, 143);
            padding: 9px 0px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .log {
            margin: 20px 0;
        }
        .terms {
            margin: 1.3rem;
        }
        .terms input{
            height: 1em;
            width: 1em;
            vertical-align: middle;
            cursor: pointer;


        }
        .terms label {
            font-size: 0.7rem;

        }
        .not-member {
            font-size: 0.8rem;
            margin-top: 1.4rem;
            color: grey;


        }
        .not-member a {
            color: rgb(17, 107, 143);
            text-decoration: none;
        }
        .error {
            color: red;
            font-weight: bold;
            font-style: italic;
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
    <div class="wraped">
        <h1>LOG - IN</h1>
            <form action="house-seeker-log-in.php" method="post">
                <input type="text" placeholder="Username" name="username" class="input1"><br>
                <input type="password" placeholder="password" name="password" class="input1">

                <?php if(isset($error_message)){
                echo '<div class = "error">' .$error_message. '</div>';
            }
            ?>
            
            <div class="terms">
            <input type="checkbox">
            <label for="checkbox">Remember this choice</label>
            </div>
            <button type="submit">LOG IN</button>
            <div class="not-member">
                Don't have an account? <a href="Sign-up.php">Sign up</a>
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