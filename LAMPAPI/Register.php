<?php
    include 'db.php';
    include 'messages.php';

    $inData = getRequestInfo();
    $id = 0;
    $firstName = $inData["firstName"];
    $lastName = $inData["lastName"];
    $login = $inData["login"];
    $password = $inData["password"];



    
    $sql = "SELECT ID FROM Users WHERE Login=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->fetch_assoc()){
        returnWithError("Login already in use");
        $stmt->close();
        $conn->close();
    }else{
        $stmt = $conn->prepare("INSERT into Users (FirstName, LastName, Login, Password) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $login, $password);
        $stmt->execute();
        returnWithInfo( $firstName, $lastName, $conn->insert_id );
        $stmt->close();
        $conn->close();
    }
?>