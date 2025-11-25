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

    $petID = $_POST['petID'];
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petBreed = $_POST['petBreed'];
    $petBDate = $_POST['petBDate'];
    $petOwnerID = $_POST['petOwnerID'];

    $sql = "INSERT INTO pet(petID, petName, petType, petBreed, petBDate, petOwnerID) VALUES ('$petID','$petName','$petType','$petBreed','$petBDate', '$petOwnerID')";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Added Successfully');
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
    <title>Add Pets</title>
    <link rel = "stylesheet" href = "../CSS/styles.css">
</head>
<body>
    <div id = "navbar">
        <ul>
            <li><a href = "../dashboard.php">Home</a></li>
            <li><a href = "../Owners/viewOwners.php">Owners</a></li>
            <li><a href = "../Pets/viewPets.php">Pets</a></li>
            <li><a href = "../Veterinarian/viewVets.php">Veterinarian</a></li>
            <li><a href = "../Consultation/viewCons.php">Consultation</a></li>
        </ul>
    </div>
    <form action = "" method = "post">
        <h1 style = "text-align: center;">Add Pet</h1>
        <label for = "petID">Pet ID: </label>
        <input type = "text" id = "petID" name = "petID" required><br><br>
        
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
        <button type = "submit" id = "saveBtn">Add Pets</button>
        <button type = "reset" id = "canBtn">Cancel</button>
    </form>
</body>
</html>