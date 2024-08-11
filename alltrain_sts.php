
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Check availability</title>
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
// Include database connection
include_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $train_name = isset($_POST['train_name']) ? $_POST['train_name'] : '';

    if (empty($train_name)) {
        echo "<p style= font-size: 2em; color: #333; font-weight: bold; margin-top: 250px;'>Please enter a train name.</p>";
    } else {
        // Prepare SQL query (using prepared statements for security)
        $sql = "SELECT train_id, train_name, source, destination, departure_time, departure_date, price
                FROM trains 
                WHERE train_name LIKE ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters
        $like_train_name = "%{$train_name}%";
        mysqli_stmt_bind_param($stmt, "s", $like_train_name);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Display train details in blocks
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div style='border: 1px solid #ccc;width: 1000px; border-radius: 8px; padding: 16px; margin: 16px 0; background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);'>";
                echo "<div style='margin-bottom: 16px;'>";
                echo "<h3 style='margin: 0; font-size: 1.5em; color: #333;'>{$row['train_id']} - {$row['train_name']}</h3>";
                echo "</div>";
                echo "<div style='margin-top: 8px;'>";
                echo "<p style='margin: 4px 0;font-size: 1.2em; color: #555;'>Via: {$row['source']} to {$row['destination']}</p>";
                echo "<p style='margin: 4px 0; color: #555;'>Departure time: {$row['departure_time']}</p>";
                echo "<p style='margin: 4px 0; color: #555;'>Date of Departure: {$row['departure_date']}</p>";
                echo "</div>";
                echo "<div style='display: flex; justify-content: space-between; align-items: center; margin-top: 12px;'>";
                echo "<p style='margin: 0; font-weight: bold; color: #333;'>Price: ₹ {$row['price']}</p>";
                echo "<a href='purchase.php' style='background-color: #f60; color: #fff; border: none; padding: 13px 26px; border-radius: 4px; cursor: pointer; font-size: 1.2em; text-decoration: none;'>Buy</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>No trains found with the name '{$train_name}'. Please enter the correct train name.</p>";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Close database connection
mysqli_close($conn);
?>




   
</body>
</html>







