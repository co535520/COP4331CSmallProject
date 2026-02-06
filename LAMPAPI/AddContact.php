<?php
    include 'db.php';
    include 'messages.php';
    $inData = getRequestInfo();
    $firstName = $inData["firstName"];
    $lastName = $inData["lastName"];
    $phone = $inData["phone"];
    $email = $inData["email"];
    $userId = $inData["userId"];

    
    $stmt = $conn->prepare("INSERT into Contacts (UserID,FirstName,LastName,Phone,Email) VALUES(?,?,?,?,?)");
    $stmt->bind_param("issss", $userId, $firstName, $lastName, $phone, $email);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    returnWithError("");
?>