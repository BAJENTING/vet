<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $consultID = $_GET['consultID'];

    $sql = "DELETE FROM consultation WHERE consultID = '$consultID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Deleted Successfully');
        window.location.href = '../Consultation/viewCons.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }

?>