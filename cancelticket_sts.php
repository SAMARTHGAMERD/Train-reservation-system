<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myticket.css">
    <title>Train Ticket</title>
    <style>
        .ticket {
            width: 600px;
            border: 2px solid #FFA500;
            padding: 20px;
            margin-top: 50px;
            font-family: Arial, sans-serif;
            background-color: #fff5e1;
        }
        .ticket-header, .ticket-body {
            display: flex;
            justify-content: space-between;
        }
        .ticket-header div, .ticket-body div {
            width: 90%;
        }
        .ticket-title {
            font-size: 24px;
            color: #FFA500;
        }
        .ticket-section {
            margin-bottom: 20px;
        }
        .ticket-section div {
            margin-bottom: 5px;
        }
        .ticket-section div span {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .train-icon {
            height: 50px;
            margin-bottom: 10px;
        }
        .price {
            font-size: 20px;
            color: #000;
            font-weight: bold;
        }
        .cancel-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #ff4500;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .cancel-button:hover {
            background-color: #ff0000;
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
    <div class="ticket">
        <?php
        // Database connection
        include_once 'database.php';

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $phone = $_POST['phone']; 
        $train_id = $_POST['train_id']; 

        // Fetch passenger details
        $passenger_sql = "SELECT name FROM passenger WHERE phone = ?";
        $stmt_passenger = $conn->prepare($passenger_sql);
        $stmt_passenger->bind_param("s", $phone);
        $stmt_passenger->execute();
        $passenger_result = $stmt_passenger->get_result();

        if ($passenger_result->num_rows > 0) {
            $passenger = $passenger_result->fetch_assoc();

            // Fetch train details
            $train_sql = "SELECT train_id, train_name, source, destination, departure_time, departure_date, price, platform, carriageno, seatno FROM trains WHERE train_id = ?";
            $stmt_train = $conn->prepare($train_sql);
            $stmt_train->bind_param("i", $train_id);
            $stmt_train->execute();
            $train_result = $stmt_train->get_result();

            if ($train_result->num_rows > 0) {
                $train = $train_result->fetch_assoc();
                ?>
                <div class="ticket-header">
                    <div>
                        <img src="images/trainicon.jpg" alt="Train Icon" class="train-icon"> 
                        <div class="ticket-title"><b>TRAIN TICKET</b></div>
                        <br>
                        <div><b>Train Name:</b> <?php echo $train['train_name']; ?></div>
                    </div>
                    <div>
                        <div class="ticket-section">
                            <div><b>Passenger Name:</b> <?php echo $passenger['name']; ?></div>
                            <div><b>From:</b> <?php echo $train['source']; ?></div>
                            <div><b>To:</b> <?php echo $train['destination']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="ticket-body">
                    <div class="ticket-section">
                        <div><b>Train ID:</b> <?php echo $train['train_id']; ?></div>
                        <div><b>Date:</b> <?php echo $train['departure_date']; ?></div>
                        <div><b>Departure:</b> <?php echo $train['departure_time']; ?></div>
                    </div>
                    <div class="ticket-section">
                        <div><b>Platform No:</b> <?php echo $train['platform']; ?></div>
                        <div><b>Carriage No:</b> <?php echo $train['carriageno']; ?></div>
                        <div><b>Seat No:</b> <?php echo $train['seatno']; ?></div>
                        <div class="price"><strong>Price: ₹</strong> <?php echo $train['price']; ?></div>
                        <a href="cancelform.php" class="cancel-button">Cancel Ticket</a>
                    </div>
                </div>
                <?php
            } else {
                echo "<p>No train details found for Train ID $train_id.</p>";
            }
        } else {
            echo "<p>No passenger found with the given phone number.</p>";
        }

        // Close statements and connection
        $stmt_passenger->close();
        $stmt_train->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
