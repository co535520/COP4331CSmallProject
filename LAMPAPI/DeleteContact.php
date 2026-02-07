<?php
    include 'db.php';
    include 'messages.php';

    $inData = getRequestInfo();

    $firstName = $inData["firstName"];
    $lastName = $inData["lastName"];

    $stmt = $conn->prepare("DELETE FROM Contacts WHERE FirstName=? AND LastName=?");
    $stmt->bind_param("ss", $firstName, $lastName);;
    $stmt->execute();
    $stmt->close();
    $conn->close();
    returnWithError("");
?>