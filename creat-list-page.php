<?php
      session_start(); 
      include 'config.php';
     
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM house_owners WHERE id = $user_id";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $location = $_POST['location'];
        $rent = $_POST['rent'];
        $category = $_POST['category'];

    
    $sql = "INSERT INTO houses (owners_id, location, rent, category) VALUES ('$user_id','$location', '$rent', '$category')";
    if ($con->query($sql) === TRUE) {
        
        $house_id = $con->insert_id;

        
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];

    
        if ($image_type == 'image/jpeg' || $image_type == 'image/png') {
            
            $upload_dir = 'uploads/';
            $image_url = $upload_dir . $image_name;
            move_uploaded_file($image_tmp, $image_url);

            
            $sql = "INSERT INTO house_images (house_id, image_url) VALUES ('$house_id', '$image_url')";
            $con->query($sql);
        }

        $error_message = "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }


    $con->close();
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RentNest - House Owner</title>
    <style>
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
        body {
            font-family: Arial, sans-serif;
            padding: 0;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(images/josh-appel-NeTPASr-bmQ-unsplash.jpg);
            background-size: cover;

            
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 500px;
            display: block;
        }

        h1 {
            text-align: center;
            text-decoration: underline;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 30px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;

        }
        .top-nav {
            width: 100%;
            background-color: red;
            height: 50px;

        }
        .top-nav ul {
            display: flex;
            padding: 5px;

        }
        .top-nav ul li {
            list-style: none;
            padding: 10px;

        }
        .top-nav ul li a {
            text-decoration: none;
            margin-left: 60px;
            padding: 10px;
            color: white;
            font-weight: bold;
            font-family: Arial;
            background-color: rgb(172, 98, 98);
        }
        .error{
            color: green;
            margin-top: 15px;
            font-weight: bold;
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
    <div class="top-nav">
        <ul>
            <li><a href="">User Profile</a></li>
            <li><a href="">House Listing</a></li>
            <li><a href="">User Review</a></li>
        </ul>
    </div>
       
   
    <div class="container">
        <h1>House Listing</h1>
        <form action="creat-list-page.php" method="POST" enctype="multipart/form-data">
            <label for="Location">Location:</label>
            <input type="text" id="Location" name="location" required><br>
            <label for="rent">Rent Price:</label>
            <input type="number" id="rent" name="rent" required><br>
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="single room">single room</option>
                <option value="bed sitter">bedsitter</option>
                <option value="one bedroom">one bedroom</option>
                <option value="two bedroom">two bedroom</option>
                <option value="three bedroom">three bedroom</option>
            </select><br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*"><br>
            <input type="submit" value="Submit">

            <?php if(isset($error_message)){
                echo '<div class = "error">' .$error_message. '</div>';
            }
            ?>
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

