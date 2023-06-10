<!DOCTYPE html>
<html>
<head>
    <title>Simple CRUD Application</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Tugas Magang</h1>
    
    <?php
    // Include database connection
    include 'config.php';

    // Retrieve all users from the database
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1" cellpadding="10" rowspadding="5">';
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>addres</th><th>Action</th></tr>";
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
            $i++;
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }

    // Close database connection
    mysqli_close($conn);
    ?>

    <br>
    <a href="create.php" class="add">Add New User</a>
</body>
</html>
