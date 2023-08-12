<?php
$dbServerName= "localhost";
$dbUserName= "root";
$dbPassword= "";
$dbName= "travel_wolf";

$conn=new mysqli('localhost','root','','travel_wolf');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Create database

$sql = "CREATE DATABASE Travel Wolf";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE Destination (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description VARCHAR(50) NOT NULL,
image VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Destination created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


//insert data

$sql = "INSERT INTO Destination (id, title, description, image)
VALUES (1, 'Anuradhapura', 'Gampola district.3000/= package from colombo.','1.jpg')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



//get retrieve
$sql = "INSERT INTO Destination (id, title, description, image)
VALUES (1, 'Anuradhapura', 'Gampola district.3000/= package from colombo.','1.jpg')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


// update data
$sql = "UPDATE Us SET title='Ambuluwawa' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

// sql to delete a record
$sql = "DELETE FROM Destination WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

//additional function select

$sql = "SELECT id FROM Destination";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"].  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
?>