
<?php
	include 'db.php';
	include 'messages.php';

	$inData = getRequestInfo();
	
	$id = 0;
	$firstName = "";
	$lastName = "";


	
	$stmt = $conn->prepare("SELECT ID,firstName,lastName FROM Users WHERE Login=? AND Password =?");
	$stmt->bind_param("ss", $inData["login"], $inData["password"]);
	$stmt->execute();
	$result = $stmt->get_result();

	if( $row = $result->fetch_assoc()  )
	{
		returnWithInfo( $row['firstName'], $row['lastName'], $row['ID'] );
	}
	else
	{
		returnWithError("No Records Found");
	}

	$stmt->close();
	$conn->close();
	
	
	
	
?>
