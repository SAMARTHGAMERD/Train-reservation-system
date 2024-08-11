
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="purchase.css">
    <title>Purchase</title>
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
        <form action="purchase_sts.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="jhon@gmail.com">
            </div>
            <div class="form-group">
                <label for="train_id">Train id:</label>
                <input type="number" id="train_id" name="train_id" required>
            </div>

            <div class="form-group">
                <a href="purchase_sts.php"><button type="submit">Purchase</button></a>
            </div>
        </form>
    </div>
</body>
</html>


