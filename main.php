<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="purchase.css">
    <title>Trainway</title>
    <style>
        body{
            background-image: url(images/japan-train-min.png);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }
        .maintxt{
            font-size: 90px;
            color: #f4f4f4;
            margin-top: 400px;
            margin-right: 700px;
        }
        .btns{
            background-color: #f60;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
        }
    </style>
    
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
    <div id="block">
        <div class="maintxt"><strong>Need a break?</strong></div>
        <div><p style="color: #f4f4f4; font-size: large;">You are in the right place</p></div>
        <a href="booking.php"><div><button class="btns">Book ticket</button></div></a>
    </div>
    
</body>
</html>
