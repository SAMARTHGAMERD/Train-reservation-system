<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
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
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Booking</title>
</head>
<body>
    <?php
    include_once 'database.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validate and sanitize input data (you can add more validation as needed)
        $name = htmlspecialchars(trim($_POST["name"]));
        $age = intval($_POST["age"]); // Ensure age is an integer
        $gender = htmlspecialchars(trim($_POST["gender"])); // Sanitize gender input
        $phone = htmlspecialchars(trim($_POST["phone"])); // Sanitize phone input
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Handle invalid email scenario
            echo '<div style="color: red; font-weight: bold;">Invalid email format!</div>';
            exit; // Exit script if email is invalid
        }

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into `passenger` table
        $sql = "INSERT INTO passenger (name, age, gender, phone, email)
                VALUES (?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisss", $name, $age, $gender, $phone, $email);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "<div style='text-align: center; margin-top: 250px;'>";
            echo '<div style="font-size: 2em; color: #333; font-weight: bold;">Payment successfully!</div>'."<br><br>";

            echo "<br><a href='myticket.php' style='background-color: #f60; color: #fff; border: none; padding: 13px 26px; border-radius: 4px; cursor: pointer; font-size: 1.2em; text-decoration: none;'>View ticket</a>";
            echo "</div>";
 
        } else {
            echo '<div style="color: red; font-weight: bold;">Error: ' . $sql . '<br>' . $conn->error . '</div>';
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Redirect to the form page if accessed directly
        header("Location: purchase.html");
        exit();
    }
    ?>
</body>
</html>


</body>
</html>