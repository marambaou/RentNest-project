<?php
      session_start(); 
      include 'config.php';
     
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM house_owners WHERE id = $user_id";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    $firstName = $user_data['FirstName'];
    $secondName = $user_data['LastName'];
    
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



}
// Assuming you have already established a database connection

// Function to execute SQL queries and fetch results
function execute_query($con, $query) {
    $results = mysqli_query($con, $query);
    if (!$results) {
        die("Query failed: " . mysqli_error($con));
    }
    return $results;
}

// Retrieve data for search history
$search_query = "SELECT location, COUNT(*) AS search_count FROM search_history GROUP BY location ORDER BY search_count DESC LIMIT 5";
$search_result = execute_query($con, $search_query);

$search_category_query = "SELECT category, COUNT(*) AS search_count FROM search_history GROUP BY category ORDER BY search_count DESC LIMIT 4";
$search_category_result = execute_query($con, $search_category_query);

$search_rent_query = "SELECT rent, COUNT(*) AS search_count FROM search_history GROUP BY rent ORDER BY search_count DESC LIMIT 4";
$search_rent_result = execute_query($con, $search_rent_query);

// Retrieve data for booking history
$booking_query = "SELECT location, COUNT(*) AS booking_count FROM houses WHERE book_status = 1 GROUP BY location ORDER BY booking_count DESC LIMIT 5";
$book_result = execute_query($con, $booking_query);

$booking_category_query = "SELECT category, COUNT(*) AS booking_count FROM houses WHERE book_status = 1 GROUP BY category ORDER BY booking_count DESC LIMIT 4";
$booking_category_result = execute_query($con, $booking_category_query);

$booking_rent_query = "SELECT rent, COUNT(*) AS booking_count FROM houses WHERE book_status = 1 GROUP BY rent ORDER BY booking_count DESC LIMIT 4";
$booking_rent_result = execute_query($con, $booking_rent_query);

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
        
        .tab {
            text-decoration: none;
            margin-left: 60px;
            padding: 10px;
            color: white;
            font-weight: bold;
            font-family: Arial;
            background-color: rgb(172, 98, 98);
            cursor: pointer;
            height: 100%;
        }
        .error{
            color: green;
            margin-top: 15px;
            font-weight: bold;
        }
        .report {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: block;
        }
        .head {
            font-weight: bold;
            font-size: 20px;
            color: #007bff;
        }
        .analysis {
            display: flex;
            justify-content: space-between;
        }
        .download {
            margin: 0 auto;
            cursor: pointer;
            background-color: greenyellow;
            color: #000;
            border-radius: 5px;
            border: 1px solid green;
            padding: 15px;
            width: 19%;
        }
        .download a {
            text-decoration: none;
            text-align: center;
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
            <div class="tab"  onclick=" showContent('report')">Weekly Report</a></a></div>
            <div class="tab" onclick="showContent('listing')">House Listing</div>
            <div class="tab" onclick="showContent('profile')">User Profile</div>
        
        </ul>
    </div>
       
   
    <div id = "listingContent" class="container content">
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
    <div id="reportContent" class="report content">
        <h1>Weekly Report</h1>
        <p class="head">Introduction</p>
            <p>Hello <?php echo $firstName . " " . $secondName ?>, this report shows how the bookings and searches have occurred in one week. RentNest presents this report to you as one of our esteemed users to help in future investment decision-making. The information below has not been tampered with in any way, so it is authentic and approved.</p>
            <p class="head">Background</p>
            <p>Since real estate is one of the best investment options across the planet, making decisions on which type of house to major in, your pricing criteria, and the choice of location is always a daunting matter to all investors. Therefore, the information in this report will help in this decision-making process.</p>
            <p class="head">Methodology</p>
            <p>The information above has been obtained from the analysis of our large database, tracking of activities on our RentNest website, and feedback that we have been receiving from our esteemed users. Analysis has been done on the information to ensure that the provided information is of high accuracy.</p>
<p class="head">Findings</p>
<div class="analysis">
    <div class="search">
        <h4>From Search History</h4>
        <p>Most searched locations:</p>
        <ul>
                <?php while ($row = mysqli_fetch_assoc($search_result)) { ?>
                <li><?php echo $row['location'] . ": " . $row['search_count'] . " searches"; ?></li>
                <?php } ?>
        </ul>
        <p>Most searched property types:</p>
        <ul>
        <?php while ($row = mysqli_fetch_assoc($search_category_result)) { ?>
                <li><?php echo $row['category'] . ": " . $row['search_count'] . " searches"; ?></li>
            <?php } ?>
        </ul>
        <p>Most searched rent prices:</p>
        <ul>
        <?php while ($row = mysqli_fetch_assoc($search_rent_result)) { ?>
                <li><?php echo $row['rent'] . ": " . $row['search_count'] . " searches"; ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="book">
        <h4>From Booking History</h4>
        <p>Most booked locations:</p>
        <ul>
        <?php while ($row = mysqli_fetch_assoc($book_result)) { ?>
                <li><?php echo $row['location'] . ": " . $row['booking_count'] . " bookings"; ?></li>
            <?php } ?>
        <p>Most booked property types:</p>
        <ul>
        <?php while ($row = mysqli_fetch_assoc($booking_category_result)) { ?>
                <li><?php echo $row['category'] . ": " . $row['booking_count'] . " bookings"; ?></li>
            <?php } ?>
        </ul>
        <p>Most booked rent prices:</p>
        <ul>
        <?php while ($row = mysqli_fetch_assoc($booking_rent_result)) { ?>
                <li><?php echo $row['rent'] . ": " . $row['booking_count'] . " bookings"; ?></li>
            <?php } ?>
        </ul>
    </div>
</div>
<p class="head">Conclusion and Recommendation</p>
<p>From the information above, there are locations that have been searched much, the most searched type of house, and the prices. On top of that you have been provided by the type of houses, location and the price that have been booked. This information can be used for decision-making in the future to increase sales and revenue.</p>

        

   <div class="download">
    <a href="report-generation.php">Download Report<i class="fa-solid fa-download"></i></a>
   </div>     
    </div>
    <div id="profileContent" class="profile content">
        welcom to the profile page
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
    <script>
// Function to show content when the page loads
document.addEventListener("DOMContentLoaded", function() {
  showContent('listing'); // Show HTML content by default
});

function showContent(contentName) {
  // Hide all content
  var contents = document.getElementsByClassName("content");
  for (var i = 0; i < contents.length; i++) {
    contents[i].classList.remove("active"); // Remove active class from all contents
    contents[i].style.display = "none";
  }
  
  // Show the selected content
  var selectedContent = document.getElementById(contentName + "Content");
  selectedContent.classList.add("active"); // Add active class to selected content
  selectedContent.style.display = "block";
  

}
</script>
</body>
</html>

