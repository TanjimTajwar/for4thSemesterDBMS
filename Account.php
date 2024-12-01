<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account - Jobra Movies</title>
    <link rel="stylesheet" href="Account.css">
</head>
<body>
    <div class="container">
        <header>
            <h1><a href="HomePage.php">Jobra Movies</a></h1>
        </header>
        <main>
            <div class="form-container">
            <form action="submit-account.php" method="POST">
    <div class="form-group">
        <label for="firstName">First Name :</label>
        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
    </div>
    <div class="form-group">
        <label for="middleName">Middle Name :</label>
        <input type="text" id="middleName" name="middleName" placeholder="Middle Name">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name :</label>
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile :</label>
        <input type="tel" id="mobile" name="mobile" placeholder="Number" required>
    </div>
    
    <div class="form-group">
        <label for="gender">Role :</label>
        <select id="gender" name="gender" required>
            <option>Admin</option>
            <option>User</option>
        </select>
    </div>


    <div class="form-group">
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="form-group">
        <button type="submit" class="submit-btn">Submit</button>
    </div>
</form>

                
            </div>
        </main>
    </div>
</body>
</html>