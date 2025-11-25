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

    $vetID = $_POST['vetID'];
    $vetFName = $_POST['vetFName'];
    $vetLName = $_POST['vetLName'];
    $vetAddress = $_POST['vetAddress'];
    $vetSpecial = $_POST['vetSpecial'];

    $sql = "INSERT INTO veterinarian(vetID, vetFName, vetLName, vetAddress, vetSpecial) VALUES ('$vetID','$vetFName','$vetLName','$vetAddress','$vetSpecial')";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Added Successfully');
        window.location.href = '../Veterinarian/viewVets.php';
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
    <title>Add Veterinarian</title>
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
        <h1>Add Veterinarian</h1>
        <label for = "vetID">Vet ID: </label>
        <input type = "text" id = "vetID" name = "vetID" required><br><br>
        
        <label for = "vetFName">First Name: </label>
        <input type = "text" id = "vetFName" name = "vetFName" required><br><br>

        <label for = "vetLName">Last Name: </label>
        <input type = "text" id = "vetLName" name = "vetLName" required><br><br>
        
        <label for = "vetAddress">Address: </label>
        <input type = "text" id = "vetAddress" name = "vetAddress" required><br><br>
        
        <label for = "vetSpecial">Specialization: </label>
        <input type = "text" id = "vetSpecial" name = "vetSpecial" required><br><br>
        
        <button type = "submit" id = "saveBtn">Add Veterinarian</button>
        <button type = "reset" id = "canBtn">Cancel</button>
    </form>
</body>
</html>