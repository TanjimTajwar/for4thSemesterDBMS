<?php
include('db.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $role = $_POST['gender'];

    // Hash password for security
    $password = password_hash("defaultpassword", PASSWORD_DEFAULT);  // You can allow the user to set a password

    try {
        // Insert the new user into the AccountUser table
        $sql = "INSERT INTO accountUser (Name, Email, Phone, Password, Role) 
                VALUES (:name, :email, :phone, :password, :role)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $firstName . ' ' . $middleName . ' ' . $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $mobile);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        // Execute the statement
        $stmt->execute();

        echo "Account created successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
