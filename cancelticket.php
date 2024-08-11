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
    <div class="form-container">
        <form action="cancelticket_sts.php" method="POST">
            <div class="form-group">
                 <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                 <input type="text" id="train_id" name="train_id" placeholder="Enter train id">
            </div>
            <div class="form-group">
                <a href="cancelticket_sts.php"><button type="submit">View ticket</button></a>
            </div>
            </form>
        </div>
        
</body>
</html>

</body>
</html>