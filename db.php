<?php
// Database connection setup

$servername = "localhost";
$username = "root";  // replace with your database username
$password = "";  // replace with your database password
$dbname = "dbms_project";  // replace with your database name

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optionally, you could also set the charset to avoid issues with special characters
    $conn->exec("set names utf8");

    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handling date/time

function insertEvent($movieName, $startDateTime, $endDateTime) {
    global $conn;

    // Prepare SQL to insert a movie session with proper datetime handling
    $sql = "INSERT INTO Session (MovieName, StartTime, EndTime) VALUES (:movieName, :startTime, :endTime)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind values using DateTime format for MySQL
    $stmt->bindParam(':movieName', $movieName);
    $stmt->bindParam(':startTime', $startDateTime->format('Y-m-d H:i:s')); // MySQL DATETIME format
    $stmt->bindParam(':endTime', $endDateTime->format('Y-m-d H:i:s')); // MySQL DATETIME format

    // Execute the statement
    if ($stmt->execute()) {
        echo "Event inserted successfully.";
    } else {
        echo "Error inserting event.";
    }
}

// Example usage:
$startDateTime = new DateTime('2024-12-01 10:00:00');
$endDateTime = new DateTime('2024-12-01 12:00:00');
insertEvent('Loki', $startDateTime, $endDateTime);

// Preventing cloning: If your class is part of the application and you want to prevent cloning
// (e.g., Singleton design pattern), you would ensure that the __clone() method is private or not present.

class DatabaseSingleton {
    private static $instance = null;

    private function __construct() {}  // Private constructor to prevent direct instantiation

    // Private clone method to prevent cloning
    private function __clone() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseSingleton();
        }
        return self::$instance;
    }
}

?>
