<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="purchase.css">
    <title>Updation</title>
</head>
<body style="background-color: #f4f4f4;">
<nav>
        <ul id="unordered_list">
            <li><a href="main.php">Home</a></li>
            <li>
                <a href="#">Passenger Services ▾</a>
                <ul class="dropdown1">
                    <li><a href="booking.php">Book Ticket</a></li>
                    <li><a href="cancelticket.php">Cancel Ticket</a></li>
                    <li><a href="update.php">Update Ticket</a></li>
                </ul>
            </li>
            <li><a href="alltrains.php">Search Trains</a></li>
            <li><a href="myticket.php">My Booking</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="login.php">Account</a></li>
        </ul>
    </nav>
    
</body>
</html>
<?php
include_once 'database.php';
$name = $_POST['name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Check if the record exists
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM passenger WHERE phone=?");
$checkStmt->bind_param("s", $phone);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

if ($count > 0) {
    // Record exists, proceed with the update
    $stmt = $conn->prepare("UPDATE passenger SET name=?, age=?, email=? WHERE phone=?");
    $stmt->bind_param("siss", $name, $age, $email, $phone);
    
    if ($stmt->execute()) {
        echo '<div style="font-size: 2em; color: #333; font-weight: bold;margin-top:200px;">Record updated successfully</div>'."<br><br>";
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $stmt->close();
} else {
    // Record does not exist
    echo '<div style="font-size: 2em; color: #333;margin-top:200px; font-weight: bold;">No record found with the provided phone number.</div>'."<br><br>";

}

// Close connection
$conn->close();
?>