<?php
    include 'db.php';
    include 'messages.php';

    $firstName = $inData["firstName"];
    $lastName = $inData["lastName"];
    $phone = $inData["phone"];
    $email = $inData["email"];
    $userId = $inData["userId"];

     $stmt = $conn->prepare("UPDATE Contacts SET FirstName=?, LastName=?, Phone=?, Email=? WHERE UserID=?");
    $stmt->bind_param("ssssi", $firstName, $lastName, $phone, $email, $userId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    returnWithError("");
?>