<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="purchase.css">
    <title>MY ticket</title>
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
        

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    include_once 'database.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $phone = $_POST['phone'];

    // Check if the phone number exists in the database
    $check_sql = "SELECT * FROM passenger WHERE phone = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("s", $phone);
    $stmt_check->execute();
    $check_result = $stmt_check->get_result();

    if ($check_result->num_rows > 0) {
        // Phone number exists, proceed with deletion
        $delete_sql = "DELETE FROM passenger WHERE phone = ?";
        $stmt_delete = $conn->prepare($delete_sql);
        $stmt_delete->bind_param("s", $phone);

        if ($stmt_delete->execute()) {
            echo  "<p style='font-size: 2em; color: #333; font-weight: bold; margin-top: 250px;'>Ticket canceled successfully.</p>";
           
        } else {
            echo "<p>Error canceling ticket: " . $stmt_delete->error . "</p>";
        }

        // Close the delete statement
        $stmt_delete->close();
    } else {
        // Phone number does not exist
        echo "<p style='font-size: 2em; color: #333; font-weight: bold; margin-top: 250px;'>No ticket found with the given phone number.</p>";
    }

    // Close the check statement and connection
    $stmt_check->close();
    $conn->close();
}
?>


</body>
</html>