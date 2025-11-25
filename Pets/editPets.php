<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" ){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $petID = $_GET['petID'];
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petBreed = $_POST['petBreed'];
    $petBDate = $_POST['petBDate'];
    $petOwnerID = $_POST['petOwnerID'];

    $sql = "UPDATE pet SET petName = '$petName', petType = '$petType', petBreed = '$petBreed', petBDate = '$petBDate' ,petOwnerID = '$petOwnerID' WHERE petID = '$petID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Updated Successfully');
        window.location.href = '../Pets/viewPets.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
</head>
<body>
    <form action = "" method = "post">
        <label for = "petName">Name: </label>
        <input type = "text" id = "petName" name = "petName" required><br><br>

        <label for = "petType">Type: </label>
        <input type = "text" id = "petType" name = "petType" required><br><br>
        
        <label for = "petBreed">Breed: </label>
        <input type = "text" id = "petBreed" name = "petBreed" required><br><br>
        
        <label for = "petBDate">Birthdate: </label>
        <input type = "date" id = "petBDate" name = "petBDate" required><br><br>
        
        <label for = "petOwnerID">Owner ID: </label>
        <input type = "text" id = "petOwnerID" name = "petOwnerID" required><br><br>
        
        <button type = "submit" id = "saveBtn">Edit</button>
        <button type = "reset" id = "canBtn">Cancel</button>
    </form>
</body>
</html>