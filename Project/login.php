<?php require 'function.php';
session_start(); // Start the session

}

// Sanitize and validate user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"]; // or email, depending on your login method
    $password = $_POST["password"];

    // Validate username/email and password (add more validation as needed)
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Check credentials
        $sql = "SELECT * FROM users WHERE username = ?"; // or email = ?
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username); // or "s" for email
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                // Successful login
                $_SESSION["user_id"] = $row["id"];
                header("Location: dashboard.php"); // Redirect to dashboard
            } else {
                echo "Invalid credentials.";
            }
        } else {
            echo "User not found.";
        }
        $stmt->close();
    }
}

$conn->close();
?>
