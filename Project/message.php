<?php require 'function.php';

// Validate and sanitize user inputs
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Perform basic form validation
if (empty($name) || empty($email) || empty($message)) {
    die("All fields are required.");
}



// Insert data into the database
$sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message submitted successfully!";
} else {
    echo "Error: Check your Inputs" . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
