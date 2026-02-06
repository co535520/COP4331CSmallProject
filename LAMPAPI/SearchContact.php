<?php
    include 'db.php':
    include 'messages.php';

    $inData = getRequestInfo();

    $searchResult = "";
    $searchCount = 0;
    $userId = $inData["userId"];


    $stmt = $conn->prepare("SELECT FirstName, LastName from Contacts where FirstName like ? AND UserId = ?");
    $contactSearch = "%" . $inData["search"] . "%";
    $stmt->bind_param("si", $contactSearch, $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    while($row = $result->fetch_assoc())
    {
        if( $searchCount > 0 )
        {
            $searchResult .= ",";
        }
        $searchCount++;
        $searchResult .= '"' . $row["FirstName"] . ' ' . $row["LastName"] . '"';
    }

    if( $searchCount == 0 )
    {
        returnWithError( "No Records Found" );
    }
    else
    {
        returnWithInfo( $searchResult );
    }
    $stmt->close();
    $conn->close();



?>