<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $petOwnerID = $_GET['petOwnerID'];

    $sql = "DELETE FROM petOwner WHERE petOwnerID = '$petOwnerID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Deleted Successfully');
        window.location.href = '../Owners/viewOwners.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }

?>