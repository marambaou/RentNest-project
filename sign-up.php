<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to sign-up page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            background-image: linear-gradient(rgb(0, 0, 0, 0.5),rgb(0, 0, 0, 0.5)), url(nathan-anderson-5-jtsfuaLBw-unsplash.jpg);
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .container {
            width: 330px;
            padding: 2rem 1rem;
            margin: 100px auto 30px auto;
            border-radius: 10px;
            text-align: center;
            background-color: rgba(67, 80, 95, 0.6);
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
            margin-top: 0.2rem;

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

        .terms a {
            color: rgb(17, 107, 143);
            text-decoration: none;
        }
        .member {
            font-size: 0.8rem;
            margin-top: 1.4rem;
            color: grey;


        }
        .member a {
            color: rgb(17, 107, 143);
            text-decoration: none;
        }
        label {
            margin-bottom: 7px;
        }
        

    </style>
</head>
<body>
    <?php
    /* include("config.php");
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email = '$email'");
        if (mysqli_num_rows($verify_query) !=0) {
            echo "<div class = 'message'>
                      <p>This email is used, Try another one please!</p>
                  <div> <br>";
            echo "<a href = 'javascript:self.history.back()'><button class = 'btn'>Go back</button>";
        }
        else {
            mysqli_query($con, "INSERT INTO users (Firstname, Lastname, Username, Email, Password) VALUES ('$firstname', '$lastname','$username','$email', '$password')") or die ("Error occourd");
            echo "<div class = 'message'>
                      <p>Registration was succesfull</p>
                  <div> <br>";
            echo "<a href = 'log-in.html'><button class = 'btn'>log in now</button>";
        };

    }*/
    ?>
    
    <div class="container">
        <h1>sign-up</h1>
        <form action="config.php" method="post">
            <input type="text" placeholder="First name" name="firstname">
            <input type="text" placeholder="Last name" name="lastname"> 
            <input type="text" placeholder="username" name="username">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password"><br>
            
        
            <div class="terms">
                <input type="checkbox" id="checkbox">
                <label for="checkbox">I agree to these <a href="">terms & condition</a></label>
            </div>
            <div>
                <input type="submit" name="submit" value="Sign up" id="button">
                <div class="member"> Already a member? <a href="log-in.html">Log in</a></div>
                </div>
        </form>

    </div>

    
</body>
</html>