<?php
include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $movieName = $_POST['movie_name'];
    $showtime = $_POST['showtime'];
    $day = $_POST['day'];
    $totalTickets = $_POST['total_tickets'];
    $ticketType = $_POST['ticket_type'];
    $hall = $_POST['hall'];
    $mobile = $_POST['mobile'];
    $issueDate = $_POST['issue_date'];
    $gender = $_POST['gender'];

    try {
        // Prepare the SQL query to insert a new ticket
        $sql = "INSERT INTO Ticket (UserID, SessionID, SeatNumber, Price, PurchaseDate) VALUES (:userID, :sessionID, :seatNumber, :price, :purchaseDate)";
        
        // Assuming you can get the UserID from the session (you may need to adjust this)
        $userID = 1;  // Replace with session-based or logged-in user ID
        
        // Session ID can be fetched based on movie name, showtime, and day
        $sessionID = 1;  // You would need a query to fetch session ID based on the user's choices

        // Calculate price based on ticket type
        $price = ($ticketType == 'Premium - 500 TAKA') ? 500 : 300;
        
        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':sessionID', $sessionID);
        $stmt->bindParam(':seatNumber', $seatNumber); // You can generate or fetch seat number
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':purchaseDate', $issueDate);  // Assuming issue date is the purchase date

        // Execute the query
        $stmt->execute();

        // Success message
        echo "Ticket successfully booked!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking - Jobra Movies</title>
    <link rel="stylesheet" href="buy.css">
</head>
<body>
    <div class="header">
        <h1 class="logo"><a href="HomePage.php">Jobra Movies</a></h1>
        <nav>
            <ul>
                <li><a href="HomePage.php">HOME</a></li>
                <li><a href="Showtimes.php">SHOWTIMES</a></li>
                <li><a href="buy.php">Ticket Price</a></li>
                <li><a href="CommingSoon.php">Coming Soon</a></li>
                <li><a href="AboutUss.php">About Us</a></li>
                <li><a href="Account.php">Account</a></li>
            </ul>
        </nav>
    </div>

    <div class="form-container">
        <form action="buy.php" method="POST">
            <label>Username :</label>
            <input type="text" name="username" placeholder="UserName" required>
            
            <label>Password :</label>
            <input type="password" name="password" placeholder="Password" required>
            
            <label>Movie Name :</label>
            <select name="movie_name">
                <option>Vaikunthapurramuloo</option>
                <option>Loki</option>
                <option>Jailer</option>
                <option>Good Newwz</option>
                <option>Pushpa</option>
                <option>Stree</option>
            </select>
            
            <label>Showtime :</label>
            <select name="showtime">
                <option>10:50 AM</option>
                <option>2:30 PM</option>
                <option>6:15 PM</option>
                <option>9:45 PM</option>
            </select>
            
            <label>Day :</label>
            <select name="day">
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
                <option>Monday</option>
            </select>
            
            <label>Total Tickets:</label>
            <input type="number" name="total_tickets" required>

            <label>Type :</label>
            <select name="ticket_type">
                <option>Regular - 300 TAKA</option>
                <option>Premium - 500 TAKA</option>
            </select>
            
            <label>Hall :</label>
            <select name="hall">
                <option>Omega</option>
                <option>Sigma</option>
                <option>Lamda</option>
                <option>Alfa</option>
            </select>

            <label>Mobile :</label>
            <input type="text" name="mobile" placeholder="Number" required>
            
            <label>Issue Date :</label>
            <input type="date" name="issue_date" required>
            
            <label>Gender :</label>
            <select name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <!-- Submit button -->
            <div class="form-group">
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
