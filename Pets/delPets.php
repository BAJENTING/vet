<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $petID = $_GET['petID'];

    $sql = "DELETE FROM pet WHERE petID = '$petID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Deleted Successfully');
        window.location.href = '../Pets/viewPets.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }

?>