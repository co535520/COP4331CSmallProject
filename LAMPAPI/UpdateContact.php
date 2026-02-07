<?php
    include 'db.php';
    include 'messages.php';
    
    $inData = getRequestInfo();

    $firstName = $inData["firstName"];
    $lastName = $inData["lastName"];
    $phone = $inData["phone"];
    $email = $inData["email"];
    $userId = $inData["userId"];
    $contactId = $inData["id"];

     $stmt = $conn->prepare("UPDATE Contacts SET FirstName=?, LastName=?, Phone=?, Email=? WHERE ID=?");
    $stmt->bind_param("ssssi", $firstName, $lastName, $phone, $email, $contactId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    returnWithError("");
?>