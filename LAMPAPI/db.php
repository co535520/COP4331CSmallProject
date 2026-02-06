<?php
$conn = new mysqli("localhost", "Jov", "smallproject", "COP4331"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>