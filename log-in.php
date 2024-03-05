<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome back</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial;
        }
        body {
            background-image: linear-gradient(rgb(0, 0, 0, 0.50),rgb(0, 0, 0, 0.50)), url(andreas-brucker-g5Uh7nP60FA-unsplash.jpg);
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            
            


        }
        .wraped {
            background-color: lightblue;
            margin: auto;
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
    </style>
</head>
<body>
    <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'config.php';
        $email = $_POST['email'];
        $password= $_POST['password'];
    
    
    $sql = "select * from `house_seekers` where Email = '$email' and Password = '$password'";
   $result = mysqli_query($con, $sql);
   if($result){
    $num = mysqli_num_rows($result);
     if($num>0){
        header("Location: listed-display.php");
     }else {
        echo "hefdfjekfj";
     }
   }else {
    die(mysqli_error($con));

   }
}

    ?>
    <div class="wraped">
        <h1>LOG - IN</h1>
            <form action="log-in.php" method="post">
                <input type="email" placeholder="Email" name="email" class="input1"><br>
                <input type="password" placeholder="password" name="password" class="input1">
            
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
    
</body>
</html>
<?php
include("re-used-footer.html");
?>