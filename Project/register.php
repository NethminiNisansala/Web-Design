<?php require 'function.php';
// Validate and sanitize user inputs
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// Perform basic form validation
if (empty($username) || empty($_POST['password'])) {
    die("All fields are required.");
}


// Insert data into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: Invalid your Inputs. Try Again. " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
