<?php
// Include database connection
include 'config.php';

// Get user ID from the URL parameter
$id = $_GET['id'];

// Delete user from the database
$query = "DELETE FROM users WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    echo "User deleted successfully.";
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
