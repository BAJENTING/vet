<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $vetID = $_GET['vetID'];

    $sql = "DELETE FROM veterinarian WHERE vetID = '$vetID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Deleted Successfully');
        window.location.href = '../Veterinarian/viewVets.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }

?>