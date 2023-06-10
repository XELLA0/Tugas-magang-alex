<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <h1>Add New User</h1>

    <?php
    // Include database connection
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Insert user into the database
        $query = "INSERT INTO users (name, email, address) VALUES ('$name', '$email', '$address')";
        if (mysqli_query($conn, $query)) {
            echo "User added successfully.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Address:</label><br>
        <input type="text" name="address" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <br>
    <a href="index.php">Back to Users</a>
</body>
</html>
