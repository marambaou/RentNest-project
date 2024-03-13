<?php
include('header.html');
?>


<?php
session_start();
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmailConfirmationToOwner($first_name, $owner_email, $house_id) {
    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'marambasunga@gmail.com';
    $mail->Password = 'qccv phzy fxou bmha';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('marambasunga@gmail.com', 'RentNest');
    $mail->addAddress($owner_email);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'House Booking Notification';
    $mail->Body = 'Dear House Owner,<br><br>Your house with ID ' . $house_id . ' has been booked by '.$first_name.'  You will be  contacted  for further details.<br><br>Thank you for choosing to advertise whith us,<br>RentNest';

    // Send email
    $mail->send();
}

function sendEmailConfirmationToSeeker($owner_email, $owner_phone, $seeker_email, $house_id, 
$first_name) {
    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'marambasunga@gmail.com';
    $mail->Password = 'qccv phzy fxou bmha';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('marambasunga@gmail.com', 'RentNest');
    $mail->addAddress($seeker_email);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Booking Confirmation';
    $mail->Body = 'Dear '.$first_name.',<br><br>Congratulations! You have successfully booked a house with ID ' . $house_id . '. <br> House owners Email is '.$owner_email.' <br> House owners Phone is '.$owner_phone.' <br> Contact house owner for futher information <br> Thank you for choosing to work with us ,<br>RentNest';

    // Send email
    $mail->send();
}


// Check if house_id is provided in the URL
if (isset($_GET['house_id'])) {
    $house_id = $_GET['house_id'];

        $update_query = "UPDATE houses SET book_status = '1' WHERE id = '$house_id'";
        $update_result = $con->query($update_query);
        if(!$update_result){
            echo "Error updating book status: " . $con->error;
            exit; // Exit if there's an error
        }
        $house_query = "SELECT * FROM houses WHERE id = '$house_id'";
        $house_result = mysqli_query($con, $house_query);

    if ($house_result && mysqli_num_rows($house_result) > 0) {
        $house_data = mysqli_fetch_assoc($house_result);

        // Retrieve house owner's information from the house-owners table
        $owner_id = $house_data['owners_id'];
        $owner_query = "SELECT PhoneNumber, Email FROM house_owners WHERE id = '$owner_id'";
        $owner_result = mysqli_query($con, $owner_query);

        if ($owner_result && mysqli_num_rows($owner_result) > 0) {
            $owner_data = mysqli_fetch_assoc($owner_result);
            $owner_phone = $owner_data['PhoneNumber'];
            $owner_email = $owner_data['Email'];

            // Check for valid house seeker information in the session
            if (isset($_SESSION['seekers_id'])) {
                $seekers_id = $_SESSION['seekers_id'];

                $seeker_query = "SELECT Email, FirstName, LatstName FROM house_seekers WHERE id = '$seekers_id'";
                $seeker_result = mysqli_query($con, $seeker_query);

                if ($seeker_result && mysqli_num_rows($seeker_result) > 0) {
                    $seeker_data = mysqli_fetch_assoc($seeker_result);
                    $first_name = $seeker_data['FirstName'];
                    $last_name = $seeker_data['LatstName'];
                    $seeker_email = $seeker_data['Email'];
                    sendEmailConfirmationToOwner($first_name, $owner_email, $house_id);
                    sendEmailConfirmationToSeeker($owner_email, $owner_phone, $seeker_email, $house_id, $first_name);

                    // Now you have all the necessary data for booking
                    // Perform further processing or display information as needed
                } else {
                    echo "Error: Unable to retrieve house seeker's information. Please log in or create an account."; // Handle missing seeker info
                }
            } else {
                echo "Error: Please log in or create an account to book a house."; // Handle missing seeker ID in session
            }
        } else {
            echo "Error: Unable to retrieve house owner's information.";
        }
    } else {
        echo "Error: House not found.";
    }
} else {
    echo "Error: House ID is not provided in the URL.";
}

// Close database connection (assuming you have a connection established)
mysqli_close($con);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
        body {
            background-image: url(images/joshua-kettle-LBa6tkq5NBQ-unsplash.jpg);
            background-size: cover;
            background-position: center;
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: green;

        }
        .container {
            border: 1px solid wheat;
            width: 400px;
            margin:15px auto;
            padding: 20px;
            height: 350px;
            border-radius: 5px;
            background-color: whitesmoke;
        }
        .term{
            font-weight: bold;
            text-align: center;
            font-style: oblique;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Congratulations Your booking was successfull</h2>
        <p><strong>First Name:</strong> <?php echo $first_name; ?></p>
        <p><strong>Last Name:</strong> <?php echo $last_name; ?></p>
        <p><strong>House ID:</strong> <?php echo $house_id; ?></p>
        <p><strong>House Owner's Phone:</strong> <?php echo $owner_phone; ?></p>
        <p><strong>House Owner's Email:</strong> <?php echo $owner_email; ?></p>
        <p class="term">Don not forget to review our terms and conditions</p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
include("re-used-footer.html");


?>