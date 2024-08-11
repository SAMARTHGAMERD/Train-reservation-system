<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="purchase.css">
    <title>Update</title>
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

    <div class="form-container">
        <form action="update_sts.php" method="POST">
            <div class="form-group">
                 <input type="text" id="name" name="name" placeholder="Enter the name" required>
            </div>
            <div class="form-group">
                 <input type="number" id="age" name="age" placeholder="Enter the age" required>
            </div>
            <div class="form-group">
                 <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                 <input type="text" id="email" name="email" placeholder="jhon@gmail.com" required>
            </div>
            <div class="form-group">
                <a href="update_sts.php"><button type="submit">Update</button></a>
            </div>
            </form>
        </div>

</body>
</html>