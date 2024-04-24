<?php
session_start();
include('config.php');

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // Redirect user to login page
    $user_id = $_SESSION['user_id'];

// Update 'subscribed' column in the database
$sql = "UPDATE house_owners SET subscribed = 1 WHERE id = $user_id";
if (mysqli_query($con, $sql)) {
    // Subscription updated successfully
    header("Location: creat-list-page.php"); // Redirect user to success page
    exit();
} else {
    // Error updating subscription
    echo "Error updating subscription: " . mysqli_error($con);
}
}
?>
