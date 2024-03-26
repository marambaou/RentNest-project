<?php
session_start(); 
include 'config.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM house_owners WHERE id = $user_id";
$result = mysqli_query($con, $query);
$user_data = mysqli_fetch_assoc($result);
$firstName = $user_data['FirstName'];
$secondName = $user_data['LastName'];

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


require('fpdf-libraries/fpdf.php'); // Adjust the path according to your setup

// Create a new PDF instance
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 22);

// HTML content
$pdf->Cell(0, 10, 'Weekly Report From RentNest', 0, 1, 'C'); // Title
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Introduction', 0, 1);
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, "Hello $firstName $secondName, this report shows how the bookings and searches have occurred in one week. RentNest presents this report to you as one of our esteemed users to help in future investment decision-making. The information below has not been tampered with in any way, so it is authentic and approved.");
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Background', 0, 1); // Background
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, "Since real estate is one of the best investment options across the planet, making decisions on which type of house to major in, your pricing criteria, and the choice of location is always a daunting matter to all investors. Therefore, the information in this report will help in this decision-making process.");
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Methodology', 0, 1); 
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, "The information above has been obtained from the analysis of our large database, tracking of activities on our RentNest website, and feedback that we have been receiving from our esteemed users. Analysis has been done on the information to ensure that the provided information is of high accuracy.");
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Findings', 0, 1); // Findings
$pdf->SetFont('Arial', '', 14);
// Search History
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'From Search History', 0, 1);

$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, 'Most searched locations:');
while ($row = mysqli_fetch_assoc($search_result)) {
    $pdf->Cell(10);
    $pdf->Cell(0, 10, '-> ' . $row['location'] . ": " . $row['search_count'] . " searches", 0, 1);
}
$pdf->Ln(5);

$pdf->MultiCell(0, 10, 'Most searched property types:');
while ($row = mysqli_fetch_assoc($search_category_result)) {
    $pdf->Cell(10);
    $pdf->Cell(0, 10, '->' . $row['category'] . ": " . $row['search_count'] . " searches", 0, 1);
}
$pdf->Ln(5);

$pdf->MultiCell(0, 10, 'Most searched rent prices:');
while ($row = mysqli_fetch_assoc($search_rent_result)) {
    $pdf->Cell(10);
    $pdf->Cell(0, 10, '->' . $row['rent'] . ": " . $row['search_count'] . " searches", 0, 1);
}
$pdf->Ln(5);

// Booking History
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'From Booking History', 0, 1);

$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, 'Most booked locations:');
while ($row = mysqli_fetch_assoc($book_result)) {
    $pdf->Cell(10);
    $pdf->Cell(0, 10, '->' . $row['location'] . ": " . $row['booking_count'] . " bookings", 0, 1);
}
$pdf->Ln(5);

$pdf->MultiCell(0, 10, 'Most booked property types:');
while ($row = mysqli_fetch_assoc($booking_category_result)) {
    $pdf->Cell(10);
    $pdf->Cell(0, 10, '->' . $row['category'] . ": " . $row['booking_count'] . " bookings", 0, 1);
}
$pdf->Ln(5);

$pdf->MultiCell(0, 10, 'Most booked rent prices:');
while ($row = mysqli_fetch_assoc($booking_rent_result)) {
    $pdf->Cell(10);
    $pdf->Cell(0, 10, '->' . $row['rent'] . ": " . $row['booking_count'] . " bookings", 0, 1);
}
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Conclusion and Recommendation', 0, 1); // Conclusion and Recommendation
$pdf->SetFont('Arial', '', 14);

$pdf->MultiCell(0, 10, "From the information above, there are locations that have been searched much, the most searched type of house, and the prices. On top of that you have been provided by the type of houses, location and the price that have been booked. This information can be used for decision-making in the future to increase sales and revenue.");

// Output PDF
$pdf->Output('rentnest_weekly_report.pdf', 'D');
?>

