<?php
include('header.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listeed-display.css">
    <title>Display</title>
    <style>
        body {
            background: wheat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .search-page{
    width: 100%;
    height: 400px;
    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(images/sanjay-b-bSoWSlidavc-unsplash.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;

}
.cont-search {
    
    padding: 20px;
    padding-right: 150px;
    background-color: rgb(236, 231, 231);
    padding-right: 50px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;

}
.cont-search input {
    padding: 5px;
    width: 150px;
    height: 50px;
    
}
.btn-search {
    border-bottom-right-radius: 15px;
    border-top-right-radius: 15px;
    width: 100px;
    background-color: rgb(120, 137, 141);
    padding: 20px;
    color: white;
    font-weight: bold;
    cursor: pointer;
}
.btn-search:hover {
    background-color: rgb(58, 58,221);
}
.category {
    padding: 20px;

}
    </style>
</head>
<body>
    <div class="search-page">
       <form action="listed-display.php" method="post">
            <div class="cont-search">
            <label for="category">Category</label><br>
            <select id="category" name="category" class="category">
                <option value="single room">single room</option>
                <option value="bed sitter">bedsitter</option>
                <option value="one bedroom">one bedroom</option>
                <option value="two bedroom">two bedroom</option>
                <option value="three bedroom">three bedroom</option>
            </select>
                <input type="text" placeholder="Location/ town/ County" name="location" style="color: black; border: 1px solid black">
                <input type="number" placeholder="Maximum Price" name="rent" style="color: black; border:1px solid black;">
                <button class="btn-search" name="btn"><i class="fa-solid fa-magnifying-glass-location"></i> Search</button>
            </div>
        </form> 
    </div>
    <div class="container">
    
        <div class="title">
            <h1>MOST VIEWED</h1>
            <div class="line"><p>Discover a range of homes worldwide book securely and get expert customer support. RentNest is your ultimate house seeking solution</p></div>
        </div>
        <div class="row">
    <?php
    
    include 'config.php';
    if(isset($_POST['btn'])){
        $category = $_POST['category'];
        $location = $_POST['location'];
        $rent = $_POST['rent'];

        $sql = "SELECT * FROM houses WHERE category = '$category' AND location = '$location' AND  rent <= $rent";
    }else {

    $sql = "SELECT * FROM houses";
}
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        while($row = $result->fetch_assoc()) {
            if ($count % 3 == 0 && $count != 0) {
                echo '</div><div class="row">';
            }

            $house_id = $row['id'];
            $sql = "SELECT * FROM house_images WHERE house_id = $house_id";
            $image_result = $con->query($sql);
            $image_row = $image_result->fetch_assoc();
            $image_url = $image_row['image_url'];

            // Display the house details
            echo '<div class="column">';
            echo '<img src="' . $image_url . '" alt="">';
            echo '<h4>LOCATION: ' . $row['location'] . ' CATEGORY: ' . $row['category'] . '</h4>'; ' PRICE: Ksh.' . $row['rent'] . '</h4>';
            echo '<h4>PRICE: Ksh.' . $row['rent'] . '</h4>';
            echo '<a href="" class="pic-btn">Book now</a>';
            echo '</div>';

            $count++;
        }
    } else {
        echo "No result found";
    }

    $con->close();
    ?>
</div>


        </div><br><br><br>
    </div>
</body>
</html>
<?php
include("re-used-footer.html");


?>