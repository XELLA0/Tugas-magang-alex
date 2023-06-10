<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <?php
    // Include database connection
    include 'config.php';

    // Get user ID from the URL parameter
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Update user in the database
        $query = "UPDATE users SET name='$name', email='$email', address='$address' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "User updated successfully.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Close database connection
        //mysqli_close($conn);
    }

    // Retrieve user details from the database
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

        <label>Address:</label><br>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>

    <br>
    <a href="index.php">Back to Users</a>
</body>
</html>
